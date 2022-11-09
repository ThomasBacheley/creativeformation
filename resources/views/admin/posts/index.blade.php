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
        @include('partials.right-menu');
        <a class="btn btn-primary" href="{{ route('posts.create') }}" role="button">Ajouter</a>
        <h1 class="mb-4">Les derniers articles : </h1>
        @foreach ($posts as $post)
            <div class="list-group w-auto mb-4">
                <div class="list-group-item list-group-item-action d-flex gap-3 py-3">
                    <div class="d-flex gap-2 w-100 justify-content-between">
                        <div>
                            <div style="display:flex; flex-direction: row; gap:5px">
                                <p>Catégorie :</p>
                                <p>{!! '<span class="badge bg-primary" style="background: ' .
                                    $post->category->color .
                                    ' !important">' .
                                    $post->category->name .
                                    '</span>' !!}
                                </p>
                            </div>
                            <div style="display:flex; flex-direction: row; gap:5px">
                                <p>Tag(s) : </p>
                                @foreach ($post->tag as $tag)
                                    <p>{!! '<span class="badge bg-primary" style="background: ' .
                                        $tag->color .
                                        ' !important">' .
                                        $tag->name .
                                        '</span>' !!}
                                    </p>
                                @endforeach
                            </div>
                            <a class="mb-0" href="{{ route('posts.show', [$post->id, $post->slug]) }}">
                                {{ $post->title }}</a>
                            <p class="mb-0 opacity-75">{{ $post->description }}</p>
                        </div>
                        <div>
                            <small
                                class="opacity-50 text-nowrap">{{ $post->created_at ? $post->created_at->format('d/m/Y') : 'Null' }}</small>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
