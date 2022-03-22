@if (session('status'))
    <div class="message status">
        {{ session('status') }}
    </div>
@endif

@if ($errors->first())
    <div class="message error">
        @foreach ($errors->all() as $message)
            {{ $message }}
        @endforeach
        {{ $errors->first('question') }}

    </div>
@endif
