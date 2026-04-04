<!DOCTYPE html>
<html>

<head>
    <title>@yield("title", "AlbumList")</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link href={{ asset("/assets/css/main.css") }} rel="stylesheet">
</head>

<body class="container">
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary shadow-sm">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">AlbumList</a>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" href={{ route("home") }}>Список пластинок</a>
                        </li>

                        @auth
                        <li class="nav-item">
                            <a class="nav-link active" href={{ route("edit_page") }}>Редактирование списка</a>
                        </li>
                        @endauth
                    </ul>
                    <ul class="navbar-nav">
                        @guest
                        <li class="nav-item">
                            <a class="nav-link active" href={{ route("login_page") }}>Войти</a>
                        </li>
                        @endguest

                        @auth
                        <li class="nav-item">
                            <a class="nav-link active" href={{ route("logout") }}>Выйти</a>
                        </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="pt-4">
        @yield("main")
    </main>

    <footer class="bg-dark text-center text-light">
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
            © 2025 Copyright:
            <a class="text-light" href="/">AlbumList.com</a>
        </div>
    </footer>
</body>

</html>
