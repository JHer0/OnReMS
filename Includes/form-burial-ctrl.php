<?php
// this is control for BURIAL
class AddBurialCtrl extends AddBurialClass{

    private $fname ;
    private $mname;
    private $lname ;
    private $address;
    private $churchN;
    private $bornOn;
    private $diedOn;
    private $tdate;
    private $tTime;
    private $status;
    private $appID;

    public function __construct ($fname, $mname, $lname, $address ,$churchN, 
    $bornOn, $diedOn, $tdate, $tTime, $status, $appID){
        
        $this->fname = $fname;
        $this->mname = $mname;
        $this->lname = $lname;
        $this->address = $address;
        $this->churchN = $churchN;
        $this->bornOn = $bornOn;
        $this->diedOn = $diedOn;
        $this->tdate = $tdate;
        $this->tTime = $tTime;
        $this->status = $status;
        $this->appID = $appID;
    }

    public function insertData(){

        if ($this->emptyInputs() == false ) {
            // echo empty input
            header("Location: ../Php/Displaylist/burial.php?error=emptyinput");
            exit();
        }
        if ($this->checkAllData() == true ) {
            // echo empty input
            header("Location: ../Php/Displaylist/burial.php?error=dataExist");
            exit();
        } 
        $this->setDatas($this->churchN, $this->fname, $this->mname, $this->lname, $this->address, $this->bornOn, $this->diedOn, $this->tdate, $this->tTime, $this->appID, $this->status);
   
    }

    private function checkAllData(){
        $result;
        if (!$this->checkData($this->fname, $this->mname, $this->lname, $this->address, $this->bornOn, $this->diedOn, $this->tdate, $this->tTime)) {
            $result = true;
        }else{
            $result = false;
        }
        return $result;
    }


    private function emptyInputs(){
        $result;
        if(empty($this->fname) || empty($this->mname) || empty($this->lname) || empty($this->address) ||
           empty($this->churchN) || empty($this->bornOn) || empty($this->diedOn) || empty($this->tdate) ||
           empty($this->tTime)){
        $result = false;
        }
        else{
            $result = true;
        }
        return $result;

    }
   
}

class VerifyBurialCtrl extends VerifyBurialClass{

    private $burialID;
    private $status;

    public function __construct ($burialID, $status){
        
        $this->burialID = $burialID;
        $this->status = $status;
    }

    public function VerifyData(){

        if ($this->emptyInputs() == false ) {
            // echo empty input
            header("Location: ../Php/Displaylist/burial.php?error=emptyinput");
            exit();
        }
        if ($this->checkAllData() == true ) {
            // echo empty input
            header("Location: ../Php/Displaylist/burial.php?error=dataExist");
            exit();
        } 
        $this->setDatas($this->status, $this->burialID);
   
    }

    private function checkAllData(){
        $result;
        if (!$this->checkData($this->status, $this->burialID)) {
            $result = true;
        }else{
            $result = false;
        }
        return $result;
    }


    private function emptyInputs(){
        $result;
        if(empty($this->burialID) || empty($this->status)){
        $result = false;
        }
        else{
            $result = true;
        }
        return $result;

    }
   
}

class AddPaymentBurialCtrl extends AddPaymentBurialClass{

    private $burialID;
    private $Receipt;
    private $Date;
    private $payment;

    public function __construct ($burialID, $Receipt, $Date, $payment){
        
        $this->burialID = $burialID;
        $this->Receipt = $Receipt;
        $this->Date = $Date;
        $this->payment = $payment;
    }

    public function AddBurialPayment(){

        if ($this->emptyInputs() == false ) {
            // echo empty input
            header("Location: ../Php/Displaylist/burial.php?error=emptyinput");
            exit();
        }
        if ($this->checkAllData() == false ) {
            // echo empty input
            header("Location: ../Php/Displaylist/accountUI.php?error=doesNotExist");
            exit();
        } 
        $this->setDatas($this->Receipt, $this->Date, $this->burialID);
   
    }

    private function checkAllData(){
        $result;
        if (!$this->checkData($this->burialID)) {
            $result = true;
        }else{
            $result = false;
        }
        return $result;
    }


    private function emptyInputs(){
        $result;
        if(empty($this->burialID) || empty($this->Receipt) || empty($this->Date) || empty($this->payment)){
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