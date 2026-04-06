@component('mail::message')
# {{ $nomeSerie }} criada

A série {{ $nomeSerie }} contém {{ $qtdTemporadas }} temporadas e {{ $episodePorTemporadas }} episódios por temporadas

Acesse aqui:

@component('mail::button', ['url' => route('seasons.index', $idSerie)])
Ver série
@endcomponent

@endcomponent