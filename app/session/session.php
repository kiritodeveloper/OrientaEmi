<?php
    //Iniciar Sesi?n
    session_start();

    //Validar si se est? ingresando con sesi?n correctamente
    if (!$_SESSION)
    {
        echo '<script language = javascript>
            alert("usuario no autenticado")
            self.location = "login.php"
        </script>';
    }
    //Inicio variables de sesion
    $id = $_SESSION['id'];
    $email = $_SESSION['email'];
    $tipo = $_SESSION['tipo'];

    if($tipo=="1") // Estudiante
    {
        $val_est=Estudiantes::query()->where('email','=',$email)->get();
        $dataUser=array(
            'ciOid' => $val_est[0]["ci"],
            'nombres' => $val_est[0]["nombres"],
            'apellidos' => $val_est[0]["apellidos"],
            'telefono' => $val_est[0]["telefono"],
            'email' => $val_est[0]["email"],
            'password' => $val_est[0]["password"],
            'curso' => $val_est[0]["curso"],
            'sexo' => $val_est[0]["sexo"],
        );
    }
    elseif($tipo=="0") // Psicologia
    {
        $val_psi=Psicologia::query()->where('email','=',$email)->get();
        $dataUser=array(
            'ciOid' => $val_psi[0]["id"],
            'nombres' => $val_psi[0]["nombres"],
            'apellidos' => $val_psi[0]["apellidos"],
            'telefono' => $val_psi[0]["telefono"],
            'email' => $val_psi[0]["email"],
            'password' => $val_psi[0]["password"],
        );
    }
?>