<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Method for payment page
     * @return view
     */
    public function index(){
        $page_title     = "Payment";
        
        return view('user.sections.payment.index',compact(
            'page_title'
        ));
    }
}
