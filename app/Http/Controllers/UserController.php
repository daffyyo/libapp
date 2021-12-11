<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getUserOrders()
    {
        $orders = DB::select('select orders.* from orders INNER JOIN userOrder ON userOrder.Order_ID = orders.Order_ID AND userOrder.UserID = "'.session('userId').'"');
        return $orders;
    }

    public function getUser($value)
    {
        $user = collect(DB::select('select * from users'))->firstWhere('Username', $value);
        return $user;
    }

    public function getUserLogin(Request $request)
    {
        $username = $request->input()['username'];
        $password = $request->input()['password'];

        $user = DB::select('select * from users where Username="'.$username.'" AND UserPassword="'.$password.'"');
        if (sizeof($user) > 0) {
            $request->session()->put('userId', $user[0]->ID);
            $request->session()->put('user', $username);
            $request->session()->put('email', $user[0]->Email);
            $request->session()->put('phone', $user[0]->PhoneNumber);
            $request->session()->put('address', $user[0]->Address);
            $request->session()->put('billingInfo', $user[0]->BillingInformation);
            return redirect('userProfile');
        } else {
            echo "Login Failed";
        }
    }

    public function addOne(Request $request){
        $payload = json_decode($request->getContent(), true);
        $username = $payload['Username'];
        $psw = $payload['UserPassword'];
        $email = $payload['Email'];
        $address = $payload['Address'];
        $phone = $payload['PhoneNumber'];
        
        $users = DB::insert('insert into users (Username, UserPassword, Email, Address, PhoneNumber, BillingInformation, OrderHistory) values (?, ?, ?, ?, ?, ?, ?)', [$username, $psw, $email, $address, $phone, '','']);
        return $users;
    }
}
