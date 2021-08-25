@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h3>Compila il questionario: {{ $survey->title }}</h3>

            <form action="{{ route('survey.take', $survey->id) }}" method="post">
                @csrf

                <div class="card mt-4">
                    <div class="card-header"><strong>I tuoi dati</strong></div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="question">Nome</label>
                            <input type="text" value="{{ old('info.name') }}" class="form-control" id="name" name="info[name]">
                            @error('info.name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="question">Email</label>
                            <input type="text" value="{{ old('info.email') }}" class="form-control" id="email" name="info[email]">
                            @error('info.email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>

                @foreach($survey->questions as $key=>$item)
                    <div class="card mt-4">
                        <div class="card-header">{{ $key }} : {{ $item->question }}</div>

                        <div class="card-body">
                            @error('responses.'.$key.'.answer_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            <ul class="list-group">
                                @forelse($item->answers as $answer)
                                    <label for="answer_{{$answer->id}}">
                                        <li class="list-group-item list-group-item-action">
                                            <input type="radio" name="responses[{{$key}}][answer_id]"
                                                   id="answer_{{$answer->id}}"
                                                   value="{{$answer->id}}"
                                                    {{ (old('responses.'.$key.'.answer_id') == $answer->id) ? 'checked' : '' }}>
                                            <input type="hidden" name="responses[{{$key}}][question_id]"
                                                   value="{{$item->id}}">
                                            {{ $answer->answer }}
                                        </li>
                                    </label>
                                @empty
                                    <p class="text-danger">Nessuna risposta inserita</p>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                @endforeach

                <button type="submit" class="btn btn-success mt-4">Salva</button>
            </form>

        </div>
    </div>
</div>
@endsection
