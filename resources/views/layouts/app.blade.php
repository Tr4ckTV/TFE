<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TFE</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <style>
        /* Reset CSS */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Layout */
        body {
            font-family: 'Alice', sans-serif;
            background-color: #F5EDF0;
            color: #505D68;
            position: relative;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .hidden {
            display: none;
        }


        /* Header */
        header {
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header img {
            max-width: 150px;
        }

        header button {
            border: none !important;
            cursor: pointer;
        }

        header form {
            flex: 1;
            margin: 0 auto;
            text-align: center;
            align-items: center;
            display: flex;
            position: relative;
        }

        header form input[type="text"] {
            padding: 12px 50px 12px 20px;
            width: calc(80% - 50px);
            border: 2px solid #505D68;
            border-radius: 20px;
            vertical-align: middle;
            margin: auto;
        }

        header form button {
            background-color: #505D68;
            border: none;
            cursor: pointer;
            position: absolute;
            right: 0;
            top: 0;
            height: 100%;
            width: 50px;
            border: 2px solid #505D68;
            border-radius: 0 20px 20px 0;
            left: calc(100% - 14.5%);
        }

        /* Barre entre la nav et le body */
        nav:after {
            margin-top: 1%;
            content: '';
            display: block;
            width: 100%;
            height: 3px;
            background-color: #D4CBE2;
        }

        /* Navigation */
        nav ul {
            list-style-type: none;
            display: flex;
            justify-content: center;
        }

        nav ul li {
            margin: 0 170px;
            position: relative;
        }

        nav ul li a {
            text-decoration: none;
            color: #505D68;
            font-weight: bold;
            position: relative;
            font-size: 20px;
            transition: color 0.5s;
        }

        nav ul li a:hover {
            color: #F5EDF0;
        }

        nav ul li a::after {
            content: '';
            position: absolute;
            left: 50%;
            bottom: -20px;
            transform: translateX(-50%);
            width: calc(100% + 40px);
            height: 0px;
            background-color: #D4CBE2;
            z-index: -1;
            transition: height 0.5s;
            border-radius: 20px 20px 0px 0px;
        }

        nav ul li a:hover::after {
            height: 60px;
        }

        .bulle {
            position: relative;
        }

        .bulle:hover:after {
            content: attr(aria-label);
            position: absolute;
            top: -2.4em;
            left: 50%;
            transform: translateX(-50%);
            z-index: 1;
            white-space: nowrap;
            padding: 5px 14px;
            background: #D4CBE2;
            color: #fff;
            border-radius: 4px;
            font-size: 1.2rem;
        }

        .bulle:hover:before {
            content: "▼";
            position: absolute;
            top: -1.3em;
            left: 50%;
            transform: translateX(-50%);
            font-size: 20px;
            color: #D4CBE2;
        }

        /* Main */
        main {
            padding: 20px;
        }

        div.main {
            height: 100vh;
        }

        /* Footer */
        footer {
            margin-top: 3%;
            background-color: #D4CBE2;
            color: #505D68;
            text-align: center;
            padding: 20px 0;
            position: relative;
        }

        footer:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 1px;
            background-color: #D4CBE2;
        }

        /* Icone */

        .material-symbols-outlined.bulle {
            font-variation-settings:
                'FILL' 0,
                'wght' 400,
                'GRAD' 200,
                'opsz' 48;
            color: #505D68;
            text-decoration: none;
            margin: 0 5px;
            font-size: 40px;
        }

        .material-symbols-outlined {
            font-variation-settings:
                'FILL' 0,
                'wght' 400,
                'GRAD' 200,
                'opsz' 48;
            color: #505D68;
            text-decoration: none;
            margin: 0 5px;
            font-size: 30px;
        }

        .material-symbols-outlined:hover {
            color: #D4CBE2;
        }

        button.search:hover span.recherche {
            color: #D4CBE2;
        }

        .icones {
            margin-right: 50px;
        }

        .recherche {
            color: white;
        }

        /* Dark Mode */
        .dark-mode {
            background-color: #505D68;
            color: #D4CBE2;
        }

        .dark-mode button {
            background-color: #505D68;
            color: #D4CBE2;
            border: none !important;
            cursor: pointer;
        }

        .dark-mode nav ul li a {
            text-decoration: none;
            color: #D4CBE2;
            font-weight: bold;
            position: relative;
            font-size: 20px;
            transition: color 0.5s;
        }

        .dark-mode nav ul li a:hover {
            color: #505D68;
        }

        .dark-mode header form button {
            background-color: #D4CBE2;
            border: none;
            cursor: pointer;
            position: absolute;
            right: 0;
            top: 0;
            height: 100%;
            width: 50px;
            border: 2px solid #D4CBE2;
            border-radius: 0 20px 20px 0;
            left: calc(100% - 14.5%);
        }

        .dark-mode header form input[type="text"] {
            padding: 12px 50px 12px 20px;
            width: calc(80% - 50px);
            border: 2px solid #D4CBE2;
            border-radius: 20px;
            vertical-align: middle;
            margin: auto;
        }

        .dark-mode .recherche {
            color: white;
        }

        .dark-mode .material-symbols-outlined {
            color: white;
        }

        .dark-mode .material-symbols-outlined:hover {
            color: #D4CBE2;
        }

        .dark-mode .material-symbols-outlined:hover.recherche {
            color: #505D68;
        }

        .dark-mode .bulle:hover:after {
            color: #000;
        }
    </style>

            <script>
        function toggleTheme() {
            const body = document.body;
            body.classList.toggle('dark-mode');
            const isDarkMode = body.classList.contains('dark-mode');
            const theme = isDarkMode ? 'jour' : 'nuit';
            document.getElementById('toggle-theme').innerHTML = `
                <span class="material-symbols-outlined ${isDarkMode ? 'day' : 'night'}">${isDarkMode ? 'sunny' : 'brightness_2'}</span>
                `;

            // Changer le logo en fonction du thème
            const logo = document.querySelector('header img');
            if (isDarkMode) {
                logo.src = "{{ asset('image/logob.png') }}";
            } else {
                logo.src = "{{ asset('image/logo.png') }}";
            }

            localStorage.setItem('theme', theme);
        }

        document.addEventListener("DOMContentLoaded", function() {
            const savedTheme = localStorage.getItem('theme');
            if (savedTheme === 'nuit') {
                toggleTheme();
            }
            document.getElementById('toggle-theme').addEventListener('click', toggleTheme);
        });
    </script>
</head>
<body class="dark-mode">

    <!-- Header -->
    <header>
        <!-- Logo -->
        <div>
        <a href="{{ route('home') }}"><img src="{{ asset('image/logob.png') }}" alt="Logo"></a>
        </div>

        <!-- Barre de recherche -->
        <form action="{{ route('recherche') }}" method="GET">
            <input type="text" name="keywords" placeholder="Rechercher...">
            <button type="submit" class="seach"><span class="material-symbols-outlined recherche">search</span></button>
        </form>


        <!-- Boutons profil et panier -->
        <div class="icones">
            <a href="{{ route('profil') }}" class="material-symbols-outlined bulle" aria-label="Profil">account_circle</a>
            <a href="{{ route('panier') }}" class="material-symbols-outlined bulle" aria-label="Panier">shopping_cart</a>
        </div>

        <button id="toggle-theme">
            <span class="material-symbols-outlined day">sunny</span>
            <span class="material-symbols-outlined night hidden">brightness_2</span>
        </button>
    </header>

    <nav>
        <ul>
            <li><a href="{{ route('nouveautes') }}">Nouveautés</a></li>
            <li><a href="{{ route('promotions') }}">Promotions</a></li>
            <li><a href="{{ route('produits') }}">Produits</a></li>
            <li><a href="{{ route('avis') }}">Avis</a></li>
        </ul>
    </nav>

    <div class="main">
    @yield('content')
    </div>

    <footer>
        <p>&copy; 2024 Les bijoux de la Fée Tochette. Tous droits réservés.</p>
    </footer>


</body>
</html>
