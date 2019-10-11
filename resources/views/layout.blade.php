<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8" />
  <title>@yield('title', 'Solluti Blog')</title>
  <link rel="shortcut icon" type="image/png" href="{{{ asset('img/favicon.ico') }}}"/>
  <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="/css/custom.css">
  <link rel="stylesheet" type="text/css" href="/css/spop.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans|PT+Sans" rel="stylesheet">
  <script type="text/javascript" src="/js/jquery-1.11.1.min.js"></script>
  <script type="text/javascript" src="/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="/js/fontawesome.js"></script>
  <script type="text/javascript" src="/js/spop.js"></script>
</head>
<body>

@yield('content')

</body>
</html>
