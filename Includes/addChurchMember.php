<?php

    if(isset($_POST['submit'])){
        //grabiing data
        $churchName = $_POST['add-churchName'];
        $pastorName = $_POST['add-pastorName'];
        $churchAddress = $_POST['add-churchAddress'];
        $dateOrganized = $_POST['add-dateOrganized'];
        $denomination = $_POST['add-denomination'];
        $telephoneNo = $_POST['add-telephoneNo'];
        $faxNo = $_POST['add-faxNo'];
        $email = $_POST['add-email'];


        //instantiate ctrl class
        include "connection.inc.php";
        include "class.php";
        include "Ctrl.php";

        $adding = new Ctrl($churchName, $churchAddress, $dateOrganized, $denomination, $telephoneNo, $faxNo, $email, $pastorName);

        //handler
        $adding -> AddChurch();

        header ("location: ../Php/Displaylist/accountUI.php?error=none");


    }
    else {
        echo "no data";
    }