<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutGuestCustomerRequest;
use App\Http\Requests\CheckoutPaymentRequest;
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
        if (!$court) {
            return redirect()->route('home')->with('error', 'No court data found.');
        }
        // Pass the court data to the view
        return view('checkout.guest.index', compact('court'));
    }

    public function guestSaveCustomer(CheckoutGuestCustomerRequest $request)
    {
        return $this->checkoutService->guestSaveCustomer($request->validated());
    }

    public function guestPaymentIndex()
    {
        $checkout = Session::get('checkout');
        if (!$checkout) {
            return redirect()->route('home')->with('error', 'No court data found.');
        }
        // Pass the court data to the view
        return view('checkout.payment.index', compact('checkout'));
    }

    public function guestMakePayment(CheckoutPaymentRequest $request)
    {
        $this->checkoutService->guestMakePayment($request->validated());
        return view('checkout.payment.index', compact('court'));
    }

    public function guestPayment()
    {
        return;
    }

    public function userIndex(Request $request) : RedirectResponse
    {
        return $this->checkoutService->userIndex($request);
    }

    public function userReservation()
    {
        $court = Session::get('checkout');
        if (!$court) {
            return redirect()->route('home')->with('error', 'No court data found.');
        }
        return view('checkout.user.index', compact('court'));
    }

    public function userPayment()
    {
        return;
    }
}
