<div class="col-10">
    <div class="card">
        <div class="card-header">
            <h3 id="delete">Delete</h3>
            <h5 class="text-muted">Menghapus data to-do yang dipilih</h5>

        </div>
        <div class="card-body">
            <h6>HTTP Request</h6>
            <div class="card">
                <div class="card-body text-center">
                    DELETE <?= $url; ?>/todolist/delete/(:id)
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
                    <pre><code id="datadeletetodo"></code></pre>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var deletetodo = {
        "status": 200,
        "error": null,
        "messages": {
            "success": "Successfully deleted to-do with id = 8"
        }
    };
    document.getElementById('datadeletetodo').innerHTML = deletetodo.prettyPrint();
</script>