@extends('layouts.app')
@section('content')
    <div class="px-4 py-5 my-5 text-center">
        <img class="d-inline-block mb-3"
            src="https://www.creative-formation.fr/wp-content/themes/creative-formation/assets/lettre-creative.svg"
            alt="Le C du logo Créative Formation" style="width: 50px">
        <h1 class="display-5 fw-bold">Bienvenue sur le blog de Créative</h1>
        <div class="col-lg-6 mx-auto">
            <p class="lead mb-4">Retrouvez-ici nos dernières actualités !</p>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                <a class="btn btn-primary btn-lg px-4 gap-3" href="#news">Accédez aux actualités</a>
            </div>
        </div>
    </div>
    <div class="container" style="display: flex; flex-direction:row;gap:50px;margin-bottom:150px;justify-content:center;">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Catégories</h5>
                <p class="card-text">Liste des Catégories disponible !</p>
                <a href="{{ route('category.index') }}" class="btn btn-primary">Ici</a>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Tags</h5>
                <p class="card-text">Liste des Tags disponible !</p>
                <a href="{{ route('tag.index') }}" class="btn btn-primary">Ici</a>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Posts</h5>
                <p class="card-text">Liste des Posts disponible !</p>
                <a href="{{ route('posts.indexadmin') }}" class="btn btn-primary">Ici</a>
            </div>
        </div>
    </div>
@endsection
