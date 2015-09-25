<?php

require'../fachadas/FLogin.php';


if (isset($_POST['login'])) {


    $fDao = new FLogin();
    echo $usuario = $_POST['user'];
    echo $contrase�a = $_POST['pass'];

    if ($fDao->validarLogin($usuario, $contrase�a)) {
        
      
       
        session_start();
        $_SESSION['user'] = $usuario;
        $mensaje = "ya esta en el sistema usuario ".$_SESSION['user'];
      

       
        
    header('location:../listado.php?mensaje=' . $mensaje);
        //header('location:../404.html');

    } else {
        $mensaje = "usuario o contrase�a incorrecta";
        header('location:../login.php?mensaje=' . $mensaje);
    }



}if (isset($_POST['login'])) {

}




/*$fachada= new FLogin();
if ($fachada->validarLogin($usuario,$contrase�a)){
    $mensaje = "ya esta en el sistema";
    header('location:../login.php?mensaje='.$mensaje);
    //header('location:../404.html');

}else{
    $mensaje = "usuario o contrase�a incorrecta";
   header('location:../login.php?mensaje='.$mensaje);
}
?>*/