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

    <div class="container" id="news" style="margin-bottom:150px">
        <h1 class="mb-4">Modifier une catégorie :</h1>
        <form method="post" action="{{ route('category.update', $category->id) }}">

            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="InputName" class="form-label">Nom</label>
                <input type="text" class="form-control" name="InputName" id="InputName" value="{{ $category->name }}">
            </div>
            <div class="mb-3">
                <label for="InputColor" class="form-label">Couleur</label>
                <input type="text" class="form-control" name="InputColor" id="InputColor" value="{{ $category->color }}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
