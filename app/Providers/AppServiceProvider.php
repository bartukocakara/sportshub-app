<?php

namespace App\Providers;

use App\Models\Comment;
use App\Observers\CommentObserver;
use App\Services\AccessServices\TeamAccessService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Carbon::setLocale('tr');
        Comment::observe(CommentObserver::class);
        Blade::if('teamLeader', function ($team) {
            return app(TeamAccessService::class)->isTeamLeader(auth()->user(), $team);
        });
    }
}
