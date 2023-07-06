<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    <!-- Bootstrap and Font awesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- CSS --> 
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <div>
        <ul class="list-group p-4">
            <li class="p-1 rounded">
                <a href="#" class="list-group-item">
                    <h5 class="text-center p-2 fw-bold">BAF</h5>
                </a>
            </li>
            <li class="p-1 rounded">
                <a href="#" class="list-group-item">
                    <h5 class="text-center p-2 fw-bold">FIF</h5>
                </a>
            </li> 
            <li class="p-1 rounded">
                <a href="#" class="list-group-item">
                    <h5 class="text-center p-2 fw-bold">WOM</h5>
                </a>
            </li> 
            <li class="p-1 rounded">
                <a href="#" class="list-group-item">
                    <h5 class="text-center p-2 fw-bold">ADIRA</h5>
                </a>
            </li> 
        </ul>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    
</body>

</html>