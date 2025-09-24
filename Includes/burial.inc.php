<?php
// Add burial Form
if(isset($_POST["addBurial"])){
   
   //grabbing data
  $fname = $_POST["fname_dec"];
  $mname = $_POST["mname_dec"];
  $lname = $_POST["lname_dec"];
  $address = $_POST["address"];
  $churchN = $_POST["church_name"];
  $bornOn = $_POST["born-on"];
  $diedOn = $_POST["died-on"];
  $tdate = $_POST["t_date"];
  $tTime = $_POST["t_time"];

  $status = "pending";
  $appID = 1;

  //Instantiate transferal class
  include "connection.inc.php";
  include "form-burial-class.php";
  include "form-burial-ctrl.php";
  $transfers = new AddBurialCtrl($fname, $mname, $lname, $address ,$churchN, 
                  $bornOn, $diedOn, $tdate, $tTime, $status, $appID);

  // handlers
  $transfers->insertData();

  // Going back to the main page
      header("Location: ../Php/Displaylist/accountUI.php?appformburial=success!");

    //for testing
    //   echo $fname . "-fname<br>".
    //   $mname . "-mname<br>".
    //   $lname . "-lname<br>".
    //   $address . "-add<br>".
    //   $churchN . "-churchID<br>".
    //   $bornOn . "-birthdate<br>".
    //   $diedOn . "-deathDate<br>".
    //   $tdate . "-TD<br>".
    //   $tTime . "-TT<br>".
    //   $status . "-stat<br>";

}

// church - Verify
if(isset($_POST["verifyBurial"])){
   
    //grabbing data
   $burialID = $_POST["burialID"];
    //    $burialName = $_POST["burialName"];
   
 
   $status = "verified";
 
   //Instantiate transferal class
   include "connection.inc.php";
   include "form-burial-class.php";
   include "form-burial-ctrl.php";
   $transfers = new VerifyBurialCtrl($burialID, $status);
 
   // handlers
   $transfers->VerifyData();
 
   // Going back to the main page
       header("Location: ../Php/Displaylist/accountUI.php?appFormBurial=verify!");
 
     //for testing
    //    echo $burialID . "<br>".
    //    $burialName . "<br>".
    //    $status . "<br>";
      
 
}

// chairsec/admin - Add payment
if(isset($_POST["AddPayment"])){
   
  //grabbing data
 $burialID = $_POST["set-burialID"];
 $Receipt = $_POST["set-Receipt"];
 $Date = $_POST["set-Date"];

 $payment = 1;

 //Instantiate transferal class
 include "connection.inc.php";
 include "form-burial-class.php";
 include "form-burial-ctrl.php";
 $transfers = new AddPaymentBurialCtrl($burialID, $Receipt, $Date, $payment);

 // handlers
 $transfers->AddBurialPayment();

 // Going back to the main page
header("Location: ../Php/Displaylist/accountUI.php?appFormBurial=Paid");

//   for testing
//  echo $burialID . "<br>".
//  $Receipt . "<br>".
//  $Date . "<br>".
//  $payment . "<br>";
    

}