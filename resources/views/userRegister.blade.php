<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>Online Library</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
    </head>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/">Dashboard</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="/">User Login <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/BookList">BookList</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/adminLogin">Admin Login</a>
                </li>
            </ul>
        </div>
    </nav>

    <section class="h-100 bg-dark">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col">
                <div class="card card-registration my-4">
                <div class="row g-0">
                    <div class="col-xl-6 d-none d-xl-block">
                    <img
                        src="https://mdbootstrap.com/img/Photos/new-templates/bootstrap-registration/img4.jpg"
                        alt="Sample photo"
                        class="img-fluid"
                        style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;"
                    />
                    </div>
                    <div class="col-xl-6">
                    <div class="card-body p-md-5 text-black">
                        <h3 class="mb-5 text-uppercase">User Registration Form</h3>

                        <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                            <input type="text" id="username" class="form-control form-control-lg" />
                            <label class="form-label" for="form3Example1m">Username</label>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                            <input type="text" id="psw" class="form-control form-control-lg" />
                            <label class="form-label" for="form3Example1n">Password</label>
                            </div>
                        </div>
                        </div>

                        <div class="form-outline mb-4">
                        <input type="text" id="addr" class="form-control form-control-lg" />
                        <label class="form-label" for="form3Example8">Address</label>
                        </div>

                        <div class="form-outline mb-4">
                        <input type="text" id="email" class="form-control form-control-lg" />
                        <label class="form-label" for="form3Example9">Email</label>
                        </div>

                        <div class="form-outline mb-4">
                        <input type="text" id="phone" class="form-control form-control-lg" />
                        <label class="form-label" for="form3Example90">Phone Number</label>
                        </div>

                        <div class="d-flex justify-content-end pt-3">
                        <button type="button" class="btn btn-warning btn-lg ms-2" onclick="userRegister()">Submit form</button>
                        </div>

                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
    </section>
    
</html>