<?php

	include $url."/models/database.php";//Se incluye la clase para manejar la base de datos
	$msg="";//Este es un mensaje para notificar al usuario que ingreso datos incorrectos

	if($_SERVER["REQUEST_METHOD"] == "POST") {
              
        $myusername = ($_POST['nick']);//Guardamos los datos del usuario para el inicio de session
        $mypassword = ($_POST['pass']);

        $db = new Database();//Se instancia la clase para manejar la base de datos
        if($db->login($myusername,$mypassword)){//LLamamos a la funcion que verifica los datos del usuario
        	//En caso de ser positivo, se redirigira a la pagina principal y se almacenara el usuario en la session
        	//header("Location: ".$url."/views/modules/main.php");
        	$_SESSION['user'] = $myusername;
            header("Location: index.php");//Se refresca la pagina para cargar el main

        }
        elseif(empty($myusername) or empty($mypassword)){
        	//En caso de no ingresar ningun valor al formulario, se mostrara un mensaje de error
        	$msg="<font color='blue'>Ingrese sus datos</font>";
        }
        else{
        	//En caso de ingresar datos incorrectos, se mostrara un mensaje de error
        	$msg="<font color='red'>Usuario y/o Contraseña incorrectos</font>";
        }
    }

?>
<!DOCTYPE html>
<html>
<head>
	<title>Inicio de Sesión</title>
	<?php include $url."/views/cabeceras.php" ?><!-- Se incluye el documento que añade las importaciones de estilo y demas -->
</head>
<body>
	<div class="content custom-scrollbar">

        <div id="login" class="p-8">

            <div class="form-wrapper md-elevation-8 p-8">

                <div class="logo bg-secondary">
                    <span>F</span>
                </div>

                <div class="title mt-4 mb-8">Ingresa a tu cuenta</div>

                <form name="loginForm" novalidate action = "" method = "post">

                    <div class="form-group mb-4">
                        <input name="nick" type="text" class="form-control" id="loginFormInputEmail" aria-describedby="emailHelp" placeholder=" " />
                        <label for="loginFormInputEmail">Nick</label>
                    </div>

                    <div class="form-group mb-4">
                        <input name="pass" type="password" class="form-control" id="loginFormInputPassword" placeholder="Password" />
                        <label for="loginFormInputPassword">Contraseña</label>
                    </div>

                    <div id="msg" class="form-group mb-4" align="center">
                    	<?php echo $msg; $msg="" //En caso de que el usuario ingrese datos erroneos, se mostrara un mesnaje?>
                    </div>

                    <div class="remember-forgot-password row no-gutters align-items-center justify-content-between pt-4">

                        <div class="form-check remember-me mb-4">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" aria-label="Remember Me" />
                                <span class="checkbox-icon"></span>
                                <span class="form-check-description">Recordar</span>
                            </label>
                        </div>

                        <a href="#" class="forgot-password text-secondary mb-4">Olvide mi contraseña</a>
                    </div>

                    <button type="submit" class="submit-button btn btn-block btn-secondary my-4 mx-auto" aria-label="LOG IN">
                        Iniciar
                    </button>

                </form>

                <div class="separator">
                    <span class="text">O</span>
                </div>

                <button type="submit" class="google btn btn-block btn-secondary my-2 mx-auto" aria-label="LOG IN">
                    <span>
                        <i class="icon-google-plus s-4"></i>
                        <span>Inicia con Google</span>
                    </span>
                </button>

                <button type="submit" class="facebook btn btn-block btn-secondary my-2 mx-auto" aria-label="LOG IN">
                    <span>
                        <i class="icon-facebook s-4"></i>
                        <span>Inicia con Facebook</span>
                    </span>
                </button>

                <div class="register d-flex flex-column flex-sm-row align-items-center justify-content-center mt-8 mb-6 mx-auto">
                    <span class="text mr-sm-2">¿No tienes una cuenta?</span>
                    <a class="link text-secondary" href="pages-auth-register.html">Registrate</a>
                </div>

            </div>
        </div>

    </div>
</body>
</html>