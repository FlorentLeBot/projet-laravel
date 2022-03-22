@extends('layouts.app')

@section('content')
    <main class="container posts article">
        
        <article>
            <img src="{{ $question->user->avatar }}" alt="{{ $question->user->name }}">
            <div class="infos">
                Nom du créateur
                <time datetime="{{ $question->created_at }}">@datetime($question->created_at)</time>
            </div>
            @can('updateAndDelete', $question)
            <ul>
                <li><a href="{{ route('question.edit', $question) }}"><i class="fas fa-quidditch"></i></a></li>
                <li><a href="{{ route('question.destroy', $question) }}"
                        onclick="event.preventDefault(); document.getElementById('destroy').submit();"><i
                            class="fas fa-minus"></i></a></li>
                <form id="destroy" action="{{ route('question.destroy', $question) }}" method="POST"
                    style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
            </ul>
            @endcan
            <p>{{ $question->question }}</p>
        </article>
        <form method="POST" action="{{ route('answer.store', $question) }}">
            @csrf
            <textarea name="answer" placeholder="Ma réponse ..."></textarea>
            <input type="submit" value="Répondre">
        </form>

        @foreach ($answers as $answer)
            <div class="answer">
                <img src="{{ $answer->user->avatar }}" alt="{{ $answer->user->name }}">
                <div class="infos">
                    {{ $answer->user->name }}
                    <time datetime="{{ $answer->created_at }}">@datetime($answer->created_at)</time>
                </div>
                <p>{{ $answer->answer }}</p>
            </div>
        @endforeach
    </main>
@endsection
