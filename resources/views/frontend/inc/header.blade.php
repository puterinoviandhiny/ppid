<!--HEADER-->
<header id="header" style="background-color: #fff; border-bottom: 4px solid #47a3da;" data-uk-sticky="cls-active: uk-background-primary uk-box-shadow-medium; top: 100vh; animation: uk-animation-slide-top">
    <div class="uk-container">
        <nav class="uk-navbar uk-navbar-container uk-navbar-transparent" data-uk-navbar>
            <div class="uk-navbar-left">
                <div class="uk-navbar-item uk-padding-remove-horizontal">
                    <a title="Logo" href="{{ route('home') }}"><img src="{{ asset ('img/ppid1.png') }}" alt="Logo" width="300px" height="80px"></a>
                </div>
            </div>
            <div class="uk-navbar-right">
            <ul class="uk-navbar-nav uk-visible@s">
                    <li class="uk-active uk-visible@m"><a href="{{ route('home') }}" data-uk-icon="home"></a></li>
                    @foreach(\Backpack\MenuCRUD\app\Models\MenuItem::getTree() as $item)
                    @if($item->children->isEmpty())
                    <li>
                        <a href="{{$item->url()}}">
                            <span>{{$item->name}}</span>
                        </a>
                    </li>
                @else
                <li class="uk-parent">
                    <a href="{{$item->url()}}" data-uk-icon="chevron-down">
                        <span>{{$item->name}}</span>
                    </a>
                    <div class="uk-navbar-dropdown">
                        @foreach($item->children as $i => $child)
                       <ul class="uk-nav uk-navbar-dropdown-nav">
                                <li>
                                    <a href="{{$child->url()}}"  @if ($child->children->isNotEmpty()) data-uk-icon="chevron-down" @endif>
                                        <span>{{$child->name}}</span>
                                    </a>
                                    @if ($child->children->isNotEmpty())

                                    <div class="uk-nav-sub uk-navbar-dropdown">
                                        @foreach ($child->children as $child)

                                    <ul class="uk-nav uk-navbar-dropdown-nav">

                                            <li>
                                            <a href="{{ $child->url() }}" >{{ $child->name }}</a>
                                            </li>

                                    </ul>
                                    @endforeach
                                    </div>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    </li>

                @endif
                @endforeach
                </ul>
                <a href="{{ route('backpack.auth.login') }}"><button class="uk-button uk-button-primary uk-button-small">Login</button></a>
            </div>
        </nav>
    </div>
</header>
