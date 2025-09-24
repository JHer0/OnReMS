<?php

// for checking if Desceased is a member or not
class checkMemberCtrl extends checkMemberClass{

    private $d_fname;
    private $d_mname;
    private $d_lname;
    private $d_DOB;
    

    public function __construct ($d_fname, $d_mname, $d_lname, $d_DOB){
        
        $this->d_fname = $d_fname;
        $this->d_mname = $d_mname;
        $this->d_lname = $d_lname;
        $this->d_DOB = $d_DOB;
       
    }

    public function updateData(){

        if ($this->emptyInputs() == false ) {
            // echo empty input
            header("Location: ../Php/Displaylist/burial.php?error=emptyinput");
            exit();
        }

        if ($this->checkAllData() == false ) {
            $this->setnonmember($this->d_fname, $this->d_mname, $this->d_lname, $this->d_DOB);

        }else{

            $this->setMember($this->d_fname, $this->d_mname, $this->d_lname, $this->d_DOB);
        } 
        
   
    }

    private function checkAllData(){
        $result;
        if (!$this->checkData($this->d_fname, $this->d_mname, $this->d_lname)) {
            $result = true;
        }else{
            $result = false;
        }
        return $result;
    }


    private function emptyInputs(){
        $result;
        if(EMPTY($this->d_fname) || EMPTY($this->d_lname)){
        $result = false;
        }
        else{
            $result = true;
        }
        return $result;

    }
   
}

// Updates in payment table
class AddPaymentCtrl extends AddPaymentClass{

    private $requestID;
    private $Receipt;
    private $Date;
    private $valueBTM;
    private $valueBTNM;
    private $valueTTM;

    public function __construct ($requestID, $Receipt, $Date){
        
        $this->requestID = $requestID;
        $this->Receipt = $Receipt;
        $this->Date = $Date;
        $this->valueBTM = 5000;
        $this->valueBTNM = 10000;
        $this->valueTTM = 2500;
        $this->valueTTNM = 5000;
    }

    public function AddPayment(){

        if ($this->emptyInputs() == false ) {
            // echo empty input
            header("Location: ../Php/Displaylist/burial.php?error=emptyinput");
            exit();
        }
        if ($this->checkAllData() == "BTM" ) {
            // echo empty input
            $this->SetPayment($this->Receipt, $this->Date, $this->valueBTM, $this->requestID);
            $this->AddCemetery($this->Receipt, $this->Date, $this->requestID);
            
        } else if ($this->checkAllData() == "BTNM" ) { 
            $this->SetPayment($this->Receipt, $this->Date, $this->valueBTNM, $this->requestID);
            $this->AddCemetery($this->Receipt, $this->Date, $this->requestID);

        } else if ($this->checkAllData() == "TTM" ) { 
            $this->SetPayment($this->Receipt, $this->Date, $this->valueTTM, $this->requestID);
            $this->AddOssuary($this->Receipt, $this->Date, $this->requestID);
        } else if ($this->checkAllData() == "TTNM" ) { 
            $this->SetPayment($this->Receipt, $this->Date, $this->valueTTNM, $this->requestID);
            $this->AddOssuary($this->Receipt, $this->Date, $this->requestID);
            $this->UpdateCemetery($this->Receipt, $this->Date, $this->requestID);
        } else {
            header("Location: ../Php/Displaylist/accountUI.php?error=paymentforRequestIDDoesNotExist");
            exit();

        }
   
    }

    private function checkAllData(){
        $result;
        if (!$this->BTMcheck($this->requestID)) {
            $result = "BTM";
        }else if (!$this->BTNMcheck($this->requestID)){
            $result = "BTNM";
        }else if (!$this->TTMcheck($this->requestID)){
            $result = "TTM";
        }else if (!$this->TTNMcheck($this->requestID)){
            $result = "TTNM";
        }
        return $result;
    }


    private function emptyInputs(){
        $result;
        if(empty($this->requestID) || empty($this->Receipt) || empty($this->Date)){
        $result = false;
        }
        else{
            $result = true;
        }
        return $result;

    }
   
}

class AddCemeteryCtrl extends AddCemeteryClass{

    private $requestID;
    private $Receipt;
    private $Date;

    public function __construct ($requestID, $Receipt, $Date){
        
        $this->requestID = $requestID;
        $this->Receipt = $Receipt;
        $this->Date = $Date;
    }

