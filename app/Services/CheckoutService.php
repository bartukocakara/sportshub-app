<?php

namespace App\Services;

use App\Repositories\CourtRepository;
use App\Repositories\CourtReservationPricingRepository;
use App\Repositories\ReservationRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckoutService extends CrudService
{
    protected CourtRepository $courtRepository;
    protected ReservationRepository $reservationRepository;
    protected CourtReservationPricingRepository $courtReservationPricingRepository;

    /**
     * @param CourtRepository $courtRepository
     * @param ReservationRepository $reservationRepository
     * @param CourtReservationPricingRepository $courtReservationPricingRepository
     * @return void
    */
    public function __construct(CourtRepository $courtRepository, ReservationRepository $reservationRepository, CourtReservationPricingRepository $courtReservationPricingRepository)
    {
        $this->courtRepository = $courtRepository;
        $this->reservationRepository = $reservationRepository;
        $this->courtReservationPricingRepository = $courtReservationPricingRepository;
    }

    public function guestIndex(Request $request) : RedirectResponse
    {
        $priceCheckParams = [
            'court_id' => $request->court_id,
            'day_of_week' => $request->day_of_week,
            'from_hour' => $request->from_hour,
            'to_hour' => $request->to_hour,
        ];
        $priceCheck = $this->courtReservationPricingRepository->priceCheck($priceCheckParams);
        $reservation = $this->reservationRepository->checkAvailability($request->all());
        if($reservation) {
            return redirect()->route('home')->with('error', 'Reservation is not available.');
        }
        $court = $this->courtRepository->checkout($request->court_id);
        $sessionData = [
            'title' => $court->title,
            'address' => $court->courtBusiness->address,
            'sport_type_title' => $court->sportType->title,
            'court_id' => $request->court_id,
            'from_hour' => $request->from_hour,
            'to_hour' => $request->to_hour,
            'date' => $request->date,
            'court_business' => $court->courtBusiness,
            'price' => $priceCheck,
            'court_id' => $court->id,
            'court_reservation_pricings' => $court->courtReservationPricings,
            'court_location' => [
                'city' => $court->courtBusiness->district->city->title,
                'district' => $court->courtBusiness->district->title,
                'longitude' => $court->courtBusiness->longitude,
                'latitude' => $court->courtBusiness->latitude,
            ],
            'court_images' => $court->courtImages,
        ];
        Session::put('checkout', $sessionData);

        return redirect()->route('checkout.guest.reservation');
    }

    public function guestMakePayment(array $params)
    {
        dd($params);
    }


    public function guestSaveCustomer(array $params)
    {
        $sessionData = Session::get('checkout');
        $sessionData['customer_name'] = $params['customer_name'];
        $sessionData['customer_email'] = $params['customer_email'];
        $sessionData['customer_phone'] = $params['customer_phone'];
        Session::put('checkout', $sessionData);

        return redirect()->route('reservation.payment.index');
    }

    public function userIndex(Request $request) : RedirectResponse
    {
        $priceCheckParams = [
            'court_id' => $request->court_id,
            'day_of_week' => $request->day_of_week,
            'from_hour' => $request->from_hour,
            'to_hour' => $request->to_hour,
        ];
        $priceCheck = $this->courtReservationPricingRepository->priceCheck($priceCheckParams);
        $reservation = $this->reservationRepository->checkAvailability($request->all());
        if($reservation) {
            return redirect()->route('home')->with('error', 'Reservation is not available.');
        }
        $court = $this->courtRepository->checkout($request->court_id);
        $sessionData = [
            'title' => $court->title,
            'address' => $court->courtBusiness->address,
            'sport_type_title' => $court->sportType->title,
            'court_id' => $request->court_id,
            'from_hour' => $request->from_hour,
            'to_hour' => $request->to_hour,
            'date' => $request->date,
            'court_business' => $court->courtBusiness,
            'price' => $priceCheck,
            'court_id' => $court->id,
            'court_reservation_pricings' => $court->courtReservationPricings,
            'court_location' => [
                'city' => $court->courtBusiness->district->city->title,
                'district' => $court->courtBusiness->district->title,
                'longitude' => $court->courtBusiness->longitude,
                'latitude' => $court->courtBusiness->latitude,
            ],
            'court_images' => $court->courtImages,
            'customer_name' => Auth::user()->first_name. ' '. Auth::user()->last_name ,
            'customer_email' => Auth::user()->email,
            'customer_phone' => Auth::user()->phone
        ];
        Session::put('checkout', $sessionData);

        return redirect()->route('reservation.user.index');
    }
}
