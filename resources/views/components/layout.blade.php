<div>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="/css/style.css">
        <script src="{{ asset('js/main.js') }}"></script>
        <title>{{ $title ?? config('app.name') }}</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
        


    </head>

    <body>
        <div class="d-flex flex-column min-vh-100">
            <x-navbar />
            <div class="container mt-0">
                {{ $slot }}
            </div>
        </div>

                
       
    </body>

    </html>
</div>