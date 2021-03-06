<header>
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-left" href="/"><img src="{{ secure_asset("images/logo.png") }}" alt="Questionposts"></a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                @if (Auth::check())
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-search"> 検索</span></a>
                            <ul class="dropdown-menu">
                                <li>{!! link_to_route('questionposts.search', '質問を検索') !!}</li>
                                <li role="separator" class="divider"></li>
                                <li>{!! link_to_route('users.search', 'ユーザー検索') !!}</li>
                            </ul>    
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"> {{ Auth::user()->name }}</span></a>
                            <ul class="dropdown-menu">
                                <li>{!! link_to_route('users.show', 'マイプロフィール', ['id' => Auth::id()]) !!}</li>
                                <li role="separator" class="divider"></li>
                                <li>{!! link_to_route('logout.get', 'Logout') !!}</li>
                            </ul>
                        </li>    
                @else    
                    <li>{!! link_to_route('signup.get', 'Signup') !!}</li>
                    <li>{!! link_to_route('login', 'Login') !!}</li>
                @endif    
                </ul>
            </div>
        </div>
    </nav>
</header>