<div class='col-4 my-5'>
    <h5>Категории зерновых культур:</h5>
    @forelse ($cats as $cat)
    <a class="nav-link my-categorylink" href="?category={{$cat->id}}">Культуры {{$cat->name}}</a>
    @empty
    <p>Категории отсутствуют</p>
    @endforelse
</div>