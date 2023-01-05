<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--Fonte do Google fonts-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap"
        rel="stylesheet">
        <!--CSS Boostrap-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
        rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
        crossorigin="anonymous">
        <!--CSS da Aplicação-->
        <link rel="stylesheet" href="/css/styles.css">
            <!--JS da Aplicação-->
        <script src="/js/scripts.js"></script>

        <title>@yield('title')</title>
    </head>
    <body class="bg-dark text-white">
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark">
                <div class="collapse navbar-collapse" id="navbar">
                    <a href="/" class="navbar-brand">
                        <img src="/img/hdcevents_logo.svg" alt="Logo events">
                    </a>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="/" class="nav-link">Eventos</a>
                        </li>
                        <li class="nav-item">
                            <a href="/events/create" class="nav-link">Criar Eventos</a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">Entrar</a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">Cadastrar</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        @yield('content')

        <footer class="fixed-bottom">
            <p class="fs-6 text-center fw-light mb-1 ">Azzi Events &copy; 2022</p>
        </footer>
        <!--Icones ionicons-->
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>
</html>
