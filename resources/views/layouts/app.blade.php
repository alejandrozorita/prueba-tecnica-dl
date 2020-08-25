<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Prueba Técnica DL') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/mdb.min.js') }}" defer></script>
    <!-- Fonts -->

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        main {
            margin-top: 100px !important;
        }

        .modal-body span {
            font-weight: bold;
        }
    </style>

    @yield('css')
</head>
<body>
<div id="app">
    <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar top-nav-collapse">
        <div class="container">

            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Prueba Técnica DL') }}
            </a>

            <!-- Collapse -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Links -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <!-- Left -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link waves-effect waves-light" href="{{route('home')}}">Employer List
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('filterMananager')}}" class="nav-link waves-effect waves-light">Employer by
                            Manager</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>
</div>
</body>
<!--Footer-->
<footer class="page-footer text-center font-small mt-4 "></footer>

<script>
function getEmployer(emp_no) {
    var data = null;
    $.ajax({
        type: "GET",
        async: false,
        url: '{{route("findEmployer")}}' + '/' + emp_no,
        success: function (response) {
            if (response.data) {
                data = response.data;
            }
        }
    });
    if (data != null) {
        $("#nombreCompleto").html(data.complet_name)
        $("#genero").html(data.gender)
        $("#fechaNacimiento").html(data.birth_date)
        $("#fechaContratacion").html(data.hire_date)
        $("#salario").html(data.salary)
        $("#titulos").html(data.titles)
        $("#departamento").html(data.departments)
        $('#modalInfoEmployer').modal({
            show: true
        })
        return data;
    }
}
</script>

</html>


