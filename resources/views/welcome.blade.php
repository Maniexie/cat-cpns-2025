<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Document</title>
</head>

<body>
    <div class="flex justify-center items-center h-screen bg-gray-200">
        <div class="text-xl font-bold p-8 bg-white rounded-lg shadow-md">
            Welcome Tryout
            <div class="flex">

                <a href="/login" class="text-xl font-bold p-8">Login</a>
                <a href="/register" class="text-xl font-bold p-8">Register</a>
                <a href="/dashboard" class="text-xl font-bold p-8">Dashboard</a>
            </div>
        </div>
    </div>
</body>

</html>