    public function AddPayment(){

        if ($this->emptyInputs() == false ) {
            // echo empty input
            header("Location: ../Php/Displaylist/burial.php?error=emptyinput");
            exit();
        }
        if ($this->checkAllData() == false ) {
            // echo empty input
            header("Location: ../Php/Displaylist/accountUI.php?error=paymentforRequestIDDoesNotExist");
            exit();
        } 
        $this->setDatas($this->Receipt, $this->Date, $this->requestID);
   
    }

    private function checkAllData(){
        $result;
        if (!$this->checkData($this->requestID)) {
            $result = true;
        }else{
            $result = false;
        }
        return $result;
    }


    private function emptyInputs(){
        $result;
        if(empty($this->requestID) || empty($this->Receipt) || empty($this->Date)){
        $result = false;
        }
        else{
            $result = true;
        }
        return $result;

    }
   
}

// APPLICATION REQUEST - BURIAL
class AddBurialCtrl extends AddBurialClass{

    private $a_fname;
    private $a_mname;
    private $a_lname ;
    private $relation;
    private $address1;
    private $age1;
    private $contact1;
    private $d_fname;
    private $d_mname;
    private $d_lname;
    private $d_address;
    private $churchName; 
    private $d_DOB; 
    private $d_DOD; 
    private $d_internment;
    private $burial_place;

    public function __construct ($a_fname, $a_mname, $a_lname, $relation ,$address1, $age1, $contact1, $d_fname, $d_mname, $d_lname, $d_address, $churchName, $d_DOB, $d_DOD, $d_internment, $burial_place){
        
        $this->a_fname = $a_fname;
        $this->a_mname = $a_mname;
        $this->a_lname = $a_lname;
        $this->relation = $relation;
        $this->address1 = $address1;
        $this->age1 = $age1;
        $this->contact1 = $contact1;
        $this->d_fname = $d_fname;
        $this->d_mname = $d_mname;
        $this->d_lname = $d_lname;
        $this->d_address = $d_address; 
        $this->churchName = $churchName; 
        $this->d_DOB = $d_DOB; 
        $this->d_DOD = $d_DOD; 
        $this->d_internment = $d_internment;
        $this->burial_place = $burial_place;
    }

    public function insertData(){

        if ($this->emptyInputs() == false ) {
            // echo empty input
            header("Location: ../Php/Displaylist/burial.php?error=emptyinput");
            exit();
        }

        // if ($this->checkAllData() == true ) {
        //     header("Location: ../Php/Displaylist/burial.php?error=dataExist");
        //     exit();
        // } 
        
        // checking if churchName is empty or not
        if($this->churchName == NULL){
            // adding new RequestID
            $this->setDatas($this->a_fname, $this->a_mname, $this->a_lname, $this->relation, $this->address1, $this->age1, $this->contact1, $this->d_fname, $this->d_mname, $this->d_lname, $this->d_address,  $this->d_DOB, $this->d_DOD, $this->d_internment,$this->burial_place );

            // setting paymentID for the new RequestID
            $this->setPayment($this->a_fname, $this->a_mname, $this->a_lname, $this->relation, $this->address1, $this->age1, $this->contact1, $this->d_fname, $this->d_mname, $this->d_lname, $this->d_address, $this->d_DOB, $this->d_DOD, $this->d_internment);
        }
        else {
            // adding new RequestID
            $this->setAllData($this->a_fname, $this->a_mname, $this->a_lname, $this->relation, $this->address1, $this->age1, $this->contact1, $this->d_fname, $this->d_mname, $this->d_lname, $this->d_address, $this->churchName, $this->d_DOB, $this->d_DOD, $this->d_internment,$this->burial_place );

             // setting paymentID for the new RequestID
            $this->setPayment($this->a_fname, $this->a_mname, $this->a_lname, $this->relation, $this->address1, $this->age1, $this->contact1, $this->d_fname, $this->d_mname, $this->d_lname, $this->d_address, $this->d_DOB, $this->d_DOD, $this->d_internment);
        }
      
       
        
    }

    private function checkAllData(){
        $result;
        if (!$this->checkData($this->d_fname, $this->d_mname, $this->d_lname)) {
            $result = true;
        }else{
            $result = false;
        }
        return $result;
    }


