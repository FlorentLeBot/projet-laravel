@extends('layouts.app')
@section('content')
<main class="container auth">
    
    <form method="POST" action="{{ route('register') }}">
       @csrf
        <input type="email" name="email" placeholder="Adresse e-mail" value="{{ old('email') }}">
        <input type="text" name="name" placeholder="Nom complet" value="{{ old('name') }}">
        <input type="password" name="password" placeholder="Mot de passe">
        <input type="password" name="password_confirmation" placeholder="Confirmer le mot de passe">
        <input type="submit" value="Inscription">
    </form>
</main>
@endsection