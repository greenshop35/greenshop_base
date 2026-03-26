<!DOCTYPE html>
<html lang="hi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | GreenShop Business A1</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <link rel="stylesheet" href="{{ asset('assets/common/style.css') }}">

    <style>
        :root { --gs-success: #28a745; --gs-dark: #1e1e2d; --gs-light: #f4f7f6; }
        body { background-color: var(--gs-light); font-family: 'Segoe UI', Tahoma, sans-serif; overflow-x: hidden; }
        
        /* Layout Structure */
        .wrapper { display: flex; align-items: stretch; }
        #content { width: 100%; transition: all 0.3s; }
        
        /* Sidebar & Navbar Customization */
        .main-container { min-height: 100vh; display: flex; flex-direction: column; }
        .page-content {  flex: 1; }
    </style>
</head>
<body>

<div class="wrapper">
    @include('business.partials._business_sidebar')

    <div id="content" class="main-container">
        @include('business.partials._navbar')

        <main class="page-content">
            @yield('content')
        </main>
    </div>
</div>


</body>
</html>