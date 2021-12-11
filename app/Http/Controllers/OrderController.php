<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    //"global" items
    protected $bag;

    public function __construct()
    {
        $this->bag = array();
    }

    public function getOrders()
    {
        $orders = DB::select('select * from orders');
        dd($orders);
    }

    public function addOrder(Request $request){
        $payload = json_decode($request->getContent(), true);
        $id = $payload['Order_ID'];
        $status = $payload['OrderStatus'];
        $payment = $payload['OrderPayment'];
        $address = $payload['OrderDelivery'];
        $time = $payload['OrderDatetime'];
        $amount = $payload['OrderAmount'];
        $bookName = $payload['bookOrder'];
        
        $orders = DB::insert('insert into orders (Order_ID, OrderStatus, OrderPayment, OrderDelivery, OrderDatetime, OrderAmount) values (?, ?, ?, ?, ?, ?)', [$id, $status, $payment, $address, $time, $amount]);
        foreach ($bookName as $book) {
            $books = DB::update('update book set Book_In_Stock=Book_In_Stock-1 where bookName="'.$book.'"');
        }
        DB::insert('insert into userOrder(UserID, Order_ID) values (?, ?)', [session('userId'), $id]);
        return $orders;
    }

}
