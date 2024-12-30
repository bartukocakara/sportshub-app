<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class CheckoutController extends Controller
{
    public function guestIndex() : View
    {
        return view('checkout.guest.index');
    }

    public function guestPayment()
    {
        return;
    }

    public function userIndex() : View
    {
        return view('checkout.user.index');
    }

    public function userPayment()
    {
        return;
    }
}
