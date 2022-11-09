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
        <div class="card">
            <div class="card-header">{{ $tag->name }}</div>
            {!! '<div class="card-body" style="width:100%;height:150px;background: ' . $tag->color . ' !important">' !!}
        </div>
        <div class="card-footer">Le {{ $tag->created_at ? $tag->created_at->format('d/m/Y') : 'Null' }}</div>
    </div>
    </div>
@endsection
