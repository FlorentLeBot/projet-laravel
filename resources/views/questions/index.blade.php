@extends('layouts.app')

@section('content')
<main class="container posts articles">
    
    @foreach  ($questions as $question)
    
    <article>
        
        <img src="{{ $question->user->avatar }}" alt="">
        <p><a href="{{ route('question.show', $question) }}">{{ $question->question }}</a></p>
        @can('updateAndDelete', $question)
        <ul>
            <li><a href="{{ route('question.edit', $question) }}"><i class="fas fa-quidditch"></i></a></li>
            <li><a href="{{ route('question.destroy', $question) }}" onclick="event.preventDefault(); document.getElementById('destroy{{ $question->id }}').submit();"><i class="fas fa-minus"></i></a></li>
            <form method="POST" id="destroy{{ $question->id }}" action="{{ route('question.destroy', $question) }}" style="display: none;">
                @csrf
                @method('DELETE')
            </form>
        </ul>
        @endcan
    </article>

    @endforeach
    {{ $questions->links('vendor.pagination.bootstrap-5') }}
</main>
@endsection
