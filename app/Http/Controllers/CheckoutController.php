<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutGuestCustomerRequest;
use App\Http\Requests\CheckoutPaymentRequest;
use App\Services\CheckoutService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        if(Auth::check()){
            $checkout = Session::get('checkout');
            return redirect()->route('reservation.user.index')->with([
                'court_id' => $checkout['court_id'],
                'day_of_week' => $checkout['day_of_week'],
                'from_hour' => $checkout['from_hour'],
                'to_hour' => $checkout['to_hour'],
            ]);
        }
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

    public function userIndex(Request $request) : RedirectResponse
    {
        return $this->checkoutService->userIndex($request);
    }

    public function userReservation()
    {
        $court = Session::get('checkout');
        $court['customer_name'] = Auth::user()->first_name. ' '. Auth::user()->last_name;
        $court['customer_email'] = Auth::user()->email;
        $court['customer_phone'] = Auth::user()->phone;
        if (!$court) {
            return redirect()->route('home')->with('error', 'No court data found.');
        }
        return view('checkout.user.index', compact('court'));
    }

    public function userPaymentIndex()
    {
        $checkout = Session::get('checkout');
        if (!$checkout) {
            return redirect()->route('home')->with('error', 'No court data found.');
        }
        return view('checkout.payment.index', compact('checkout'));
    }

    public function userMakePayment(CheckoutPaymentRequest $request) : View
    {
        return $this->checkoutService->userMakePayment($request->validated());
    }
}
