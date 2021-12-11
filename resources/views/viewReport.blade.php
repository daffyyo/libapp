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
                    <a class="nav-link" href="/">User Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/BookList">BookList</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/adminLogout">Admin Logout<span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </nav>

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal1" data-whatever="@userList">Manage Book</button>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2" data-whatever="@orderList">Track Order</button>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal4" data-whatever="@perOrder" id="444" onclick="viewReport(this.id)">Sales per Order</button>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal3" data-whatever="@userList" id="555" onclick="viewReport(this.id)">User List</button>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" id="111" onclick="viewReport(this.id)">Sales vs Expenditures</button>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@fat" id="2222" onclick="viewReport(this.id)">Sales per Genres</button>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap" id="333" onclick="viewReport(this.id)">Sales per Author</button>

    <div class="modal fade" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Report</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Message:</label>
                    <textarea class="form-control" id="message-text"></textarea>
                </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Manage Book</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                <div class="form-group">
                    <label for="operations">Choose an operation:</label>
                    <select id="operations" name="operations">
                        <option value="add">ADD</option>
                        <option value="remove">REMOVE</option>
                    </select>
                </div>
                <div class="form-group">
                    <p>Fill in 'Book Name' only to remove a book. Fill in all fields below to add a book. </p>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Book Name:</label>
                            <input type="text" class="form-control" id="bookName">
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">ISBN:</label>
                            <input type="text" class="form-control" id="ISBN">
                            </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Author:</label>
                            <input type="text" class="form-control" id="author">
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Category:</label>
                            <input type="text" class="form-control" id="category">
                            </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Price:</label>
                            <input type="text" class="form-control" id="price">
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Book_In_Stock:</label>
                            <input type="text" class="form-control" id="stock">
                            </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Publisher_ID:</label>
                            <input type="text" class="form-control" id="publisher">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <input type="radio" id="radio" name="radio" value="radio" checked>
                    <label for="huey">New Publisher</label>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Banking:</label>
                            <input type="text" class="form-control" id="banking">
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Name:</label>
                            <input type="text" class="form-control" id="name">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Email:</label>
                            <input type="text" class="form-control" id="email">
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Address:</label>
                            <input type="text" class="form-control" id="address">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">PhoneNumber:</label>
                            <input type="text" class="form-control" id="phone">
                        </div>
                    </div>
                </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="submitBookManagement()">Submit</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Track Order</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="form-group">
                            <input type="text" class="form-control" id="orderNumber" placeholder="Order Number:">
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="form-group">
                            <button type="button" class="btn btn-primary" id="666" onclick="viewReport(this.id)">Search</button>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4 form-group">
                        <input class="form-control" id="orderStatus" readonly></input>
                    </div>
                </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Report</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Username:</label>
                    <textarea class="form-control" id="userList"></textarea>
                </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>
</html>