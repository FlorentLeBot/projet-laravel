@extends('layouts.app')
@section('content')

<main class="container auth">
    <div class="message error">
        Erreur sur question
    </div>
    
    <form method="POST" action="{{ route("question.store") }}" novalidate>
        @csrf
        <textarea name="question" placeholder="Ecrivez votre question">{{ old('question') }}</textarea>
        <input type="submit" value="Publier">
    </form>
</main>

@endsection