<?php 

// for checking if Desceased is a member or not
class checkMemberClass extends Dbh{

    // Setting classification to `member`
    protected function setMember($d_fname, $d_mname, $d_lname, $d_DOB){
        $stmt = $this->connect()->prepare(
            'UPDATE `requestform` SET `classification` = "member" WHERE `d_fname` = ? AND `d_mname` = ? AND `d_lname` = ?  AND `dateOfBirth` = ?');
    
        if (!$stmt->execute(array($d_fname, $d_mname, $d_lname, $d_DOB))) {
            $stmt = null;
            header("Location: ../Php/Displaylist/burial.php?error=setMemberDataStmtfailed");
        exit();
        }
    $stmt = null;
    }
    // adding desceased name to nonmember_tbl
    protected function setnonmember($d_fname, $d_mname, $d_lname, $d_DOB){
        $stmt = $this->connect()->prepare(
            'INSERT INTO `nonmember` (`nm_fname`, `nm_mname`, `nm_lname`, `nm_DOB`) VALUES (?, ?, ?, ?);');
    
        if (!$stmt->execute(array($d_fname, $d_mname, $d_lname, $d_DOB))) {
            $stmt = null;
            header("Location: ../Php/Displaylist/burial.php?error=setnonMemberDataStmtfailed");
        exit();
        }
    $stmt = null;
    }

    protected function checkData($d_fname, $d_mname, $d_lname){
        $stmt = $this->connect()->prepare('SELECT * FROM `member` WHERE fname = ? AND mname = ? AND lname = ?');
    
        if (!$stmt->execute(array($d_fname, $d_mname, $d_lname))) {
            $stmt = null;
            header("Location: ../Php/Displaylist/burial.php?error=checkDataStmtfailed");
        exit();
        }

        $resultChecks;
            if ($stmt->rowCount() > 0) {
                $resultChecks = false;
            }else{ 
                $resultChecks = true;
            }
            return $resultChecks;
    }
    
}

// Updates in payment table
class AddPaymentClass extends Dbh{

    protected function SetPayment($Receipt, $Date, $value, $requestID){
        $stmt = $this->connect()->prepare("UPDATE `payment` SET `payment` = 'paid', `receiptNo` = ?, `payment_date` = ?, `paymentValue` = ? WHERE `requestID` = ?");
    
        if (!$stmt->execute(array($Receipt, $Date, $value, $requestID))) {
            $stmt = null;
            header("Location: ../Php/Displaylist/burial.php?error=setDataStmtfailed"); 
        exit();
        }
    $stmt = null;
    }
    
    // Adding requestID to cemeterylist_tbl
    protected function AddCemetery($Receipt, $Date, $requestID){
        $stmt = $this->connect()->prepare("INSERT INTO `cemeterylist` (`requestFormID`) SELECT `paymentID` from `payment` WHERE `payment` = 'paid' AND `receiptNo` =? AND `payment_date` =? AND `requestID` =?");
    
        if (!$stmt->execute(array($Receipt, $Date, $requestID))) {
            $stmt = null;
            header("Location: ../Php/Displaylist/burial.php?error=setDataStmtfailed"); 
        exit();
        }
    $stmt = null;
    }

    // Adding requestID to ossuary_tbl
    protected function AddOssuary($Receipt, $Date, $requestID){
        $stmt = $this->connect()->prepare("INSERT INTO `ossuarylist` (`requestFormID`) SELECT `paymentID` from `payment` WHERE `payment` = 'paid' AND `receiptNo` =? AND `payment_date` =? AND `requestID` =?");
    
        if (!$stmt->execute(array($Receipt, $Date, $requestID))) {
            $stmt = null;
            header("Location: ../Php/Displaylist/burial.php?error=setDataStmtfailed"); 
        exit();
        }
    $stmt = null;
    }

