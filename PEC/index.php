<?php
    $user = array(array("ceccpro","pokis1214","pablo","pokis1214@gmail.com"), array("1214","1234","1111","1214"));
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login - EcoLink</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow p-4" style="min-width: 500px;">
            <h2 class="text-center mb-4">🌱 Inicia Sesión 🌱</h2>
            <?php
                if($_SERVER["REQUEST_METHOD"] == "POST"){
                    if((isset($_POST["username"])) && (isset($_POST["pass"])) && ($_POST["username"] != null) && ($_POST["pass"] != null)){
                        $username = $_POST["username"];
                        $pass = $_POST["pass"];
                        $parsedUsername = $username;
                        $parsedPass = $pass;
                        $i = 0;
                        foreach($user[0] as $name){
                            if($name == $parsedUsername){ 
                                if($user[1][$i] == $parsedPass){
                                    header("Location: catalogo.php");
                                    exit;
                                }
                            } else {
                                $i++;
                            }
                        }
                    }
                }
            ?>
            <form method="POST" action="">
                <div class="mb-3">
                    <label for="username" class="form-label">Nombre de usuario</label>
                    <input type="text" name="username" id="username" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="pass" class="form-label">Contraseña</label>
                    <input type="password" name="pass" id="pass" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success w-100">Iniciar sesión</button>
            </form>
        </div>
    </div>
</body>
</html>
