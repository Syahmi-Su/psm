<?php

    if(!session_id())
    {
        session_start();
    }

    if (isset($_SESSION['studMatric']) != session_id())
    {
         header('Location: Index.php');
    }
?>