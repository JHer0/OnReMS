<?php
// Add Burial Application Request
if(isset($_POST["addBurial"])){
   
   //grabbing data of applicant
  $a_fname = $_POST["App-fname"];
  $a_mname = $_POST["App-mname"];
  $a_lname = $_POST["App-lname"];
  $relation = $_POST["AppConnection"];
  $address1 = $_POST["AppAddress"];
  $age1 = $_POST["AppAge"];
  $contact1 = $_POST["AppContact"];

  $d_fname = $_POST["fname_dec"];
  $d_mname = $_POST["mname_dec"];
  $d_lname = $_POST["lname_dec"];
  $d_address = $_POST["dec_address"];
  $churchName = $_POST["church_name"];
  $d_DOB = $_POST["born-on"];
  $d_DOD = $_POST["died-on"];
  $d_internment = $_POST["t_Internment"];
  $burial_place = $_POST["burial_place"];

  if($churchName == 'NULL'){
    $churchName = NULL;
  }

  //Instantiate transferal class
  include "connection.inc.php";
  include "form-class.php";
  include "form-ctrl.php";

  $obj = new AddBurialCtrl($a_fname, $a_mname, $a_lname, $relation ,$address1, $age1, $contact1, $d_fname, $d_mname, $d_lname, $d_address, $churchName, $d_DOB, $d_DOD, $d_internment, $burial_place);
  $check = new checkMemberCtrl($d_fname, $d_mname, $d_lname, $d_DOB);
  //$payment = new AddpaymentIDCtrl();

  // handlers
  $obj->insertData();
  $check -> updateData();


  //Going back to the main page
  header("Location: ../Php/Displaylist/accountUI.php?Add=Success!");
}

// Add Transferal Application Reques
if(isset($_POST["addTransferal"])){
   
  //grabbing data of applicant
  $a_fname = $_POST["App-fname"];
  $a_mname = $_POST["App-mname"];
  $a_lname = $_POST["App-lname"];
  $relation = $_POST["AppConnection"];
  $address1 = $_POST["AppAddress"];
  $age1 = $_POST["AppAge"];
  $contact1 = $_POST["AppContact"];

  $d_fname = $_POST["fname_dec"];
  $d_mname = $_POST["mname_dec"];
  $d_lname = $_POST["lname_dec"];
  $d_DOB = $_POST["born-on"];
  $churchName = $_POST["church_name"];


  //Instantiate transferal class
  include "connection.inc.php";
  include "form-class.php";
  include "form-ctrl.php";

    $obj = new AddTransferCtrl($a_fname, $a_mname, $a_lname, $relation ,$address1, $age1, $contact1, $d_fname, $d_mname, $d_lname, $churchName);
    $check = new checkMemberCtrl($d_fname, $d_mname, $d_lname, $d_DOB);

    // handlers
    $obj->insertData();
    $check -> updateData();

    // Going back to the main page
    header("Location: ../Php/Displaylist/accountUI.php?success=appformTransfer");

   //for testing
    //  echo 
    //    "Applicant Name:". 
    //    "<br>First : " . $a_fname .
    //    "<br>Middle : " . $a_mname .
    //    "<br>Last : " . $a_lname .
    //    "<br>Relation : " . $relation .
    //    "<br>Address : " . $address1 .
    //    "<br>Age : " . $age1 .
    //    "<br>Contact : " . $contact1 .

    //    "<br>Desceased Name:". 
    //    "<br>First : " . $d_fname .
    //    "<br>Middle : " . $d_mname .
    //    "<br>Last : " . $d_lname .
    //    "<br>churchName : " . $churchName
    //  ;

}

// Add Renewal Application Reques
if(isset($_POST["addRenewal"])){
   
  //grabbing data of applicant
 $a_fname = $_POST["App-fname"];
 $a_mname = $_POST["App-mname"];
 $a_lname = $_POST["App-lname"];
 $relation = $_POST["AppConnection"];
 $address1 = $_POST["AppAddress"];
 $age1 = $_POST["AppAge"];
 $contact1 = $_POST["AppContact"];

 $d_fname = $_POST["fname_dec"];
 $d_mname = $_POST["mname_dec"];
 $d_lname = $_POST["lname_dec"];
 $d_address = $_POST["dec_address"];
 $d_DOB = $_POST["born-on"];
 $d_DOD = $_POST["died-on"];
 $d_internment = $_POST["t_Internment"];


 //Instantiate transferal class
 include "connection.inc.php";
 include "form-class.php";
 include "form-ctrl.php";

 $obj = new AddBurialCtrl($a_fname, $a_mname, $a_lname, $relation ,$address1, $age1, $contact1, $d_fname, $d_mname, $d_lname, $d_address, $d_DOB, $d_DOD, $d_internment);

 // handlers
 $obj->insertData();

 // Going back to the main page
 header("Location: ../Php/Displaylist/accountUI.php?appformburial=success!");

   //for testing
     // echo 
     //   "Applicant Name:". 
     //   "<br>First : " . $a_fname .
     //   "<br>Middle : " . $a_mname .
     //   "<br>Last : " . $a_lname .
     //   "<br>Relation : " . $relation .
     //   "<br>Address : " . $address1 .
     //   "<br>Age : " . $age1 .
     //   "<br>Contact : " . $contact1 .

     //   "Desceased Name:". 
     //   "<br>First : " . $d_fname .
     //   "<br>Middle : " . $d_mname .
     //   "<br>Last : " . $d_lname .
     //   "<br>Address : " . $d_address .
     //   "<br>DOB : " . $d_DOB .
     //   "<br>DOD : " . $d_DOD .
     //   "<br>Internment D/T : " . $d_internment 
     // ;

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
  $requestID = $_POST["set-requestID"];
  $Receipt = $_POST["set-Receipt"];
  $Date = $_POST["set-Date"];

  //Instantiate transferal class
  include "connection.inc.php";
  include "form-class.php";
  include "form-ctrl.php";
  
  $transfers = new AddPaymentCtrl($requestID, $Receipt, $Date);

  // handlers
  $transfers->AddPayment();

  // Going back to the main page
  header("Location: ../Php/Displaylist/accountUI.php?success=paymentAdded");

  //   for testing
  //  echo $requestID . "<br>".
  //  $Receipt . "<br>".
  //  $Date . "<br>";
    

}