@extends('layouts.app')

@section('content')

<style>

form {
    max-width: 70%;
    text-align: center;
    margin: 0 auto;
}

.form-group {
    margin-top: 20px;
    margin-bottom: 20px;
    text-align: left;
}

label {
    display: block;
    margin-bottom: 5px;
    text-align: left;
}

input[type="text"],
input[type="email"],
input[type="password"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    box-sizing: border-box;
    text-align: left;
}

input[type="text"]:focus,
input[type="email"]:focus,
input[type="password"]:focus {
    outline: none;
    border-color: #007bff;
}

.btn-primary {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s;
}

.btn-primary:hover {
    background-color: #0056b3;
}

</style>

<form action="{{ route('users.update', ['user' => $user->id]) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="name">Nom</label>
        <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="email">Adresse Email</label>
        <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="password">Nouveau Mot de Passe</label>
        <input type="password" id="password" name="password" class="form-control">
    </div>

    <div class="form-group">
        <label for="password_confirmation">Confirmation du Mot de Passe</label>
        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Mettre à Jour</button>
</form>

@endsection
