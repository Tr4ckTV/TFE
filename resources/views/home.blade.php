@extends('layouts.app')

@section('content')

    <style>
main {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

main div {
    text-align: center;
}

main p {
    font-weight: bold;
    text-shadow: 0px 1px 1px rgba(0, 0, 0, 0.5); 
    transform: skewX(-10deg);
    font-size: 30px;
}
    </style>

    <main>
        <div>
            <p>Bienvenue chez les bijoux de la Fée Tochette</p>
            <img src="{{ asset('image/fee.svg') }}" alt="Logo">
        </div>
    </main>

@endsection
