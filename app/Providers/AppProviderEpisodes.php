<?php

namespace App\Providers;

use App\Repositories\EloquentEpisodesRepository;
use App\Repositories\EpisodeRepository;
use Illuminate\Support\ServiceProvider;

class AppProviderEpisodes extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(EpisodeRepository::class, EloquentEpisodesRepository::class);
    }
}