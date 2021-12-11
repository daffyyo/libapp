<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>Online Library</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
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
                    <a class="nav-link" href="/adminLogin">Admin Login</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/logout">Logout <span class="sr-only">(current)</span></a>
                </li>                
                <button type="button" class="open-AddBookDialog btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Checkout
                </button>
            </ul>
        </div>
    </nav>

    <body>
    <div class="event-schedule-area-two bg-color pad100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title text-center">
                            <div class="title-text">
                                <h2>Book List</h2>
                            </div>
                            <p>
                                Explore the heritage, cultures and achievements of First Nations, Inuit and Métis peoples. Browse a wide selection of books in every genre from acclaimed Indigenous authors.
                            </p>
                        </div>
                    </div>
                    <!-- /.col end-->
                </div>
                <!-- row end-->
                <div class="row">
                    <div class="col-lg-12">
                        <form class="form-inline my-2 my-lg-0">
                            <div class="custom-select" style="width:200px;" >
                                <select id="searchBy">
                                    <option value="0">Search By</option>
                                    <option value="1">Author</option>
                                    <option value="2">BookName</option>
                                    <option value="3">ISBN</option>
                                    <option value="4">Category</option>
                                </select>
                            </div>
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" id="search">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="button" onclick='filterBooks()'>Search</button>
                        </form>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade active show" id="home" role="tabpanel">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="text-center" scope="col">Book Name</th>
                                                <th scope="col">Author</th>
                                                <th scope="col">ISBN</th>
                                                <th scope="col">Publisher</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Category</th>
                                                <th class="text-center" scope="col">Book In Stock</th>
                                            </tr>
                                        </thead>
                                            <tbody>
                                                @foreach ($bookList as $book)
                                                    <tr class="inner-box" id={{ $book->ID }}>
                                                        <th scope="row">
                                                            <div class="event-bookName" >
                                                                <p>{{ $book->BookName }}</p>
                                                            </div>
                                                        </th>
                                                        <td>
                                                            <div class="event-author">
                                                                <p>{{ $book->Author }}</p>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="event-ISBN">
                                                                <p>{{ $book->ISBN }}</p>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="event-date">
                                                                <p>{{ $book-> Name }}</p>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="event-price">
                                                                <p id="price">{{ $book-> Price }}</p>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="event-category">
                                                                <p id="category">{{ $book->Category }}</p>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="event-date">
                                                                <p>{{ $book->Book_In_Stock }}</p>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="primary-btn">
                                                                <button type="button" class="btn btn-primary" onclick="addToCart(this.id, '{{ $book->BookName }}', '{{ $book-> Price }}', '{{ $book-> Category }}','{{ $book-> Author }}');" id="{{ $book->ID }}">Add to Cart</button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /col end-->
                </div>
                <!-- /row end-->
            </div>
        </div>
        <!-- Checkout Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="max-width: 80%;">
            <div class="modal-content">
                <div class="modal-body">
                    <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>BookName</th>
                                <th>Author</th>
                                <th>Category</th>
                                <th>Price</th>
                            </tr>
                            </thead>
                            <tbody>
                                @for ($i = 0; $i < 3; $i++)
                                    <tr>
                                        <td><input type='text' id='bookName-{{ $i }}' class='bookName-{{ $i }}' readonly /></td>
                                        <td><input type='text' id='author-{{ $i }}' class='author-{{ $i }}' readonly /></td>
                                        <td><input type='text' id='category-{{ $i }}' class='category-{{ $i }}' readonly /></td>
                                        <td><input type='text' id='price-{{ $i }}' class='price-{{ $i }}' readonly /></td>
                                    </tr>
                                @endfor
                            </tbody>
                        </table>

                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="row">
                                        <div class="col-lg-5">
                                            <div class="row px-2">
                                                <div class="form-group col-md-6"> <label class="form-control-label">Name on Card</label> <input type="text" id="cname" name="cname" placeholder="Johnny Doe"> </div>
                                                <div class="form-group col-md-6"> <label class="form-control-label">Card Number</label> <input type="text" id="billing" name="billing" placeholder="1111 2222 3333 4444"> </div>
                                            </div>
                                            <div class="row px-2">
                                                <div class="form-group col-md-6"> <label class="form-control-label">Expiration Date</label> <input type="text" id="exp" name="exp" placeholder="MM/YYYY"> </div>
                                                <div class="form-group col-md-6"> <label class="form-control-label">CVV</label> <input type="text" id="cvv" name="cvv" placeholder="***"> </div>
                                            </div>
                                            <div class="row px-2">
                                            <div class="form-group col-md-6"> <label class="form-control-label" >Shipping Address</label> <input type="text" id="address" name="address"> </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 mt-2">
                                            <div class="row d-flex justify-content-between px-4">
                                                <p class="mb-1 text-left">Subtotal</p>
                                                <input class="subtotal mb-1 text-right" id="subtotal" readonly />
                                            </div>
                                            <div class="row d-flex justify-content-between px-4">
                                                <p class="mb-1 text-left">Shipping </p>
                                                <p class="mb-1 text-left">(Free shipping for order over $50)</p>
                                                <input class="shipping mb-1 text-right" id="shipping" readonly />
                                            </div>
                                            <div class="row d-flex justify-content-between px-4" id="tax">
                                                <p class="mb-1 text-left">Total (tax included)</p>
                                                <input class="total mb-1 text-right" id="total" readonly />
                                            </div> <button class="btn-block btn-blue" onclick="confirmOrder(`{{ session('user') }}`)"> <span> <span id="checkout">Checkout</span></button>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 ">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        </div>
    </body>
</html>