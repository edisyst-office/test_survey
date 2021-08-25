@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Inserisci una nuova domanda</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('question.create',$survey->id) }}" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="question">Domanda</label>
                            <input type="text" class="form-control" name="question[question]"
                                   VALUE="{{ old('question.question') }}" aria-describedby="questionHelp" placeholder="Inserisci la domanda">
                            <small id="questionHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            @error('question.question')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <a href="#" class="btn btn-info" >Aggiungi risposta</a>

                        <div class="form-group">
                            <label for="answer1">Scelta 1</label>
                            <input type="text" class="form-control" name="answers[][answer]" VALUE="{{ old('answers.0.answer') }}">
                            @error('answers.0.answer')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="answer2">Scelta 2</label>
                            <input type="text" class="form-control" name="answers[][answer]">
                            @error('answers.1.answer')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="answer3">Scelta 3</label>
                            <input type="text" class="form-control" name="answers[][answer]">
                            @error('answers.2.answer')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-success">Salva</button>
                        <a href="{{route('survey.show', $survey->id)}}" class="btn btn-dark">Torna al questionario</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
