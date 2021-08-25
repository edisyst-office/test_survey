@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <br>
                    <a class="btn btn-dark mt-4" href="{{ route('survey.create') }}">Crea un nuovo questionario</a>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header">{{ __('Elenco questionari') }}</div>
                <div class="card-body">
                    <ul class="list-group">
                        @forelse($surveys as $item)
                            <li class="list-group-item">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <small>{{ date('d/m/Y H:m', strtotime($item->created_at)) }}</small>
                                        <h4>{{ $item->title }}</h4>
                                        <p>{{ $item->description }}</p>
                                        <a href="{{ route('survey.show', $item->id) }}" class="btn btn-dark">ENTER</a>
                                        <form method="POST" action="{{ route('survey.delete', $item->id) }}">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-outline-danger">ELIMINA</button>
                                        </form>
                                    </div>
                                    <div>
                                        <div class="text-info mt-4">Share link</div>
                                        <a href="{{ route('survey.take', $item->id) }}">
                                            {{ url(route('survey.take', $item->id)) }}
                                        </a>
                                    </div>
                                </div>
                            </li>
                        @empty
                            <p>Non hai ancora creato nessun questionario</p>
                        @endforelse
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
