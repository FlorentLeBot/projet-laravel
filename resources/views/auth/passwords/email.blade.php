@extends('layouts.app')
@section('content')
<main class="container auth">
    
    <form method="POST" action="{{ route('password.email') }}" novalidate>
        @csrf
        <input type="email" name="email" placeholder="Adresse e-mail" value="{{  old('email') }}">
        <input type="submit" value="Envoyer">
    </form>
</main>
@endsection