    // Adding requestID to cemeterylist_tbl
    protected function UpdateCemetery($Receipt, $Date, $requestID){
        $stmt = $this->connect()->prepare("INSERT INTO `cemeterylist` (`requestFormID`) SELECT `paymentID` from `payment` WHERE `payment` = 'paid' AND `receiptNo` =? AND `payment_date` =? AND `requestID` =?");
    
        if (!$stmt->execute(array($Receipt, $Date, $requestID))) {
            $stmt = null;
            header("Location: ../Php/Displaylist/burial.php?error=setDataStmtfailed"); 
        exit();
        }
    $stmt = null;
    }

    // kinds of Payment per Condition

    // BURIAL - TOMB - MEMBER
    protected function BTMcheck($requestID){
        $stmt = $this->connect()->prepare(
        "SELECT * from `requestForm` WHERE `requestID`= ? AND `formClassification` = 'burial' AND `burialPlace` = 'Tomb' AND `classification` = 'member'");
    
        if (!$stmt->execute(array($requestID))) {
            $stmt = null;
            header("Location: ../Php/Displaylist/accountUI.php?error=checkDataStmtfailed");
        exit();
        }

        $resultChecks;
            if ($stmt->rowCount() > 0) {
                $resultChecks = false;
            }else{ 
                $resultChecks = true;
            }
            return $resultChecks;
    }
    // BURIAL - TOMB - NON-MEMBER
    protected function BTNMcheck($requestID){
        $stmt = $this->connect()->prepare(
        "SELECT * from `requestForm` WHERE `requestID`= ? AND `formClassification` = 'burial' AND `burialPlace` = 'Tomb' AND `classification` = 'non-member'");
    
        if (!$stmt->execute(array($requestID))) {
            $stmt = null;
            header("Location: ../Php/Displaylist/accountUI.php?error=checkDataStmtfailed");
        exit();
        }

        $resultChecks;
            if ($stmt->rowCount() > 0) {
                $resultChecks = false;
            }else{ 
                $resultChecks = true;
            }
            return $resultChecks;
    }
    // TRANSFER - TOMB - MEMBER
    protected function TTMcheck($requestID){
        $stmt = $this->connect()->prepare(
        "SELECT * from `requestForm` WHERE `requestID`= 60 AND `formClassification` = 'transfer' AND `classification` = 'member'");
    
        if (!$stmt->execute(array($requestID))) {
            $stmt = null;
            header("Location: ../Php/Displaylist/accountUI.php?error=checkDataStmtfailed");
        exit();
        }

        $resultChecks;
            if ($stmt->rowCount() > 0) {
                $resultChecks = false;
            }else{ 
                $resultChecks = true;
            }
            return $resultChecks;
    }
     // TRANSFER - TOMB - NON-MEMBER
    protected function TTNMcheck($requestID){
        $stmt = $this->connect()->prepare(
        "SELECT * from `requestForm` WHERE `requestID`= ? AND `formClassification` = 'transfer' AND `classification` = 'Non-member'");
    
        if (!$stmt->execute(array($requestID))) {
            $stmt = null;
            header("Location: ../Php/Displaylist/accountUI.php?error=checkDataStmtfailed");
        exit();
        }

        $resultChecks;
            if ($stmt->rowCount() > 0) {
                $resultChecks = false;
            }else{ 
                $resultChecks = true;
            }
            return $resultChecks;
    }
    
}

class AddCemeteryClass extends Dbh{

    protected function setDatas($Receipt, $Date, $requestID){
        $stmt = $this->connect()->prepare("UPDATE `payment` SET `payment` = 'paid', `receiptNo` = ?, `payment_date` = ? WHERE `requestID` = ?");
    
        if (!$stmt->execute(array($Receipt, $Date, $requestID))) {
            $stmt = null;
            header("Location: ../Php/Displaylist/burial.php?error=setDataStmtfailed"); 
        exit();
        }
    $stmt = null;
    }

    protected function checkData($requestID){
        $stmt = $this->connect()->prepare(
        "SELECT * from `payment` WHERE `requestID`= ?");
    
        if (!$stmt->execute(array($requestID))) {
            $stmt = null;
            header("Location: ../Php/Displaylist/accountUI.php?error=checkDataStmtfailed");
        exit();
        }

        $resultChecks;
            if ($stmt->rowCount() > 0) {
                $resultChecks = false;
            }else{ 
                $resultChecks = true;
            }
            return $resultChecks;
    }
    
}

