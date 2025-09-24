<?php
if(isset($_POST['AccountUpdate'])){
    //grabiing data
    $accID = $_POST['accountID'];
    $username = $_POST['edit-acc-username'];
    $churchName = $_POST['the-churchName'];
    $UpdateChurch = $_POST['UpdateChurch'];
    $pastorName = $_POST['the-pastorName'];
    $updatePas = $_POST['updatePas'];
    $status = $_POST['edit-acc-status'];

    if($UpdateChurch != 404) {
        $church = $UpdateChurch;
    }else {
        $churchName = explode("-", $churchName);
        $church = $churchName[0];
    };

    if($updatePas != 404) {
        $pastor = $updatePas;
    }else {
        $pastorName = explode("-", $pastorName);
        $pastor = $pastorName[0];
    };

     echo$accID,"<br>username: ". $username . 
     "<br>churchName: " .$church. 
     "<br>pastorID : " .$pastor.
     "<br>Status : " .$status. "<br>";
    // instantiate ctrl class
    // include "connection.inc.php";
    // include "class.php";
    // include "Ctrl.php";

    //  $adding = new CtrlAccountUpdate($username, $church, $pastor, $status, $accID);

    // // //handler
    // $adding -> UpdateAccount();

    // header ("location: ../Php/Displaylist/accountUI.php?Update=Success");


}

if(isset($_POST['ChurchUpdate'])){
    //grabiing data
    $churchID = $_POST['churchID'];
    $churchName = $_POST['edit-churchName'];
    $churchAddress = $_POST['edit-churchAddress'];
    $dateOrganized = $_POST['edit-dateOrganized'];
    $denomination = $_POST['edit-denomination'];
    $email = $_POST['edit-email'];

    //  echo $churchID."<br>". $churchName . 
    //  "<br>" .$churchAddress. 
    //  "<br>" .$dateOrganized.
    //  "<br>" .$denomination.
    // "<br>"  .$email;
    //instantiate ctrl class
    include "connection.inc.php";
    include "class.php";
    include "Ctrl.php";

    $adding = new CtrlChurchUpdate($churchName, $churchAddress, $dateOrganized, $denomination, $email, $churchID);

    //handler
    $adding -> UpdateChurch();

    header ("location: ../Php/Displaylist/accountUI.php?Update=Success");


}

if(isset($_POST['PastorUpdate'])){
    //grabiing data
    $pastorID = $_POST['pastorID'];
    $Pname = $_POST['edit-Pname'];
    $Pcontacts = $_POST['edit-Pcontacts'];
    $Pemail = $_POST['edit-Pemail'];
    $Pbday = $_POST['edit-Pbday'];
    $Pgender = $_POST['edit-Pgender'];
    $Pstatus = $_POST['edit-Pstatus'];

    $Pname = explode(",", $Pname);
    $lname = $Pname[0];
    $fname = $Pname[1];
    $mname = $Pname[2];

    //   echo $pastorID."<br>". $lname . 
    //      "<br>" .$fname. 
    //      "<br>" .$mname.
    //      "<br>" .$Pcontacts.
    //      "<br>" .$Pemail.
    //      "<br>" .$Pbday.
    //      "<br>" .$Pgender.
    //     "<br>"  .$Pstatus;
    // instantiate ctrl class
    include "connection.inc.php";
    include "class.php";
    include "Ctrl.php";

    $adding = new CtrlPastorUpdate($lname, $fname, $mname, $Pcontacts, $Pemail, $Pbday, $Pgender, $Pstatus, $pastorID);

    //handler
    $adding -> UpdatePastor();

    header ("location: ../Php/Displaylist/accountUI.php?Update=Success");


}

if(isset($_POST['MemberUpdate'])){
        //grabiing data
        $churchName = $_POST['edit-ChurchN'];
        $name = $_POST['edit-MemberN'];
        $contact = $_POST['edit-MemberC'];
        $bd = $_POST['edit-MemberB'];
        $sex = $_POST['edit-MemberG'];
        $email = $_POST['edit-MemberE'];
        $status = $_POST['edit-MemberS'];
        //$position = $_POST['edit-MemberP'];
        $memberID = $_POST['memberID'];

        $name = explode(",", $name);
        $lname = $name[0];
        $fname = $name[1];
        $mname = $name[2];


        //   echo $memberID."<br>".$churchName."<br>". $lname . 
        //  "<br>" .$fname. 
        //  "<br>" .$mname.
        //  "<br>" .$contact.
        //  "<br>" .$bd.
        //  "<br>" .$sex.
        //  "<br>" .$email.
        // "<br>"  .$status.
        // "<br>" .$position;

        //instantiate ctrl class
        include "connection.inc.php";
        include "class.php";
        include "Ctrl.php";

        $adding = new CtrlMemberUpdate($churchName, $fname, $lname, $mname,  $bd, $sex, $contact, $email, $status, $memberID);

        //handler
        $adding -> UpdateMember();

        header ("location: ../Php/Displaylist/accountUI.php?Update=Success");


}

