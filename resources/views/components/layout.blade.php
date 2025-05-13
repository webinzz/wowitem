<!DOCTYPE html>
<html lang="en" class="">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js' ])
    <link rel="shortcut icon" href="{{ asset('assets/logo.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <title>WowItem</title>
</head>

<body class="bg-background w-screen overflow-x-hidden dark:bg-slate-900 flex" >
  <x-navbar></x-navbar>
  
    <x-sidebar></x-sidebar>
    

    <main class="w-full pt-16 sm:pt-16 sm:p-3 sm:pr-6" >

       {{ $slot }}

    </main>
    
  <script src="{{ asset('js/navbar.js') }}"></script>
  <script src="{{ asset('js/items.js') }}"></script>
    
</body>
</html>
