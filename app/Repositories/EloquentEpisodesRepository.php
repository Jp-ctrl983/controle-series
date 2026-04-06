<?php

namespace App\Repositories;

use App\Models\Episode;
use App\Models\Season;

class EloquentEpisodesRepository implements EpisodeRepository
{
    public function update(array $watched, Season $season)
    {
        $season->episodes->each(function (Episode $episode) use ($watched) {
            $episode->watched = in_array($episode->id, $watched);
        });
        $season->push();
    }
}