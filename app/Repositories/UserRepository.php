<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository extends BaseRepository
{
    protected User $user;

    /**
     * @param User $user
     * @return void
    */
    public function __construct(User $user)
    {
        parent::__construct($user);
        $this->user = $user;
    }

    public function getPersonalInfo()
    {
        return [
            'name' => 'Max Smith',
            'email' => 'max.smith@example.com',
            'phone' => '+1 234 567 890',
        ];
    }

    public function getSecurityInfo()
    {
        return [
            'two_factor_auth' => 'Enabled',
            'last_login' => '2025-02-20',
        ];
    }

    public function getPaymentsInfo()
    {
        return [
            'payment_method' => 'Credit Card',
            'billing_address' => '123 Main St, SF, Bay Area',
        ];
    }

    public function getNotificationsInfo()
    {
        return [
            'email_notifications' => 'Enabled',
            'sms_notifications' => 'Disabled',
        ];
    }

    public function getPrivacyInfo()
    {
        return [
            'profile_visibility' => 'Public',
            'searchable' => 'No',
        ];
    }

    public function getTaxesInfo()
    {
        return [
            'tax_id' => '1234567890',
            'country' => 'USA',
        ];
    }

    public function getTravelPreferences()
    {
        return [
            'preferred_airlines' => 'Delta, American Airlines',
            'frequent_flyer_number' => '123456789',
        ];
    }

    public function getCreditsCoupons()
    {
        return [
            'credits' => 500,
            'coupons' => ['Coupon 1', 'Coupon 2', 'Coupon 3'],
        ];
    }

    public function getProfessionalTools()
    {
        return [
            'tool_1' => 'Photoshop',
            'tool_2' => 'Figma',
            'tool_3' => 'Slack',
        ];
    }

}
