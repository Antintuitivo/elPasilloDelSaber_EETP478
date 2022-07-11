iconMenu = document.querySelector('#menu');
boxiconMenu = document.querySelector('#menu-icon');
content = document.querySelector('#menu-content');
menu = document.querySelector('#user-menu');

boxiconMenu.addEventListener('mouseover', (e) => {
    iconMenu.style.fill = '#FFFFFF';
    boxiconMenu.style.backgroundColor = '#979797';
    }, false);

boxiconMenu.addEventListener('mouseout', (e) => {
    iconMenu.style.fill = null;
    boxiconMenu.style.backgroundColor = null;
    }, false);

boxiconMenu.addEventListener('click', (e) => {
    content.classList.toggle("active");
    menu.classList.toggle("menu-active");

    }, false);


iconLogout = document.querySelector('#logout');
boxiconLogout = document.querySelector('#logout-icon')

boxiconLogout.addEventListener('mouseover', (e) => {
    boxiconLogout.style.borderColor = '#F3F3F3';
    boxiconLogout.style.backgroundColor = '#323232';
    }, false);

boxiconLogout.addEventListener('mouseout', (e) => {
    boxiconLogout.style.borderColor = null;
    boxiconLogout.style.backgroundColor = null;
    }, false);

//Session detroy trigger.
boxiconLogout.addEventListener('click', (e) =>{
    iconLogout.style.fill = '#000000';
    boxiconLogout.style.backgroundColor = '#D9D9D9';
    boxiconLogout.href ='#';
        if (window.XMLHttpRequest)
            {// code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
        }
        else
            {// code for IE6, IE5
                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }
        xmlhttp.open("GET","../php/header/closer.php",false);
        xmlhttp.send();
    }, false)