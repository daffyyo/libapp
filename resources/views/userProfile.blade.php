<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>Home</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </head>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand">Welcome, {{ session('user') }}!</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                </li>            
                <li class="nav-item">
                    <a class="nav-link" href="/BookList">BookList</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/adminLogout">Admin Login</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/logout">Logout <span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </nav>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ti-icons@0.1.2/css/themify-icons.css">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-4 mb-5 mb-lg-0 wow fadeIn">
                <div class="card border-0 shadow">
                    <img src="https://www.bootdey.com/img/Content/avatar/avatar6.png" alt="...">
                    <div class="card-body p-1-9 p-xl-5">
                        <div class="mb-4">
                            <h3 class="h4 mb-0">{{ session('user') }}</h3> 
                        </div>
                        <ul class="list-unstyled mb-4">
                            <li class="mb-3"><a href="#!"><i class="far fa-envelope display-25 me-3 text-secondary"></i> {{ session('email') }}</a></li>
                            <li class="mb-3"><a href="#!"><i class="fas fa-mobile-alt display-25 me-3 text-secondary"></i> {{ session('phone') }}</a></li>
                            <li><a href="#!"><i class="fas fa-map-marker-alt display-25 me-3 text-secondary"></i> {{ session('address') }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="ps-lg-1-6 ps-xl-5">
                    <div class="mb-5 wow fadeIn">
                        <div class="text-start mb-1-6 wow fadeIn">
                            <h2 class="h1 mb-0 text-primary">#Billing Information</h2>
                        </div>
                        &nbsp;
                        <p class="mb-0">#: {{ session('billingInfo') }}</p>
                    </div>                    
                    <div class="mb-5 wow fadeIn">
                        <div class="text-start mb-1-6 wow fadeIn">
                            <h2 class="mb-0 text-primary">#Order History</h2>
                        </div>
                        <div class="container mt-5">
                            <div class="d-flex justify-content-center row">
                                <div class="col-md-10">
                                    <div class="rounded">
                                        <div class="table-responsive table-borderless">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">
                                                            <div class="toggle-btn">
                                                                <div class="inner-circle"></div>
                                                            </div>
                                                        </th>
                                                        <th>Order #</th>
                                                        <th>status</th>
                                                        <th>Total</th>
                                                        <th>Created</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody class="table-body">
                                                    @foreach ($userOrders as $order)                                                    
                                                        <tr class="cell-1" id={{ $order->Order_ID }}>
                                                            <td class="text-center">
                                                                <div class="toggle-btn">
                                                                    <div class="inner-circle"></div>
                                                                </div>
                                                            </td>
                                                            <td>{{ $order->Order_ID }}</td>
                                                            <td>{{ $order->OrderStatus }}</td>
                                                            <td><span class="badge badge-success">{{ $order->OrderAmount }}</span></td>
                                                            <td>{{ $order->OrderDatetime }}</td>
                                                            <td><i class="fa fa-ellipsis-h text-black-50"></i></td>
                                                        </tr>
                                                    @endforeach    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</html>
