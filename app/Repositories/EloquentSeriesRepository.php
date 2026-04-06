<?php

namespace App\Repositories;

use App\Models\Episode;
use App\Models\Season;
use App\Models\Series;
use Illuminate\Support\Facades\DB;

class EloquentSeriesRepository implements SeriesRepository
{
    public function add(array $request): Series
    {
        return DB::transaction(function () use ($request) {
            $serie = Series::create([
                'nome' => $request['nome'],
                'cover' => $request['cover']
            ]);

            $seasons = [];
            for ($i = 1; $i <= $request['seasonQty']; $i++) {
                $seasons[] = [
                    'series_id' => $serie->id,
                    'number' => $i
                ];
            }
            Season::insert($seasons);

            $episode = [];
            foreach ($serie->seasons as $seasons) {
                for ($j = 1; $j <= $request['episodePerSeason']; $j++) {
                    $episode[] = [
                        'season_id' => $seasons->id,
                        'number' => $j
                    ];
                }
            }
            Episode::insert($episode);

            return $serie;
        });   
    }
}