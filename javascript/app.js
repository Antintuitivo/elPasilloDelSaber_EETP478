const iconMenu = document.querySelector('#icon-menu'),
      menu = document.querySelector('#menu'),
      content = document.querySelector('#content-menu');

iconMenu.addEventListener('click', (e) => {

    // Añadir clase al contenedor del menu indicando su despliegue.

    // Alternamos las propiedades del icono.
    var menu_fill = iconMenu.getAttribute('fill');
    if(menu_fill == '#ffffff' && menu.getAttribute('class') == 'cont-menu active'){
        e.target.setAttribute('fill','#000000');
        menu.setAttribute('style','position: initial;');
        content.setAttribute('style','background: #666666;');
    }else{
        e.target.setAttribute('fill','#ffffff');
        menu.setAttribute('style','position: initial;');
        content.setAttribute('style','background: transparent;');
    }
    menu.classList.toggle('active');
});
/*
const register = document.querySelector('#register');
const record = document.querySelector('#record');
const tool = document.querySelector('#tool');

register.addEventListener('click', (e) => {
    window.alert(register.getAttribute('value'));
    var content = register.getAttribute('value');
});
record.addEventListener('click', (e) => {
    window.alert(record.getAttribute('value'));
    var content = record.getAttribute('value');
});
tool.addEventListener('click', (e) => {
    window.alert(tool.getAttribute('value'));
    var content = tool.getAttribute('value');
});*/