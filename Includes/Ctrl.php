<?php
// ADD CTRLS
    class CtrlChurch extends ClassChurch{

        private $churchName; // church details
        private $churchAddress;
        private $dateOrganized;
        private $denomination;
        private $email;

        public function __construct($churchName, $churchAddress, $dateOrganized, $denomination, $email) {
            // church details
            $this->churchName = $churchName;
            $this->churchAddress = $churchAddress;
            $this->dateOrganized = $dateOrganized;
            $this->denomination = $denomination;
            $this->email = $email;
            // // account details
            // $this->username = $username;
            // $this->password = $password;
        }

        public function AddChurch() {

            if ($this -> emptyInput() == false) {
                header ("location: ../Php/Displaylist/accountUI.php?error=emptyInput");
                exit(); 
            }

            if ($this -> invalidEmail() == false) {
                header ("location: ../Php/Displaylist/accountUI.php?error=invalidEmail");
                exit();
            }

            if ($this -> checkDataExistence() == false) {
                header ("location: ../Php/Displaylist/accountUI.php?error=churchNameAlreadyExist");
                exit();
            }

            $this -> setChurch($this->churchName, $this->churchAddress, $this->dateOrganized, $this->denomination, $this->email);
        }


        private function emptyInput() {
            $result;
            if(empty($this->churchName)|| empty($this->churchAddress)|| empty($this->dateOrganized)|| empty($this->denomination)|| empty($this->email)) {
                $result = false;
            }else{
                $result = true;
            }
            return $result;
        }

        private function invalidEmail() {
            $result;
            if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
                $result = false;
            }else{
                $result = true;
            }
            return $result;
        }

        private function checkDataExistence() {
            $result;
            if(!$this -> checkData($this -> churchName)) {
                $result = false;
            }else{
                $result = true;
            }
            return $result;
        }
        
    }

    class CtrlPastor extends ClassPastor{

        private $churchName;
        private $pastorFName; // pastor details
        private $pastorMName;
        private $pastorLName;
        private $pastorBirthdate;
        private $pastorGender;
        private $pastorContact;
        private $pastorEmail;
        private $pastorStatus;
        private $position;

        public function __construct($churchName, $pastorFName, $pastorMName, $pastorLName, $pastorBirthdate, $pastorGender, $pastorContact, $pastorEmail, $pastorStatus, $position) {

            $this->churchName = $churchName;
            $this->pastorFName = $pastorFName;
            $this->pastorMName = $pastorMName;
            $this->pastorLName = $pastorLName;
            $this->pastorBirthdate = $pastorBirthdate;
            $this->pastorGender = $pastorGender;
            $this->pastorContact = $pastorContact;
            $this->pastorEmail =  $pastorEmail;
            $this->pastorStatus =  $pastorStatus;
            $this->position =  $position;
            
        }

        public function AddPastor() {
            
            if ($this -> emptyInput() == false) {
                header ("location: ../Php/Displaylist/accountUI.php?error=emptyInput");
                exit(); 
            }

            if ($this -> invalidEmail() == false) {
                header ("location: ../Php/Displaylist/accountUI.php?error=invalidEmail");
                exit();
            }

            if ($this -> checkDataExistence() == false) {
                header ("location: ../Php/Displaylist/accountUI.php?error=churchNameAlreadyExist");
                exit();
            }
            
            $this->setPastor($this->churchName, $this->pastorFName, $this->pastorLName, $this->pastorMName,  $this->pastorBirthdate, $this->pastorGender, $this->pastorContact, $this->pastorEmail, $this->pastorStatus, $this->position);
        }

        private function emptyInput() {
            $result;
            if(empty($this->churchName)|| empty($this->pastorFName)|| empty($this->pastorLName)|| empty($this->pastorBirthdate)|| empty($this->pastorGender)|| empty($this->pastorContact)|| empty($this->pastorEmail)|| empty($this->position)) {
                $result = false;
            }else{
                $result = true;
            }
            return $result;
        }

        private function invalidEmail() {
            $result;
            if(!filter_var($this->pastorEmail, FILTER_VALIDATE_EMAIL)) {
                $result = false;
            }else{
                $result = true;
            }
            return $result;
        }
        
        private function checkDataExistence() {
            $result;
            if(!$this -> checkData($this->pastorFName, $this->pastorMName, $this->pastorLName)) {
                $result = false;
            }else{
                $result = true;
            }
            return $result;
        }
    }

    class CtrlAccounts extends ClassAccounts{

        private $churchName;  // Church
        private $pastorFName; // Pastor
        private $pastorMName; // Pastor
        private $pastorLName; // Pastor
        private $username; 
        private $password;
        

        public function __construct($churchName, $pastorFName, $pastorMName, $pastorLName, $username, $password) {
            $this->churchName = $churchName;
            $this->pastorFName = $pastorFName;
            $this->pastorMName = $pastorMName;
            $this->pastorLName = $pastorLName;
            $this->username = $username;
            $this->password = $password;
            
        }

        public function AddAccount() {
            
            if ($this->emptyInput() == false) {
                header ("location: ../Php/Displaylist/accountUI.php?error=emptyInput");
                exit(); 
            }

            if ($this->invalidEmail() == false) {
                header ("location: ../Php/Displaylist/accountUI.php?error=invalidEmail");
                exit();
            }

            if ($this->checkDataExistence() == false) {
                header ("location: ../Php/Displaylist/accountUI.php?error=AccountNameAlreadyExist");
                exit();
            }

            $this->setACCOUNTS( $this->churchName, $this->pastorFName, $this->pastorMName, $this->pastorLName, $this->username, $this->password);
        }

        private function emptyInput() {
            $result;
            if(empty($this->churchName)|| empty($this->pastorFName)|| empty($this->pastorLName)|| empty($this->username)|| empty($this->password)) {
                $result = false;
            }else{
                $result = true;
            }
            return $result;
        }

        private function invalidEmail() {
            $result;
            if(!filter_var($this->username, FILTER_VALIDATE_EMAIL)) {
                $result = false;
            }else{
                $result = true;
            }
            return $result;
        }
        
        private function checkDataExistence() {
            $result;
            if(!$this -> checkData($this->username)) {
                $result = false;
            }else{
                $result = true;
            }
            return $result;
        }
        
    }

    class CtrlMember extends ClassMember{

      
        private $memberC;
        private $memberFN;
        private $memberLN;
        private $memberMN;
        private $memberContacts;
        private $memberBDAY;
        private $memberG;
        private $memberE;
        private $memberS;
        

        public function __construct($memberC, $memberFN, $memberLN , $memberMN, $memberContacts, $memberBDAY, $memberG, $memberE, $memberS) {
            $this->memberC = $memberC;
            $this->memberFN = $memberFN;
            $this->memberLN = $memberLN;
            $this->memberMN = $memberMN;
            $this->memberContacts = $memberContacts;
            $this->memberBDAY =  $memberBDAY;
            $this->memberG =  $memberG;
            $this->memberE =  $memberE;
            $this->memberS =  $memberS;
            
        }

        public function AddMember() {

            if ($this -> emptyInput() == false) {
                header ("location: ../Php/Displaylist/accountUI.php?error=emptyInput");
                exit(); 
            }

            if ($this -> invalidEmail() == false) {
                header ("location: ../Php/Displaylist/accountUI.php?error=invalidEmail");
                exit();
            }

            if ($this -> checkDataExistence() == false) {
                header ("location: ../Php/Displaylist/accountUI.php?error=memberNameAlreadyExist");
                exit();
            }

            $this->setMember( $this->memberC, $this->memberFN, $this->memberLN, $this->memberMN, $this->memberBDAY, $this->memberG, $this->memberContacts, $this->memberE, $this->memberS);
        }

        private function emptyInput() {
            $result;
            if(empty($this->memberC)|| empty($this->memberFN)||empty($this->memberLN)|| empty($this->memberContacts)|| empty($this->memberBDAY)|| empty($this->memberG)|| empty($this->memberE)|| empty($this->memberS)) {
                $result = false;
            }else{
                $result = true;
            }
            return $result;
        }

        private function invalidEmail() {
            $result;
            if(!filter_var($this->memberE, FILTER_VALIDATE_EMAIL)) {
                $result = false;
            }else{
                $result = true;
            }
            return $result;
        }
        
        private function checkDataExistence() {
            $result;
            if(!$this -> checkData($this->memberFN, $this->memberLN, $this->memberMN)) {
                $result = false;
            }else{
                $result = true;
            }
            return $result;
        }
        
    }


