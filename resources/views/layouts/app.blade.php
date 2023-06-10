<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>spot</title>
    <link rel="stylesheet" href="{{asset('admin-assets/css/app.css') }}">
</head>
<body>
    <header>
        <nav>
            <!-- Your navigation menu here -->
        </nav>
    </header>

    <main class="container">
        @yield('content')
    </main>

    <footer>
        <!-- Your footer content here -->
    </footer>

    <script src="{{asset('admin-assets/js/app.js') }}"></script>
</body>
</html>
