<?php
    include("conexao.php");

    $user = $_POST['user'];
    $password = $_POST['senha'];

    if (filter_var($user, FILTER_VALIDATE_EMAIL)) {
        $stmt = $mysqli->prepare("SELECT id, nome, senha FROM usuarios WHERE email = ?");
        $stmt->bind_param("s", $user);
    } else {
        $stmt = $mysqli->prepare("SELECT id, nome, senha FROM usuarios WHERE nome = ?");
        $stmt->bind_param("s", $user);
    }

    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows == 1){
        $usuario = $result->fetch_assoc();
        if(password_verify($password, $usuario['senha'])){
            session_start();
            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];
            header("Location: ../../index.php");
            exit();
        }else{
            echo "Senha incorreta";
        }
    }else{
        echo "Nenhum usuário encontrado";
    }
    $stmt->close();
    $mysqli->close();
?>