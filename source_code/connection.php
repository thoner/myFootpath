<?php

  $connection = mysqli_connect('localhost', 'root', '', 'myfootpath');
  if (mysqli_connect_errno()) {
    echo "UNsuccessful connection: ".mysqli_connect_error();
  }
  else
  {echo "Successful connection: ";}

?>