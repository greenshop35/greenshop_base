<!DOCTYPE html>
<html lang="hi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | GreenShop</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/common/style.css') }}">
    <style>
        :root { --gs-success: #28a745; --gs-dark: #1e1e2d; --gs-light: #f4f7f6; }
        body { background-color: var(--gs-light); font-family: 'Segoe UI', sans-serif; margin: 0; }
        .home-main {min-height: 100vh; }
    </style>
</head>
<body>
    <div class="home-wrapper">
        {{-- यहाँ तुम्हारा वो शानदार नेवबार लोड होगा --}}
        @include('business.partials._navbar')

        <main class="home-main">
            @yield('content')
        </main>

       <!--- <footer class="bg-white text-center py-3 border-top">
            <small class="text-muted">&copy; 2026 GreenShop Business Portal</small>
        </footer> --->
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>