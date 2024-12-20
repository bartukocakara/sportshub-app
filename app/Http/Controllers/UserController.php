<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    private UserService $userService;

    /**
     * Service interface tanımlanıyor.
     *
     * @param  UserService $userService
     * @return void
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Kullanıcıları listelemek için kullanılır.
     *
     * @param  Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        $users = $this->userService->all($request);

        // Return the view with the users data
        return view('users.index', compact('users'));
    }

    /**
     * Yeni bir kullanıcı oluşturma formunu görüntülemek için kullanılır.
     *
     * @return View
     */
    public function create(): View
    {
        return view('users.create');
    }

    /**
     * Yeni bir kullanıcıyı kaydetmek için kullanılır.
     *
     * @param  UserRequest $request
     * @return RedirectResponse
     */
    public function store(UserRequest $request): RedirectResponse
    {
        $this->userService->store($request->validated());

        // Redirect back to the users index with success message
        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    /**
     * Belirli bir kullanıcıyı görüntülemek için kullanılır.
     *
     * @param  string $id
     * @return View
     */
    public function show(string $id): View
    {
        $user = $this->userService->show($id);

        // Return the view for a single user
        return view('users.show', compact('user'));
    }

    /**
     * Belirli bir kullanıcıyı düzenleme formunu görüntülemek için kullanılır.
     *
     * @param  string $id
     * @return View
     */
    public function edit(string $id): View
    {
        $user = $this->userService->show($id);

        // Return the edit view with the user data
        return view('users.edit', compact('user'));
    }

    /**
     * Belirli bir kullanıcıyı güncellemek için kullanılır.
     *
     * @param  UserRequest $request
     * @param  string $id
     * @return RedirectResponse
     */
    public function update(UserRequest $request, string $id): RedirectResponse
    {
        $this->userService->update($request->validated(), $id);

        // Redirect back to the users index with success message
        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    /**
     * Belirli bir kullanıcıyı silmek için kullanılır.
     *
     * @param  string $id
     * @return RedirectResponse
     */
    public function destroy(string $id): RedirectResponse
    {
        $this->userService->destroy($id);

        // Redirect back to the users index with success message
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
