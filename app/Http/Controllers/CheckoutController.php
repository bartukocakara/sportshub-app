<?php

namespace App\Http\Controllers;

use App\Services\CheckoutService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class CheckoutController extends Controller
{
    private CheckoutService $checkoutService;
    public function __construct(CheckoutService $checkoutService)
    {
        $this->checkoutService = $checkoutService;
    }
    public function guestIndex(Request $request) : RedirectResponse
    {
        return $this->checkoutService->guestIndex($request);
    }

    public function guestReservation()
    {
        $court = Session::get('checkout');

        // Check if court data exists in the session (optional)
        if (!$court) {
            return redirect()->route('home')->with('error', 'No court data found.');
        }
        // Pass the court data to the view
        return view('checkout.guest.index', compact('court'));
    }

    public function guestPayment()
    {
        return;
    }

    public function userIndex(Request $request, string $id) : View
    {

        return view('checkout.user.index');
    }

    public function userReservation()
    {
        return view('checkout.user.index');
    }

    public function userPayment()
    {
        return;
    }
}
