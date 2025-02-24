<?php

namespace App\Http\Controllers\CourtBusiness;

use App\Http\Controllers\Controller;
use App\Services\CourtBusiness\AccountService;

class AccountController extends Controller
{
    protected $accountService;

    public function __construct(AccountService $accountService)
    {
        $this->accountService = $accountService;
    }

    public function index()
    {
        return $this->accountService->getAccountSettings();
    }

    public function personalInfo()
    {
        return $this->accountService->getPersonalInfo();
    }

    public function security()
    {
        return $this->accountService->getSecurityInfo();
    }

    public function payments()
    {
        return $this->accountService->getPaymentsInfo();
    }

    public function notifications()
    {
        return $this->accountService->getNotificationsInfo();
    }

    public function privacy()
    {
        return $this->accountService->getPrivacyInfo();
    }
}
