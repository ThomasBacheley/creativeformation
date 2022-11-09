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
        <a class="btn btn-primary" href="{{ route('category.create') }}" role="button">Ajouter</a>
        <h1 class="mb-4">Les dernières categories : </h1>
        @foreach ($categories as $category)
            <div class="list-group w-auto mb-4">
                <div class="list-group-item list-group-item-action d-flex gap-3 py-3">
                    <div class="d-flex gap-2 w-100 justify-content-between">
                        <div>
                            <p>{!! '<span class="badge bg-primary" style="background: ' .
                                $category->color .
                                ' !important">' .
                                $category->name .
                                '</span>' !!}
                            </p>
                        </div>
                        <div>
                            <div style="display: flex; flex-direction:row;gap:20px">
                                <a class="btn btn-secondary" href="{{ route('category.edit', $category) }}"><i
                                        class="bi bi-pencil"></i></a>
                                <form method="post" action="{{ route('category.destroy', $category->id) }}">
                                    @method('DELETE')
                                    @csrf
                                    <button
                                        onclick="if(!confirm('Vouler-vous vraiment supprimer la catégorie {{ $category->name }}')){return false}"
                                        type="submit" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
