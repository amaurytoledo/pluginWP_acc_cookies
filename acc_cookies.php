<?php
/*
Plugin Name: Acc Cookies
Plugin URI: 
Description: Plugin para aparecer mensagem de aceitar cookies no site.
Version: 1.0
Author: Amaury Toledo       
Author URI: https://github.com/amaurytoledo
License: GPL2
*/

// Adiciona a mensagem de consentimento de cookies no rodapé
function aceitar_cookies_mensagem() {
    echo '<div id="aceitar-cookies-mensagem" style="background-color: #000; color: #fff; padding: 10px;">Este site utiliza cookies para melhorar sua experiência. Ao continuar navegando, você concorda com nossa política de cookies.<button id="aceitar-cookies-botao" style="background-color: #fff; color: #000; padding: 5px 10px; margin-left: 10px; border: none; cursor: pointer;">Aceitar</button></div>';
}

// Adiciona o script para armazenar o cookie quando o botão é clicado
function aceitar_cookies_script() {
    echo '<script>
    var botao = document.getElementById("aceitar-cookies-botao");
    botao.onclick = function() {
        document.cookie = "cookies-aceitos=true; expires=Fri, 31 Dec 9999 23:59:59 GMT; path=/";
        document.getElementById("aceitar-cookies-mensagem").style.display = "none";
    }
    </script>';
}

// Verifica se o cookie foi armazenado e exibe a mensagem ou o script
function aceitar_cookies_verifica() {
    if (!isset($_COOKIE['cookies-aceitos'])) {
        add_action('wp_footer', 'aceitar_cookies_mensagem');
        add_action('wp_footer', 'aceitar_cookies_script');
    }
}
add_action('wp', 'aceitar_cookies_verifica');
