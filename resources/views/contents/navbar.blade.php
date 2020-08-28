<div class="container">
    <div class="row">
        <div class="col-12">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                    <a class="navbar-brand" href="{{ route('index') }}">GrainBoard</a>
                    <ul class="navbar-nav myNav mr-auto mt-2 mt-lg-0">
                        @if(Auth::check())
                        <li class="nav-item active">
                            <a href="#" class='nav-link'>{{ Auth::user()->getName() }}</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('authSignout') }}" class='nav-link'>Выйти</a>
                        </li>
                        @else
                        <li class="nav-item active">
                        <li class='navbar-item'><a href="{{ route('authSignup') }}" class='nav-link'>Зарегистрироваться</a></li>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('authSignin') }}" class='nav-link'>Войти</a>
                        </li>
                        @endif
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                        <!-- <input class="form-control mr-sm-2" type="search" placeholder="Поиск" aria-label="Search">
                        <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Поиск</button> -->
                    </form>
                    <a class="btn btn-primary ml-2 my-2 my-sm-0" href ="{{ route('createAdv') }}">Добавить объявление</a>
                </div>
            </nav>
        </div>
    </div>
</div>