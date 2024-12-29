<?php

namespace App\Http\Resources;

use App\Enums\CourtBusinessPricingTypeEnum;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class CourtReservationPricingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return parent::toArray($request);
        // $date = Carbon::parse($request->date);
        // $courtBusiness = $this->court->courtBusiness;
        // $monthlyPriceIncreaseRate = $courtBusiness->monthly_price_increase_rates;

        // $currentMonth = $date->month;
        // $priceAdjustmentFactor = $monthlyPriceIncreaseRate[$currentMonth] ?? 0;
        // $adjustedHours = array_map(function ($hour) use ($priceAdjustmentFactor, $courtBusiness) {
        //     $typeCheck = $courtBusiness->pricing_type === CourtBusinessPricingTypeEnum::CUSTOM->value;
        //     $hour['price'] = $typeCheck ?  $hour['price'] * (1 + $priceAdjustmentFactor) : $courtBusiness->standard_price;
        //     return $hour;
        // }, $this->hours);
        // return [
        //     'id' => $this->id,
        //     'court_id' => $this->court_id,
        //     'day_of_week' => $this->day_of_week,
        //     'hours' => $request->is_monthly ? $adjustedHours : $this->hours,
        //     'created_at' => $this->created_at?->format('Y-m-d H:i:s')
        // ];
    }
}
