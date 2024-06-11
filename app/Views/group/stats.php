<div class="col-10">
    <div class="card">
        <div class="card-header">
            <h3 id="stats">Stats Counter</h3>
            <h5 class="text-muted">Menampilkan penghitung tugas</h5>

        </div>
        <div class="card-body">
            <h6>HTTP Request</h6>
            <div class="card">
                <div class="card-body text-center">
                    GET <?= $url; ?>/todolist/stats
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
                    <pre><code id="datastats"></code></pre>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var stats = {
        "status": 200,
        "error": null,
        "messages": {
            "todo": 0,
            "today": 1,
            "overdue": 0,
            "done": 0,
            "all": 5
        }
    };
    document.getElementById('datastats').innerHTML = stats.prettyPrint();
</script>