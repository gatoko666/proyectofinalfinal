

<!DOCTYPE html>
<html lang="es">
<head>
<title>Adturn</title>
	
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<meta name="keywords" content="" />
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}

		function checkRut(rut) {
			// Despejar Puntos
			var valor = rut.value.replace('.','');
			// Despejar Guión
			valor = valor.replace('-','');
			
			// Aislar Cuerpo y Dígito Verificador
			cuerpo = valor.slice(0,-1);
			dv = valor.slice(-1).toUpperCase();
			
			// Formatear RUN
			rut.value = cuerpo + '-'+ dv
			
			// Si no cumple con el mínimo ej. (n.nnn.nnn)
			if(cuerpo.length < 7) { rut.setCustomValidity("RUT Incompleto"); return false;}
			
			// Calcular Dígito Verificador
			suma = 0;
			multiplo = 2;
			
			// Para cada dígito del Cuerpo
			for(i=1;i<=cuerpo.length;i++) {
			
				// Obtener su Producto con el Múltiplo Correspondiente
				index = multiplo * valor.charAt(cuerpo.length - i);
				
				// Sumar al Contador General
				suma = suma + index;
				
				// Consolidar Múltiplo dentro del rango [2,7]
				if(multiplo < 7) { multiplo = multiplo + 1; } else { multiplo = 2; }
		  
			}
			
			// Calcular Dígito Verificador en base al Módulo 11
			dvEsperado = 11 - (suma % 11);
			
			// Casos Especiales (0 y K)
			dv = (dv == 'K')?10:dv;
			dv = (dv == 0)?11:dv;
			
			// Validar que el Cuerpo coincide con su Dígito Verificador
			if(dvEsperado != dv) { rut.setCustomValidity("RUT Inválido"); return false; }
			
			// Si todo sale bien, eliminar errores (decretar que es válido)
			rut.setCustomValidity('');
		}
		
	</script>
	<!--// Meta tag Keywords -->
    
	<!-- banner slider css -->
	<link href="cssindex/minimal-slider.css" rel='stylesheet' type='text/css' />
	<!-- //banner slider css -->
	
	<!-- css files -->
	<link rel="stylesheet" href="cssindex/bootstrap.css"> <!-- Bootstrap-Core-CSS -->
    <link href="cssindex/style6.css" rel='stylesheet' type='text/css' />
	<link rel="stylesheet" href="cssindex/style.css" type="text/css" media="all" /> <!-- Style-CSS --> 
	<link rel="stylesheet" href="cssindex/fontawesome-all.css"> <!-- Font-Awesome-Icons-CSS -->
	<!-- //css files -->
	
	<!--web font-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<link href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext" rel="stylesheet">
	<!--//web font-->

</head>


 
	
		 



<body>


							@if ($errors->any())
							<div class="alert alert-danger">
								<ul>
									@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
									@endforeach
								</ul>
							</div> 
							@endif
							 
							@if ($message = Session::get('success'))
							<div class="alert alert-success">
								<p>{{ $message }}</p>
							</div>
						@endif

						@if ($message = Session::get('warning'))
						<div class="alert alert-warning alert-block">
							<button type="button" class="close" data-dismiss="alert">×</button>	
							<strong>{{ $message }}</strong>
						</div>
						@endif
						@if ($message = Session::get('404'))
						<div class="alert alert-warning alert-block">
							<button type="button" class="close" data-dismiss="alert">×</button>	
							<strong>Usuario no existe</strong>
						</div>
						@endif
						@if ($message = Session::get('error'))
						<div class="alert alert-warning alert-block">
							<button type="button" class="close" data-dismiss="alert">×</button>	
							<strong>{{ $message }}</strong>
						</div>
						@endif
						






