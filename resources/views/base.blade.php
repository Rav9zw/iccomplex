<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>IC Complex</title>

    @vite(['resources/js/app.js'])

    <!-- Styles -->
    <style>
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{Route::is('importCsv')?'active':''}}" aria-current="page"
                       href="/import_csv">Import Csv</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{Route::is('order')?'active':''}}" href="/order">Order</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{Route::is('priceList')?'active':''}}" href="/price_list">Price list</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{Route::is('calculatedList')?'active':''}}" href="/calculated_list">Calculated
                        list</a>
                </li>
            </ul>

        </div>
    </div>
</nav>
@yield('content')

</body>
</html>
