<?php
    SESSION_START();
        unset($_SESSION['user']);
    SESSION_DESTROY();
    header("Location: ../Php/Displaylist/index.php");