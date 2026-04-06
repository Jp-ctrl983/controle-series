<x-layout title="Nova Série">
    <form action="{{ route('series.store') }}" method="post" enctype="multipart/form-data">
        @csrf
            <div class="row g-3">
                <div class="col-12 col-md-6">
                    <label class="form-label" for="nome">Nome:</label>
                    <input type="text" autofocus id="nome" name="nome" class="form-control" value="{{ old('nome') }}">
                </div>

                <div class="col-6 col-md-3">
                    <label class="form-label" for="seasonQty">N° Temporada:</label>
                    <input type="text" id="seasonQty" name="seasonQty" class="form-control"
                        value="{{ old('seasonQty') }}">
                </div>

                <div class="col-6 col-md-3">
                    <label class="form-label" for="episodePerSeason">Eps / Temporada:</label>
                    <input type="text" id="episodePerSeason" name="episodePerSeason" class="form-control"
                        value="{{ old('episodePerSeason') }}">
                </div>

                <div class="mb-3">
                    <label for="cover" class="form-label">Capa</label>
                    <input class="form-control" type="file" id="cover" name="cover" accept="image/png">
                </div>
            </div>
        <button class="btn btn-primary" type="submit">Adicionar</button>
    </form>
</x-layout>