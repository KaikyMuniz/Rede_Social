<?php
    session_start();
    $imagem_perfil = $_POST['escolher-imagem-input'];
    $nome_usuario = $_POST['user'];
    $data_nascimento = $_POST['nascimento'];

    VerificarNulos($imagem_perfil, $nome_usuario, $data_nascimento);
    function VerificarNulos(...$args) {
        foreach ($args as $value) {
            if ($value === null || $value === "") {
                $erro_campos_nulos = "Os campos não devem ser nulos";
                header("Location: ../pages/cadastro-tela-1.html?$erro_campos_nulos");
                exit;
            }
        }
    }

    VerificarCaracteres($imagem_perfil, $nome_usuario, $data_nascimento);
    function VerificarCaracteres($imagem_perfil, $nome_usuario, $data_nascimento){
        if (preg_match('/^[a-zA-Z0-9_]+$/', $nome_usuario)){
            $_SESSION['imagem_perfil_cadastro'] = $imagem_perfil;
            $_SESSION['nome_usuario_cadastro'] = $nome_usuario;
            $_SESSION['data_nascimento_cadastro'] = $data_nascimento;
            header("Location: ../pages/cadastro-tela-2.php");
            exit;
        }
        else {
            $erro_caracter = "Use apenas letras, números ou '_'";
            header("Location: ../pages/cadastro-tela-1.html?erro=$erro_caracter");
        }
    }
?>