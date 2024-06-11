<div class="col-10">
    <div class="card">
        <div class="card-header">
            <h3 id="update">Update</h3>
            <h5 class="text-muted">Mengubah to-do list yang dipilih</h5>

        </div>
        <div class="card-body">
            <h6>HTTP Request</h6>
            <div class="card">
                <div class="card-body text-center">
                    PUT or PATCH <?= $url; ?>/todolist/update/(:id)
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
                            <td>tittle</td>
                            <td>-</td>
                            <td>Judul to-do</td>
                        </tr>
                        <tr>
                            <td>description</td>
                            <td>-</td>
                            <td>Descripsi to-do</td>
                        </tr>
                        <tr>
                            <td>time</td>
                            <td>-</td>
                            <td>Waktu to-do</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <h6 class="mt-3">Example Result</h6>
            <div class="card">
                <div class="card-body">
                    <pre><code id="dataupdate"></code></pre>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var update = {
        "status": 200,
        "error": null,
        "messages": {
            "success": "Successfully updated to-do with id = 10"
        }
    };
    document.getElementById('dataupdate').innerHTML = update.prettyPrint();
</script>