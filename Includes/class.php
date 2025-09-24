<?php   
    //ADD CLASSES
    class ClassChurch extends Dbh{

        protected function setChurch($churchName, $churchAddress, $dateOrganized, $denomination, $email) {
            $stmt = $this ->connect() -> prepare ('INSERT INTO `church`( `churchName`, `churchAddress`, `dateOrganized`, `denomination`, `email`) VALUES (?,?,?,?,?)');
            if(!$stmt->execute(array($churchName, $churchAddress, $dateOrganized, $denomination, $email))){
                $stmt = null;
                header ("location: ../Php/Displaylist/accountUI.php?error=SetDataStmtFailed");
                exit();
            }
            $stmt =null;
        }


        protected function checkData($churchName) {
            $stmt = $this ->connect() -> prepare ('SELECT churchName FROM church WHERE churchName = ?');
            if(!$stmt->execute(array($churchName))){
                $stmt = null;
                header ("location: ../Php/Displaylist/accountUI.php?error=CheckDataStmtFailed");
                exit();
            }
            $resultCheck;
            if($stmt->rowCount() > 0) {
                $resultCheck = false;
            }else {
                $resultCheck = true;
            }

            return $resultCheck;

        }



    }

    class ClassPastor extends Dbh{
            // error on churchID_FK, must pull Church ID
        protected function setPastor($churchName, $pastorFName, $pastorLName, $pastorMName, $pastorBirthdate, $pastorGender, $pastorContact, $pastorEmail, $pastorStatus, $position) {
            $stmt = $this ->connect() -> prepare ('INSERT INTO `member`( `churchID_FK`, `fname`, `lname`, `mname`, `dateOfBirth`, `sex`, `contactNo`, `email`, `maritalStatus`, `position`) VALUES ((SELECT `churchID` from church where churchName = ?),?,?,?,?,?,?,?,?,?)');
            if(!$stmt->execute(array($churchName, $pastorFName, $pastorLName, $pastorMName, $pastorBirthdate, $pastorGender, $pastorContact, $pastorEmail, $pastorStatus, $position))){
                $stmt = null;
                header ("location: ../Php/Displaylist/accountUI.php?error=SetPastorDataStmtFailed");
                exit();
            }
            $stmt =null;
        }

        protected function checkData($pastorFName, $pastorMName, $pastorLName) {
            $stmt = $this ->connect() ->prepare('SELECT * FROM `member` WHERE fname = ? AND mname = ? AND lname = ?');
            if(!$stmt->execute(array($pastorFName, $pastorMName, $pastorLName))){
                $stmt = null;
                header ("location: ../Php/Displaylist/accountUI.php?error=CheckPastorDataStmtFailed");
                exit();
            }
            $resultCheck;
            if($stmt->rowCount() > 0) {
                $resultCheck = false;
            }else {
                $resultCheck = true;
            }

            return $resultCheck;

        }

        protected function checkIDchurch($churchName) {
            $stmt = $this ->connect() ->prepare('SELECT churchID FROM `church` WHERE churchName = ?');
            if(!$stmt->execute(array($churchName))){
                $stmt = null;
                header ("location: ../Php/Displaylist/accountUI.php?error=CheckPastorDataStmtFailed");
                exit();
            }
            $result = $stmt;

            return $result;

        }



    }

    class ClassAccounts extends Dbh{

        protected function setACCOUNTS($churchName, $pastorFName, $pastorMName, $pastorLName, $username, $password) {
            
            $stmt = $this ->connect() -> prepare ('INSERT INTO `account`(`churchID_FK`,`pastorID_FK`, `username`, `password`) VALUES (
                (SELECT `churchID` from church where churchName = ?),
                (SELECT `memberID` from member where fname = ? and mname = ? and lname = ?),
                ?,?)');

            

            if(!$stmt->execute(array ($churchName, $pastorFName, $pastorMName, $pastorLName, $username, $password))){
                $stmt = null;
                header ("location: ../Php/Displaylist/accountUI.php?error=SetAccountsDataStmtFailed");
                exit();
            }
            $stmt =null;
        }

        protected function checkData($username) {
            $stmt = $this ->connect() ->prepare('SELECT * FROM `account` WHERE `username` = ?');
            
            if(!$stmt->execute(array($username))){
                $stmt = null;
                header ("location: ../Php/Displaylist/accountUI.php?error=CheckAccountDataStmtFailed");
                exit();
            }
            $resultCheck;
            if($stmt->rowCount() > 0) {
                $resultCheck = false;
            }else {
                $resultCheck = true;
            }

            return $resultCheck;

        }



    }

    class ClassMember extends Dbh{

        protected function setMember($memberC, $memberFN, $memberLN, $memberMN, $memberBDAY, $memberG, $memberContacts, $memberE, $memberS) {
            $stmt = $this ->connect() -> prepare ('INSERT INTO `member`( `churchID_FK`, `fname`, `lname`, `mname`, `dateOfBirth`, `sex`, `contactNo`, `email`, `maritalStatus`) VALUES (?,?,?,?,?,?,?,?,?)');
            if(!$stmt->execute(array ($memberC, $memberFN, $memberLN, $memberMN,  $memberBDAY, $memberG, $memberContacts, $memberE, $memberS))){
                $stmt = null;
                header ("location: ../Php/Displaylist/accountUI.php?error=SetMemberDataStmtFailed");
                exit();
            }
            $stmt =null;
        }

        protected function checkData($pastorFN, $pastorLN, $pastorMN ) {
            $stmt = $this ->connect() ->prepare('SELECT * FROM `member` WHERE fname = ? AND lname = ? AND mname = ?');
            if(!$stmt->execute(array($pastorFN, $pastorLN, $pastorMN))){
                $stmt = null;
                header ("location: ../Php/Displaylist/accountUI.php?error=CheckMemberDataStmtFailed");
                exit();
            }
            $resultCheck;
            if($stmt->rowCount() > 0) {
                $resultCheck = false;
            }else {
                $resultCheck = true;
            }

            return $resultCheck;

        }



    }


    //UPDATE CLASSES
    class ClassChurchUpdate extends Dbh{

        protected function setChurch($churchName, $churchAddress, $dateOrganized, $denomination, $email, $churchID) {
            $stmt = $this ->connect() -> prepare ('UPDATE `church` SET `churchName` = ?, `churchAddress` = ?, `dateOrganized` = ?, `denomination` = ?, `email` = ? WHERE `church`.`churchID` = ?');
            if(!$stmt->execute(array($churchName, $churchAddress, $dateOrganized, $denomination, $email, $churchID))){
                $stmt = null;
                header ("location: ../Php/Displaylist/accountUI.php?error=UpdateSetDataStmtFailed");
                exit();
            }
            $stmt =null;
        }

        protected function checkData($churchID) {
            $stmt = $this ->connect() -> prepare ('SELECT churchID FROM church WHERE churchID = ?');
            if(!$stmt->execute(array($churchID))){
                $stmt = null;
                header ("location: ../Php/Displaylist/accountUI.php?error=UpdateCheckDataStmtFailed");
                exit();
            }
            $resultCheck;
            if($stmt->rowCount() > 0) {
                $resultCheck = true;
            }else {
                $resultCheck = false;
            }

            return $resultCheck;

        }



    }

    class ClassPastorUpdate extends Dbh{

        protected function setPastor($pastorFN, $pastorLN, $pastorMN, $pastorBDAY, $pastorGender, $pastorContacts, $pastorEmail, $pastorStatus, $pastorID) {
            $stmt = $this ->connect() -> prepare ('UPDATE `member` SET `fname` = ?, `lname` = ?, `mname` = ?, `dateOfBirth` = ?, `sex` = ?, `contactNo` = ?, `email` = ?, `maritalStatus` = ? WHERE `member`.`memberID` = ?');
            if(!$stmt->execute(array($pastorFN, $pastorLN, $pastorMN, $pastorBDAY, $pastorGender, $pastorContacts, $pastorEmail, $pastorStatus, $pastorID))){
                $stmt = null;
                header ("location: ../Php/Displaylist/accountUI.php?error=UpdateSetDataStmtFailed");
                exit();
            }
            $stmt =null;
        }

        protected function checkData($pastorID) {
            $stmt = $this ->connect() -> prepare ('SELECT pastorID FROM pastor WHERE pastorID = ?');
            if(!$stmt->execute(array($pastorID))){
                $stmt = null;
                header ("location: ../Php/Displaylist/accountUI.php?error=UpdateCheckDataStmtFailed");
                exit();
            }
            $resultCheck;
            if($stmt->rowCount() > 0) {
                $resultCheck = true;
            }else {
                $resultCheck = false;
            }

            return $resultCheck;

        }



    }

    class ClassMemberUpdate extends Dbh{

        protected function setPastor($fname, $lname, $mname,  $bd, $sex, $contact, $email, $status, $memberID) {
            $stmt = $this ->connect() -> prepare ('UPDATE `member` SET `fname` = ?, `lname` = ?, `mname` = ?, `dateOfBirth` = ?, `sex` = ?, `contactNo` = ?, `email` = ?, `maritalStatus` = ? WHERE `member`.`memberID` = ?');
            if(!$stmt->execute(array($fname, $lname, $mname,  $bd, $sex, $contact, $email, $status, $memberID))){
                $stmt = null;
                header ("location: ../Php/Displaylist/accountUI.php?error=UpdateSetDataStmtFailed");
                exit();
            }
            $stmt =null;
        }

        protected function checkData($memberID) {
            $stmt = $this ->connect() -> prepare ('SELECT memberID FROM member WHERE memberID = ?');
            if(!$stmt->execute(array($memberID))){
                $stmt = null;
                header ("location: ../Php/Displaylist/accountUI.php?error=UpdateCheckDataStmtFailed");
                exit();
            }
            $resultCheck;
            if($stmt->rowCount() > 0) {
                $resultCheck = true;
            }else {
                $resultCheck = false;
            }

            return $resultCheck;

        }



    }

    class ClassAccountUpdate extends Dbh{

        protected function setPastor($username, $church, $pastor, $status, $accID) {
            $stmt = $this ->connect() -> prepare ('UPDATE `account` SET `churchID_FK` = ?, `pastorID_FK` = ?, `username` = ?, `status` = ? WHERE `account`.`churchAccID` = ?;');
            if(!$stmt->execute(array($username, $church, $pastor, $status, $accID))){
                $stmt = null;
                header ("location: ../Php/Displaylist/accountUI.php?error=AccountSetDataStmtFailed");
                exit();
            }
            $stmt =null;
        }

        protected function checkData($username) {
            $stmt = $this ->connect() -> prepare ('SELECT username FROM account WHERE username = ?');
            if(!$stmt->execute(array($username))){
                $stmt = null;
                header ("location: ../Php/Displaylist/accountUI.php?error=AccountCheckDataStmtFailed");
                exit();
            }
            $resultCheck;
            if($stmt->rowCount() == 1) {
                $resultCheck = true;
            }else {
                $resultCheck = false;
            }

            return $resultCheck;

        }



    }