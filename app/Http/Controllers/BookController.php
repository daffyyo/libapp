<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function getBooks()
    {
        $books = DB::select('select * from book left join publisher on book.Publisher_ID = publisher.Publisher_ID');
        foreach($books as $book){
            if($book->Book_In_Stock <= 10){
                echo "Insufficient inventory for ".$book->BookName." Admin will send an email to publisher via email".$book->EmailAddress;
            }
        }
        return $books;
    }



    public function filterBooks($key, $value)
    {
        $books = collect(DB::select('select * from book left join publisher on book.Publisher_ID = publisher.Publisher_ID'))->where($key, $value);
        return $books;
    }
    
    public function bookManage(Request $request){
        $payload = json_decode($request->getContent(), true);
        $operation = $payload['operation'];
        $bookName = $payload['BookName'];
        
        if($operation === "ADD"){
            $newPublisher = $payload['newPublisher'];
            if($newPublisher){
                $BankingAccount = $payload['BankingAccount'];
                $Name = $payload['Name'];
                $EmailAddress = $payload['EmailAddress'];
                $Address = $payload['Address'];
                $PhoneNumber = $payload['PhoneNumber'];
                $publisher = $payload['Publisher_ID'];
    
                $publishers = DB::insert('insert into publisher (Publisher_ID, BankingAccount, Name, EmailAddress, Address, PhoneNumber) values (?, ?, ?, ?, ?, ?)', [$publisher, $BankingAccount, $Name, $EmailAddress, $Address, $PhoneNumber]);
            }

            $ISBN = $payload['ISBN'];
            $author = $payload['Author'];
            $category = $payload['Category'];
            $price = $payload['Price'];
            $stock = $payload['Book_In_Stock'];
            $publisher = $payload['Publisher_ID'];

            $books = DB::insert('insert into book (ISBN, BookName, Author, Category, Price, Book_In_Stock, Publisher_ID) values (?, ?, ?, ?, ?, ?, ?)', [$ISBN, $bookName, $author, $category, $price, $stock,$publisher]);
            return $books;

        }else if ($operation === "REMOVE"){
            $books = DB::delete('delete from book where BookName="'.$bookName.'"');
            return $books;
        }
    }
}