<!-- header -->
<div class="header-top">
	<header>
		<div class="top-head ml-lg-auto text-center">
			<div class="row mr-0">				 
					<div class="col-md-4 col-5 ">						 
								
										<select class="form-control" id="myselect">
												<i class="fas fa-lock"> </i>
												<option value="">Seleccione el perfil</option>
												<option value="exampleModalCenter">Ingresar Administrador</option>
												<option value="exampleModalCenter4">Ingresar Operador</option>
											</select> 								
								   
						</div>			
							<script type="text/javascript">						 
								$(document).ready(function(){ //Make script DOM ready
									$('#myselect').change(function() { //jQuery Change Function
										var opval = $(this).val(); //Get value from select element
										if(opval=="exampleModalCenter"){ //Compare it and if true
											$('#exampleModalCenter').modal("show"); //Open Modal
										}else{
											$('#exampleModalCenter4').modal("show"); //Open Modal
										}
									});
								});
								</script>	
				<div class="col-md-3 col-4 sign-btn">
					<a href="#" data-toggle="modal" data-target="#exampleModalCenter2">
						<i class="fas fa-user"></i> Registrar</a>
				</div>
				 
			</div>
		</div>
		<div class="clearfix"></div>
		<nav class="navbar navbar-expand-lg navbar-light">
			<div class="logo">
				<h1>
					<a class="navbar-brand" href="#">							 
							<img  class="img-responsive" src="{{URL::to('/')}}/imagesindex/menu1.jpg" width="187" height="90" alt="Logo Axiovista">
						Adturn</a>
				</h1>
			</div>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon">
					<i class="fas fa-bars"></i>
				</span>

			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ml-lg-auto text-center">
					<li class="nav-item active">
						<a class="nav-link" href="#">Home
							<span class="sr-only">(current)</span>
						</a>
					</li>
				</li>
				<li class="nav-item">
				<a class="nav-link" href="#caracter">Carácteristicas</a>
				</li>

					<li class="nav-item">
						<a class="nav-link" href="#">Manual</a>
					
					<!--
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Pages
							<i class="fas fa-angle-down"></i>
						</a>
						
							Podria ser util
							
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="#" title="">About Us</a>
							<a class="dropdown-item" href="#" title="">Projects</a>
							<a class="dropdown-item" href="#">404 error page</a>
						</div>
					
					</li>
				
					<li class="nav-item">
						<a class="nav-link" href="#">Team</a>
					</li>

				-->
					<li class="nav-item">
					<a class="nav-link" href="#">Planes</a>
					</li>

					<li class="nav-item">
						<a class="nav-link" href="#">Contacto</a>
					</li>
				</ul>

			</div>
		</nav>
	</header>
</div>
<!-- header -->

<!-- main image slider container -->
<section class="slide-window">
	<div class="slide-wrapper" style="width:300%;">
		<div class="slide">
			<div class="slide-caption text-center">
			   <h2 class="text-uppercase">Información centralizada <span> </span></h2>
			   <p class="my-4">Excepteur sint occaecat non proident, sunt in culpa quis. Phasellus lacinia id erat eu ullamcorper. Nunc id ipsum fringilla,
				gravida felis vitae. Phasellus lacinia id, sunt in culpa quis. Phasellus lacinia hasellus lacinia id erat culpa quis.</p>
			   <div class="read">
					<a href="#" data-toggle="modal" data-target="#exampleModalCenter1" role="button">Read More <span class="btn ml-2"><i class="fas fa-arrow-right" aria-hidden="true"></i></span></a>
				</div>				
			</div>
		</div>
		<div class="slide slide2">
			<div class="slide-caption text-center">
				<h3 class="text-uppercase">De fácil uso <span> </span></h3>
			   <p class="my-4">Excepteur sint occaecat non proident, sunt in culpa quis. Phasellus lacinia id erat eu ullamcorper. Nunc id ipsum fringilla,
				gravida felis vitae. Phasellus lacinia id, sunt in culpa quis. Phasellus lacinia hasellus lacinia id erat culpa quis.</p>
			   <div class="read">
					<a href="#" data-toggle="modal" data-target="#exampleModalCenter1" role="button">Read More <span class="btn ml-2"><i class="fas fa-arrow-right" aria-hidden="true"></i></span></a>
				</div>	
			</div>
		</div>
		<div class="slide slide3">
			<div class="slide-caption text-center">
				<h3 class="text-uppercase">Mejor administración  <span> </span></h3>
			   <p class="my-4">Excepteur sint occaecat non proident, sunt in culpa quis. Phasellus lacinia id erat eu ullamcorper. Nunc id ipsum fringilla,
				gravida felis vitae. Phasellus lacinia id, sunt in culpa quis. Phasellus lacinia hasellus lacinia id erat culpa quis.</p>
			   <div class="read">
					<a href="#" data-toggle="modal" data-target="#exampleModalCenter1" role="button">Read More <span class="btn ml-2"><i class="fas fa-arrow-right" aria-hidden="true"></i></span></a>
				</div>	
			</div>
		</div>
	</div>
	<div class="slide-controller">
		<div class="slide-control-left">
			<div class="slide-control-line"></div>
			<div class="slide-control-line"></div>
		</div>
		<div class="slide-control-right">
			<div class="slide-control-line"></div>
			<div class="slide-control-line"></div>
		</div>
	</div>
</section>
<!-- end of main image slider container -->
	
