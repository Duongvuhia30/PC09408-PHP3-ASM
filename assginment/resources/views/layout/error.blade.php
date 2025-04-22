<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>@yield('title', 'Trang lỗi')</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Arvo'><link rel="stylesheet" href="{{asset('css/errorPageCss/style.css')}}">

</head>
<body>
<!-- partial:index.partial.html -->
<section class="page_404">
	@yield('content')
</section>
<!-- partial -->
  
</body>
</html>
