<div class="col-10">
    <div class="card">
        <div class="card-header">
            <h3 id="login">Login</h3>
            <h5 class="text-muted">Masuk sebagai user dan mendapat Bearer Token JWT</h5>

        </div>
        <div class="card-body">
            <h6>HTTP Request</h6>
            <div class="card">
                <div class="card-body text-center">
                    POST <?= $url; ?>/login
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
                            <td>email</td>
                            <td>required|valid_email|is_unique</td>
                            <td>Email pengguna</td>
                        </tr>
                        <tr>
                            <td>password</td>
                            <td>required|min_length[6]</td>
                            <td>Password pengguna</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <h6 class="mt-3">Example Result</h6>
            <div class="card">
                <div class="card-body">
                    <pre><code id="datalogin"></code></pre>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var login = {
        "status": 201,
        "error": null,
        "messages": {
            "success": "Successfully authentication"
        },
        "data": {
            "id": "4",
            "name": "Ade Rizaldi",
            "email": "ade@gmail.com"
        },
        "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6IjQiLCJuYW1lIjoiQWRlIFJpemFsZGkiLCJlbWFpbCI6ImFkZUBnbWFpbC5jb20iLCJpYXQiOjE2NDY3OTAyMTksImV4cCI6MTY0Njg3NjYxOX0.JX_68UdpBJji0imUpXK3iLqEqyUXcNya-mSuAg9FShg"
    };
    document.getElementById('datalogin').innerHTML = login.prettyPrint();
</script>