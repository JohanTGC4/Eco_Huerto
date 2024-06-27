<!DOCTYPE html>
<html>
<head>
  <title>EcoHuerto</title>
  <link rel="icon" href="{{ asset('images/logoEcoHuerto.png') }}" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="slide navbar style.css">
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
 <a href="index.html"> <img  src="images/logoEcoHuerto2-removebg-preview.png" width="200"></a>
	<div class="main">  
    	
		<input type="checkbox" id="chk" aria-hidden="true">
		@if (session('error'))
        <div style="color: red;">
            {{ session('error') }}
        </div>
    @endif
    
    
			<div class="signup">
				@csrf
				<form action="{{ route('loginUsuario') }}" method="POST">
					@csrf
					<label for="chk" aria-hidden="true">Iniciar Sesión</label>
					<input type="email" name="email" placeholder="Correo Electrónico" required="">
          <input type="password" name="password" placeholder="Contraseña" required="">
					<button>Iniciar sesión</button>
				</form>
			</div>

			<div class="login">
				@csrf
				<form action="{{ route('registrar') }}" method="POST">
					@csrf
					<label for="chk" aria-hidden="true">Registar</label>
          <input type="text" name="usuario" placeholder="Nombre " required="">
					<input type="email" name="correo" placeholder="Correo Electrónico" required="">
					<input type="password" name="contrasena" placeholder="Contraseña" required="">
					<button>Registar</button>
				</form>
			</div>
	</div>
</body>
</html>

