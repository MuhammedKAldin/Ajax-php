<?php
    // Validating Request method
    if($_POST) {

        if($_POST["name"] != 'test')
        {
            session_start();
            $_SESSION['name_error'] = $_POST["name"];
        } else {
            session_start();
            $_SESSION['name_success'] = "Passed all tests !";
        }

        header('Location: http://localhost/ajax-php/');
        
    }

?>