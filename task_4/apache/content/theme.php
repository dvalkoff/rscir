<?php
const session_login = 'login';
const session_theme = 'theme';
const session_enlarged_font = 'font';

function set_theme(): void
{
    if (isset($_SESSION[session_theme]) and $_SESSION[session_theme]) {
        echo <<< DARK_THEME
        <style>
            body { 
                background-color: darkslategray !important;
                color: white !important; 
            }
            a {
                color: white;
            }
        </style>
        DARK_THEME;
    }
}

function set_enlarged_font(): void
{
    if (isset($_SESSION[session_enlarged_font]) and $_SESSION[session_enlarged_font]) {
        echo <<< ENLARGED_FONT
        <style>
            body {
                font-size: xx-large; !important;
            }
            table {
                font-size: xx-large; !important;
            }
        </style>
        ENLARGED_FONT;
    }
}

set_theme();
set_enlarged_font();