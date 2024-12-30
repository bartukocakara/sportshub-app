<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AnnouncementRequest;
use App\Models\Announcement;
use Illuminate\Http\Request;

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
        return view('Announcements.index', compact('items'));
    }

    /**
     * Yeni bir kaynağın formunu görüntülemek için kullanılır.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('Announcements.create');
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
        return redirect()->route('Announcements.index')->with('success', 'Announcement created successfully.');
    }

    /**
     * Belirli bir kaynağı görüntülemek için kullanılır.
     *
     * @param  Announcement Announcement
     * @return \Illuminate\View\View
     */
    public function show(Announcement Announcement)
    {
        return view('Announcements.show', compact('Announcement'));
    }

    /**
     * Belirli bir kaynağı düzenleme formunu görüntülemek için kullanılır.
     *
     * @param  Announcement Announcement
     * @return \Illuminate\View\View
     */
    public function edit(Announcement Announcement)
    {
        return view('Announcements.edit', compact('Announcement'));
    }

    /**
     * Belirli bir kaynağı güncellemek için kullanılır.
     *
     * @param  AnnouncementRequest $request
     * @param  Announcement Announcement
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(AnnouncementRequest $request, Announcement Announcement)
    {
        $this->announcementService->update($request->validated(), Announcement->id);
        return redirect()->route('Announcements.index')->with('success', 'Announcement updated successfully.');
    }

    /**
     * Belirli bir kaynağı kaldırmak için kullanılır.
     *
     * @param  Announcement Announcement
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Announcement Announcement)
    {
        $this->announcementService->destroy(Announcement->id);
        return redirect()->route('Announcements.index')->with('success', 'Announcement deleted successfully.');
    }
}
