<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" >

</head>
<body>
    <div id="app">
        <welcome-component></welcome-component>
    </div>
    
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>