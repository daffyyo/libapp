<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>Online Library</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" >
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css"></script>
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
                <a class="nav-link" href="/">User Login </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/BookList">BookList</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/adminLogin">Admin Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/checkOut">Check Out<span class="sr-only">(current)</span></a>
            </li>
            </ul>
        </div>
    </nav>

    <body>
        <div class="container px-4 py-5 mx-auto">
        <div class="row d-flex justify-content-left">
            <h4 class="heading">Shopping Bag</h4>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-12">
                <div class="row text-right">
                    <div class="col-3">
                        <h6 class="mt-2">Book Name</h6>
                    </div>
                    <div class="col-3">
                        <h6 class="mt-2">Author</h6>
                    </div>
                    <div class="col-3">
                        <h6 class="mt-2">Category</h6>
                    </div>
                    <div class="col-3">
                        <h6 class="mt-2">Price</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
        @foreach ($shoppingBag as $item)
            <div class="col-12">
                <div class="row text-right">
                    <div class="col-3">
                        <p class="mob-text">{{ $item->BookName }}</p>
                    </div>
                    <div class="col-3">
                        <p class="mob-text">{{ $item->Author }}</p>
                    </div>
                    <div class="col-3">
                        <div class="row d-flex justify-content-end px-3">
                            <p class="mb-0" id="cnt1">{{ $item->Category }}</p>
                        </div>
                    </div>
                    <div class="col-3">
                        <h6 class="mob-text">{{ $item->Price }}</h6>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="row">
                        <div class="col-lg-3 radio-group">
                            <div class="row d-flex px-3 radio"> <img class="pay" src="https://i.imgur.com/WIAP9Ku.jpg">
                                <p class="my-auto">Credit Card</p>
                            </div>
                            <div class="row d-flex px-3 radio gray"> <img class="pay" src="https://i.imgur.com/OdxcctP.jpg">
                                <p class="my-auto">Debit Card</p>
                            </div>
                            <div class="row d-flex px-3 radio gray mb-3"> <img class="pay" src="https://i.imgur.com/cMk1MtK.jpg">
                                <p class="my-auto">PayPal</p>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="row px-2">
                                <div class="form-group col-md-6"> <label class="form-control-label">Name on Card</label> <input type="text" id="cname" name="cname" placeholder="Johnny Doe"> </div>
                                <div class="form-group col-md-6"> <label class="form-control-label">Card Number</label> <input type="text" id="cnum" name="cnum" placeholder="1111 2222 3333 4444"> </div>
                            </div>
                            <div class="row px-2">
                                <div class="form-group col-md-6"> <label class="form-control-label">Expiration Date</label> <input type="text" id="exp" name="exp" placeholder="MM/YYYY"> </div>
                                <div class="form-group col-md-6"> <label class="form-control-label">CVV</label> <input type="text" id="cvv" name="cvv" placeholder="***"> </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mt-2">
                            <div class="row d-flex justify-content-between px-4">
                                <p class="mb-1 text-left">Subtotal</p>
                                <h6 class="mb-1 text-right">$23.49</h6>
                            </div>
                            <div class="row d-flex justify-content-between px-4">
                                <p class="mb-1 text-left">Shipping</p>
                                <h6 class="mb-1 text-right">$2.99</h6>
                            </div>
                            <div class="row d-flex justify-content-between px-4" id="tax">
                                <p class="mb-1 text-left">Total (tax included)</p>
                                <h6 class="mb-1 text-right">$26.48</h6>
                            </div> <button class="btn-block btn-blue"> <span> <span id="checkout">Checkout</span> <span id="check-amt">$26.48</span> </span> </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>