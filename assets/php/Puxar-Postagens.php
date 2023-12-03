<?php
    $sql_codigo = "SELECT autor, titulo, descricao, imagem_postagem FROM postagens";
    $resultado = $mysqli->query($sql_codigo);
    function PuxarPostagens($mysqli, $resultado){
        if($resultado->num_rows > 0){
            while($row = $resultado->fetch_assoc()){
                $nome = $row["autor"];
                $titulo = $row["titulo"];
                $descricao = $row["descricao"];
                $imagem_postagem = $row["imagem_postagem"];
                $sql_codigo_autor = "SELECT imagem_perfil FROM usuarios WHERE nome_de_usuario = '$nome'";
                $resultado_imagem_perfil = $mysqli->query($sql_codigo_autor);
            
                if ($resultado_imagem_perfil) {
                    $row = $resultado_imagem_perfil->fetch_assoc();
                    $imagem_perfil = $row['imagem_perfil'];
                } else {
                    echo "Erro na consulta: " . $mysqli->error;
                }

                echo 
                "<div class='postagem'>
                    <span class='postagem-organizacao'>
                        <img class='perfil-imagem' src='assets/image/perfil/$imagem_perfil' alt='Pessoa-Imagem'>
                        <div class='organizar-data'>
                            <label>$nome</label>
                            <br>
                            <label>01/12/2023</label>
                        </div>
                    </span>
                        <div class='postagem-imagem'>
                            <h3>$titulo</h3>
                            <p>
                                $descricao
                            </p>
                            <img class='postagem-imagem-img' src='assets/image/postagem/$imagem_postagem' alt='Postagem-Imagem'>
                            <br>
                            <span class='interacoes-postagens'>
                                <img id='like' class='like-imagem' src='assets/image/icon/like.png' alt='like'>
                                <img id='deslike' class='deslike-imagem' src='assets/image/icon/deslike.png' alt='deslike'>
                                <img id='comentario' class='comentario-imagem' src='assets/image/icon/comentario.png' alt='comentario'>
                                <img id='denuncia' class='denuncia-imagem' src='assets/image/icon/denunciar.png' alt='denunciar'>
                            </span>
                        </div>
                </div>
                <p></p>";
            }
        }
    }
?>