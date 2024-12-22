<?php

namespace App\Models;

use App\Enums\DayEnum;
use App\Traits\UUID;
use App\Filters\FilterBuilder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CourtReservationPricing extends Model
{
    use HasFactory, UUID;

    protected $table = 'court_reservation_pricings';

    protected $fillable = [
        'price',
        'court_id',
        'hours',
        'day_of_week',
        'status'
    ];

    protected $casts = [
        'day_of_week' => DayEnum::class,
        'hours' => 'array',
    ];
    public function scopeFilterBy($query, $filters)
    {
        return  (new FilterBuilder($query, $filters, 'CourtReservationPricingFilters'))->apply();
    }

    public function court()
    {
        return $this->belongsTo(Court::class, 'court_id' , 'id');
    }

    public function scopeIsAvailableAt($query, $fromDate, $toDate, $fromHour, $toHour, $playDate = null)
    {
        // ->where('match_status_id', StatusEnum::APPROVED)
        return $query->where(function ($query) use ($fromDate, $toDate, $playDate) {
            if ($playDate) {
                $query->where('date', '=', $playDate);
            } else {
                $query->whereBetween('date', [$fromDate, $toDate]);
            }
            })->whereBetween('date', [$fromDate, $toDate])
                    ->where(function ($query) use ($fromHour, $toHour) {
                        $query->where(function ($query) use ($fromHour, $toHour) {
                            $query->where('from_hour', '>=', $fromHour)
                                ->where('from_hour', '<', $toHour);
                        })
                        ->orWhere(function ($query) use ($fromHour) {
                            $query->where('from_hour', '<', $fromHour)
                                ->where('to_hour', '>', $fromHour);
                        });
        });
    }
}
