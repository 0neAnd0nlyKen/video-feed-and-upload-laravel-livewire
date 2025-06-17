<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Video App')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">Video App</a>
            <div>
                <a class="nav-link" href="{{ route('videos.index') }}">Video Feed</a>
            </div>
            <div>
                <a class="nav-link" href="{{ route('videos.upload') }}">Upload Video</a>
            </div>
        </div>
    </nav>
    <main>
        @yield('content')
    </main>
</body>
</html>