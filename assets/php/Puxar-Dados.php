<?php
    include("conexao.php");
    session_start();

    if(isset($_SESSION['nome'])){
        $nome_usuario = $_SESSION['nome'];
        $classe_login = naoExibirLogin();
        $classe_nao_logado = "";  
        $sql_codigo_autor = "SELECT imagem_perfil FROM usuarios WHERE nome_de_usuario = '$nome_usuario'";
        $resultado_imagem_perfil = $mysqli->query($sql_codigo_autor); 
        if ($resultado_imagem_perfil) {
            $row = $resultado_imagem_perfil->fetch_assoc();
            $imagem_perfil = $row['imagem_perfil'];
            $imagem_perfil = "assets/image/perfil/$imagem_perfil";

        } else {
            echo "Erro na consulta: " . $mysqli->error;
        }
    }else{
        $nome_usuario = "Visitante";
        $imagem_perfil = "assets/image/perfil/visitante.png";
        $classe_login = exibirLoginCabecalho(); 
        $classe_nao_logado = naoExibirDeslogar();    
    }

    function exibirLoginCabecalho(){
        return "";
    }

    function naoExibirLogin(){
        return "ocultar-login";
    }

    function naoExibirDeslogar(){
        return "ocultar-deslogar";
    }
?>