@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">Questionario: {{ $survey->title }}</div>
                <div class="card-body">
                    <p class="m-1">Creato il {{ date('d/m/Y H:m', strtotime($survey->created_at)) }}</p>
                    <small>{{ $survey->description }}</small>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <a class="btn btn-dark" href="{{ route('question.create', $survey->id) }}">Crea domanda</a>
                        @if($survey->questions->count() > 0)
                            <a class="btn btn-outline-dark" href="{{ route('survey.take', $survey->id) }}">Compila il questionario</a>
                        @endif
                        <a class="btn btn-dark" href="{{ route('home') }}">Torna all'elenco</a>
                    </div>
                </div>
            </div>

            @foreach($survey->questions as $item)
                <div class="card mt-4">
                    <div class="card-header d-flex justify-content-between">
                        <div>{{ $item->question }}</div>
                        <div>{{ $item->surveyResponses->count() > 0 ? $item->surveyResponses->count().' risposte' : 'Nessuna risposta'}}</div>
                    </div>

                    <div class="card-body">
                        <ul class="list-group">
                            @forelse($item->answers as $answer)
                                <li class="list-group-item list-group-item-action d-flex justify-content-between">
                                    <div class="">{{ $answer->answer }}</div>
                                    @if($item->surveyResponses->count() > 0)
                                        <div class="">{{ intval($answer->surveyResponses->count()*100/$item->surveyResponses->count()) }}%</div>
                                    @endif
                                </li>
                            @empty
                                <p class="text-danger">Nessuna risposta inserita</p>
                            @endforelse
                        </ul>
                    </div>
                    <div class="card-footer">
                        <form method="POST" action="{{ route('question.delete', $item->id) }}">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-sm btn-outline-danger">Elimina</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</div>
@endsection
