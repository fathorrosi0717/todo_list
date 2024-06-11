<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Documentations API</title>
    <style>
        *[id]:before {
            display: block;
            content: " ";
            margin-top: -75px;
            height: 75px;
            visibility: hidden;
        }
    </style>
    <script>
        Object.prototype.prettyPrint = function() {
            var jsonLine = /^( *)("[\w]+": )?("[^"]*"|[\w.+-]*)?([,[{])?$/mg;
            var replacer = function(match, pIndent, pKey, pVal, pEnd) {
                var key = '<span class="json-key" style="color: brown">',
                    val = '<span class="json-value" style="color: green">',
                    str = '<span class="json-string" style="color: blue">',
                    r = pIndent || '';
                if (pKey)
                    r = r + key + pKey.replace(/[": ]/g, '') + '</span>: ';
                if (pVal)
                    r = r + (pVal[0] == '"' ? str : val) + pVal + '</span>';
                return r + (pEnd || '');
            };

            return JSON.stringify(this, null, 3)
                .replace(/&/g, '&amp;').replace(/\\"/g, '&quot;')
                .replace(/</g, '&lt;').replace(/>/g, '&gt;')
                .replace(jsonLine, replacer);
        }
    </script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
        <div class="container">
            <a class="navbar-brand" href="/">Documentation</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownUser" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            User API
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownUser">
                            <li><a class="dropdown-item" href="#register">Register</a></li>
                            <li><a class="dropdown-item" href="#login">Login</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownTodo" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            To-do List API
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownTodo">
                            <li><a class="dropdown-item" href="#all">All</a></li>
                            <li><a class="dropdown-item" href="#today">Today</a></li>
                            <li><a class="dropdown-item" href="#todo">Todo</a></li>
                            <li><a class="dropdown-item" href="#overdue">Overdue</a></li>
                            <li><a class="dropdown-item" href="#done">Done</a></li>
                            <li><a class="dropdown-item" href="#markasdone">Mark as Done</a></li>
                            <li><a class="dropdown-item" href="#create">Create</a></li>
                            <li><a class="dropdown-item" href="#update">Update</a></li>
                            <li><a class="dropdown-item" href="#delete">Delete</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#stats" class="nav-link" id="navbarStats">Stats</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row justify-content-center gap-3 mt-3">
            <div class="col-10">
                <h1>User API</h1>
            </div>
            <?= $this->include('group/register'); ?>
            <?= $this->include('group/login'); ?>
            <div class="col-10 mt-5">
                <h1>To-do List API</h1>
            </div>
            <?= $this->include('danger/warning'); ?>
            <?= $this->include('group/all'); ?>
            <?= $this->include('group/today'); ?>
            <?= $this->include('group/todo'); ?>
            <?= $this->include('group/overdue'); ?>
            <?= $this->include('group/done'); ?>
            <?= $this->include('group/markasdone'); ?>
            <?= $this->include('group/create'); ?>
            <?= $this->include('group/update'); ?>
            <?= $this->include('group/delete'); ?>
            <?= $this->include('danger/warning'); ?>
            <?= $this->include('group/stats'); ?>
            <div class="col-10 mt-5 mb-5 pt-5 pb-5">
                <h3 class="text-muted text-center">API Documentations</h3>
                <p class="text-muted text-center">Created By : Back End Developer Team</p>
            </div>
        </div>
    </div>



    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>