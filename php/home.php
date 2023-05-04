<?php
    session_start();

    if (isset($_SESSION['msg'])) {
        echo($_SESSION['msg'] . "<br>");
        unset($_SESSION['msg']);
    }

    echo $_SESSION['id'];
    

?>