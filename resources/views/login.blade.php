@extends('layouts.app')

@section('content')

<style>

.login-form {
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 80%;
    margin: auto;
}

.login-form h2 {
    margin-bottom: 20px;
    text-align: center;
    color: #505D68;
}

.login-form label {
    display: block;
    margin-bottom: 10px;
    color: #505D68;
}

.login-form input[type="text"],
.login-form input[type="password"] {
    width: calc(100% - 22px);
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.login-form button[type="submit"] {
    width: calc(100% - 22px);
    padding: 10px;
    background-color: #505D68;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.login-form button[type="submit"]:hover {
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
    <h2>Connexion</h2>
    <form action="{{ route('login') }}" method="POST" class="login-form">
        @csrf
        <!-- Afficher les erreurs de validation -->
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
            <label for="email">Adresse email :</label>
            <input type="text" id="email" name="email" required>
        </div>
        <div>
            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit">Se connecter</button>
    </form>

    <a href="{{ route('register') }}" class="register-link">Pas encore inscrit ? Créez un compte ici</a>

</main>


@endsection
