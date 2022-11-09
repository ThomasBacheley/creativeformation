<div style="display: flex; gap: 20px; flex-direction: column;">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title bg-info">Catégories</h5>
            <ul>
                @foreach ($categories as $cat)
                    <li><a class="link-dark" style="text-decoration: none"
                            href="{{ route('category.show', [$cat->id, $cat->name]) }}">{{ $cat->name }}</a></li>
                @endforeach
                <ul>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title bg-info">Tags</h5>
            <ul>
                @foreach ($tags as $tag)
                    <li><a class="link-dark" style="text-decoration: none"
                            href="{{ route('tag.show', [$tag->id, $tag->name]) }}">{{ $tag->name }}</a></li>
                @endforeach
                <ul>
        </div>
    </div>
</div>
