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
            margin-top: 1vw;
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
            min-height: 100vh;
        }

        /* Footer */
        footer {
            margin-top: 3%;
            background-color: #D4CBE2;
            color: #505D68;
            text-align: center;
            padding: 20px 0;
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
            font-size: 40px;
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

        .dark-mode button#toggle-theme {
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

        .hamburger-menu {
        display: none;
        position: fixed;
        }

        th
        {
            background: rgb(253, 141, 141);
            padding: 10px;
        }

        td
        {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }


        .dark-mode th
        {
            background: rgb(116, 116, 116);
            padding: 10px;
        }

        .dark-mode td
        {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        .highlight {
    background-color: #ffffcc;
    padding: 10px;
    color: #000;
    width: 80%;
    margin: auto;
}

        /* Pour les écrans de taille moyenne comme les tablettes */
        @media screen and (max-width: 1024px) {

        nav {
            display: flex;
            flex-direction: column;
            background: #505D68;
            overflow: hidden;
            width: 200px;
            transform: translateX(-200px);
            transition: 0.7s;
            z-index: 1001;
        }

        nav ul {
            list-style-type: none;
            display: flex;
            flex-direction: column;
            align-items: center;
            z-index: 1001;
        }

        nav ul li {
            margin: 10px 0px;
            position: relative;
            z-index: 10;
        }

        nav ul li a {
            text-decoration: none;
            color: #D4CBE2;
            font-weight: bold;
            position: relative;
            font-size: 20px;
            z-index: 1001;
        }

        nav ul li a:hover {
            color: #F5EDF0;
        }

        nav ul li a::after {
            content: '';
            position: absolute;
            left: 0;
            width: 1000%;
            background-color: #D4CBE2;
            z-index: -1;
            transition: width 0.5s;
            border-radius: 0px 0px 0px 0px;
        }

        nav ul li a:hover::after {
            width: 1000%;
        }

        .dark-mode nav {
            background: #D4CBE2;
        }

        .dark-mode nav ul li a {
                color: #505D68;
            }

        .dark-mode nav ul li a:hover {
            color: #fff;
        }

        .hamburger-menu {
            display: block;
            position: fixed;
            top : 40%
        }

        #hamburger-logo {
            cursor: pointer;
            background: #D4CBE2;
            width: 200px;
            display: block;
            color: #505D68;

            text-align: right;

            transform: translateX(-168px);
            padding: 10px;
            transition: 0.7s;
        }

        #menu-toggle:checked ~ #hamburger-logo,
        #menu-toggle:checked ~ nav {
        transform: translate(0);
        }

        header form button {
            display: none;
        }

        header {
            flex-direction: column;
            align-items: center;
        }

        header form {
            width: 100%;
            margin-top: 20px;
        }

        .icones {
            margin-top: 20px;
        }

        .main {
            padding-top: 20px;
        }

}

@media screen and (max-width: 768px) {
    nav {
        display: flex;
        flex-direction: column;
        background: #505D68;
        overflow: hidden;
        width: 200px;
        transform: translateX(-200px);
        transition: 0.7s;
        z-index: 1001;
        position: fixed;
        top: 0;
        left: 0;
        height: 100vh;
    }

    nav ul {
        list-style-type: none;
        display: flex;
        flex-direction: column;
        align-items: center;
        z-index: 1001;
    }

    nav ul li {
        margin: 10px 0px;
        position: relative;
        z-index: 10;
    }

    nav ul li a {
        text-decoration: none;
        color: #D4CBE2;
        font-weight: bold;
        position: relative;
        font-size: 20px;
        z-index: 1001;
    }

    nav ul li a:hover {
        color: #F5EDF0;
    }

    nav ul li a::after {
        content: '';
        position: absolute;
        left: 0;
        width: 1000%;
        background-color: #D4CBE2;
        z-index: -1;
        transition: width 0.5s;
        border-radius: 0px 0px 0px 0px;
    }

    nav ul li a:hover::after {
        width: 1000%;
    }

    .dark-mode nav {
        background: #D4CBE2;
    }

    .dark-mode nav ul li a {
        color: #505D68;
    }

    .dark-mode nav ul li a:hover {
        color: #fff;
    }

    .hamburger-menu {
        display: block;
        position: fixed;
        top: 40%;
        z-index: 1002;
    }

    #hamburger-logo {
        cursor: pointer;
        background: #D4CBE2;
        width: 200px;
        display: block;
        color: #505D68;
        text-align: right;
        transform: translateX(-168px);
        padding: 10px;
        transition: 0.7s;
    }

    #menu-toggle:checked ~ #hamburger-logo,
    #menu-toggle:checked ~ nav {
        transform: translate(0);
    }

    header form button {
        display: none;
    }

    header {
        flex-direction: column;
        align-items: center;
    }

    header form {
        width: 100%;
        margin-top: 20px;
    }

    .icones {
        margin-top: 20px;
    }

    .main {
        padding-top: 20px;
    }
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

    <header>

        <div>
        <a href="{{ route('home') }}"><img src="{{ asset('image/logob.png') }}" alt="Logo"></a>
        </div>


        <form action="{{ route('recherche') }}" method="GET">
            <input type="text" name="keywords" placeholder="Rechercher...">
            <button type="submit" class="seach"><span class="material-symbols-outlined recherche">search</span></button>
        </form>



        <div class="icones">
            <a href="{{ route('profil') }}" class="material-symbols-outlined bulle" aria-label="Profil">account_circle</a>
            <a href="{{ route('panier') }}" class="material-symbols-outlined bulle" aria-label="Panier">shopping_cart</a>
            <button id="toggle-theme">
                <span class="material-symbols-outlined day">sunny</span>
                <span class="material-symbols-outlined night hidden">brightness_2</span>
            </button>
        </div>
    </header>

    <div class="hamburger-menu">

        <input type="checkbox" id="menu-toggle" class="hidden">

        <label for="menu-toggle" class="menu-icon" id="hamburger-logo">&#9776;</label>

        <nav>
            <ul>
                <li><a href="{{ route('nouveautes') }}">Nouveautés</a></li>
                <li><a href="{{ route('promotions') }}">Promotions</a></li>
                <li><a href="{{ route('produits') }}">Produits</a></li>
                <li><a href="{{ route('avis') }}">Avis</a></li>
            </ul>
        </nav>
    </div>

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

    <div class="highlight">
        <p>Même si un produit est en rupture de stock, vous pouvez me contacter, je peux faire des bijoux à la demande pour de petites sommes. Pour me contacter : <b>061 61 59 19</b>, ou envoyer un message sur messenger à <a href="https://www.facebook.com/elodie.toche">https://www.facebook.com/elodie.toche</a>.</p>
    </div>

    <footer>
        <p>&copy; 2024 Les bijoux de la Fée Tochette. Tous droits réservés.</p>
        <a href="{{ route('mentions') }}">Mentions légales</a>
    </footer>
</body>
</html>
