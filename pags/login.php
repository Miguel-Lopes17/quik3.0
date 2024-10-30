<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quikvote</title>
    <link rel="shortcut icon" type="imagex/" href="/img/globe.png">
    <!-- font-family -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&display=swap" rel="stylesheet">
    <!-- font-family -->
    <link rel="stylesheet" href="../css/login.css">

    <style>

body {
    background-color: #f7f7fc;
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

.inputsubmit {
    background-color: blueviolet;
    border: none;
    padding: 15px;
    width: 100%;
    border-radius: 10px;
    color: aliceblue;
}

.inputsubmit:hover {
    background-color: rgb(110, 32, 182);
    cursor: pointer;
}
    </style>

</head>
<body>



<a class="arrow" href="../index.php">←</a>
<form action="CheckLogin.php" method="POST">
<div class="login">
        <fieldset>
            <legend><b><h1>LOGIN</h1></b></legend>
            <input type="text" name="email" placeholder="E-mail"required>
            <br><br>
            <input type="password" name="senha" placeholder="Senha" required>
            <input class="inputsubmit" type="submit" name="submit" value="Entrar">
        </fieldset>
        
    </div>
</form>
    
</body>
</html>