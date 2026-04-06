<?php

namespace App\Http\Controllers;

use App\Models\Season;
use App\Repositories\EpisodeRepository;
use Illuminate\Http\Request;

class EpisodesController
{
    public function __construct(
        private EpisodeRepository $repository
    ) {}

    public function index(Season $season)
    {
        $episodes = $season->episodes;
        return view('episodes.index', [
            'episodes' => $episodes,
            'mensagem' => session('mensagem.sucesso')
        ]);
    }

    public function update(Request $request, Season $season)
    {
        $this->repository->update($request->episodes, $season);

        return to_route('episodes.index', $season->id)->with('mensagem.sucesso', 'Episodio marcado com sucesso');
    }
}