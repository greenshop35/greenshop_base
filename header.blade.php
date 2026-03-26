<!DOCTYPE html>
<html lang="hi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | WhatsApp Manager</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <link rel="stylesheet" href="{{ asset('assets/common/style.css') }}">

    <style>
        /* व्हाट्सएप ब्रांडिंग कलर्स */
        :root { 
            --wa-green: #25D366; 
            --wa-dark: #075E54; 
            --wa-teal: #128C7E;
            --wa-light: #ece5dd; 
        }
        
        body { 
            background-color: var(--wa-light); 
            font-family: 'Segoe UI', Helvetica, Arial, sans-serif; 
            overflow-x: hidden; 
        }
        
        /* Layout Structure */
        .wrapper { display: flex; align-items: stretch; }
        #content { width: 100%; transition: all 0.3s; }
        
        .main-container { min-height: 100vh; display: flex; flex-direction: column; }
        
        /* व्हाट्सएप थीम के लिए पेज कंटेंट */
        .page-content { 
            padding: 20px; 
            flex: 1; 
            background-image: url('https://user-images.githubusercontent.com/15075759/28719144-86dc0f70-73b1-11e7-911d-60d70fcded21.png'); /* व्हाट्सएप बैकग्राउंड पैटर्न */
            background-repeat: repeat;
        }

        /* कस्टमाइज़्ड व्हाट्सएप हेडर/नॅवबार */
        .wa-navbar {
            background-color: var(--wa-dark) !important;
            color: white !important;
        }
    </style>
</head>
<body>

<div class="wrapper">
    {{-- तुम्हारे पास जो साइडबार फाइल है वही इस्तेमाल कर रहे हैं --}}
    @include('business.partials._whatsapp_sidebar')

    <div id="content" class="main-container">
        {{-- यहाँ मैंने नाम बदल दिया है ताकि एरर न आए --}}
        @include('business.partials._navbar')

        <main class="page-content">
            @yield('content')
        </main>

        <footer class="bg-white text-center py-2 border-top">
            <small class="text-muted">WhatsApp Manager Portal &copy; 2026</small>
        </footer>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>