<?php
    //add new Church
    if(isset($_POST['addChurch'])){
        //grabing data for churchdetails
        $churchName = $_POST['add-churchName'];
        $churchAddress = $_POST['add-churchAddress'];
        $dateOrganized = $_POST['add-dateOrganized'];
        $Sdenomination = $_POST['add-SelectDenomination'];
        $Tdenomination = $_POST['add-TypeDenomination'];
        $email = $_POST['add-email'];

        //grabing data for pastor details
        $pastorFName = $_POST['add-pastorFName'];
        $pastorMName = $_POST['add-pastorMName'];
        $pastorLName = $_POST['add-pastorLName'];
        $pastorBirthdate = $_POST['add-pastorBirthdate'];
        $pastorGender = $_POST['add-pastorGender'];
        $pastorStatus = $_POST['add-pastorStatus'];
        $pastorContact = $_POST['add-pastorContact'];
        $pastorEmail = $_POST['add-pastorEmail'];

        //grabing data for church Account
        $username = $_POST['add-username'];
        $passwordA = $_POST['add-passwordA'];
        $passwordB = $_POST['add-repassword'];
        
        $denomination = "";
        $position = "pastor";
        $password = "";
        $username = $username . "@alicf.com";

        // Denomination checker
        if($Sdenomination == "others") {
            if(!empty($Tdenomination)) { 
                $denomination = $Tdenomination;
            }else {
                $denomination = "empty";
            }
        } else {
            $denomination = $Sdenomination;
        };

        // Middle Name checker 
        if(empty($pastorMName)){
            $pastorMName = ".";
        };

        // Password Hasher
        if($passwordA == $passwordB) {
            $password = password_hash($passwordA, PASSWORD_DEFAULT);
        };


        //instantiate ctrl class
        include "connection.inc.php";
        include "class.php";
        include "Ctrl.php";

        $addC = new CtrlChurch($churchName, $churchAddress, $dateOrganized, $denomination, $email);

        $addP = new CtrlPastor($churchName, $pastorFName, $pastorMName, $pastorLName, $pastorBirthdate, $pastorGender, $pastorContact, $pastorEmail, $pastorStatus, $position);
        $addA = new CtrlAccounts($churchName, $pastorFName, $pastorMName, $pastorLName, $username, $password);


        // //handler
        $addC -> AddChurch();
        $addP -> AddPastor();
        $addA -> AddAccount();

        header ("location: ../Php/Displaylist/accountUI.php?Add=Success");

        //     echo "CHURCH:<br>". 
        //             "name:".$churchName ."<br>".
        //             "add:".$churchAddress ."<br>".
        //             "dareOrg:".$dateOrganized ."<br>".
        //             "Selected Denomination:".$Sdenomination ."<br>".
        //             "Typed Denomination:".$Tdenomination ."<br>".
        //             "Denomination:".$denomination ."<br>".
        //             "email:".$email ."<br><br>".
        //             "PASTOR<br>". 
        //             "first:".$pastorFName ."<br>".
        //             "middle:".$pastorMName ."<br>".
        //             "last:".$pastorLName ."<br>".
        //             "DOB:".$pastorBirthdate ."<br>".
        //             "gender:".$pastorGender ."<br>".
        //             "Marital Stat:".$pastorStatus ."<br>".
        //             "contact:".$pastorContact ."<br>".
        //             "email:".$pastorEmail ."<br><br>".
        //             "ACCOUNT<br>". 
        //             "username:".$username ."<br>".
        //             "pass:".$password ."<br>";


    }

    // Add new pastor
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

        header ("location: ../Php/Displaylist/accountUI.php?Add=Success");


    }

    //add new member
    if(isset($_POST['MembersAdd'])){
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

        // echo "church: " . $memberC . "<br>".
        //      "first: " . $memberFN . "<br>".
        //      "last: " . $memberLN . "<br>".
        //      "middle: " . $memberMN . "<br>".
        //      "#: " . $memberContacts . "<br>".
        //      "DOB: " . $memberBDAY . "<br>".
        //      "SEX: " . $memberG . "<br>".
        //      "@: " . $memberE . "<br>".
        //      "stat: " . $memberS . "<br>";
        // instantiate ctrl class
        include "connection.inc.php";
        include "class.php";
        include "Ctrl.php";

        $adding = new CtrlMember( $memberC, $memberFN, $memberLN , $memberMN, $memberContacts, $memberBDAY, $memberG, $memberE, $memberS);

        //handler
        $adding->AddMember();

        header ("location: ../Php/Displaylist/accountUI.php?Add=Success");


    }

    //add new account
    if(isset($_POST['addAccount'])){
        //grabiing data
        $churchA = $_POST['churchA'];
        $pastor = $_POST['pastor'];
        $usernameA = $_POST['usernameA'];
        $passwordA = $_POST['passwordA'];
        $statusA = $_POST['statusA'];

        if($churchA == 404){
            header ("location: ../Php/Displaylist/accountUI.php?error=churchNotSelected");
        }
        $usernameA = $usernameA . "@alicf.com";
        $passwordA = password_hash($passwordA, PASSWORD_DEFAULT);
        
        //instantiate ctrl class
        include "connection.inc.php";
        include "class.php";
        include "Ctrl.php";

        
        $adding = new CtrlAccounts( $churchA, $pastor, $usernameA, $passwordA, $statusA);

        //handler
        $adding->AddAccount();

        header ("location: ../Php/Displaylist/accountUI.php?Add=Success");

        // echo "Church: ". $churchA . "<br>Pastor: ". $pastor."<br>". $usernameA ."<br>".$passwordA. "<br>". $statusA;


    }



    