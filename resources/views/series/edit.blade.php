<x-layout title="Editar Série - {!! $serie->nome !!}">
    <form action="{{ route('series.update', $serie->id) }}" method="post">
        @csrf
        @method('PUT')

        <div class="row mb-3">
            <div class="col-8">
                <label class="form-label" for="nome">Nome:</label>
                <input type="text" autofocus id="nome" name="nome" class="form-control" value="{{ $serie->nome }}">
            </div>

            <div class="col-2">
                <label class="form-label" for="seasonQty">N° Temporada: </label>
                <input type="text" id="seasonQty" name="seasonQty" class="form-control" value="">
            </div>

            <div class="col-2">
                <label class="form-label" for="episodePerSeason">Eps / Temporada: </label>
                <input type="text" id="episodePerSeason" name="episodePerSeason" class="form-control" value="">
            </div>
        </div>
        <button class="btn btn-primary" type="submit">Atualizar</button>
    </form>
</x-layout>