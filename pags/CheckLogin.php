<?php 
    session_start();
    // print_r($_REQUEST); //Traz as informações do login
    if(isset($_POST['submit']) && !empty($_POST['email']) &&!empty($_POST['senha']) ){
        
    
       //Caso a senha exista ele acessa
    include('config.php');
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        // print_r('Email: '.$email);
        // print_r('<br>');
        // print_r('Senha: '.$senha);

        $sql = "SELECT * FROM tblUsuario WHERE usrEmail = '$email' AND usrSenha = '$senha'";
        $result = $conexao -> query($sql);
        
        // print_r($sql);
        // print_r($result);

    if(mysqli_num_rows($result) <1) {

        unset($_SESSION['email']);
        unset($_SESSION['email']);

        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script>
            Swal.fire({
            icon: 'error',
            position: 'center',
            title: 'Cadastro realizado com sucesso!',
            showConfirmButton: true,
            timer: 5000 }).then(() => { window.location.href = 'login.php'; });
            </script>";

        // header('Location: login.php');
    }else {

        $_SESSION['email'] = $email;
        $_SESSION['senha'] = $senha;
        header('Location: home.php');
    }
    

            //Caso não exista ele redireciona para a página de login
    }

?>


