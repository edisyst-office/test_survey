@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Grazie') }}</div>
                <div class="card-body">
                    <h3>Grazie per aver compilato il questionario</h3>
                    <p><a href="{{route('home')}}">Torna alla Home</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
