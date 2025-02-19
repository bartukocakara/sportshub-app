<?php

namespace App\Services;

use App\Enums\ReservationPaymentStatusEnum;
use App\Models\Reservation;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\CourtRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use App\Repositories\ReservationRepository;
use App\Repositories\CourtReservationPricingRepository;
use Illuminate\View\View;

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

    public function guestMakePayment(array $params) : View
    {
        try {
            $checkoutData = Session::get('checkout');
            if($checkoutData){
                $reservationRepo = new ReservationRepository(new Reservation());
                $reservationParams = [
                    'title' => '',
                    'court_id' => $checkoutData['court_id'],
                    'code' => Str::random(6),
                    'from_hour' => $checkoutData['from_hour'],
                    'to_hour' => $checkoutData['to_hour'],
                    'payment_status' => ReservationPaymentStatusEnum::WAITING_FOR_PAYMENT->value,
                    'date' => $checkoutData['date'],
                    'price' => $checkoutData['price'],
                    'customer_name' => $checkoutData['customer_name'],
                    'customer_email' => $checkoutData['customer_email'],
                    'customer_phone' => $checkoutData['customer_phone'],
                ];
                $reservation = $reservationRepo->create($reservationParams);


                // PAYMENT SERVICE
                // Pay tr send $params
                return view('reservation.payment.completed', compact('reservation'));
            }
        } catch (\Throwable $th) {
            //throw $th;
        }

    }


    public function guestSaveCustomer(array $params)
    {
        $sessionData = Session::get('checkout');
        $sessionData['customer_name'] = $params['customer_name'];
        $sessionData['customer_email'] = $params['customer_email'];
        $sessionData['customer_phone'] = $params['customer_phone'];
        Session::put('checkout', $sessionData);

        return redirect()->route('reservation.guest.payment.index');
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

    public function userMakePayment(array $params) : View
    {
        try {
            $checkoutData = Session::get('checkout');
            if ($checkoutData) {
                $reservationRepo = new ReservationRepository(new Reservation());

                // Generate the reservation title based on court, date, and sport type
                $courtTitle = $checkoutData['title']; // Court title
                $sportTypeTitle = $checkoutData['sport_type_title']; // Sport type title
                $reservationDate = $checkoutData['date']; // Reservation date

                // Format the reservation date (you can adjust the format as needed)
                $formattedDate = \Carbon\Carbon::parse($reservationDate)->format('l, F j, Y');

                // Combine the elements to create a title
                $reservationTitle = "{$courtTitle} - {$sportTypeTitle} on {$formattedDate}";
                $reservationParams = [
                    'title' => $reservationTitle,  // Use the generated title
                    'court_id' => $checkoutData['court_id'],
                    'code' => Str::random(6),
                    'from_hour' => $checkoutData['from_hour'],
                    'to_hour' => $checkoutData['to_hour'],
                    'payment_status' => ReservationPaymentStatusEnum::WAITING_FOR_PAYMENT->value,
                    'date' => $checkoutData['date'],
                    'price' => $checkoutData['price'],
                    'customer_name' => $checkoutData['customer_name'],
                    'customer_email' => $checkoutData['customer_email'],
                    'customer_phone' => $checkoutData['customer_phone'],
                ];
                $reservation = $reservationRepo->create($reservationParams);

                // PAYMENT SERVICE
                // Pay tr send $params
                return view('checkout.payment.completed', compact('reservation', 'checkoutData'));
            }
        } catch (\Throwable $th) {
            return view('checkout.payment.failed');

            // Handle the exception (log or rethrow)
        }
    }

}
