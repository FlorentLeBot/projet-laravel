@extends('layouts.app')
@section('content')
    <main class="container auth">
        <ul>
            <li>J'ai posté <span class="badge bg-primary">{{ $countQuestions }}</span> questions</li>
        </ul>
        <div class="row">
            <div class="card col-m6">
                <div class="card-header">
                    <h2>Mes questions</h2>
                </div>
                <div class="card-body">
                    <p>{{ $countQuestions }}</p>
                </div>
            </div>

            <div class="card col-m6">
                <div class="card-header">
                    <h2>Les questions</h2>
                </div>
                <div class="card-body">
                    <p>{{ $count }}</p>
                </div>
            </div>   
        </div>

        
        <form method="POST" action="{{ route('compte.update') }}" novalidate>
            @csrf
            @method('PUT')
            <input type="password" name="password_old" placeholder="Ancien mot de passe">
            <input type="password" name="password" placeholder="Nouveau mot de passe">
            <input type="password" name="password_confirmation" placeholder="Confirmer le mot de passe">
            <input type="submit" value="Modifier">
        </form>
    </main>
@endsection