<!-- welcome 
<section class="Welcome py-5">
	<div class="container py-sm-5">
		<div class="welcome-grids row">
			<div class="col-lg-6 mb-lg-0 mb-5">
				<h3 class="mt-lg-4">Phasellus lacinia id erat.</h3>
				<p class="my-4">Excepteur sint occaecat non proident, sunt in culpa quis. Phasellus lacinia id erat eu ullamcorper. Nunc id ipsum fringilla,
				gravida felis vitae. Phasellus lacinia id, sunt in culpa quis. Phasellus lacinia</p>
				<p class="mb-4">Excepteur sint occaecat non proident, sunt in culpa quis. Phasellus lacinia id erat eu ullamcorper. Nunc id ipsum fringilla.</p>
				<div class="read">
					<a href="#">Click More <span class="btn ml-2"><i class="fas fa-arrow-right" aria-hidden="true"></i></span></a>
				</div>	
			</div>
			<div class="col-lg-3 col-md-4 col-6 pr-1 welcome-image">
				<img src="imagesindex/a1.jpg" class="img-fluid" alt="" />
			</div>	
			<div class="col-lg-3 col-md-4 col-6 pl-1 welcome-image">
				<img src="imagesindex/a2.jpg" class="img-fluid" alt="" />
			</div>
		</div>	
	</div>	
</section>


 

<!-- copyright -->


<div class="cpy-right text-center">
	<p>© Proyecto de título Adturn 2019.
		<a href="#"></a>
	</p>
