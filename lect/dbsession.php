<?php

    if(!session_id())
    {
        session_start();
    }

    if (isset($_SESSION['lectID']) != session_id())
    {
        echo "error";
    }
?>