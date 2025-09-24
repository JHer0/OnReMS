<?php

if(isset($_POST["submit"])){
   
     //grabbing data
    $fname = $_POST["fname"];
    $mname = $_POST["mname"];
    $lname = $_POST["lname"];
    $churchN = $_POST["church-n"];
    $rname = $_POST["rname"];
    $rcontacts = $_POST["rcontacts"];
    $rage = $_POST["rage"];
    $r1name = $_POST["r1name"];
    $r1contacts = $_POST["r1contacts"];
    $r1age = $_POST["r1age"];

    //Instantiate transferal class
    include "connection.inc.php";
    include "form-class.php";
    include "form-ctrl.php";
    $transfers = new Ctrl($fname, $mname, $lname, $churchN, 
                    $rname, $rcontacts, $rage, $r1name, $r1contacts, $r1age);

    // handlers
    $transfers->TransferalInsertData();

    // Going back to the main page
        header("Location: ../Php/Displaylist/index.php?appformbTranferal=success!");

}