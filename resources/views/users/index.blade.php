
@extends('layouts.app')

@section('content')
<style>
    .chat-container {
        position: absolute;
        bottom: 20px;
        left: 50%;
        transform: translateX(-50%);
        text-align: center;
    }

    .police-img {
        width: 400px;
        height: 400px;
        border-radius: 50%;
        margin-bottom: 20px;
    }

    .bubble {
        position: relative;
        font-family: sans-serif;
        font-size: 16px;
        line-height: 20px;
        max-width: 300px;
        background: #fff;
        border-radius: 20px;
        padding: 15px 20px;
        color: #000;
        left: 80px;
        top: -20px;
    }

    .bubble-bottom-left:before {
        content: "";
        width: 0px;
        height: 0px;
        position: absolute;
        border-left: 20px solid #fff;
        border-right: 10px solid transparent;
        border-top: 10px solid #fff;
        border-bottom: 16px solid transparent;
        left: 50%;
        transform: translateX(-50%);
        bottom: -16px;
    }
</style>


    <div class="container">
        <!-- Chat bubble -->
        <div class="chat-container">
            <div class="bubble bubble-bottom-left">
                Bienvenue agent {{ Auth::user()->matricule }} sur le MDT
            </div>
        <img src="{{ asset('images/Policier.png') }}" alt="Flic" class="police-img">

        </div>
    </div>
@endsection