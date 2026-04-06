<x-layout title="Temporadas de {!! $series->nome !!}">
        <div class="text-center">
            <img src="{{ asset('storage/' . $series->cover) }}" alt="Capa da serie" class="img-fluid"
                style="width: 400px; border-radius: 8.8px; margin-bottom: 20px; margin-top: 5px;">
        </div>
    <ul class="list-group">
        @foreach ($seasons as $season)
            <li class="list-group-item d-flex justify-content-between aling-items-center">

                <a href="{{ route('episodes.index', $season->id) }}">
                    Temporadas {{ $season->number }}
                </a>

                <span class="badge bg-secondary">
                    {{ $season->numberOfWatchedEpisodes() }} / {{ $season->episodes->count() }}
                </span>
            </li>
        @endforeach
    </ul>
</x-layout>