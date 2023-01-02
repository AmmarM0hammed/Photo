<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/main.style.css') }}"> 
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
    <title>{{config('app.name')}} - {{$title}}</title>
</head>
<body>
    
    <x-navbar/>
    @yield('content')

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.js"></script>
<script>
    mdb.Alert.getInstance(document.getElementById("alert")).update({
    position: "top-right",
    delay: 2000,
    autohide: true,
    width: "600px",
    offset: 20,
    stacking: true,
    appendToBody: true,
    });
  </script>
</body>
</html>