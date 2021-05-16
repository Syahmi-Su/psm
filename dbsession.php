<?php

    if(!session_id())
    {
        session_start();
    }

    if (isset($_SESSION['adminID']) != session_id())
    {
         echo "error";
    }
?>