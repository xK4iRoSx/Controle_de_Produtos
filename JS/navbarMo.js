function abrirMenu(){
    document.querySelector("#abrir").style.display = "none"
    document.querySelector("#fechar").style.display = "flex"
    document.querySelector('.navbarMo').style.display = "flex"
}

function fecharMenu(){
    document.querySelector("#abrir").style.display = "flex"
    document.querySelector("#fechar").style.display = "none"
    document.querySelector('.navbarMo').style.display = "none"
}