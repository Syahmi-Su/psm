<?php

    if(!session_id())
    {
        session_start();
    }

    if (isset($_SESSION['c_ic']) != session_id())
    {
         header('Location: Index.php');
    }
?>