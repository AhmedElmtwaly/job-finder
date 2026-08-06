<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Job Finder') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Tailwind CSS CDN Fallback -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        /* تأثير خلفية زجاجية فخمة وإلغاء الإطارات الافتراضية للمتصفح */
        * {
            box-sizing: border-box;
        }
        html, body {
            margin: 0 !important;
            padding: 0 !important;
            width: 100vw !important;
            min-height: 100vh !important;
            overflow-x: hidden !important;
            background-color: #0f172a !important;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.75);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        
        .dark .glass-card {
            background: rgba(17, 24, 39, 0.75);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        /* تحسين السكرول بار ليطابق التصميم الفخم */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }
        .dark ::-webkit-scrollbar-track {
            background: #0f172a;
        }
        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 4px;
        }
        .dark ::-webkit-scrollbar-thumb {
            background: #334155;
        }
    </style>
</head>

<body class="font-sans antialiased text-gray-900 m-0 p-0">

<!-- الحاوية الكبرى لتغطية الشاشة بالكامل بصورة الخلفية -->
<div style="position: fixed; top: 0; left: 0; width: 100vw; height: 100vh; display: flex; flex-direction: column; align-items: center; justify-content: center; background-image: url('{{ asset('images/am1.webp') }}'); background-size: cover; background-position: center; background-repeat: no-repeat; z-index: 9999; overflow-y: auto;" class="px-4 py-10">

    <!-- طبقة التعتيم لتغطية الشاشة بالكامل وتوضيح المحتوى -->
    <div style="position: fixed; top: 0; left: 0; width: 100vw; height: 100vh; background-color: rgba(0, 0, 0, 0.45); z-index: 1;"></div>

    <!-- محتوى الصفحة -->
    <div class="w-full max-w-md relative z-10 my-auto">

        <!-- Logo -->
        <div class="flex justify-center mb-8">
            <a href="/"
               class="flex items-center justify-center 
                      w-24 h-24 rounded-full 
                      bg-white/80 backdrop-blur-md shadow-lg border border-white/20">
                <x-application-logo
                    class="w-14 h-14 fill-current text-indigo-600"
                />
            </a>
        </div>

        <!-- Card -->
        <div class="bg-white/95 backdrop-blur-xl shadow-2xl rounded-3xl 
                    border border-white/20 
                    px-8 py-10">
            {{ $slot }}
        </div>

        <!-- Footer -->
        <p class="text-center text-sm text-white/90 drop-shadow mt-6 font-medium">
            © {{ date('Y') }} Job Finder. All rights reserved.
        </p>

    </div>

</div>

</body>

</html>