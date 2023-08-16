<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Repository\StoryRepository;
use App\Repositories\Interface\StoryRepositoryInterface;
use App\Repositories\Repository\PageRepository;
use App\Repositories\Interface\PageRepositoryInterface;
use App\Repositories\Repository\TextRepository;
use App\Repositories\Interface\TextRepositoryInterface;
use App\Repositories\Repository\AudioRepository;
use App\Repositories\Interface\AudioRepositoryInterface;
use App\Repositories\Repository\Text_ConfigRepository;
use App\Repositories\Interface\Text_ConfigRepositoryInterface;
use App\Repositories\Repository\TouchRepository;
use App\Repositories\Interface\TouchRepositoryInterface;
use App\Repositories\Repository\UserRepository;
use App\Repositories\Interface\UserRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(StoryRepositoryInterface::class, StoryRepository::class);
        $this->app->bind(PageRepositoryInterface::class, PageRepository::class);
        $this->app->bind(TextRepositoryInterface::class, TextRepository::class);
        $this->app->bind(AudioRepositoryInterface::class, AudioRepository::class);
        $this->app->bind(Text_ConfigRepositoryInterface::class, Text_ConfigRepository::class);
        $this->app->bind(TouchRepositoryInterface::class, TouchRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
