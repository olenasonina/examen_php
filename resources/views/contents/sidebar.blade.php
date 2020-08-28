<div class='col-4 my-5'>
    <h5>Категории зерновых культур:</h5>
    @forelse ($cats as $cat)
    <a class="nav-link my-categorylink" href="{{ route('showCat', $cat->id) }}">Культуры {{$cat->name}}</a>
    @empty
    <p>Категории отсутствуют</p>
    @endforelse

    @if(Auth::check())
    <h5 class="mt-5">Профиль:</h5>
    <a class="nav-link my-categorylink" href="{{ route('myAdv', Auth::id()) }}">Мои объявления</a>
    <a class="nav-link my-categorylink" href="#">Мои сообщения</a>
    @endif

</div>