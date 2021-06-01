<?php 

function display_flash_message($sess)
{ 
    if(isset($_SESSION[$sess]))
    {  
        echo $_SESSION[$sess];
        unset($_SESSION[$sess]);
    }
}