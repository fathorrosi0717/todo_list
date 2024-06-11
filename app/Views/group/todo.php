<div class="col-10">
    <div class="card">
        <div class="card-header">
            <h3 id="todo">Todo</h3>
            <h5 class="text-muted">Menampilkan data khusus hari ini to-do list user yang belum diselesaikan</h5>

        </div>
        <div class="card-body">
            <h6>HTTP Request</h6>
            <div class="card">
                <div class="card-body text-center">
                    GET <?= $url; ?>/todolist/todo
                </div>
            </div>
            <h6 class="mt-3">Parameters</h6>
            <div class="table-responsive">
                <table class="table table-bordered align-middle">
                    <thead class="table-secondary">
                        <tr>
                            <th scope="col" style="width: 20%;">Parameter</th>
                            <th scope="col" style="width: 30%;">Validation</th>
                            <th scope="col" style="width: 50%;">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <h6 class="mt-3">Example Result</h6>
            <div class="card">
                <div class="card-body">
                    <pre><code id="datatodo"></code></pre>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var todo = {
        "status": 200,
        "error": null,
        "messages": {
            "list": [{
                    "id": "12",
                    "user_id": "4",
                    "tittle": "Test kedua",
                    "description": "Mencoba menampilkan beberapa data todo yang belum diselesaikan",
                    "time": "2022-03-09 21:00:00",
                    "status": "0",
                    "created_at": "2022-03-09 17:04:08",
                    "updated_at": "2022-03-09 17:04:08",
                    "deleted_at": null
                },
                {
                    "id": "11",
                    "user_id": "4",
                    "tittle": "Test menampilkan data",
                    "description": "Mencoba menampilkan data todo yang belum diselesaikan",
                    "time": "2022-03-09 19:00:00",
                    "status": "0",
                    "created_at": "2022-03-09 17:03:21",
                    "updated_at": "2022-03-09 17:03:21",
                    "deleted_at": null
                }
            ]
        }
    };
    document.getElementById('datatodo').innerHTML = todo.prettyPrint();
</script>