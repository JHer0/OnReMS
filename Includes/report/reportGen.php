<?php


class View extends Dbh {


    // ASSIGNING CHURCH ACCOUNT TO GLOBAL VARIABLE

    public function UserAccount ($username) {
        $sql = "SELECT church.churchName FROM account INNER JOIN church ON account.churchID_FK = church.churchID WHERE account.username = ?";
        $stmt =$this->connect()->query($sql);
        $stmt -> execute([$username]);
        

        $result = $stmt -> fetchAll();
        
        return $result;

    }


    public $id = array();
    //DASHBPARD METHODS DASHBPARD METHODS DASHBPARD METHODS DASHBPARD METHODS DASHBPARD METHODS DASHBPARD METHODS
    public function CountChurch() {
        $sql = "SELECT COUNT(churchID) from church";
        $stmt =$this->connect()->query($sql);
        $tmember = $stmt->fetchColumn();
        echo $tmember;
    }
    public function CountChurchMember($username){
        $sql = "SELECT COUNT(member.fname) FROM ((member INNER JOIN church ON member.churchID_FK = church.churchID) INNER JOIN account ON church.churchID = account.churchID_FK) WHERE account.username =?";
        $stmt =$this->connect()->query($sql);
        $stmt -> execute([$username]);
        $tmember = $stmt->fetchColumn();
        echo $tmember;
    }
    public function CountMember(){
        $sql = "SELECT COUNT(memberID) from member";
        $stmt =$this->connect()->query($sql);
        $tmember = $stmt->fetchColumn();
        echo $tmember;
    }
    public function CountPastor(){
        $sql = "SELECT COUNT(pastorID) from pastor";
        $stmt =$this->connect()->query($sql);
        $tmember = $stmt->fetchColumn();
        echo $tmember;
    }
    public function totalAccount(){
        $sql = "SELECT COUNT(churchID_FK) from account";
        $stmt =$this->connect()->query($sql);
        $tmember = $stmt->fetchColumn();
        echo $tmember;
    }
    //ACCOUNTS TABLBE\TAB || ACCOUNTS TABLBE\TAB || ACCOUNTS TABLBE\TAB || ACCOUNTS TABLBE\TAB || ACCOUNTS TABLBE\TAB || ACCOUNTS TABLBE\TAB || 

    public function viewAccount() {
        $sql = "SELECT account.churchAccID, account.username, church.churchName, account.status FROM account INNER JOIN church ON account.churchID_FK = church.churchID";
        $stmt =$this->connect()->query($sql);
        
        while ($rows = $stmt->fetch()) {
            
?>                   
            
            <tr>
                <td class = "text-center">
                        <?php echo $rows['churchAccID']; ?>
                </td>
                <td class = "get-acc-username"> <?php echo $rows['username']; ?></td>
                <td class = "get-acc-churchName"> <?php echo $rows['churchName']; ?></td>
                <td class = "get-acc-status"> <?php echo $rows['status']; ?></td>
                <td>                    
                    <a class="btn updateAccount">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                        </svg>
                    </a>

                </td>
            </tr>
<?php            
        } 
    }

    //CONTRIBUTION TABLE CONTRIBUTION TABLE CONTRIBUTION TABLE CONTRIBUTION TABLE CONTRIBUTION TABLE CONTRIBUTION TABLE CONTRIBUTION TABLE CONTRIBUTION TABLE 
    public function viewContribution() {
        $sql = "SELECT contribution.contributionID, churchaccount.status, contribution.date FROM contribution 
                INNER JOIN churchaccount ON contribution.churchID_FK=churchaccount.churchAccID";
        $stmt =$this->connect()->query($sql);
    
        while ($rows = $stmt->fetch()) {
?>                   
            <tr>
                <td><?php echo $rows['contributionID'];?></td>
                <td><?php echo $rows['status'];?></td>
                <td ><?php echo $rows['date'];?></td>
            </tr>
<?php            
        } 
    }
    
