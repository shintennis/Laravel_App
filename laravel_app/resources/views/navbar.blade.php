@section('navbar')
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    LARAVEL_APP
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <li class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">ログイン</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">登録</a>
                                </li>
                                
                            @endif
                        @else

                                <li>
                                    <a class="px-4 mr-2 btn btn-outline-success" href="{{ url('create') }}">投稿</a>
                               
                                    <a class="mr-2  btn btn-outline-dark" href="/user/{{ Auth::user()->id }}"><i class="far fa-user" style="font-size: 20px; color: gray;"></i></a>
                                
                                    <a class="btn btn-outline-info" href="{{ route('logout') }}">
                                        ログアウト
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                              
                            
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
@endsection