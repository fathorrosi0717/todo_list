<?php

namespace App\Controllers;

use App\Consts\TaskStatus;
use App\Controllers\BaseController;
use App\Models\ListModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\I18n\Time;

class Todolist extends BaseController
{
    use ResponseTrait;

    protected $user_id;
    protected $model;
    protected $mytime;

    public function __construct()
    {
        helper('jwt');
        $request = service('request');
        $encodedToken = explode(' ', $request->getServer('HTTP_AUTHORIZATION'))[1];
        $this->user_id = getID($encodedToken);
        $this->model = new ListModel();
    }


    public function index()
    {
        $data = $this->model->where('user_id', $this->user_id)->orderBy('time', 'asc')->findAll();

        $response = [
            'status' => 200,
            'error' => null,
            'messages' => [
                'list' => $data,
            ],
        ];
        return $this->respond($response);
    }

    public function today()
    {
        $now = Time::now();
        $today = Time::today();
        $tomorrow = Time::tomorrow();
        $data = $this->model->where(['user_id' => $this->user_id, 'DATE(time)' => DATE('Y-m-d')])->orderBy('time', 'desc')->findAll();
        $response = [
            'status' => 200,
            'error' => null,
            'messages' => [
                'list' => $data,
            ],
        ];
        return $this->respond($response);
    }

    public function todo()
    {
        $now = Time::now();
        $tomorrow = Time::tomorrow();
        $data = $this->model->where(['user_id' => $this->user_id, 'time >' => $now, 'time <=' => $tomorrow, 'status' => 0])->orderBy('time', 'desc')->findAll();
        $response = [
            'status' => 200,
            'error' => null,
            'messages' => [
                'list' => $data,
            ],
        ];
        return $this->respond($response);
    }

    public function overdue()
    {
        $today = Time::today();
        $now = Time::now();
        $data = $this->model->where(['user_id' => $this->user_id, 'time >' => $today, 'time <=' => $now, 'status' => 0])->orderBy('time', 'desc')->findAll();
        $response = [
            'status' => 200,
            'error' => null,
            'messages' => [
                'list' => $data,
            ],
        ];
        return $this->respond($response);
    }

    public function done()
    {
        $today = Time::today();
        $tomorrow = Time::tomorrow();
        $data = $this->model->where(['user_id' => $this->user_id, 'time >' => $today, 'time <=' => $tomorrow, 'status' => 1])->orderBy('time', 'desc')->findAll();
        $response = [
            'status' => 200,
            'error' => null,
            'messages' => [
                'list' => $data,
            ],
        ];
        return $this->respond($response);
    }

    public function markasdone($id = null)
    {
        $oldData = $this->model->where('id', $id)->first();
        if (!$oldData) {
            return $this->failNotFound("to-do with id = $id not found in to-do list");
        }

        $status = ($oldData['status'] == 0) ? 1 : 0;
        $messages = ($oldData['status'] == 0) ? "Successfully mark as done to-do with id = $id" : "Successfully unmark to-do with id = $id";
        $data = [
            'id' => $id,
            'status' => $status,
            'tittle' => $oldData['tittle'],
            'description' => $oldData['description'],
            'time' => $oldData['time'],
        ];

        if (!$this->model->save($data)) {
            return $this->fail($this->model->errors());
        }

        $response = [
            'status' => 200,
            'error' => null,
            'messages' => [
                'success' => $messages,
            ],
        ];

        return $this->respondUpdated($response);
    }

    public function create()
    {
        $rules = [
            'tittle' => 'required',
            'time' => 'required',
        ];

        if (!$this->validate($rules)) {
            return $this->fail($this->validator->getErrors());
        }

        $data  = [
            'user_id' => $this->user_id,
            'tittle' => $this->request->getVar('tittle'),
            'description' => $this->request->getVar('description'),
            'time' => $this->request->getVar('time'),
        ];

        if (!$this->model->save($data)) {
            return $this->fail($this->model->errors());
        }
        $response = [
            'status' => 201,
            'error' => null,
            'messages' => [
                'success' => 'Successfully created new to-do',
            ],
        ];

        return $this->respondCreated($response);
    }

    public function update($id = null)
    {
        $oldData = $this->model->where('id', $id)->first();
        if (!$oldData) {
            return $this->failNotFound("to-do with id = $id not found in to-do list");
        }

        $data = $this->request->getRawInput();
        $data['id'] = $id;


        if (!$this->model->save($data)) {
            return $this->fail($this->model->errors());
        }

        $response = [
            'status' => 200,
            'error' => null,
            'messages' => [
                'success' => "Successfully updated to-do with id = $id",
            ],
        ];

        return $this->respondUpdated($response);
    }

    public function delete($id = null)
    {
        $data = $this->model->where('id', $id)->first();

        if (!$data) {
            return $this->failNotFound("to-do with id = $id not found in to-do list");
        }

        $this->model->delete($id);

        $response = [
            'status' => 200,
            'error' => null,
            'messages' => [
                'success' => "Successfully deleted to-do with id = $id",
            ],
        ];

        return $this->respondDeleted($response);
    }

    /**
     * Statistik task
     * 
     * Mengembalikan statistik (penghitung) setiap status task
     * - to do
     * - today
     * - overdue
     * - done
     * - all
     * 
     * @return void
     */
    public function stats()
    {
        $now = Time::now();
        $today = Time::today();
        $tomorrow = Time::tomorrow();

        $todo = $this->model->where(['user_id' => $this->user_id, 'time >' => $now, 'time <=' => $tomorrow, 'status' => TaskStatus::TASK_TO_DO])->countAllResults();
        $today_do = $this->model->where(['user_id' => $this->user_id, 'DATE(time)' => date('Y-m-d')])->countAllResults();
        $overdue = $this->model->where(['user_id' => $this->user_id, 'time >' => $today, 'time <=' => $now, 'status' => 0])->countAllResults();
        $done = $this->model->where(['user_id' => $this->user_id, 'time >' => $today, 'time <=' => $tomorrow, 'status' => 1])->countAllResults();
        $all = $this->model->where(['user_id' => $this->user_id])->countAllResults();
        
        $response = [
            'status' => 200,
            'error' => null,
            'messages' => [
                'todo' => $todo,
                'today' => $today_do,
                'overdue' => $overdue,
                'done' => $done,
                'all' => $all,
            ],
        ];

        return $this->respond($response);
    }
}
