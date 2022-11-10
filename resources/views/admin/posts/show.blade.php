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
            <div class="card-header">{{ $post->title }}</div>
            <div class="card-body">
                <p>{{ $post->description }}</p>
                <small style="color: lightgray">{{ $post->slug }}</small>
            </div>
            <div class="card-footer">Le {{ $post->created_at ? $post->created_at->format('d/m/Y') : 'Null' }}</div>
        </div>
        <div>
            <img src="/images/{{ $post->imgname }}" alt="{{ $post->imgname }}">
        </div>
    </div>
@endsection
