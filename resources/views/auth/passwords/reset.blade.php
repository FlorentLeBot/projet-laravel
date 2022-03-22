@extends('layouts.app')
@section('content')

<main class="container auth">
    <form method="POST" action="{{ route('password.update') }}" novalidate>
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <input type="email" name="email" placeholder="Adresse e-mail" value="{{ old('email') }}">
        <input type="password" name="password" placeholder="Mot de passe">
        <input type="password" name="password_confirmation" placeholder="Confirmer le mot de passe">
        <input type="submit" value="Modifier">
    </form>
</main>
@endsection
