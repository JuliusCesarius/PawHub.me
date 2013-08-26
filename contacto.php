<!DOCTYPE HTML>
<?php
	session_start();
	 
if(array_key_exists("login",$_GET)) {
	$oauth_provider=$_GET['oauth_provider'];
	if($oauth_provider=='twitter') {
		header("Location: login-twitter.php");
	}
}
	$userName=$_SESSION['userName'];
	$userCity=$_SESSION['userCity'];
	$tw= 'false';
	$tw=$_SESSION['tw'];

	echo $userName;
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<meta name="viewport" content="width=device-width, initial-scale = 1.0">
		<title>Contacto</title>
		<link rel="stylesheet" href="css/formstyle.css" type="text/css" media="screen"/>
		<link rel="stylesheet" href="css/grid.css" type="text/css" media="screen">
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,800,700,300' rel='stylesheet' type='text/css'>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<script type="text/javascript" src="js/sliding.form.js"></script>

		<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6 lt8"> <![endif]-->
		<!--[if IE 7 ]>    <html lang="en" class="no-js ie7 lt8"> <![endif]-->
		<!--[if IE 8 ]>    <html lang="en" class="no-js ie8 lt8"> <![endif]-->
		<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->

		<script type="text/javascript">
			$(document).ready(function() {

		function validar_email(valor) {
		// creamos nuestra regla con expresiones regulares.
		var filter = /[\w-\.]{3,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
		// utilizamos test para comprobar si el parametro valor cumple la regla
		if (filter.test(valor))
			return true;
		else
			return false;
		}
		
		// verificar correo usuario
		$("#userEmail").change(function() {
			if ($("#userEmail").val() == '') {
				alert("Ingresa un email");
			} else if (validar_email($("#userEmail").val())) {
		
			} else {
				alert("El email no es valido \nEjemplo: example@example.com");
				$("#userEmail").val("");
			}
		
		});
		
		// verificar correo candidato
		$("#candidateEmail").change(function() {
			if ($("#candidateEmail").val() == '') {
				$('#mesagges2').css('display','block');
				$('#mesagges2 p').addClass('error');
				$('#mesagges2 p').text("Ingresa un email");
			} else if (validar_email($("#candidateEmail").val())) {
		
			} else {
				alert("El email no es valido \nEjemplo: example@example.com");
				$("#candidateEmail").val("");
			}
		
		});
		
		//DROP menu
		if ($(window).width() < 750) {
			$(".btn_dropdown").click(function() {
				$(".navigation").slideToggle("slow");
			});
			
			$(".navigation li").click(function() {
				$(".navigation").hide("fast");
			});
		}
		
		//GETTERS DE TW
		
			var userN = '<?php echo $userName; ?>';
			var userL = '<?php echo $userLastname; ?>';
			var userC = '<?php echo $userCity; ?>';
			var tw = '<?php echo $tw; ?>';
				
			if(tw == 'true'){
				$('.btnsredes').remove();
				$('#mesagges').css('display','block');
				$('#mesagges p').text('��Ya casi est�s pre-registrado!! Verifica tus datos por favor');
				
				if(userN != '')
					$('#userName').val(userN);
		
				if(userL != '')
					$('#userLastname').val(userL);
		
				if(userC != '')
					$('#userCity').val(userC);
			}
		
			});
			
		</script>
		<!-- FACEBOOK LOGIN -->

		<script>
			// Additional JS functions here
			window.fbAsyncInit = function() {
				FB.init({
					appId : '594368320614740', // App ID
					channelUrl : '//WWW.PAWHUB.ME/channel.html', // Channel File
					status : true, // check login status
					cookie : true, // enable cookies to allow the server to access the session
					xfbml : true // parse XFBML
				});

				// Here we subscribe to the auth.authResponseChange JavaScript event. This event is fired
				// for any authentication related change, such as login, logout or session refresh. This means that
				// whenever someone who was previously logged out tries to log in again, the correct case below
				// will be handled.
				FB.Event.subscribe('auth.authResponseChange', function(response) {
					// Here we specify what we do with the response anytime this event occurs.
					if (response.status === 'connected') {
						// The response object is returned with a status field that lets the app know the current
						// login status of the person. In this case, we're handling the situation where they
						// have logged in to the app.
						testAPI();

					} else if (response.status === 'not_authorized') {
						// In this case, the person is logged into Facebook, but not into the app, so we call

						$('#mesagges').css('display','block');
						$('#mesagges p').text('No has autorizado a nuestra App tener acceso a tus datos, favor de llenar la forma a mano');
					}
				});
			};

			// Load the SDK asynchronously
			( function(d) {
					var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
					if (d.getElementById(id)) {
						return;
					}
					js = d.createElement('script');
					js.id = id;
					js.async = true;
					js.src = "//connect.facebook.net/en_US/all.js";
					ref.parentNode.insertBefore(js, ref);
				}(document));

			// Here we run a very simple test of the Graph API after login is successful.
			// This testAPI() function is only called in those cases.
			function testAPI() {
				
				console.log('Welcome!  Fetching your information.... ');
				FB.api('/me', function(response) {
					var userName = response.name;
					var userEmail = response.email;
					var userCity = response.location.name;

					$('.btnsredes').remove();
					$('#mesagges').css('display','block');
					$('#mesagges p').text('��Ya CASI est�s pre-registrado!! Verifica tus datos por favor');
					$('#userName').val(userName);
					$('#userEmail').val(userEmail);
					$('#userCity').val(userCity);
					
				});
			}
			
		</script>

		<!-- TERMINA CODIGO FB -->
	</head>
	<body>

		<div class="menu">
			<div class="container clearfix">

				<div id="logo">
					<a href="index.html"><img src="images/logo.png" /></a>
				</div>

				<div id="nav">
					<a class="btn_dropdown" data-toggle="collapse" data-target=".nav-collapse_">MENU</a>
					<ul class="navigation">
						<li data-slide="1">
							<a href="index.html">Home</a>
						</li>
						<li data-slide="2">
							<a href="index.html#slide2">What is</a>
						</li>
						<li data-slide="4">
							<a href="index.html#slide4">Tools</a>
						</li>
						<li data-slide="6">
							<a href="index.html#slide6">Motto</a>
						</li>
						<li data-slide="7">
							<a href="index.html#slide7">Team</a>
						</li>
						<li data-slide="8" id="li_contact">
							<a>Ap�yanos</a>
						</li>
						<div class="clear"></div>
					</ul>
				</div>

			</div>
		</div>
		
		<div id="container">
			
			<div id="wrapper" align="center">
			<div id="navigation">
				<ul>
					<li id="li1" class="selected">
						<a href="#">Pre-reg�strate</a>
					</li>
					<li id="li2">
						<a href="#">Int�grate</a>
					</li>
					<li id="li3">
						<a href="#">Ap�yanos</a>
					</li>
				</ul>
			</div>
			<div id="steps">

				<form id="formElem1" name="formElem1" action="" method="post">
					<fieldset class="step">
						<legend>
							Pre Registro
						</legend>
						<p class="infohead">
							Pre-reg�strate y mantente informado del avance del proyecto.
						</p>
						<br />
						<div class="btnsredes">
							<a href="#" onclick="FB.login();"><img src="images/fbsign.jpg" style="margin-right: 22px; margin-bottom: 7px;" /></a>
							<a href="?login&oauth_provider=twitter"><img src="images/twsign.jpg" style="margin-bottom: 7px;" /></a>
						</div>
						<div id="mesagges" style="display: none;">
							<p>This is a test</p>
						</div>

						<p>
							<label for="userName">Nombre</label>
							<input id="userName" name="userName" type="text" required="required"/>
						</p>
						<p>
							<label for="userLastname">Apellido(s)</label>
							<input id="userLastname" name="userLastname" type="text" required="required"/>
						</p>
						<p>
							<label for="userEmail">Email</label>
							<input id="userEmail" name="userEmail" placeholder="info@pawhub.me" type="email" required="required" AUTOCOMPLETE=OFF />
						</p>
						<p>
							<label for="userCity">Ciudad</label>
							<input id="userCity" name="userCity" required="required" type="text"/>
						</p>

						<input class="submit" type="button" onclick="return Validar(this,1)" value="Av�senme cuando PawHub est� listo" />

					</fieldset>
				</form>

				<form id="formElem2" name="formElem2" action="mail.php" method="post" onsubmit="return Validar(this,2)">
					<fieldset class="step">
						<div id="mesagges2" style="display: none;">
							<p>This is a test</p>
						</div>
						<legend>
							Datos Personales
						</legend>
						<p>
							<label for="candidateName">Nombre</label>
							<input id="candidateName" name="candidateName" required="required" type="text" AUTOCOMPLETE=OFF />
						</p>
						<p>
							<label for="candidateLastname">Apellido(s)</label>
							<input id="candidateLastname" name="candidateLastname" required="required" type="text" AUTOCOMPLETE=OFF />
						</p>
						<p>
							<label for="candidateEmail">Email</label>
							<input id="candidateEmail" name="candidateEmail" placeholder="info@pawhub.me" required="required" type="email" AUTOCOMPLETE=OFF />
						</p>
						<p>
							<label for="candidateCity">Ciudad</label>
							<input id="candidateCity" name="candidateCity" type="text" required="required" AUTOCOMPLETE=OFF />
						</p>
						<p>
							<label for="candidateMsg" style="margin-top: 7px;">Plat�canos de ti:</label>
							<textarea id="candidateMsg" rows="2" cols="50" name="candidateMsg" required>...</textarea>
						</p>
						<p>
							<label for="candidateInterest" style="line-height: 17px; margin-top: 5px;">�Qu� te interesa de PawHub?</label>
							<textarea id="candidateInterest" rows="2" cols="50" name="candidateInterest" required>...</textarea>
						</p>
						<input class="submit" type="submit" value="Quiero ayudar" style="width: 160px!important; margin: 23px 180px;" />
					</fieldset>
				</form>
				<form id="formElem3" name="formElem3" action="" method="post">
					<fieldset class="step">
						<legend>
							�Cont�ctanos!
						</legend>
						<p>
							<a href="mailto:info@pawhub.me"><img src="images/mailico.png" alt="contacto" title="info@pawhub.me" /></a>
						</p>
						<p>
							<a href="https://www.facebook.com/PawHub" target="_blank"><img src="images/icnfb.png" alt="contacto" title="fb.com/PawHub" /></a>
						</p>
						<p>
							Revisa nuestro perfil en la plataforma para startups, <a style="color: #63C2D0; font-weight: bolder;" href="https://angel.co/pawhub" target="_blank">AngelList</a>
						</p>
					</fieldset>
				</form>

			</div>
		</div>
			
		</div>

		
	</body>
	<script>
		//Funcion que verifica campos del formulario vacios para IE y Safari
		function Validar(f, inp) {

			//verificar datos usuario
			if (inp == 1) {

				var f = document.getElementById('formElem1');

				if (f.userName.value == "") {
					$('#mesagges').css('display','block');
					$('#mesagges p').addClass('error');
					$('#mesagges p').text("Por favor escribe tu nombre");
					f.userName.focus();
					return false;
				}
				if (f.userLastname.value == "") {
					$('#mesagges').css('display','block');
					$('#mesagges p').addClass('error');
					$('#mesagges p').text("Por favor escribe tu apellido");
					f.userLastname.focus();
					return false;
				}
				if (f.userEmail.value == "") {
					$('#mesagges').css('display','block');
					$('#mesagges p').addClass('error');
					$('#mesagges p').text("Por favor escribe tu email");
					f.userEmail.focus();
					return false;
				}
				if (f.userCity.value == "") {
					$('#mesagges').css('display','block');
					$('#mesagges p').addClass('error');
					$('#mesagges p').text("Ingresa tu Ciudad");
					f.userCity.focus();
					return false;
				}

				sendValues();

			}

			if (inp == 2) {
				//verificar datos candidato
				if (f.candidateName.value == "") {
					$('#mesagges2').css('display','block');
					$('#mesagges2 p').addClass('error');
					$('#mesagges2 p').text("Por favor escribe tu nombre");
					f.candidateName.focus();
					return false;
				}
				if (f.candidateLastname.value == "") {
					$('#mesagges2').css('display','block');
					$('#mesagges2 p').addClass('error');
					$('#mesagges2 p').text("Por favor escribe tu apellido");
					f.candidateLastname.focus();
					return false;
				}
				if (f.candidateEmail.value == "") {
					$('#mesagges2').css('display','block');
					$('#mesagges2 p').addClass('error');
					$('#mesagges2 p').text("Por favor escribe tu email");
					f.candidateEmail.focus();
					return false;
				}
				if (f.candidateCity.value == "") {
					$('#mesagges2').css('display','block');
					$('#mesagges2 p').addClass('error');
					$('#mesagges2 p').text("Ingresa tu Ciudad");
					f.candidateCity.focus();
					return false;
				}
				if ((f.candidateMsg.value == "") || (f.candidateMsg.value == "...") || (f.candidateMsg.value.length == 0)) {//revisar espacios
					$('#mesagges2').css('display','block');
					$('#mesagges2 p').addClass('error');
					$('#mesagges2 p').text("���Queremos saber m�s de ti!!!");
					f.candidateMsg.focus();
					return false;
				}
				if ((f.candidateInterest.value == "") || (f.candidateInterest.value == "...") || (f.candidateInterest.value.length == 0)) {//revisar espacios
					$('#mesagges2').css('display','block');
					$('#mesagges2 p').addClass('error');
					$('#mesagges2 p').text("���Queremos saber tus intereses!!!");
					f.candidateInterest.focus();
					return false;
				}

			}

		}

		function sendValues() {
			var str;
			str = $("#formElem1").serialize();

			try {
				$.ajax({
					type : "POST",
					crossDomain : true,
					xhrFields : {
						withCredentials : false
					},
					cache : false,
					url : "http://wskrs.com/Register/PreUser?jsoncallback=?",
					data : str,
					dataType : "json",
					error : callback_error,
					success : recuperarInfo
				});
			} catch(ex) {
				$('#mesagges').css('display','block');
				$('#mesagges p').addClass('error');
				$('#mesagges p').text("Ha ocurrido un error\n"+ex.description);
				$('#mesagges2').css('display','block');
				$('#mesagges2 p').addClass('error');
				$('#mesagges2 p').text("Ha ocurrido un error\n"+ex.description);
			}


		}

		// mostramos un mensaje con la causa del problema
		function callback_error(XMLHttpRequest, textStatus, errorThrown) {
			$('#mesagges').css('display','block');
			$('#mesagges p').addClass('error');
			$('#mesagges p').text("Ha ocurrido un error al registrarte, por favor intenta nuevamente");
			$('#mesagges2').css('display','block');
			$('#mesagges2 p').addClass('error');
			$('#mesagges2 p').text('Tus datos han sido enviados.���Gracias!!!');
			alert(XMLHttpRequest + textStatus + errorThrown);
		}

		//si tiene exito recuperamos la info
		function recuperarInfo(ajaxResponse, textStatus) {
			$('#mesagges').css('display','block');
			$('#mesagges p').text('Tus datos han sido enviados.���Gracias!!!');
			$('#mesagges2').css('display','block');
			$('#mesagges2 p').text('Tus datos han sido enviados.���Gracias!!!');
			$("form").trigger('reset');
		}
	</script>

</html>