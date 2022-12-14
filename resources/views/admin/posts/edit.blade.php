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
        <h1 class="mb-4">Modifier un article :</h1>
        <form method="post" action="{{ route('posts.update', $post) }}" enctype="multipart/form-data">

            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="InputTitre" class="form-label">Titre</label>
                <input type="text" class="form-control" name="InputTitle" id="InputTitle" value="{{ $post->title }}">
            </div>
            <div class="mb-3">
                <label for="InputSlug" class="form-label">Slug</label>
                <input type="text" class="form-control" name="InputSlug" id="InputSlug" value="{{ $post->slug }}">
            </div>
            <div class="mb-3">
                <label for="InputDesc" class="form-label">Description</label>
                <input type="text" class="form-control" name="InputDesc" id="InputDesc" value="{{ $post->description }}">
            </div>
            <div class="mb-3">
                <label for="InputCat" class="form-label">Catégorie</label>
                <select name="InputCat" id="InputCat">
                    <option value="">Aucune</option>
                    @foreach ($categories as $category)
                        <option value={{ $category->id }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="InputTags" class="form-label">Tags</label>
                <select multiple name="InputTags[]" id="InputTags">
                    <option value="">Aucun</option>
                    @foreach ($tags as $tag)
                        <option value={{ $tag->id }}>{{ $tag->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" value="1" name="checkbox" id="checkbox" checked>
                <label class="form-check-label" for="checkbox">
                    Publier ?
                </label>
            </div>
            <div>
                <label for="image" class="form-label">Image</label>
                <input type="file" name="image">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
