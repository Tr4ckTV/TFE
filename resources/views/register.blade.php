
@extends('layouts.app')

@section('content')

<style>
main.register-page {
    background-color: #F5EDF0;
    font-family: Arial, sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.register-form {
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.register-form h2 {
    margin-bottom: 20px;
    text-align: center;
    color: #505D68;
}

.register-form label {
    display: block;
    margin-bottom: 10px;
    color: #505D68;
}

.register-form input[type="text"],
.register-form input[type="email"],
.register-form input[type="password"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.register-form button[type="submit"] {
    width: 100%;
    padding: 10px;
    background-color: #505D68;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.register-form button[type="submit"]:hover {
    background-color: #39424e;
}

a.register-link {
    display: block;
    text-align: center;
    color: blue;
    text-decoration: none !important;
    margin-top: 2%;
    width: 100%;
    max-width: 300px;
    margin-left: auto;
    margin-right: auto;
}


a.register-link:hover {
    text-decoration: none !important;
}

main .alert
{
    color: red
}


</style>

<main>
    <h2>Inscription</h2>
    <form action="{{ route('register') }}" method="POST" class="register-form">
        @csrf
        @if ($errors->any())
            <div class="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div>
            <label for="name">Nom :</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required>
        </div>
        <div>
            <label for="email">Adresse email :</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>
        </div>
        <div>
            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" required minlength="8">
        </div>
        <div>
            <label for="password_confirmation">Confirmer le mot de passe :</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>
        </div>
        <button type="submit">S'inscrire</button>
    </form>

    <a href="{{ route('login') }}" class="register-link">Déjà inscrit ? Connectez-vous ici</a>
</main>


@endsection
