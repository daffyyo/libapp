<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function getReports()
    {
        $reports = DB::select('select * from report');
        dd($reports);
    }

    public function getReport(Request $request)
    {
        $ID = $request->get('Report_ID');
        $report = DB::select('select ReportName from report where Report_ID="'.$ID.'"');
        if (sizeof($report) > 0) {
            // return response($report, 200)
            //             ->header('Content-Type', 'application/json');
            if ($ID === "444"){
                $report = DB::select('select AVG(OrderAmount) from orders');
            }else if($ID === "555"){
                $report = DB::select('select Username from users');
            }else if($ID === "666"){
                $OrderNumber = $request->get('OrderNumber');
                $report = DB::select('select Order_ID, OrderStatus from orders where Order_ID="'.$OrderNumber.'"');
            }
        } else {
            return response("Failed to find the report", 400)
                        ->header('Content-Type', 'text/plain');
        }
        // return redirect()->route('viewReport');
        return $report;
    }

    public function displayReport()
    {
        return view('viewReport');
    }
}
