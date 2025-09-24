<?php
// this is control for renewal

class renewalf extends renewalC{

    private $fname ;
    private $mname;
    private $lname ;
    private $churchN;
    private $rname;
    private $rcontacts;
    private $rage;
    private $r1name;
    private $r1contacts;
    private $r1age;

    public function __construct ($fname, $mname, $lname, $churchN, 
            $rname, $rcontacts, $rage, $r1name, $r1contacts, $r1age){
        
        $this->fname = $fname;
        $this->mname = $mname;
        $this->lname = $lname;
        $this->churchN = $churchN;
        $this->rname = $rname;
        $this->rcontacts = $rcontacts;
        $this->rage = $rage;
        $this->r1name = $r1name;
        $this->r1contacts = $r1contacts;
        $this->r1age = $r1age;
    }
    
    public function insertData(){

        if ($this->emptyInputs() == false ) {
            // echo empty input
            header("Location: ../Php/Displaylist/renewal.php?error=emptyinput");
            exit();
        }

        if ($this->checkAllData() == false ) {
            // echo empty input
            header("Location: ../Php/Displaylist/renewal.php?error=emptydata");
            exit();
        }  
       
        $this->setDatas($this->fname, $this->mname, $this->lname, $this->churchN, $this->rname
        , $this->rcontacts, $this->rage, $this->r1name, $this->r1contacts, $this->r1age);
    }

    private function emptyInputs(){
        $result;
        if(empty($this->fname) || empty($this->mname) || empty($this->lname) || empty($this->churchN) ||
           empty($this->rname) || empty($this->rcontacts) || empty($this->rage) || empty($this->r1name) ||
           empty($this->r1contacts) || empty($this->r1age)){
        $result = false;
        }
        else{
        $result = true;
        }
        return $result;

    }

    private function checkAllData(){
        $result;
        if (!$this->checkData($this->fname, $this->mname, $this->lname, $this->churchN)) {
            $result = true;
        }else{
            $result = false;
        }
        return $result;
    }
}