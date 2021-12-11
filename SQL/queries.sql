select * from admin where AdminName="'.$username.'" AND AdminPassword="'.$password.'

DB::insert('insert into publisher (Publisher_ID, BankingAccount, Name, EmailAddress, Address, PhoneNumber) values (?, ?, ?, ?, ?, ?)', [$publisher, $BankingAccount, $Name, $EmailAddress, $Address, $PhoneNumber]);

DB::select('select * from book left join publisher on book.Publisher_ID = publisher.Publisher_ID');

DB::select('select * from book left join publisher on book.Publisher_ID = publisher.Publisher_ID'))->where($key, $value);

DB::insert('insert into book (ISBN, BookName, Author, Category, Price, Book_In_Stock, Publisher_ID) values (?, ?, ?, ?, ?, ?, ?)', [$ISBN, $bookName, $author, $category, $price, $stock,$publisher]);

DB::insert('insert into orders (Order_ID, OrderStatus, OrderPayment, OrderDelivery, OrderDatetime, OrderAmount) values (?, ?, ?, ?, ?, ?)', [$id, $status, $payment, $address, $time, $amount]);

DB::insert('insert into userOrder(UserID, Order_ID) values (?, ?)', [session('userId'), $id]);

DB::select('select ReportName from report where Report_ID="'.$ID.'"');

DB::select('select Order_ID, OrderStatus from orders where Order_ID="'.$OrderNumber.'"');

DB::select('select orders.* from orders INNER JOIN userOrder ON userOrder.Order_ID = orders.Order_ID AND userOrder.UserID = "'.session('userId').'"');

DB::select('select * from users where Username="'.$username.'" AND UserPassword="'.$password.'"');

DB::insert('insert into users (Username, UserPassword, Email, Address, PhoneNumber, BillingInformation, OrderHistory) values (?, ?, ?, ?, ?, ?, ?)', [$username, $psw, $email, $address, $phone, '','']);

DB::select('select AVG(OrderAmount) from orders');

DB::update('update book set Book_In_Stock=Book_In_Stock-1 where bookName="'.$book.'"');