// APPLICATION REQUEST - BURIAL
class AddBurialClass extends Dbh{
    //churchName not 'NULL'
    protected function setAllData($a_fname, $a_mname, $a_lname, $relation, $address1, $age1, $contact1, $d_fname, $d_mname, $d_lname, $d_address, $churchName, $d_DOB, $d_DOD, $d_internment, $burial_place){
        $stmt = $this ->connect() -> prepare ('INSERT INTO `requestform` (`a_fname`, `a_mname`, `a_lname`, `relation`, `a_address`, `age`, `contact`, `d_fname`, `d_mname`, `d_lname`, `d_address`, `churchAccID`, `DOB`, `DOD`, `Internment`, `burialPlace`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
        if(!$stmt->execute(array($a_fname, $a_mname, $a_lname, $relation, $address1, $age1, $contact1, $d_fname, $d_mname, $d_lname, $d_address, $churchName, $d_DOB, $d_DOD, $d_internment, $burial_place))){
            $stmt = null;
            header ("location: ../Php/Displaylist/burial.php?error=SetDataStmtFailed");
            exit();
        }
    $stmt =null;
    }

    // churchName == NULL
    protected function setDatas($a_fname, $a_mname, $a_lname, $relation, $address1, $age1, $contact1, $d_fname, $d_mname, $d_lname, $d_address, $d_DOB, $d_DOD, $d_internment, $burial_place){
        $stmt = $this ->connect() -> prepare ('INSERT INTO `requestform` (`a_fname`, `a_mname`, `a_lname`, `relation`, `a_address`, `age`, `contact`, `d_fname`, `d_mname`, `d_lname`, `d_address`, `DOB`, `DOD`, `Internment`, `burialPlace`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
        if(!$stmt->execute(array($a_fname, $a_mname, $a_lname, $relation, $address1, $age1, $contact1, $d_fname, $d_mname, $d_lname, $d_address, $d_DOB, $d_DOD, $d_internment, $burial_place))){
            $stmt = null;
            header ("location: ../Php/Displaylist/burial.php?error=SetDatasStmtFailed");
            exit();
        }
    $stmt =null;
    }

    //setting PaymentID for requestForm
    protected function setPayment($a_fname, $a_mname, $a_lname, $relation, $address1, $age1, $contact1, $d_fname, $d_mname, $d_lname, $d_address, $d_DOB, $d_DOD, $d_internment){
        $stmt = $this->connect()->prepare(
            'INSERT INTO `payment` (`requestID`,`formClassification`) SELECT `requestID`, `formClassification` from `requestform` WHERE `a_fname` = ? AND `a_mname` = ? AND a_lname = ? AND `relation` = ? AND `a_address` = ? AND `age` = ? AND `contact` = ? AND `d_fname` = ? AND `d_mname` = ? AND `d_lname` = ? AND `d_address` = ? AND `DOB` = ? AND `DOD` = ? AND `Internment` = ?');
    
        if (!$stmt->execute(array($a_fname, $a_mname, $a_lname, $relation, $address1, $age1, $contact1, $d_fname, $d_mname, $d_lname, $d_address, $d_DOB, $d_DOD, $d_internment))) {
            $stmt = null;
            header("Location: ../Php/Displaylist/burial.php?error=setPaymentStmtfailed");
        exit();
        }
    $stmt = null;
    }

    protected function checkData($d_fname, $d_mname, $d_lname){
        $stmt = $this->connect()->prepare('SELECT * FROM `member` WHERE fname = ? AND mname = ? AND lname = ?');
    
        if (!$stmt->execute(array($d_fname, $d_mname, $d_lname))) {
            $stmt = null;
            header("Location: ../Php/Displaylist/burial.php?error=checkDataStmtfailed");
        exit();
        }

        $resultChecks;
            if ($stmt->rowCount() > 0) {
                $resultChecks = false;
            }else{ 
                $resultChecks = true;
            }
            return $resultChecks;
    }
    
}

class AddTransferClass extends Dbh{

    protected function setDatas($a_fname, $a_mname, $a_lname, $relation ,$address1, $age1, $contact1, $d_fname, $d_mname, $d_lname, $churchName){
        $stmt = $this ->connect() -> prepare ('INSERT INTO `requestform` (`a_fname`, `a_mname`, `a_lname`, `relation`, `a_address`, `age`, `contact`, `d_fname`, `d_mname`, `d_lname`, `churchAccID`, `formClassification`) VALUES (?,?,?,?,?,?,?,?,?,?,?, "transfer")');
        if(!$stmt->execute(array($a_fname, $a_mname, $a_lname, $relation ,$address1, $age1, $contact1, $d_fname, $d_mname, $d_lname, $churchName))){
            $stmt = null;
            header ("location: ../Php/Displaylist/transferal.php?error=SetDataStmtFailed");
            exit();
        }
    $stmt =null;
    }

    //setting PaymentID for requestForm
    protected function setPayment($a_fname, $a_mname, $a_lname, $relation ,$address1, $age1, $contact1, $d_fname, $d_mname, $d_lname, $churchName){
        $stmt = $this->connect()->prepare(
            'INSERT INTO `payment` (`requestID`,`formClassification`) SELECT `requestID`, `formClassification` from `requestform` WHERE `a_fname` = ? AND `a_mname` = ? AND a_lname = ? AND `relation` = ? AND `a_address` = ? AND `age` = ? AND `contact` = ? AND `d_fname` = ? AND `d_mname` = ? AND `d_lname` = ? AND `churchAccID` = ?');
    
        if (!$stmt->execute(array($a_fname, $a_mname, $a_lname, $relation ,$address1, $age1, $contact1, $d_fname, $d_mname, $d_lname, $churchName))) {
            $stmt = null;
            header("Location: ../Php/Displaylist/transferal.php?error=setPaymentStmtfailed");
        exit();
        }
    $stmt = null;
    }

    protected function checkData($d_fname, $d_mname, $d_lname){
        $stmt = $this->connect()->prepare('SELECT c.*, r.* FROM((`cemeterylist` as c inner join payment as p on p.paymentID = c.requestFormID) inner join requestform as r on r.requestID = p.requestID) where r.d_fname = ? AND r.d_mname = ? AND r.d_lname = ?');
    
        if (!$stmt->execute(array($d_fname, $d_mname, $d_lname))) {
            $stmt = null;
            header("Location: ../Php/Displaylist/transferal.php?error=checkDataStmtfailed");
        exit();
        }

        $resultChecks;
            if ($stmt->rowCount() > 0) {
                $resultChecks = false;
            }else{ 
                $resultChecks = true;
            }
            return $resultChecks;
    }
    
}




// this is Class for RENEWAL
class AddRenewalClass extends Dbh{

    protected function setDatas($appID, $status, $fname, $mname, $lname, $churchN){
        
        $stmt = $this->connect()->prepare(
            'UPDATE `formburial` SET `renew` = ?, `status` = ? WHERE `burial_fname_dec` = ? AND `burial_mname_dec` = ? AND `burial_lname_dec` = ? AND `churchAccID` = ?');

        if (!$stmt->execute(array($appID, $status, $fname, $mname, $lname, $churchN))) {
            $stmt = null;
            header("Location: ../Php/Displaylist/burial.php?error=setDataStmtfailed");
        exit();
        }
    $stmt = null;
    }

    protected function checkData($fname, $mname, $lname, $bornOn, $diedOn){
        $stmt = $this->connect()->prepare(
        "SELECT `burial_id`
        FROM `formburial` WHERE `burial_fname_dec` = ? AND `burial_mname_dec` = ? 
        AND `burial_lname_dec` = ? AND `birth_dec` = ?
        AND `die_dec` = ?");
    
        if (!$stmt->execute(array($fname, $mname, $lname, $bornOn, $diedOn))) {
            $stmt = null;
            header("Location: ../Php/Displaylist/burial.php?error=checkDataStmtfailed");
        exit();
        }

        $resultChecks;
            if ($stmt->rowCount() > 0) {
                $resultChecks = false;
            }else{ 
                $resultChecks = true;
            }
            return $resultChecks;
    }
    
}