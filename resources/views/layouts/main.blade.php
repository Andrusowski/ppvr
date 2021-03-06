<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.2.0/css/uikit.min.css" />

    <!-- my CSS -->
    <link rel="stylesheet" href="{!! mix('/css/app.css') !!}" type="text/css">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('/safari-pinned-tab.svg') }}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#ff4500">
    <meta name="theme-color" content="#ffffff">

    <!-- miscellaneous -->
    <meta name="theme-color" content="#ff4500"/>
    <title>PPVR</title>
</head>
<body>
    <div id="app">
        <!-- Player not found -->
        @if ($errors->any())
            <div class="uk-alert-warning" uk-alert>
                <div class="uk-container uk-container-small">
                    <a class="uk-alert-close" uk-close></a>
                    <strong>Error!</strong> {{$errors->first()}}
                </div>
            </div>
        @endif

        <div class="uk-container uk-container-small">
            <!-- Navbar -->
            <nav class="uk-navbar-container uk-navbar-transparent" uk-navbar>
                <div class="uk-navbar-left">
                    <button class="uk-navbar-toggle uk-hidden@s" type="button" data-uk-navbar-toggle-icon></button>
                    <div uk-dropdown>
                        <ul class="uk-nav uk-dropdown-nav">
                            <!-- menu -->
                            <li><a href="{{url('/stats')}}">Stats</a></li>
                            <li><a href="{{url('/faq')}}">FAQ</a></li>
                            <li><a href="https://github.com/Andrusowski/ppvr-web/blob/master/CHANGELOG.md">Changelog</a></li>
                        </ul>
                    </div>

                    <a class="uk-navbar-item uk-logo nunito" href="{{url('/')}}">
                        PPV<span class="reddit">R</span>
                    </a>

                    <ul class="uk-navbar-nav uk-visible@s">
                        <!-- menu -->
                        <li><a href="{{url('/stats')}}">Stats</a></li>
                        <li><a href="{{url('/faq')}}">FAQ</a></li>
                        <li><a href="https://github.com/Andrusowski/ppvr-web/blob/master/CHANGELOG.md">Changelog</a></li>
                    </ul>
                </div>


                <div class="uk-navbar-right">
                    <!-- search -->
                    <form class="uk-search uk-search-default" action="{{url('search/')}}">
                        <span uk-search-icon></span>
                        <input class="uk-search-input" name="name" type="search" placeholder="Search Player">
                    </form>
                </div>
            </nav>

            @yield('content')

            <br>
        </div>

        <br><br>

        <p class="uk-text-center uk-text-meta uk-margin-remove-bottom uk-padding-small" id="footertext">
            made by Andrus
            <a href="https://discordapp.com/users/86760014068355072"><i class="fab fa-discord link text-secondary"></i></a>
            <a href="https://github.com/Andrusowski"><i class="fab fa-github link text-secondary"></i></a>
        </p>
    </div>

    @yield('javascript')

    <script type="text/javascript">
        var base_url = {!! json_encode(url('/')) !!}
    </script>
    <script type="text/javascript" src="{!! asset('js/app.js') !!}" defer></script>

    <!-- UIkit JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.2.0/js/uikit.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.2.0/js/uikit-icons.min.js"></script>

    <!-- Ackee -->
    <script async src="https://ackee.andrus.io/ackee.js" data-ackee-server="https://ackee.andrus.io" data-ackee-domain-id="5ecaf1a7-9a5e-4860-9b95-889526ab677c"></script>
</body>
</html>
