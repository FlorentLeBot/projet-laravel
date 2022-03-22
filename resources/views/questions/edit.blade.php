@extends('layouts.app')
@section('content')

<main class="container auth">
    
    <form method="POST" action="{{ route('question.update', $question
    ) }}">
         @csrf
        @method('put')
        <textarea name="question">{{ $question->question }}</textarea>
        <input type="submit" value="Modifier">
    </form>
</main>

@endsection