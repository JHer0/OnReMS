<?php 
// this is Class for BURIAL

class AddBurialClass extends Dbh{

    protected function setDatas($churchN, $fname, $mname, $lname, $address, $bornOn, $diedOn, $tdate, $tTime, $appID, $status){
        $stmt = $this->connect()->prepare(
            'INSERT INTO `formburial` (`churchAccID`, `burial_fname_dec`, `burial_mname_dec`, `burial_lname_dec`, `address`, `birth_dec`, `die_dec`, `terment_date`, `terment_time`,`application_id`, `status`) VALUES (?,?,?,?,?,?,?,?,?,?,?)');
    
        if (!$stmt->execute(array($churchN, $fname, $mname, $lname, $address, $bornOn, $diedOn, $tdate, $tTime, $appID, $status))) {
            $stmt = null;
            header("Location: ../Php/Displaylist/burial.php?error=setDataStmtfailed");
        exit();
        }
    $stmt = null;
    }

    protected function checkData($fname, $mname, $lname, $address , $bornOn, $diedOn, $tdate, $tTime){
        $stmt = $this->connect()->prepare(
        "SELECT `burial_fname_dec`, `burial_mname_dec`, `burial_lname_dec`, `address`, `birth_dec`, `die_dec`, `terment_date`, `terment_time` 
        FROM `formburial` WHERE `burial_fname_dec` = ? AND `burial_mname_dec` = ? 
        AND `burial_lname_dec` = ? AND `address` = ? AND `birth_dec` = ?
        AND `die_dec` = ? AND `terment_date` = ? AND `terment_time` = ?");
    
        if (!$stmt->execute(array($fname, $mname, $lname, $address , $bornOn, $diedOn, $tdate, $tTime))) {
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

class VerifyBurialClass extends Dbh{

    protected function setDatas($status, $burialID){
        $stmt = $this->connect()->prepare(
            'UPDATE `formburial` SET `status` = ? WHERE `formburial`.`burial_id` = ?');
    
        if (!$stmt->execute(array($status, $burialID))) {
            $stmt = null;
            header("Location: ../Php/Displaylist/burial.php?error=setDataStmtfailed");
        exit();
        }
    $stmt = null;
    }

    protected function checkData($status, $burialID){
        $stmt = $this->connect()->prepare(
        "SELECT `burial_id` from `formburial` WHERE `status` =? && `burial_id`= ?");
    
        if (!$stmt->execute(array($status, $burialID))) {
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

class AddPaymentBurialClass extends Dbh{

    protected function setDatas($Receipt, $Date, $burialID){
        $stmt = $this->connect()->prepare(
            'UPDATE `formburial` SET `payment` = 1, `receiptNo` = ?, `payment_date` = ? WHERE `formburial`.`burial_id` = ?');
    
        if (!$stmt->execute(array($Receipt, $Date, $burialID))) {
            $stmt = null;
            header("Location: ../Php/Displaylist/burial.php?error=setDataStmtfailed");
        exit();
        }
    $stmt = null;
    }

    protected function checkData($burialID){
        $stmt = $this->connect()->prepare(
        "SELECT `burial_id` from `formburial` WHERE `burial_id`= ?");
    
        if (!$stmt->execute(array($burialID))) {
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