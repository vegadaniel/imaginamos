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
			<label class="control-title col-xs-4"><h2>Consultas para la Prueba # {{$numberTest}} </h2></label>
			
				@if(isset($numberQueries) && $numberQueries<>0)
					@for ($i = 1;  $i < $numberQueries+1; $i++)
						<form class="form-horizontal" action="{{ URL::to('cubehelper/realizarconsulta') }}" method="post" id="consulta-{{$i}}" enctype="multipart/form-data">
							<div class="row">
								<div class="center col-xs-12 col-md-8">
									<div class="col-xs-2">
							  			<label class="control-label">Consulta # {{$i}}</label>
							  		</div>
										<div class="col-xs-2">
											 <select class="form-control" name="tipoConsulta" id="tipoConsulta" data-toggle="tooltip" data-placement="top" title="Seleccion el tipo de la consulta">
							                    <option value="">Seleccione</option>
							                    <option value="1" >Update</option>
							                    <option value="2" >Select</option>
							                  </select>
										</div>
										<div class="col-xs-3">
											<input type="text" class="form-control" id="consulta" placeholder="Defina la prueba" name="consulta">
											<input type="hidden" class="form-control" id="numberTest" placeholder="{{$i}}" value="{{$i}}" name="numberTest">
											<input type="hidden" class="form-control" id="numberQueries" placeholder="{{$numberQueries}}" value="{{$numberQueries}}" name="numberQueries">
										</div>
										<div class="col-xs-2">
											<button type="submit" name="submit" class="btn btn-danger btn-xs">Realizar Consulta</button>
										</div>

					
								</div>
							</div>
						</form>
						<script type="text/javascript">
							$(function() {
							    // Setup form validation on the #register-form element
							    $("#consulta-{{$i}}").validate({
							        // Specify the validation rules
							        rules: {
							            tipoConsulta: {
									      required: true,
							    		},
							    		consulta: {
									      required: true,
										  minlength: 7,
							    		},
										
							        },
							        
							        // Specify the validation error messages
							        messages: {
							            tipoConsulta: "Seleccione Consulta",
							            consulta: "Digite la consulta correctamente",
							            
							        },
							        
							        submitHandler: function(form) {
							            form.submit();
							        }
							    });

							});

						</script>
					@endfor
				@endif
			<div class="row">
				<div class="center col-xs-12 col-md-8">
					@if(isset($status) && $status=='ok_update')
					<div class="alert alert-info fade in"><button class="close" data-dismiss="alert" type="button">×</button>
					<i class="fa fa-exclamation-triangle"></i> El registro ha sido actualizado. <br><br> Te quedan {{$numberQueries}} queries</div>
					@endif
				</div>
			</div>
			<div class="row">
				<div class="center col-xs-12 col-md-8">
					@if(isset($status) && $status=='ok_select')
					<div class="alert alert-info fade in"><button class="close" data-dismiss="alert" type="button">×</button>
					<i class="fa fa-exclamation-triangle"></i> El resultado de la suma es: {{$sum}}. <br> <br> Te quedan {{$numberQueries}} queries</div>
					@endif
				</div>
			</div>
			<div class="row">
				<div class="center col-xs-12 col-md-8">
					@if(isset($status) && $status=='ok_create')
					<div class="alert alert-info fade in"><button class="close" data-dismiss="alert" type="button">×</button>
					<i class="fa fa-exclamation-triangle"></i> El cubo ha sido creado en la base de datos.</div>
					@endif
				</div>
			</div>
			
		</div>

	</div>
	
</body>
</html>
