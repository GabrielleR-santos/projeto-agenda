const button = document.getElementById('theme-toggle');
const icon = document.getElementById('theme-icon')

button.addEventListener('click', () => {
    document.body.classList.toggle('light-mode');

    if(document.body.classList.contains('light-mode')){
        icon.src= 'img/light.png';
    }else{
        icon.src= 'img/dark.png';
    }
});

setTimeout (() => {
    const erro = document.querySelector('.msg-erro');

    if(erro){
        erro.remove()
    }
}, 3500);