    private function emptyInputs(){
        $result;
        if(EMPTY($this->a_fname) || EMPTY($this->a_lname) || EMPTY($this->relation) || EMPTY($this->address1) || EMPTY($this->age1) || EMPTY($this->contact1) || EMPTY($this->d_fname) || EMPTY($this->d_lname) || EMPTY($this->d_address) || EMPTY($this->d_DOB) || EMPTY($this->d_DOD) || EMPTY($this->d_internment)){
        $result = false;
        }
        else{
            $result = true;
        }
        return $result;

    }
   
}
// APPLICATION REQUEST - TRANSFER
class AddTransferCtrl extends AddTransferClass{

    private $a_fname;
    private $a_mname;
    private $a_lname ;
    private $relation;
    private $address1;
    private $age1;
    private $contact1;
    private $d_fname;
    private $d_mname;
    private $d_lname;
    private $churchName;

    public function __construct ($a_fname, $a_mname, $a_lname, $relation ,$address1, $age1, $contact1, $d_fname, $d_mname, $d_lname, $churchName){
        
        $this->a_fname = $a_fname;
        $this->a_mname = $a_mname;
        $this->a_lname = $a_lname;
        $this->relation = $relation;
        $this->address1 = $address1;
        $this->age1 = $age1;
        $this->contact1 = $contact1;
        $this->d_fname = $d_fname;
        $this->d_mname = $d_mname;
        $this->d_lname = $d_lname;
        $this->churchName = $churchName;
    }

    public function insertData(){

        if ($this->emptyInputs() == false ) {
            // echo empty input
            header("Location: ../Php/Displaylist/burial.php?error=emptyinput");
            exit();
        }

        if ($this->checkAllData() == false ) {
            header("Location: ../Php/Displaylist/transferal.php?error=dataDoesExist");
            exit();
        } 
        
        // adding new RequestID
        $this->setDatas($this->a_fname, $this->a_mname, $this->a_lname, $this->relation, $this->address1, $this->age1, $this->contact1, $this->d_fname, $this->d_mname, $this->d_lname, $this->churchName);

        // setting paymentID for the new RequestID
        $this->setPayment($this->a_fname, $this->a_mname, $this->a_lname, $this->relation, $this->address1, $this->age1, $this->contact1, $this->d_fname, $this->d_mname, $this->d_lname, $this->churchName);
   
    }

    private function checkAllData(){
        $result;
        if (!$this->checkData($this->d_fname, $this->d_mname, $this->d_lname)) {
            $result = true;
        }else{
            $result = false;
        }
        return $result;
    }


    private function emptyInputs(){
        $result;
        if(EMPTY($this->a_fname) || EMPTY($this->a_lname) || EMPTY($this->relation) || EMPTY($this->address1) || EMPTY($this->age1) || EMPTY($this->contact1) || EMPTY($this->d_fname) || EMPTY($this->d_lname) || EMPTY($this->churchName)){
        $result = false;
        }
        else{
            $result = true;
        }
        return $result;

    }
   
}


// this is control for RENEWAL
class AddRenewalCtrl extends AddRenewalClass{

    private $fname ;
    private $mname;
    private $lname ;
    private $churchN;
    private $bornOn;
    private $diedOn;
    private $status;
    private $appID;

    public function __construct ($fname, $mname, $lname, $churchN, 
    $bornOn, $diedOn, $status, $appID){
        
        $this->fname = $fname;
        $this->mname = $mname;
        $this->lname = $lname;
        $this->churchN = $churchN;
        $this->bornOn = $bornOn;
        $this->diedOn = $diedOn;
        $this->status = $status;
        $this->appID = $appID;
    }

    public function insertData(){

        if ($this->emptyInputs() == false ) {
            // echo empty input
            header("Location: ../Php/Displaylist/burial.php?error=emptyinput");
            exit();
        }
        if ($this->checkAllData() == false ) {
            // echo empty input
            header("Location: ../Php/Displaylist/burial.php?error=dataExist");
            exit();
        } 
        $this->setDatas($this->appID, $this->status, $this->fname, $this->mname, $this->lname,$this->churchN);
   
    }

    private function checkAllData(){
        $result;
        if (!$this->checkData($this->fname, $this->mname, $this->lname, $this->bornOn, $this->diedOn)) {
            $result = true;
        }else{
            $result = false;
        }
        return $result;
    }


    private function emptyInputs(){
        $result;
        if(empty($this->fname) || empty($this->mname) || empty($this->lname) || empty($this->churchN) || empty($this->bornOn) || empty($this->diedOn)){
        $result = false;
        }
        else{
            $result = true;
        }
        return $result;

    }
   
}