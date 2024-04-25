@extends('layouts.app')

@section('content')

<style>
/* En-tête */
h1 {
    font-size: 24px;
    margin-bottom: 20px;
}

main a {
    display: block;
    margin-bottom: 10px;
    text-decoration: none;
    color: white;
    padding: 10px;
    border-radius: 5px;
    text-align: center;
    margin-top: 3%;
}

main a.bleu {
    background-color: #749ffabd;
}

main a.rouge {
    background-color: #fa7474bd;
}

main a:hover {
    text-decoration: none;
    background-color: #C5B3CE;
}

/* Ajout d'une barre entre les catégories */
.main-category {
    border-bottom: 1px solid #D4CBE2;
    margin-bottom: 10px;
    padding-bottom: 10px;
}

.box {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate3d(-50%, -50%, 0);
    background-color: rgba(0, 0, 0, 0.5);
    width: 100%;
    max-width: 600px;
    padding: 5px;
    border: 2px solid #b78846;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    color: #fff;
    &:before, &:after {
    content: "•";
    position: absolute;
    width: 14px;
    height: 14px;
    font-size: 14px;
    color: $color-alpha;
    border: 2px solid $color-alpha;
    line-height: 12px;
    top: 5px;
    text-align: center;
  }
  &:before {
    left: 5px;
  }
  &:after {
    right: 5px;
  }
  .box-inner {
    position: relative;
    border: 2px solid $color-alpha;
    padding: 40px;
    &:before, &:after {
      content: "•";
      position: absolute;
      width: 14px;
      height: 14px;
      font-size: 14px;
      color: $color-alpha;
      border: 2px solid $color-alpha;
      line-height: 12px;
      bottom: -2px;
      text-align: center;
    }
    &:before {
      left: -2px;
    }
    &:after {
      right: -2px;
    }
  }
}


</style>

<main class="box">
    <div class="box-inner">
    @if(Auth::check()) <!-- Vérifie si l'utilisateur est connecté -->
        <h1>Bienvenue sur votre profil</h1>
        <!-- Contenu du profil -->
        <p>Nom d'utilisateur: {{ Auth::user()->name }}</p>
        <p>Email: {{ Auth::user()->email }}</p>
        <a href="{{ route('logout') }}" class="bleu">Déconnexion</a>
        <a href="{{ route('users.edit', Auth::user()) }}" class="bleu">Modifier mon profil</a>

        @if(Auth::user()->type_membre_id == 1) <!-- Vérifie si l'utilisateur est administrateur -->
            <!-- Affiche des liens vers les sections administratives -->
            <p><a href="{{ route('admin.dashboard') }}" class="rouge">Liste des utilisateurs</a></p>
            <p><a href="{{ route('admin.products.index') }}" class="rouge">Gestion des produits</a></p>
            <p><a href="{{ route('admin.commandes') }}" class="rouge">Commandes</a></p>
            <!-- Ajoutez d'autres liens vers les sections administratives au besoin -->
        @endif

    @endif
</div>
</main>

@endsection
