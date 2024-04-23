@extends('layouts.app')

@section('content')

<style>
    /* Styles spécifiques pour la page de liste des utilisateurs */
.container {
    margin-top: 20px;
}

h2 {
    font-size: 24px;
    margin-bottom: 20px;
}

.table {
    width: 100%;
    border-collapse: collapse;
}

.table th, .table td {
    padding: 10px;
    border: 1px solid #ddd;
    color: black
}

.table th {
    background-color: #4fdcffb0;
    font-weight: bold;
}

.table tbody tr:nth-child(even) {
    background-color: #b3f0ff71;
}

</style>

    <div class="container">
        <h2>Liste des Utilisateurs</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
