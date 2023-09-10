<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="icon" href="/favicon.ico">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
    <script src="/js/jquery.min.js"></script>
    <title>Intera Laravel App</title>
</head>
<body class="text-base font-sans antialiased bg-stone-100 text-slate-900">
    <div class="flex flex-col min-h-screen">
        <div class="container md:mt-32 mt-12 max-w-[1140px] mx-auto px-4">
            @yield('content')
        </div>
        <footer class="fixed bottom-0 w-full bg-white text-slate-600 font-normal text-base text-center p-4 shadow-inner">
            <p>&copy; 2023 Laravel App. All rights reserved.</p>
        </footer>
    </div>
    <script async src="/js/fontawesome.js"></script>
    <script async src="/js/app.js"></script>
</body>
</html>
