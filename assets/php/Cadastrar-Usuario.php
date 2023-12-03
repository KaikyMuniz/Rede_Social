<?php
    session_start();
    include("conexao.php");

    $imagem_perfil = $_SESSION['imagem_perfil_cadastro'];
    $nome_usuario = $_SESSION['nome_usuario_cadastro'];
    $data_nascimento = $_SESSION['data_nascimento_cadastro'];
    $sexo = $_SESSION['sexo_cadastro'];
    $descricao = $_SESSION['descricao_cadastro'];
    $email = $_SESSION['email_cadastro'];
    $senha_hash = password_hash($_SESSION['senha_cadastro'], PASSWORD_DEFAULT);
    $seguidores = 0;
    $seguindo = 0;

    VerificarCadastro($mysqli, $nome_usuario, $data_nascimento, $sexo, 
    $descricao, $imagem_perfil, $email, $senha_hash, $seguidores, $seguindo);

    function VerificarCadastro($mysqli, $nome_usuario, $data_nascimento, $sexo, 
    $descricao, $imagem_perfil, $email, $senha_hash, $seguidores, $seguindo){
        $stmt = $mysqli->prepare
        ("INSERT INTO usuarios (nome_de_usuario, 
        data_de_nascimento, sexo, descricao, imagem_perfil, email, senha, seguidores, 
        seguindo) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)");
        
        $stmt->bind_param("sssssssii", $nome_usuario, $data_nascimento, $sexo, 
                $descricao, $imagem_perfil, $email, $senha_hash, $seguidores, $seguindo);
        
        RealizarCadastro($stmt, $mysqli);
    }

    function RealizarCadastro($stmt, $mysqli){
        if($stmt->execute()){
            unset($_SESSION['imagem_perfil_cadastro']);
            unset($_SESSION['nome_usuario_cadastro']);
            unset($_SESSION['data_nascimento_cadastro']);
            unset($_SESSION['sexo_cadastro']);
            unset($_SESSION['descricao_cadastro']);
            unset($_SESSION['email_cadastro']);
            unset($_SESSION['senha_cadastro']);
            header("Location: ../pages/login.html");
            exit;
        }else{
            echo "Erro ao inserir o cadastro ". $mysqli->error;
        }
    }

    $stmt->close();
    $mysqli->close();
?>