<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AnnouncementRequest;
use App\Models\Announcement;
use App\Services\AnnouncementService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AnnouncementController extends Controller
{
    private AnnouncementService $announcementService;

    /**
     * Service interface tanımlanıyor.
     *
     * @param  AnnouncementService $announcementService
     * @return void
     */
    public function __construct(AnnouncementService $announcementService)
    {
        $this->announcementService = $announcementService;
    }

    /**
     * Kaynakları listelemek için kullanılır.
     *
     * @param  Request  $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $items = $this->announcementService->all($request);
        return view('announcements.index', compact('items'));
    }

    /**
     * Yeni bir kaynağın formunu görüntülemek için kullanılır.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('announcements.create');
    }

    /**
     * Yeni bir kaynağı kaydetmek için kullanılır.
     *
     * @param  AnnouncementRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AnnouncementRequest $request)
    {
        $this->announcementService->store($request->validated());
        return redirect()->route('announcements.index')->with('success', 'Announcement created successfully.');
    }

    /**
     * Belirli bir kaynağı görüntülemek için kullanılır.
     *
     * @param  string $id
     * @return \Illuminate\View\View
     */
    public function show(string $id) : View
    {
        $data = $this->announcementService->show($id);
        return view('announcements.show', compact('data'));
    }

    /**
     * Belirli bir kaynağı düzenleme formunu görüntülemek için kullanılır.
     * @param  string $id
     * @return \Illuminate\View\View
     */
    public function edit(string $id) : View
    {
        $data = $this->announcementService->show($id);
        return view('announcements.edit', compact('data'));
    }

    /**
     * Belirli bir kaynağı güncellemek için kullanılır.
     *
     * @param  AnnouncementRequest $request
     * @param  string $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(AnnouncementRequest $request, string $id) : RedirectResponse
    {
        $this->announcementService->update($request->validated(), $id);
        return redirect()->route('announcements.index')->with('success', 'Announcement updated successfully.');
    }

    /**
     * Belirli bir kaynağı kaldırmak için kullanılır.
     *
     * @param  string $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(string $id) : RedirectResponse
    {
        $this->announcementService->destroy($id);
        return redirect()->route('announcements.index')->with('success', 'Announcement deleted successfully.');
    }
}
