


<!DOCTYPE html>
<html lang="en" id="myP">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quikvote</title>
    <link rel="shortcut icon" type="imagex/" href="/img/globe.png">
    <!-- font-family -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&display=swap" rel="stylesheet">
    <!-- -------------------------------------------------------------- -->
    <link rel="stylesheet" href="sweetalert2.min.css">
    <style>
        body {
           background-color: #f7f7fc;
            font-family: 'Comfortaa', cursive;
        }

        .arrow {
           font-size: 40px;
           margin: 0px 40px;
           font-weight: bolder;
           text-decoration: none;
           color: black;
        }

        .arrow:hover {
            color: blueviolet;
        }


        .box {
            position: absolute;
            top: 80%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(1, 1, 2, 0.9);
            padding: 15px;
            border-radius: 15px;
            width: 80vh;
            color: aliceblue;
            margin-top: 40px;
        }

        fieldset {
            border: 3px solid rgb(138, 43, 226);
        }

        legend {
            border: 1px solid blueviolet;
            padding: 10px;
            text-align: center;
            background-color: blueviolet;
            border-radius: 8px;
            
        }

        .inputbox {
            position: relative;
        }

        .inputUser {
            background: none;
            border: none;
            border-bottom: 1px solid aliceblue;
            outline: none;
            color: aliceblue;
            font-size: 15px;
            width: 100%;
            letter-spacing: 2px;
        }

        .label {
            position: absolute;
            top: 0px;
            left: 0px;
            pointer-events: none;
            transition: .5s;
        }

        .inputUser:focus ~ .label, .inputUser:valid  ~ .label {

            top: -15px;
            font-size: 14px;
            color: blueviolet;
        }

        #data_nascimento {
            border: none;
            padding: 8px;
            border-radius: 10px;
            outline: none;
            font-size: 15px;
        }

        #submit {
            background-image: linear-gradient(to right, rgb(179, 3, 233), rgb(143, 2, 185), rgb(135, 3, 175) );
            width: 100%;
            border: none;
            color: aliceblue;
            padding: 15px;
            font-size: 19px;
            cursor: pointer;
            border-radius: 10px;
        }

        #submit:hover {
            background-image: linear-gradient(to right, rgb(145, 0, 189), rgb(119, 1, 155), rgb(102, 0, 133) );
        }

        #opcoes {
            width: 120px;
            border: none;
            background: scroll;
            font-size: 15px;
            color: rgb(240, 248, 255);
            background-color: rgba(0, 0, 0, 0.4); ;
            border-radius: 5px;
            padding: 10px;
        }

        #option {
            background-color: rgba(0, 0, 0, 0.8);
            border-bottom-left-radius: 5px ;
            border-bottom-right-radius: 5px ;
        }

        

    </style>
</head>
<body>
    
