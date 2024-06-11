<div class="col-10">
    <div class="card">
        <div class="card-header">
            <h3 id="register">Register</h3>
            <h5 class="text-muted">Mendaftar sebagai pengguna baru</h5>

        </div>
        <div class="card-body">
            <h6>HTTP Request</h6>
            <div class="card">
                <div class="card-body text-center">
                    POST <?= $url; ?>/register
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
                            <td>name</td>
                            <td>required</td>
                            <td>Nama pengguna</td>
                        </tr>
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
                        <tr>
                            <td>confirmpassword</td>
                            <td>matches[password]</td>
                            <td>Masukkan ulang password pengguna</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <h6 class="mt-3">Example Result</h6>
            <div class="card">
                <div class="card-body">
                    <pre><code id="dataregister"></code></pre>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var register = {
        "status": 201,
        "error": null,
        "messages": {
            "success": "Successfully created an account"
        }
    };
    document.getElementById('dataregister').innerHTML = register.prettyPrint();
</script>