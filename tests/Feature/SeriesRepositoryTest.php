<?php

namespace Tests\Feature;

use App\Http\Requests\SeriesFormRequest;
use App\Repositories\SeriesRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SeriesRepositoryTest extends TestCase
{
    use RefreshDatabase;

    public function test_when_a_series_is_created_its_seasons_and_episodes_must_also_be_created(): void
    {
        /**
         * @var SeriesRepository $repository
         */
        $repository = $this->app->make(SeriesRepository::class);

        $request = new SeriesFormRequest();

        $request->merge([
            "nome" => "Nome Series",
            "cover" => true,
            "seasonQty" => 1,
            "episodePerSeason" => 3
        ]);

        $repository->add($request->all());

        $this->assertDatabaseHas('series', ['nome' => 'Nome Series']);
        $this->assertDatabaseHas('series', ['cover' => true]);
        $this->assertDatabaseHas('seasons', ['number' => 1]);
        $this->assertDatabaseHas('episodes', ['number' => 3]);
    }
}
