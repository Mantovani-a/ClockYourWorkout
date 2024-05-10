<?php
session_start();
require('conexao.php');
// Consulta SQL para verificar se o email e senha correspondem a um usuário
        $sql = "SELECT * FROM usuarios WHERE email = :email AND senha = :senha";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(':email' => $email, ':senha' => $senha));
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            // Login bem-sucedido, redirecionar para página de boas-vindas
            $_SESSION["email"] = $email;
            header("Location: inicio.php");
            exit();
        } else {
            // Login falhou, exibir mensagem de erro
            $error = "Email ou senha incorretos.";
        }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ClockYourWorkout - Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar">
        <div class="container">
            <h1>ClockYourWorkout</h1>
        </div>
    </nav>
    <div class="background">
        <div class="login-container">
            <div class="login-box">
                <h2>Login</h2>
                <form action="#">
                    <div class="input-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="input-group">
                        <label for="password">Senha:</label>
                        <input type="password" id="password" name="password" required>
                    </div>
                    <button type="submit">Entrar</button>
                </form>
            </div>
        </div>
    </div>

    <footer>
        <span>Criado por 
          <a>@Gabriel Alexandre</a>
          <a>@Nicolas Mantovani</a>
          <a>@Raphael Dantas</a>
          <a>@Victor Nunes</a>
        </span>
      </footer>
    </body>
    </html>
</body>
</html>
