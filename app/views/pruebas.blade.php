<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laravel PHP Framework</title>

	<?php echo HTML::script('js/jquery-1.11.3.min.js'); ?>
	<?php echo HTML::script('js/jquery.validate.min.js'); ?>
	
	{{ HTML::style('css/bootstrap.css'); }}

	<script type="text/javascript">
		


	</script>

	<style>
		@import url(//fonts.googleapis.com/css?family=Lato:700);

		body {
			margin:0;
			font-family:'Lato', sans-serif;
			text-align:center;
			color: #999;
		}

		.welcome {
			width: 300px;
			height: 200px;
			position: absolute;
			left: 50%;
			top: 50%;
			margin-left: -150px;
			margin-top: -100px;
		}

		a, a:visited {
			text-decoration:none;
		}

		h1 {
			font-size: 32px;
			margin: 16px 0 0 0;
		}
	</style>
</head>
<body>
	<div class="container-fluid">
		<h1>Prueba Imaginamos</h1>
		<h2>Daniel Vega</h2>
		
		<div class="row">
			<div class="col-xs-2">
				<a href="{{ URL::to('/') }}"><button type="submit" name="submit" class="btn btn-primary btn-xs">Reiniciar Test</button></a>
			</div>
			<label class="control-title col-xs-4"><h2>Información de las Pruebas</h2></label>
			
				@if(isset($numTests) && $numTests<>0)
					@for ($i = 1;  $i < $numTests+1; $i++)
						<form class="form-horizontal" action="{{ URL::to('cubehelper/creartest') }}" method="post" id="definirtest-{{$i}}" enctype="multipart/form-data">
							<div class="row">
								<div class="center col-xs-12 col-md-8">
									<div class="col-xs-2">
							  			<label class="control-label">Prueba # {{$i}}</label>
							  		</div>
										<div class="col-xs-3">
											<input type="text" class="form-control" id="infotest" placeholder="Defina la prueba" name="infotest">
											<input type="hidden" class="form-control" id="numberTest" placeholder="{{$i}}" value="{{$i}}" name="numberTest">
										</div>
										<div class="col-xs-2">
											<button type="submit" name="submit" class="btn btn-danger btn-xs">Crear prueba</button>
										</div>
								</div>
							</div>
						</form>
						<script type="text/javascript">
							$(function() {
							    // Setup form validation on the #register-form element
							    $("#definirtest-{{$i}}").validate({
							        // Specify the validation rules
							        rules: {
							            infotest: {
									      required: true,
										  minlength: 3,
							    		},
										
							        },
							        
							        // Specify the validation error messages
							        messages: {
							            infotest: "Digite dos numero separados por un espacio",
							            
							        },
							        
							        submitHandler: function(form) {
							            form.submit();
							        }
							    });

							});

						</script>
					@endfor
				@endif
			
		</div>
		<div class="col-xs-12 col-md-8">
	  		<h5>Digite los parametros de la prueba: El primer valor corresponde al tamaño del cubo, el segundo al # de Queries que desea realizar.</label>
		</div>

	</div>
	
</body>
</html>
