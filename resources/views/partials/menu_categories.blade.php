@forelse($categories as $category)
    <li><a href="{{ url('categorie', $category->id) }}">{{$category->title}}</a></li>
@empty
    <li><a>No category</a></li>
@endforelse