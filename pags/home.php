<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../css/home.css">
    <!-- font-family -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&display=swap" rel="stylesheet">
    <!-- font-family -->
    <title>QuikVote</title>

    
</head>
<body>

    <?php 
    
    session_start();

    include('config.php');

    if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) {
        
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location: login.php');

       
        
        $stmt = $pdo->prepare("SELECT usrNome FROM tblUsuario WHERE usrEmail = 'email");
        $stmt->bindParam(':email', $logado);
        $stmt->execute();
        
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($usuario) {
            $nome = $usuario['usrNome']; 
        } else {
            echo "Erro: usuário não encontrado!";
            exit();
        }
    }
    
    $logado = $_SESSION['email'];

    ?>
    
    <nav class="navbar">
        <div class="logo">
            <h1 style="color: #8e2de9; font-size:30px; margin-top: 20px;">QUIKVOTE</h1>
        </div>
        <ul id="menuList">
            <li><a class="hover" href="home.php">Início</a></li>
            <li><a class="hover" href="#">Criar Votação</a></li>
            <li><a class="hover" href="#">Votações</a></li>
            <li><a class="hover" href="#">Sobre</a></li>
        </ul>

        <div class="conta">
        <p>Olá, <?php echo($logado); ?></p>
            <a  href="logout.php"><i class="bi bi-box-arrow-in-left"></i></a>
        </div>


        <div class="menu-icon">
            <i class="bi bi-list" onclick="toggleMenu()"></i>
        </div>
    </nav>
    <script>
        let menuList = document.getElementById("menuList");
        menuList.style.maxHeight = "0px";

        function  toggleMenu() {
            if(menuList.style.maxHeight == "0px")
            {
                menuList.style.maxHeight = "300px"
            }else {
                menuList.style.maxHeight = "0px"
            }
            
        }
    </script>

    <header>
    <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h1>Olá, <?php echo($logado);?></h1>
                        </div>
                        <div class="card-body">
                            <h3>Seja bem-vindo ao sistema de votação QuikVote!</h3>
                            <p>Participe de votações e ajude a decidir
                                o que é mais legal. É rápido e divertido!
                                Vote agora e mostre o que você pensa!</p>
                        </div>
                        <div class="card-footer">
                            <a style="text-decoration: none;" href="criarEnquete.php" class="btn btn-primary">Criar Votação</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main>
        
    </main>


</body>
</html>