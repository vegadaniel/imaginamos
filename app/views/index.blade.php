<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laravel PHP Framework</title>

	<?php echo HTML::script('js/jquery-1.11.3.min.js'); ?>
	<?php echo HTML::script('js/jquery.validate.min.js'); ?>
	
	{{ HTML::style('css/bootstrap.css'); }}

	<script type="text/javascript">
		$(function() {
		    // Setup form validation on the #register-form element
		    $("#numTests").validate({
		        // Specify the validation rules
		        rules: {
		            numTests: {
				      required: true,
					  minlength: 1,
				      maxlength: 4,
				      number: true
		    		},
					
		        },
		        
		        // Specify the validation error messages
		        messages: {
		            numTests: "Digite un numero",
		            
		        },
		        
		        submitHandler: function(form) {
		            form.submit();
		        }
		    });

		});

		$(document).ready(function() {
                    $("#geo_city").change(function() {
                        $.getJSON("{{ URL::to('places/sectorsdropdown/') }}/" + $("#geo_city").val(), function(data) {
                            var $geo_sectors = $("#geo_sector_1");
                            $geo_sectors.empty();
                            $.each(data, function(index, value) {
                              
                                $geo_sectors.append('<option value="' + index +'">' + value + '</option>');
                              
                            });

                        $("#geo_sector_1").trigger("change"); /* trigger next drop down list not in the example */
                        });
                    });
                });

		function crearPrueba(){
		
		        alert("Me haz dado un click");
		
		}



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
			<div class="center col-xs-12 col-md-8">
				<form class="form-horizontal" action="{{ URL::to('cubehelper/tests') }}" method="post" id="numTests" enctype="multipart/form-data">
					<div class="col-xs-12 col-md-8">
	  					<label class="control-label col-xs-4">Número de Pruebas</label>
					  	<div class="col-xs-3">
					    	<input type="text" class="form-control" id="numTests" placeholder="Pruebas" name="numTests">
					    </div>
					    <div class="col-xs-3">
					    	<button type="submit" name="submit" class="btn btn-danger btn-xs" >Guardar</button>
					    </div>
					</div>
					<div class="col-xs-12 col-md-8">
	  					<h5>Digite el número de pruebas que desea realizar</label>
					</div>
					
				</div>
			</div>
		</div>
		
	</div>
	
</body>
</html>
