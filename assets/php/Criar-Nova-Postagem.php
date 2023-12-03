<?php 
    include("Negar-Acesso.php");

    $autor = $_SESSION['nome'];
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $imagem_postagem = $_POST['imagem-postagem'];

    $array_total = [$autor, $titulo, $descricao, $imagem_postagem];

    VerificarPostagem($array_total);

    function VerificarPostagem($array_total){
        foreach($array_total as $dados){
            if($dados === ''){
                echo "Preencha todos os dados!";
                exit;
            }
        }
    }
    
    VerificarNulos($array_total);
    function VerificarNulos(...$args) {
        foreach ($args as $value) {
            if ($value === null || $value === "") {
                $erro_campos_nulos = "Os campos não devem ser nulos";
                header("Location: ../pages/cadastro-tela-1.html?$erro_campos_nulos");
                exit;
            }
        }
    }

    CriarPostagem($autor, $titulo, $descricao, $imagem_postagem);

    function CriarPostagem($autor, $titulo, $descricao, $imagem_postagem){
        include("conexao.php");

        $stmt = $mysqli->prepare("INSERT INTO postagens (autor, titulo, 
        descricao, imagem_postagem) VALUES (?, ?, ?, ?)");

        $stmt->bind_param("ssss", $autor, $titulo, $descricao, $imagem_postagem);

        if($stmt->execute()){
            echo "Postagem criada!";
            exit;
        }else{
            echo "Erro na criação da postagem";
        }
        $stmt->close();
        $mysqli->close();
    }
?>