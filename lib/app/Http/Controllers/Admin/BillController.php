<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BillController extends Controller
{
    public function getWaitBill(){
    	return view('backend.bill');
    }

    public function getPaidBill(){
    	return view('backend.bill-paid');
    }
}
