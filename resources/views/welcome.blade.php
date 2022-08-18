<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CelaqueSocial</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/css.css">
  </head>
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased" style="background-image: url('celaque.jpeg');
            background-repeat:no-repeat;
            background-attachment: fixed;
            background-size: cover;">
        	<div class="container-fluid">
        		<div class="row">
        			<div class="col-12 px-0">
        				<nav class="navbar navbar-expand-lg bg-primary bg-gradient bg-opacity-50">
  							<div class="container-fluid">
     							<a class="navbar-brand text-white" href="">CelaqueSocial |</a>
                        		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            	<span class="navbar-toggler-icon"></span>
                        		</button>
    							<div class="collapse navbar-collapse" id="navbarNav">
      								<ul class="navbar-nav ms-auto">
      									@if (Route::has('login'))
        								@auth
        									<li class="nav-item ">
          										<a href="{{ route('home.index') }}" class="nav-link active text-sm text-white underline" aria-current="page">Inicio</a>
        									</li>
        								@else
        									<li class="nav-item">
          										<a href="{{ route('login') }}" class="nav-link active text-sm text-white underline" aria-current="page">Ingresar</a>
        									</li> 
        									@if (Route::has('register'))
        										<li class="nav-item">
          											<a href="{{ route('register') }}" class="nav-link active text-sm text-white underline" aria-current="page">Registrarse</a>
        										</li>         								
        									@endif       						
        								@endauth
        								@endif
      								</ul>
    							</div>
  							</div>
						</nav>
					</div>
				</div>
			</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  	</body>
</html>