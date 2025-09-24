<?php

    if(isset($_POST['addChurch'])){
        //grabiing data
        $churchName = $_POST['add-churchName'];
        $pastorName = $_POST['add-pastorName'];
        $churchAddress = $_POST['add-churchAddress'];
        $dateOrganized = $_POST['add-dateOrganized'];
        $denomination = $_POST['add-denomination'];
        $telephoneNo = $_POST['add-telephoneNo'];
        $email = $_POST['add-email'];


        //instantiate ctrl class
        include "connection.inc.php";
        include "class.php";
        include "Ctrl.php";

        $adding = new Ctrl($churchName, $churchAddress, $dateOrganized, $denomination, $telephoneNo, $email, $pastorName);

        //handler
        $adding -> AddChurch();

        header ("location: ../Php/Displaylist/accountUI.php?AddChurch=Success");


    }


    // Add new pastors
    if(isset($_POST['addpastor'])){
        //grabiing data
        $pastorFN = $_POST['PastorFN'];
        $pastorLN = $_POST['PastorLN'];
        $pastorMN = $_POST['PastorMN'];
        $pastorContacts = $_POST['PastorContacts'];
        $pastorEmail = $_POST['PastorEmail'];
        $pastorBDAY = $_POST['PastorBDAY'];
        $pastorStatus = $_POST['PastorStatus'];
        

        //instantiate ctrl class
        include "connection.inc.php";
        include "class.php";
        include "Ctrl.php";

        $adding = new CtrlPastor($pastorFN, $pastorLN, $pastorMN , $pastorContacts, $pastorEmail, $pastorBDAY, $pastorStatus);

        //handler
        $adding -> AddPastor();

        header ("location: ../Php/Displaylist/accountUI.php?AddPastor=Success");


    }

    //add new membersszz
    

    if(isset($_POST['addMember'])){
        //grabiing data
        $memberC = $_POST['MemberC'];
        $memberFN = $_POST['MemberFN'];
        $memberLN = $_POST['MemberLN'];
        $memberMN = $_POST['MemberMN'];
        $memberContacts = $_POST['MemberCon'];
        $memberBDAY = $_POST['MemberBDAY'];
        $memberG = $_POST['MemberG'];
        $memberE = $_POST['MemberE'];
        $memberS = $_POST['MemberS'];

        //instantiate ctrl class
        include "connection.inc.php";
        include "class.php";
        include "Ctrl.php";

        $adding = new CtrlMember( $memberC, $memberFN, $memberLN , $memberMN, $memberContacts, $memberBDAY, $memberG, $memberE, $memberS);

        //handler
        $adding -> AddMember();

        header ("location: ../Php/Displaylist/accountUI.php?AddMember=Success");


    }
