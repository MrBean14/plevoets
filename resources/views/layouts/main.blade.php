<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title')</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('css/myCss.css') }}">
    @yield('scripts')
</head>
<body>
<div class="container">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1" aria-expanded="false">

                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/plevoets/public">Plevoets</a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{ route('dashboard.home') }}">Dashboard</a></li>
                    <li><a href="{{ route('dashboard.statistieken') }}">Statistieken</a></li>
                    <li><a href="{{ route('cars.home') }}">Automerken</a></li>
                    <li><a href="{{ route('vervaldagtypes.home') }}">Vervaldagtypes</a></li>
                    <li><a href="{{ route('maatschappijen.home') }}">Maatschappijen</a></li>
                    <li><a href="{{ route('makelaars.home') }}">Makelaars</a></li>
                    <li><a href="{{ route('klanten.home') }}">Klanten</a></li>
                    <li><a href="{{ route('facturen.home') }}">Facturen</a></li>
                    <li><a href="{{ route('export.home') }}">Export</a></li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')
</div>

</body>
</html>
