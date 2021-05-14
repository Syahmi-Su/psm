<?php 
  include ('dbsession.php');
  if(!session_id())
  {
    session_start();
  }
  ?>