</div>
<!-- //copyright -->

	<!--model-forms-->
    <!--/Login-->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="login px-4 mx-auto mw-100">
                        <h5 class="text-center mb-4">Acceder al sitio Administrador</h5>                       
						
						<form method="POST" action="{{ route('loginadministrador') }} ">
							@csrf
	
							<div class="form-group row">
								<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo Electrónico') }}</label>	
								<div class="col-md-6">
									<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
	
									@error('email')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>

							

	
							<div class="form-group row">
								<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>	
								<div class="col-md-6">
									<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
	
									@error('password')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>
	
							<div class="form-group row">
								<div class="col-md-6 offset-md-4">
									<div class="form-check">
										<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
	
										<label class="form-check-label" for="remember">
											{{ __('Remember Me') }}
										</label>
									</div>
								</div>
							</div>	
							<div class="form-group row mb-0">
								<div class="col-md-8 offset-md-4">
										<button type="submit" class="btn" style="background:#09B400; color:#fff; ">
                               
								 
										{{ __('Login') }}
									</button>	
							 <a class="btn btn-link" href="#" data-toggle="modal" data-target="#exampleModalCenter9"  >

											{{ __('Recordar contraseña') }}
										</a>

									 
									 

								 
								</div>
							</div>
						</form>
                    </div>
                </div>

            </div>
        </div>
	</div>
	
    <!--//Login-->
    
    <!--/Login Operador-->
    <div class="modal fade" id="exampleModalCenter4" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="login px-4 mx-auto mw-100">
                        <h5 class="text-center mb-4">Acceder al sitio Operador</h5>
                       
						
						<form method="POST" action="{{ route('loginoperador') }} ">
							@csrf	
							<div class="form-group row">
								<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo Electrónico') }}</label>
	
								<div class="col-md-6">
									<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
	
									@error('email')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>
	
							<div class="form-group row">
								<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>
	
								<div class="col-md-6">
									<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" name="password" required autocomplete="current-password">
	
									@error('password')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>
	
							<div class="form-group row">
								<div class="col-md-6 offset-md-4">
									<div class="form-check">
										<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
	
										<label class="form-check-label" for="remember">
											{{ __('Remember Me') }}
										</label>
									</div>
								</div>
							</div>	
							<div class="form-group row mb-0">
								<div class="col-md-8 offset-md-4">
										<button type="submit" class="btn" style="background:#09B400; color:#fff; ">
										{{ __('Login') }}
									</button>	
									<a class="btn btn-link" href="#" data-toggle="modal" data-target="#exampleModalCenter3"  >

											{{ __('Recordar contraseña') }}
										</a>

									 

								 
								</div>
							</div>
						</form>
                    </div>
                </div>

            </div>
        </div>
	</div>
	
	<!--//Login-->
	




	<!--/Recuperar password Operador-->
    <div  class="modal fade" id="exampleModalCenter3" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="login px-4 mx-auto mw-100">
                        <h5 class="text-center mb-4">Recuperar Contraseña Operador</h5>
						<form method="POST" action="{{ route('olvidomailop') }} ">
							@csrf
	
							<div class="form-group row">
								<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo Electrónico') }}</label>
	
								<div class="col-md-6">
									<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
	
									@error('email')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>			
						 
						 
							<button type="submit" class="btn" style="background:#09B400; color:#fff; ">
								{{ __('Enviar enlace de recuperación de contraseña') }}
							</button>	
	 
						 
						</form>






                    </div>
                </div>

            </div>
        </div>
    </div>
	<!--//Login-->
	<!--/Recuperar password Admin-->
    <div  class="modal fade" id="exampleModalCenter9" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="login px-4 mx-auto mw-100">
                        <h5 class="text-center mb-4">Recuperar Contraseña Administrador</h5>
						<form method="POST" action="{{ route('olvidomailadm') }} ">
							@csrf
	
							<div class="form-group row">
								<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo Electrónico') }}</label>
	
								<div class="col-md-6">
									<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
	
									@error('email')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>			
						 
						 
							<button type="submit" class="btn" style="background:#09B400; color:#fff; ">
								{{ __('Enviar enlace de recuperación de contraseña') }}
							</button>	
	 
						 
						</form>






                    </div>
                </div>

            </div>
        </div>
    </div>

    <!--/Register-->
    <div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="login px-4 mx-auto mw-100">
						<h5 class="text-center mb-4">Registrar</h5>
					 
						

						<form method="POST" action="{{ route('registrar') }} ">
							@csrf
                            <div class="form-group">
                                <label>Nombre</label>

								<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
								@error('name')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
                            </div>
                            <div class="form-group">
								<label>Correo</label>
								<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
							 
								@error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>

							<div class="form-group">
								<label>Rut</label>
								<input id="rut" type="rut" size="20" class="form-control @error('rut') is-invalid @enderror"required oninput="checkRut(this)"   name="rut" value="{{ old('rut') }}" required autocomplete="rut">
							 
								@error('rut')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>

							
				 


                            <div class="form-group">
                                <label class="mb-2">Password</label>
								<input type="password" class="form-control" id="password"    name="password"  placeholder="Mínimo 9 cartáteres"  required autocomplete="new-password">
								@error('password')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
							</div>
							


                            <div class="form-group">
                                <label>Confirmar Password</label>
                                <input type="password" class="form-control" id="password-confirm" type="password" placeholder="Mínimo 9 cartáteres"  name="password_confirmation" required autocomplete="new-password">
                            </div>

                            <button type="submit" class="btn" style="background:#09B400; color:#fff; ">Registrar</button>
                            <p class="text-center pb-4">
                              
                            </p>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--//Register-->
    <!--//model-form-->

	<!-- video Modal Popup -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Introduction Video</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body video">
					<iframe src="https://player.vimeo.com/video/33531612"></iframe>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save changes</button>
				</div>
			</div>
		</div>
	</div>
	<!-- //video Model Popup -->
 
	<!-- //Vertically centered Modal -->

	<!-- js -->
	<script src="jsindex/jquery-2.1.4.min.js"></script>
	<script src="jsindex/bootstrap.js"></script> <!-- Necessary-JavaScript-File-For-Bootstrap --> 
	<!-- //js -->
	
	<!-- search overlay -->
    <script src="jsindex/modernizr-2.6.2.min.js"></script> 
	<!-- //search overlay -->
	
	<!--search jQuery-->
    <script src="jsindex/classie-search.js"></script>
    <script src="jsindex/demo1-search.js"></script>
    <!--//search jQuery-->

    <!-- dropdown nav -->
    <script>
        $(document).ready(function() {
            $(".dropdown").hover(
                function() {
                    $('.dropdown-menu', this).stop(true, true).slideDown("fast");
                    $(this).toggleClass('open');
                },
                function() {
                    $('.dropdown-menu', this).stop(true, true).slideUp("fast");
                    $(this).toggleClass('open');
                }
            );
        });
    </script>
    <!-- //dropdown nav -->

	<!-- banner slider js -->
	<script src="jsindex/minimal-slider.js"></script>
	<!-- //banner slider js -->

	<!-- Stats-Number-Scroller-Animation-JavaScript -->
	<script src="jsindex/waypoints.min.js"></script> 
	<script src="jsindex/counterup.min.js"></script> 
	<script>
		jQuery(document).ready(function( $ ) {
			$('.counter').counterUp({
				delay: 100,
				time: 1000
			});
		});
	</script>
	<!-- //Stats-Number-Scroller-Animation-JavaScript -->

	<!-- start-smoth-scrolling -->
	<script src="jsindex/SmoothScroll.min.js"></script>
	<script src="jsindex/move-top.js"></script>
	<script src="jsindex/easing.js"></script>
	<script>
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
			});
		});
	</script>
	<!-- here stars scrolling icon -->
	<script>
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
	<!-- //here ends scrolling icon -->
	<!-- start-smoth-scrolling -->

</body>
</html>