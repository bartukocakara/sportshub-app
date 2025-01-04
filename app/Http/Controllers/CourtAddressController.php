<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourtAddressRequest;
use App\Services\CourtAddressService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CourtAddressController extends Controller
{
    private CourtAddressService $courtAddressService;

    /**
     * Service interface tanımlanıyor.
     *
     * @param  CourtAddressService $courtAddressService
     * @return void
     */
    public function __construct(CourtAddressService $courtAddressService)
    {
        $this->courtAddressService = $courtAddressService;
    }

    /**
     * Kaynakları listelemek için kullanılır.
     *
     * @param  Request  $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request) : View
    {
        $items = $this->courtAddressService->all($request);
        return view('court-addresses.index', compact('items'));
    }

    /**
     * Yeni bir kaynağın formunu görüntülemek için kullanılır.
     *
     * @return \Illuminate\View\View
     */
    public function create() : View
    {
        return view('court-addresses.create');
    }

    /**
     * Yeni bir kaynağı kaydetmek için kullanılır.
     *
     * @param  CourtAddressRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CourtAddressRequest $request) : RedirectResponse
    {
        $this->courtAddressService->store($request->validated());
        return redirect()->route('court-addresses.index')->with('success', 'CourtAddress created successfully.');
    }

    /**
     * Belirli bir kaynağı görüntülemek için kullanılır.
     *
     * @param  string $id
     * @return \Illuminate\View\View
     */
    public function show(string $id) : View
    {
        $data = $this->courtAddressService->show($id);
        return view('court-addresses.show', compact('data'));
    }

    /**
     * Belirli bir kaynağı düzenleme formunu görüntülemek için kullanılır.
     *
     * @param  string $id
     * @return \Illuminate\View\View
     */
    public function edit(string $id) : View
    {
        $data = $this->courtAddressService->show($id);
        return view('court-addresses.edit', compact('data'));
    }

    /**
     * Belirli bir kaynağı güncellemek için kullanılır.
     *
     * @param  CourtAddressRequest $request
     * @param  string $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CourtAddressRequest $request, string $id) : RedirectResponse
    {
        $this->courtAddressService->update($request->validated(), $id);
        return redirect()->route('court-addresses.index')->with('success', 'CourtAddress updated successfully.');
    }

    /**
     * Belirli bir kaynağı kaldırmak için kullanılır.
     *
     * @param  string $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(string $id) : RedirectResponse
    {
        $this->courtAddressService->destroy($id);
        return redirect()->route('court-addresses.index')->with('success', 'CourtAddress deleted successfully.');
    }
}
