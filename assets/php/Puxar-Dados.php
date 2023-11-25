<?php
    include("conexao.php");
    session_start();

    if(isset($_SESSION['nome'])){
        $nome_usuario = $_SESSION['nome'];
        $classe_login = naoExibirLogin();
        $imagem_perfil = "assets/image/perfil/foto de perfil (teste).jpg";
        $classe_nao_logado = "";  
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