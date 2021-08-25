@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Crea il tuo questionario</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('survey.create') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="title">Titolo</label>
                            <input type="text" class="form-control" name="title" id="title" aria-describedby="titleHelp" placeholder="Enter title">
                            <small id="titleHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Descrizione</label>
                            <textarea class="form-control" name="description" id="description" cols="4" rows="5"></textarea>
                            @error('description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success">Salva</button>
                        <a href="{{route('home' )}}" class="btn btn-dark">Torna all'elenco</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
