<?php

namespace App\Services\CourtBusiness;

use App\Repositories\UserRepository;

class AccountService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getAccountSettings()
    {
        // Here you would get all general account settings data
        return view('court-business.profile.account-settings');
    }

    public function getPersonalInfo()
    {
        // You can fetch user data related to personal info
        $data = $this->userRepository->getPersonalInfo();
        return view('court-business.profile.preferences.personal-info', compact('data'));
    }

    public function getSecurityInfo()
    {
        // Fetch security-related data
        $data = $this->userRepository->getSecurityInfo();
        return view('court-business.profile.preferences.security', compact('data'));
    }

    public function getPaymentsInfo()
    {
        // Fetch payments-related data
        $data = $this->userRepository->getPaymentsInfo();
        return view('court-business.profile.preferences.payments', compact('data'));
    }

    public function getNotificationsInfo()
    {
        // Fetch notification settings
        $data = $this->userRepository->getNotificationsInfo();
        return view('court-business.profile.preferences.notifications', compact('data'));
    }

    public function getPrivacyInfo()
    {
        // Fetch privacy-related settings
        $data = $this->userRepository->getPrivacyInfo();
        return view('court-business.profile.preferences.privacy', compact('data'));
    }
}
