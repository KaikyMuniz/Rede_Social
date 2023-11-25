const deslogarBtn = document.querySelector('#deslogar-btn');

deslogarBtn.addEventListener('click', Redirecionar);

function Redirecionar(){
    window.location.href = 'assets/php/Desconectar.php';
}