// UPDATE CTRLS
    class CtrlChurchUpdate extends ClassChurchUpdate{

        private $churchName;
        private $churchAddress;
        private $dateOrganized;
        private $denomination;
        private $email;
        private $churchID;

        public function __construct($churchName, $churchAddress, $dateOrganized, $denomination, $email, $churchID) {
            $this->churchName = $churchName;
            $this->churchAddress = $churchAddress;
            $this->dateOrganized = $dateOrganized;
            $this->denomination = $denomination;
            $this->email = $email;
            $this->churchID = $churchID;
        }

        public function UpdateChurch() {

            if ($this -> emptyInput() == false) {
                header ("location: ../Php/Displaylist/accountUI.php?error=emptyInput");
                exit(); 
            }

            if ($this -> invalidEmail() == false) {
                header ("location: ../Php/Displaylist/accountUI.php?error=invalidEmail");
                exit();
            }

            if ($this -> checkDataExistence() == false) {
                header ("location: ../Php/Displaylist/accountUI.php?error=churchNameAlreadyExist");
                exit();
            }

            $this -> setChurch($this->churchName, $this->churchAddress, $this->dateOrganized, $this->denomination, $this->email, $this->churchID);
        }

        private function emptyInput() {
            $result;
            if(empty($this->churchName)|| empty($this->churchAddress)|| empty($this->dateOrganized)|| empty($this->denomination)|| empty($this->email)|| empty($this->churchID)) {
                $result = false;
            }else{
                $result = true;
            }
            return $result;
        }

        private function invalidEmail() {
            $result;
            if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
                $result = false;
            }else{
                $result = true;
            }
            return $result;
        }
        
        private function checkDataExistence() {
            $result;
            if(!$this -> checkData($this -> churchID)) {
                $result = false;
            }else{
                $result = true;
            }
                return $result;
        }





        
    }

    class CtrlPastorUpdate extends ClassPastorUpdate{

        private $pastorFN;
        private $pastorLN;
        private $pastorMN;
        private $pastorContacts;
        private $pastorEmail;
        private $pastorBDAY;
        private $Pgender;
        private $pastorStatus;
        private $pastorID;
        

        public function __construct($lname, $fname, $mname, $Pcontacts, $Pemail, $Pbday, $Pgender, $Pstatus, $pastorID) {
            $this->pastorFN = $fname;
            $this->pastorLN = $lname;
            $this->pastorMN = $mname;
            $this->pastorContacts = $Pcontacts;
            $this->pastorEmail = $Pemail;
            $this->pastorBDAY =  $Pbday;
            $this->Pgender =  $Pgender;
            $this->pastorStatus =  $Pstatus;
            $this->pastorID =  $pastorID;
            
        }

        public function UpdatePastor() {

            if ($this -> emptyInput() == false) {
                header ("location: ../Php/Displaylist/accountUI.php?error=emptyInput");
                exit(); 
            }

            if ($this -> invalidEmail() == false) {
                header ("location: ../Php/Displaylist/accountUI.php?error=invalidEmail");
                exit();
            }

            if ($this -> checkDataExistence() == true) {
                header ("location: ../Php/Displaylist/accountUI.php?error=PastorAlreadyExist");
                exit();
            }

            $this->setPastor($this->pastorFN, $this->pastorLN, $this->pastorMN, $this->pastorBDAY,$this->Pgender, $this->pastorContacts, $this->pastorEmail,  $this->pastorStatus, $this->pastorID);
        }

        private function emptyInput() {
            $result;
            if(empty($this->pastorFN)|| empty($this->pastorLN)|| empty($this->pastorContacts)|| empty($this->pastorEmail)|| empty($this->pastorBDAY)|| empty($this->Pgender)|| empty($this->pastorStatus)|| empty($this->pastorID)) {
                $result = false;
            }else{
                $result = true;
            }
            return $result;
        }

        private function invalidEmail() {
            $result;
            if(!filter_var($this->pastorEmail, FILTER_VALIDATE_EMAIL)) {
                $result = false;
            }else{
                $result = true;
            }
            return $result;
        }
        
        private function checkDataExistence() {
            $result;
            if(!$this -> checkData($this->pastorID)) {
                $result = false;
            }else{
                $result = true;
            }
                return $result;
        }

        
    }

    class CtrlMemberUpdate extends ClassMemberUpdate{

      
        private $church;
        private $memberFN;
        private $memberLN;
        private $memberMN;
        private $memberBDAY;
        private $memberG;
        private $memberContacts;
        private $memberE;
        private $memberS;
        // private $memberP;
        private $memberID;
        

        public function __construct($churchName, $fname, $lname, $mname,  $bd, $sex, $contact, $email, $status, $memberID) {
            $this->church = $churchName;
            $this->memberFN = $fname;
            $this->memberLN = $lname;
            $this->memberMN = $mname;
            $this->memberBDAY =  $bd;
            $this->memberG =  $sex;
            $this->memberContacts = $contact;
            $this->memberE =  $email;
            $this->memberS =  $status;
            // $this->memberP =  $position;
            $this->memberID =  $memberID;
            
        }

        public function UpdateMember() {

            if ($this -> emptyInput() == false) {
                header ("location: ../Php/Displaylist/accountUI.php?error=emptyInput");
                exit(); 
            }

            if ($this -> invalidEmail() == false) {
                header ("location: ../Php/Displaylist/accountUI.php?error=invalidEmail");
                exit();
            }

            if ($this -> checkDataExistence() == false) {
                header ("location: ../Php/Displaylist/accountUI.php?error=MemberAlreadyExist");
                exit();
            }

            $this->setPastor($this->memberFN, $this->memberLN, $this->memberMN, $this->memberBDAY, $this->memberG, $this->memberContacts, $this->memberE, $this->memberS, $this->memberID);
        }

        private function emptyInput() {
            $result;
            if(empty($this->memberFN)||empty($this->memberLN)|| empty($this->memberBDAY)|| empty($this->memberG)|| empty($this->memberContacts)|| empty($this->memberE)|| empty($this->memberS)|| empty($this->memberID)) {
                $result = false;
            }else{
                $result = true;
            }
            return $result;
        }

        private function invalidEmail() {
            $result;
            if(!filter_var($this->memberE, FILTER_VALIDATE_EMAIL)) {
                $result = false;
            }else{
                $result = true;
            }
            return $result;
        }
        
        private function checkDataExistence() {
            $result;
            if(!$this -> checkData($this->memberID)) {
                $result = false;
            }else{
                $result = true;
            }
                return $result;
        }

    }

    class CtrlAccountUpdate extends ClassAccountUpdate{

        private $username;
        private $church;
        private $pastor;
        private $status;
        private $accID;
        
        public function __construct($username, $church, $pastor, $status, $accID) {
            $this->username = $username;
            $this->church = $church;
            $this->pastor = $pastor;
            $this->status = $status;
            $this->accID = $accID;
            
        }

        public function UpdateAccount() {

            if ($this -> emptyInput() == false) {
                header ("location: ../Php/Displaylist/accountUI.php?error=emptyInput");
                exit(); 
            }

            // if ($this -> invalidEmail() == false) {
            //     header ("location: ../Php/Displaylist/accountUI.php?error=invalidEmail");
            //     exit();
            // }

            if ($this -> checkDataExistence() == true) {
                header ("location: ../Php/Displaylist/accountUI.php?error=AccountAlreadyExist");
                exit();
            }

            $this->setPastor($this->church, $this->pastor, $this->username, $this->status, $this->accID);
        }

        private function emptyInput() {
            $result;
            if(empty($this->username)||empty($this->church)|| empty($this->pastor)|| empty($this->status)|| empty($this->accID)) {
                $result = false;
            }else{
                $result = true;
            }
            return $result;
        }

        private function invalidEmail() {
            $result;
            if(!filter_var($this->username, FILTER_VALIDATE_EMAIL)) {
                $result = false;
            }else{
                $result = true;
            }
            return $result;
        }
        
        private function checkDataExistence() {
            $result;
            if(!$this -> checkData($this->username)) {
                $result = false;
            }else{
                $result = true;
            }
                return $result;
        }

    }