    //CHURCH TABLE CHURCH TABLE CHURCH TABLE CHURCH TABLE CHURCH TABLE CHURCH TABLE CHURCH TABLE CHURCH TABLE  CHURCH TABLE CHURCH TABLE  CHURCH TABLE CHURCH TABLE  CHURCH TABLE CHURCH TABLE  CHURCH TABLE CHURCH TABLE  CHURCH TABLE CHURCH TABLE 
    public function viewChurch() {
        $sql = "SELECT `churchName`, `churchAddress` FROM church";
        $stmt =$this->connect()->query($sql);
        $bool = true;
        $n = 0;
        $a=0;
        while ($rows = $stmt->fetch()) {
            
?>                   
            
            <tr>
            <td style="border-bottom: 1px solid; text-align: center"><b>
<?php 
                        if($bool = true){
                            echo $a+1;
                            $a++;
                        }
?>
                    </b>
            </td>
            <td style="border-bottom: 1px solid" colspan=2>
                <?php echo $rows['churchName'];?>
            </td>
            <td style="border-bottom: 1px solid" colspan=2><?php echo $rows['churchAddress'];?></td>
            
            </tr>
<?php            
        } 
    }

    // PASTOR TABLE PASTOR TABLE PASTOR TABLE PASTOR TABLE PASTOR TABLE PASTOR TABLE PASTOR TABLE PASTOR TABLE
    public function viewPastor() {
        $sql = "SELECT `fname`, `lname`,`mname`, `contactNo` FROM pastor";
       $stmt =$this->connect()->query($sql);
       $a = 0;
       while ($rows = $stmt->fetch()) {
?>                   
           <tr>
           <td style="border-bottom: 1px solid; text-align: center"><b> 
                    <?php 
                        if($bool = true){
                            echo $a+1;
                            $a++;
                        }
                    ?>
                </b></td>
                <td style="border-bottom: 1px solid" colspan=2>
                <?php echo $rows['fname']. " ".$rows['lname']." ".$rows['mname'];?>
            </td>
            <td style="border-bottom: 1px solid" colspan=2><?php echo $rows['contactNo'];?></td>
               
           </tr>
<?php            
       } 
   }

   //MEMBER TABLE MEMBER TABLE MEMBER TABLE MEMBER TABLE MEMBER TABLE MEMBER TABLE MEMBER TABLE MEMBER TABLE MEMBER TABLE MEMBER TABLE MEMBER TABLE 
   public function viewMember() {
     $sql = "SELECT church.churchName,member.memberID, member.fname, member.lname, member.mname, member.dateOfBirth, member.sex, member.contactNo, member.email, member.status FROM member INNER JOIN church ON member.churchID_FK = church.churchID ORDER BY member.memberID";
    
   $stmt =$this->connect()->query($sql);
   $a = 0;
   while ($rows = $stmt->fetch()) {
?>                   
       <tr>
            
           <td style="border-bottom: 1px solid; text-align: center"><b> 
                <?php 
                    if($bool = true){
                        echo $a+1;
                        $a++;
                    }
                ?>
            </b></td>
            
            <td style="border-bottom: 1px solid" colspan=2><?php echo $rows['lname'].", ".$rows['fname'].", ".$rows['mname'];?></td>
            <td style="border-bottom: 1px solid" colspan=2><?php echo $rows['churchName'];?></td>
            
       </tr>
<?php            
        } 
    }
     // still fixing this day
    public function viewChurchMember($username) {
        if($username != NULL ){
            $sql = "SELECT church.churchName, member.memberID, member.fname, member.lname, member.mname, member.dateOfBirth, member.sex, member.contactNo, member.email, member.status FROM ((member INNER JOIN church ON member.churchID_FK = church.churchID) INNER JOIN account ON church.churchID = account.churchID_FK) WHERE account.username = ?";
            $stmt =$this->connect()->prepare($sql);
            $stmt -> execute([$username]);
            $a = 0;
                while ($rows = $stmt->fetch()) {
    ?>                   
                    <tr>
                        <td> 
                                <?php 
                                    if($bool = true){
                                        echo $a+1;
                                        $a++;
                                    }
                                ?>
                            </td>
                            <td class = "get-memberID text-center"><?php echo $rows['memberID'];?></td>
                            <td class = "get-ChurchN"><?php echo $rows['churchName'];?></td>
                            <td class = "get-MemberN"><?php echo $rows['lname'].", ".$rows['fname'].", ".$rows['mname'];?></td>
                            <td class = "get-MemberC"><?php echo $rows['contactNo'];?></td>
                            <td class = "get-MemberB"><?php echo $rows['dateOfBirth'];?></td>
                            <td class = "get-MemberG"><?php echo $rows['sex'];?></td>
                            <td class = "get-MemberE"><?php echo $rows['email'];?></td>
                            <td class = "get-MemberS"><?php echo $rows['status'];?></td>
                            <td>
                                <button class="btn updateMembers">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                        </svg>
                                </button>
                            </td>
                        
                    </tr>
<?php            
                } 

        }else{

        }
    }
 
