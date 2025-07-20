<?php

namespace App\Services;

use App\Loggers\LoggerManager;
use App\Repositories\FollowRepository;
use App\Support\Messages\FollowSwalMessages;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;

class FollowService extends CrudService
{
    protected FollowRepository $followRepository;

    /**
     * @param FollowRepository $followRepository
     * @return void
    */
    public function __construct(FollowRepository $followRepository)
    {
        $this->followRepository = $followRepository;
        parent::__construct($this->followRepository); // Crud işlemleri yoksa kaldırınız.
    }

    public function create(array $data) : RedirectResponse
    {
        try {
            $data['user_id'] = auth()->id();
            $this->followRepository->create($data);

            return redirect()->back()->with('swal', FollowSwalMessages::followSuccess()->toArray());
        } catch (\Throwable $th) {
            Log::error("message: " . $th->getMessage());
            // LoggerManager::log('error', $th->getMessage());
            return redirect()->back()->with('swal', FollowSwalMessages::followError()->toArray());
        }
    }

    public function delete(string $id) : RedirectResponse
    {
        try {
            $follow = $this->followRepository->findWithFollowable($id);

            if (! $follow) {
                return redirect()->back()->withErrors(['error' => 'Follow not found.']);
            }

            $this->followRepository->delete($id);

            return redirect()->back()->with('swal',  FollowSwalMessages::unfollowSuccess()->toArray());

        } catch (\Throwable $th) {
            LoggerManager::log('errror', $th->getMessage());

            return redirect()->back()->with('swal', FollowSwalMessages::unfollowError()->toArray());
        }
    }
}
