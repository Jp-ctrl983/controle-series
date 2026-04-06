<?php

namespace App\Repositories;

use App\Models\Episode;
use App\Models\Season;

interface EpisodeRepository
{
    public function update(array $request, Season $season);
}