<?php 
if(isset($_POST['submit'])) {
    
    include('config.php');

    $nome = ucwords(strtolower($_POST['nome']));
    $email = $_POST['email'];
    $senha = $_POST['senha']; //password_hash($_POST['senha'], PASSWORD_DEFAULT); // Hash da senha
    $sexo = $_POST['sexo'];
    $data = $_POST['data_nascimento'];
    $cidade = $_POST['cidade'];
    $estadoCivil = $_POST['EstadoCivil'];
    $rua = $_POST['rua'];
    $bairro = $_POST['bairro'];
    $numCasa = $_POST['NumCasa'];
    $telefone = $_POST['telefone'];
    $profissao = $_POST['profissao'];
    $cep = $_POST['cep'];

    // Preparar a consulta com placeholders
    $stmt = $conexao->prepare("INSERT INTO tblUsuario (usrNome, usrDataNasc, usrTelefone, usrProfissao, usrEmail, usrSenha, usrRua, usrBairro, usrNumCasa, usrCEP, usrIdCidade, usrIdEstadoCivil, usrIdSexo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    
    // Associa as variáveis aos placeholders
    $stmt->bind_param("sssssssssssss", $nome, $data, $telefone, $profissao, $email, $senha, $rua, $bairro, $numCasa, $cep, $cidade, $estadoCivil, $sexo);

    // Executa a consulta   
    if($stmt->execute()) {
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script>
            Swal.fire({
            icon: 'success',
            position: 'center',
            title: 'Cadastro realizado com sucesso!',
            showConfirmButton: true,
            timer: 5000
            }).then(() => { window.location.href = 'home.php'; });
            </script> ";
    } else {
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script>
            Swal.fire({
            icon: 'error',
            position: 'center',
            title: 'Ops! Algo deu errado! Verifique os dados digitados e tente novamente.',
            showConfirmButton: true,
            timer: 5000
            }).then(() => { window.location.href = 'login.php'; });
            </script> " . $stmt->error;
    }

    

    // Fecha a declaração
    $stmt->close();
    $conexao->close();
}
?>

    <a class="arrow" href="../index.php">←</a>

    <div class="box">
        <form action="sign.php" method="POST">
            <fieldset><legend><b>Formulário de Cadastro</b></legend>
                <br>
            <div class="inputbox">
                <input type="text" name="nome" id="name" class="inputUser" required>
                <label for="name" class="label">Nome Completo</label>
            </div>
            <br><br>
            <div class="inputbox">
                <input type="text" name="email" id="email" class="inputUser" required>
                <label for="email" class="label">E-mail</label>
            </div>
            <br><br>
            <div class="inputbox">
                <input type="password" name="senha" id="senha" class="inputUser" required>
                <label for="senha" class="label">Senha</label>
            </div>
            <br><br>
            <label for="opcoes">Sexo:</label>
                <select id="opcoes" name="sexo" required>
    
                    <option id="option" value="Nulo">Selecionar</option>
            
                    <option id="option" value="1">Masculino</option>
            
                    <option id="option" value="2">Feminino</option>

                </select>
            
                <br><br>
                
                <label for="data_nascimento"><b>Data de Nascimento:</b></label>
                <input type="date" name="data_nascimento" id="data_nascimento"  required>
                
                <br><br>
                <div class="inputbox">
                    <input type="text" name="cep" id="cep" class="inputUser" required>
                    <label for="cep" class="label">CEP</label>
                </div>
                <br><br>
                <label for="opcoes">Cidade:</label>
                <select id="opcoes" name="cidade" required>
    
                    <option id="option" value="Nulo">Selecionar</option>
            
                    <option id="option" value="1">Potim</option>
            
                    <option id="option" value="2">Guaratinguetá</option>

                    <option id="option" value="3">Aparecida</option>
                    
                </select>
            
                <br><br>
                <div class="inputbox">
                    <input type="text" name="estado" id="estado" class="inputUser" required>
                    <label for="estado" class="label">Estado</label>
                </div>
                <br><br>
                <!-- <div class="inputbox">
                    <input type="text" name="endereco" id="endereco" class="inputUser" required>
                    <label for="endereco" class="label">Endereço</label>
                </div>
                <br><br> -->
                <div class="inputbox">
                    <input type="text" name="rua" id="rua" class="inputUser" required>
                    <label for="rua" class="label">Rua</label>
                </div>
                <br><br>
                <div class="inputbox">
                    <input type="text" name="bairro" id="bairro" class="inputUser" required>
                    <label for="bairro" class="label">Bairro</label>
                </div>
                <br><br>
                <div class="inputbox">
                    <input type="text" name="NumCasa" id="NumCasa" class="inputUser" required>
                    <label for="NumCasa" class="label">Número da Casa</label>
                </div>
                <br><br>
                <label for="opcoes">Estado Civil:</label>
                <select id="opcoes" name="EstadoCivil" required>
    
                    <option id="option" value="Nulo">Selecionar</option>
            
                    <option id="option" value="1">Solteiro</option>
            
                    <option id="option" value="2">Casado</option>
            
                    <option id="option" value="3">Viúvo</option>

                    <option id="option" value="4">Divorciado</option>

                    <option id="option" value="5">Separado</option>
                </select>
                <br><br>
                <div class="inputbox">
                    <input type="text" name="telefone" id="telefone" class="inputUser" required>
                    <label for="telefone" class="label">Telefone</label>
                </div>
                <br><br>
                <div class="inputbox">
                    <input type="text" name="profissao" id="profissao" class="inputUser" required>
                    <label for="profissao" class="label">Profissão</label>
                </div>
                <br><br>
                <p style="color: #1f1ffa;">Ja possui uma Conta?<a href="login.html" style="color: #1f1ffa;"> Entrar</a></p>
                <br><br>
                <input type="submit" name="submit" id="submit">
    
            </fieldset>
        </form>
    </div>


</body>
</html>
