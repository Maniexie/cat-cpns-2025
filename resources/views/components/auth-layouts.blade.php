<!doctype html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
     <title>{{ $title ?? 'Auth' }}</title>
</head>
<body class="flex mx-auto p-4 font-medium text-sky-500">
    {{ $slot }}
</body>
</html>