    //checker
    public function churchName() {
        $sql = "SELECT churchName FROM church";
       $stmt =$this->connect()->query($sql);
       $a=0;
       while ($rows = $stmt->fetch()) {
?>                   
        <?php 
        if($bool = true){
            echo $a+1;
            $a++;
        }
        echo ".  ". $rows['churchName']."<br>";
                
        ?>
        
              
<?php            
       } 
   }

   // THIS IS DISPLAYING ALL MEMBERS OF EVERYCHURCHES

   public function Members() {
    $sql = "SELECT `fname`, `lname`, `mname` FROM member" ;
   $stmt =$this->connect()->query($sql);
   $a=0;
   while ($rows = $stmt->fetch()) {
?>                   
    <?php 
    if($bool = true){
        echo $a+1;
        $a++;
    }
    echo ".  ". $rows['fname'].", ". $rows['lname']." ". $rows['mname']."<br>";
            
    ?>
    
          
<?php            
   } 
}


   // THIS IS CEMETERY TALBLE || THIS IS CEMETERY TALBLE || THIS IS CEMETERY TALBLE || THIS IS CEMETERY TALBLE || THIS IS CEMETERY TALBLE || THIS IS CEMETERY TALBLE || THIS IS CEMETERY TALBLE || 
   public function viewCemetery() {
        //  $sql = "SELECT `b.burial_fname_dec`, 
        //  `b.burial_mname_dec`, 
        //  `b.burial_fname_dec`, 
        //  `a.churchName`,
        //  `p.fname`,`p.mname`, `p.lname`,`p.contactNo`,
        //  `c.cemeteryID`, 
        //  `c.applicationForm` 
        //  FROM (((`cemeterylist` as `c` 
        //         INNER JOIN `form-burial` as `b`
        //              ON `c.burialID` = `b.burial_id`) 
        //         INNER JOIN `account` as `a` 
        //               ON `b`.`churchAccID` = `a.churchAccID`)
        //       INNER JOIN `pastor` as `p` 
        //                ON `a`.`pastorID_FK` = `p.pastorID`)";

        //  $sql = "SELECT `form-burial.burial_fname_dec`, `form-burial.burial_mname_dec`, `form-burial.burial_lname_dec`, `form-burial.ternment_date`, `account.username` FROM `form-burial` FULL OUTER JOIN `account` ON `form-burial.churchAccID` = `account.churchAccID`";
        //  $sql = "SELECT `form-burial.* `, `account.*`  FROM `form-burial` INNER JOIN `account` ON `form-burial.churchAccID` = `account.churchAccID`";
        $stmt =$this->connect()->query($sql);
        $bool = true;
        $n = 0;
        $a=0;
        while ($rows = $stmt->fetch()) {
        
        ?>                   
        
        <tr>
            <td>
                <span id = "<?php echo $rows['cemeteryID']; ?>">
                <?php 
                    if($bool = true){
                        echo $a+1;
                        $a++;
                    }
                ?>
                </span>
            </td>
            <td><?php echo $rows['burial_fname_dec'].", ".$rows['burial_fname_dec'].", ".$rows['burial_mname_dec'];?></td>
            <td><?php echo "This is Church Name"//$rows['churchAddress'];?></td>
            <td><?php echo "This is Church Address"//$rows['churchAddress'];?></td>
            <td class = "text-center"><?php echo $rows['terment_date'];?></td>
            <td><?php echo "This is Relative"//$rows['churchAddress'];?></td>
            <td class = "text-center"><span id = ""><?php echo "This is contact"//$rows['churchAddress'];?></td>
            <td class = "text-center">
                <?php 
                    $birthDate = $rows['terment_date'];
                    //explode the date to get month, day and year
                    $birthDate = explode("-", $birthDate);
                    //get age from date or birthdate
                    $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
                    ? ((date("Y") - $birthDate[0]) - 1)
                    : (date("Y") - $birthDate[0]));
                    echo $age;
                    if($age < 5) {
                        echo "Pass";
                    }else if ($age == 5) {
                        echo "its Equal";
                    }else if ($age > 5) {
                        echo "over due";
                    };
                ?>
            </td>

            <td class = "text-center">
                <?php 
                if($rows['applicationForm'] == 1) {
                ?>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check-square-fill" viewBox="0 0 16 16">
                        <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm10.03 4.97a.75.75 0 0 1 .011 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.75.75 0 0 1 1.08-.022z"/>
                    </svg>
                <?php
                }
                else {
                ?>
                   <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x-square" viewBox="0 0 16 16">
                        <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                    </svg>
                <?php
                }
                
                ?>
                    
            </td>
            <td class = "text-center">
                <?php 
                if($rows['deathCert'] == 1) {
                ?>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check-square-fill" viewBox="0 0 16 16">
                        <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm10.03 4.97a.75.75 0 0 1 .011 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.75.75 0 0 1 1.08-.022z"/>
                    </svg>
                <?php
                }
                else {
                ?>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x-square" viewBox="0 0 16 16">
                        <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                    </svg>
                <?php
                }
                
                ?>
                 
            </td>
            
            <td>             
                <button class="btn updateMembers">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                    </svg>
                </button>
            </td>
        </tr>
        <?php            
        } 
    }
    public function viewBurial() {
        $sql = "SELECT b.*, p.fname, p.mname, p.lname, p.contactNo, c.churchName, c.churchAddress from (((formburial as b inner join account on b.churchAccID = account.churchAccID)inner join pastor as p on account.pastorID_FK = p.pastorID) inner join church as c on account.churchID_FK = c.churchID)";
        $stmt =$this->connect()->query($sql);
        $bool = true;
        $n = 0;
        $a=0;
        while ($rows = $stmt->fetch()) {
?>            
            <tr>
                <td>
                    <span id = "<?php echo $rows['burialID']; ?>">
                    <?php 
                        if($bool = true){
                            echo $a+1;
                            $a++;
                        }
                    ?>
                    </span>
                </td>
                <td><?php echo $rows['burial_fname_dec'].", ".$rows['burial_fname_dec'].", ".$rows['burial_mname_dec'];?></td>
                <td><?php echo "This is Church Name"//$rows['churchAddress'];?></td>
                <td><?php echo $rows['address'];?></td>
                <td class = "text-center"><?php echo $rows['birth_dec'];?></td>
                <td class = "text-center"><?php echo $rows['die_dec'];?></td>
                <td class = "text-center">
                    <?php echo $rows['terment_date'];?><br>
                    <?php 
                    $date = $rows['terment_date'];
                    //explode the date to get month, day and year
                    $date = explode("-", $date);
                    //get age from date or birthdate
                    $yr = (date("md", date("U", mktime(0, 0, 0, $date[0], $date[1], $date[2]))) > date("md")
                    ? ((date("Y") - $date[0]) - 1)
                    : (date("Y") - $date[0]));
                    echo "(". $yr . "yrs)<br>";
                    if($yr < 5) {
                        echo "Pass";
                    }else if ($yr == 5) {
                        $this->smsDue($rows['contactNo'],$rows['fname'],$rows['mname'],$rows['lname'],$rows['burial_fname_dec'],$rows['burial_mname_dec'],$rows['burial_lname_dec'],$rows['terment_date']);
                    }else if ($yr > 5) {
                        $this->smsOverDue($rows['contactNo'],$rows['fname'],$rows['mname'],$rows['lname'],$rows['burial_fname_dec'],$rows['burial_mname_dec'],$rows['burial_lname_dec'],$rows['terment_date']);
                    };
                ?>
                </td>
                <td class = "text-center"><?php echo $rows['terment_time'];?></td>
                <td class = ""><?php echo $rows['fname']. ", " .$rows['lname']. " " .$rows['mname'];?></td>
                <td class = "text-center"><?php echo $rows['contactNo'];?></td>
                
                
                
                <td>             
                    <button class="btn updateMembers">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                        </svg>
                    </button>
                </td>
            </tr>
<?php            
        } 
    }
    private function smsDue($num,$pfname,$pmname,$plname,$dfname,$dmname,$dlname,$date) {
        $api_key = "boQ02_3b9vhxtps6w6tkjiuAgBJAOiZ5SkM2"; // see https://telerivet.com/dashboard/api
        $project_id = "PJ16b05490949013a8";

        $telerivet = new Telerivet_API($api_key);

        $project = $telerivet->initProjectById($project_id);

        // Send a SMS message
        $project->sendMessage(array(
            'to_number' => $num,
            'content' => 'NOTICE: ONREMS SMS SUPPORT NOTIFIER
                            This is to inform Bro/Ptr.'.$pfname.' '.$pmname.' '.$plname.' that Mr/Ms/Mrs. '
                            .$dfname.' '.$dmname.' '.$dlname.'`s due date in payment on the `Libingan ng mga Kristiyano`-the ALICF Cemetery is on DUE TODAY. 
                            Please do pay for the renewal Fee to ALICF Tresurer. 
                            God Bless!'
));
            
    }
    private function smsOverDue($num,$pfname,$pmname,$plname,$dfname,$dmname,$dlname,$date) {
        $api_key = "boQ02_3b9vhxtps6w6tkjiuAgBJAOiZ5SkM2"; // see https://telerivet.com/dashboard/api
        $project_id = "PJ16b05490949013a8";

        $telerivet = new Telerivet_API($api_key);

        $project = $telerivet->initProjectById($project_id);

        // Send a SMS message
        $project->sendMessage(array(
            'to_number' => $num,
            'content' => 'NOTICE: ONREMS SMS SUPPORT NOTIFIER
                            This is to inform Bro/Ptr.'.$pfname.' '.$pmname.' '.$plname.' that Mr/Ms/Mrs. '
                            .$dfname.' '.$dmname.' '.$dlname.'`s due date in payment on the `Libingan ng mga Kristiyano`-the ALICF Cemetery is OVER DUE ALREADY. 
                            Please do pay for the renewal Fee to ALICF Tresurer. 
                            God Bless!'
));
            
    }
        //checker
       
        //THIS IS DATE CHECKER FOR SMS
        // $birthDate = $rows['terment_date'];
        // //explode the date to get month, day and year
        // $birthDate = explode("-", $birthDate);
        // //get age from date or birthdate
        // $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
        // ? ((date("Y") - $birthDate[0]) - 1)
        // : (date("Y") - $birthDate[0]));
        // echo $age;
        // if($age < 5) {
        //     echo "Pass";
        // }else if ($age == 5) {
        //     echo "its Equal";
        // }else if ($age > 5) {
        //     echo "over due";
        // };




}