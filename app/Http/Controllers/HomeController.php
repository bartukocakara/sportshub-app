<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\HomeRequest;
use App\Http\Resources\HomeResource;
use App\Services\HomeService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    private HomeService $homeService;

    /**
     * Service interface tanımlanıyor.
     *
     * @param  HomeService $homeService
     * @return void
    */
    public function __construct(HomeService $homeService)
    {
        $this->homeService = $homeService;
    }

    public function index(Request $request) : View
    {
        $datas = $this->homeService->index($request);

        return view('home', compact('datas'));
    }


    public function welcome(Request $request) : View
    {
        return view('welcome');
    }

}
