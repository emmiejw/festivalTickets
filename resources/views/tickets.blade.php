<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Muli|Playfair+Display&display=swap" rel="stylesheet">

    <link rel="icon" href="<%= BASE_URL %>favicon.ico">
    <title>Festival Tickets</title>
  </head>
  <body>

    <div id="app">
     <app></app>
     

    </div>
   
    <script src="{{ mix('js/app.js') }}"></script>
 


</body>
</html>