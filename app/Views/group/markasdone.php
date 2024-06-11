<div class="col-10">
    <div class="card">
        <div class="card-header">
            <h3 id="markasdone">Mark as Done</h3>
            <h5 class="text-muted">Menandai selesai untuk to-do yang belum selesai / Menghapus tanda sudah selesai</h5>
        </div>
        <div class="card-body">
            <h6>HTTP Request</h6>
            <div class="card">
                <div class="card-body text-center">
                    PUT or PATCH <?= $url; ?>/todolist/markasdone/(:id)
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
                    <pre><code id="datamarkasdone"></code></pre>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var markasdone = {
        "status": 200,
        "error": null,
        "messages": {
            "success": "Successfully mark as done to-do with id = 11"
        }
    };
    document.getElementById('datamarkasdone').innerHTML = markasdone.prettyPrint();
</script>