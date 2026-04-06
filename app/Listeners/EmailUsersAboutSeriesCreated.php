<?php

namespace App\Listeners;

use App\Events\SeriesCreated as EventsSeriesCreated;
use App\Mail\SeriesCreated;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class EmailUsersAboutSeriesCreated implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(EventsSeriesCreated $event): void
    {
        $userList = User::all();
        foreach ($userList as $index => $user) {
            $email = new SeriesCreated(
                $event->seriesName,
                $event->seriesSeasonQty,
                $event->seriesEpisodePerSeason,
                $event->seriesId
            );
            $when = \Illuminate\Support\now()->addSecond($index * 10);

            // Mail::to($user->email)->later($when, $email);
            //NÃO ESQUECER DE APAGAR OS DADOS COM O QUEUE 
        }
    }
}