<?php
require_once "../../Includes/sms/telerivet-php-client-master/telerivet.php";

class View extends Dbh {

    public function monthlyEvents(){
        $sql = "SELECT EXTRACT(MONTH FROM `start`) FROM events_demo";
        $stmt =$this->connect()->query($sql);

        //loop for this playingh month
        for ($m=1; $m<=12; $m++) {
            $month = date('F', mktime(0,0,0,$m, 1, date('Y')));
            echo $month.' - &emsp;HELLO<br>';
         }
        
         
    }


    //COUNT DISPLAY IN DASHBOARD
    public function account() {
        $sql = "SELECT a.churchAccID, c.churchName FROM `account` as `a` INNER JOIN `church` AS `c` ON a.churchID_FK = c.churchID WHERE churchID_FK != 'NULL'";
        $stmt =$this->connect()->query($sql);
       
        while ($rows = $stmt->fetch()) {
?>                   
        <option value=<?php echo $rows['churchAccID'];?>><?php echo $rows['churchName'];?></option>       
<?php            
       } 
    }

    // Add function of members in general Accounts
    public function churchName() {
        $sql = "SELECT churchName, churchID FROM church";
        $stmt =$this->connect()->query($sql);
       
        while ($rows = $stmt->fetch()) {
?>                   
        <option value=<?php echo $rows['churchID'];?>><?php echo $rows['churchName'];?></option>       
<?php            
       } 
    }

    // for `ADD` function  of member in church Account
    public function AddchurchName($username) {
        $sql = "SELECT * FROM `church` inner join account ON church.churchID = account.churchID_FK where account.username = ?";
        $stmt =$this->connect()->prepare($sql);
        $stmt -> execute([$username]);
        while ($rows = $stmt->fetch()) {
            echo $rows['churchID'];          
       } 
    }
   
    public function pastorName() {
        $sql = "SELECT pastorID, fname, lname, mname FROM pastor";
        $stmt =$this->connect()->query($sql);
   
        while ($rows = $stmt->fetch()) {
?>                   
            <option value=<?php echo $rows['pastorID'];?>><?php echo $rows['lname']. ", ".$rows['fname']. ", ".$rows['mname'];?></option>
<?php            
        } 
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
        $stmt =$this->connect()->prepare($sql);
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
        $sql = "SELECT COUNT(memberID) from member where position='pastor'";
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
        $sql = 'SELECT m.*, a.*, c.* FROM ((`account` as a inner join `church` as c on a.churchID_FK = c.churchID) inner join `member` as m ON m.memberID = a.pastorID_FK)';
        $stmt =$this->connect()->query($sql);
        
        while ($rows = $stmt->fetch()) {
            
?>                   
            
            <tr>
                <td class = "churchAccID text-center">
                        <?php echo $rows['churchAccID']; ?>
                </td>
                <td class = "get-acc-username"> <?php echo $rows['username']; ?></td>
                <td class = "get-acc-churchName"> <?php echo $rows['churchID']." - ".$rows['churchName']; ?></td>
                <td class = "get-acc-pastorName"> <?php echo $rows['memberID']." - ". $rows['lname'].", ".$rows['fname'].", ".$rows['mname']; ?></td>
                <td class = "get-acc-status"> <?php echo $rows['status']; ?></td>
                <td>
                    <div class="text-center">
                        <a class="btn updateAccount">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg>
                        </a>
                    </div>                    
                    
                </td>
                <td>
                    <div class="text-center">
                        <a class="btn deleteAccount">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                            </svg>
                        </a>
                    </div>                    
                    
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
        $sql = "SELECT * FROM church";
        $stmt =$this->connect()->query($sql);
        $bool = true;
        $n = 0;
        $a=0;
        while ($rows = $stmt->fetch()) {
            
?>                   
            
            <tr>
                <td class = "text-center"><b>
<?php 
                        if($bool = true){
                            echo $a+1;
                            $a++;
                        }
?>
                </b></td>
                <td class = "get-churchID text-center"><?php echo $rows['churchID'];?></td>
                <td class = "get-churchName"><?php echo $rows['churchName'];?></td>
                <td class = "get-churchAddress"><?php echo $rows['churchAddress'];?></td>
                <td class = "get-dateOrganized"><?php echo $rows['dateOrganized'];?></td>
                <td class = "get-denomination"><?php echo $rows['denomination'];?></td>
                <td class = "get-email"><?php echo $rows['email'];?></td>
                <td>
                    <div class="text-center">
                        <button class="btn updateChurch">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg>
                        </button>
                    </div>
                    
                </td>
            </tr>
<?php            
        } 
    }

// PASTOR TABLE PASTOR TABLE PASTOR TABLE PASTOR TABLE PASTOR TABLE PASTOR TABLE PASTOR TABLE PASTOR TABLE
    public function viewPastor() {
        $sql = "select c.churchName, m.* from member as m inner join church as c on c.churchID = m.churchID_FK where m.position = 'pastor'";
       $stmt =$this->connect()->query($sql);
       $a = 0;
       while ($rows = $stmt->fetch()) {
?>                   
           <tr>
               <td class = "text-center"><b> 
                    <?php 
                        if($bool = true){
                            echo $a+1;
                            $a++;
                        }
                    ?>
                </b></td>
                <td class = "get-pastorID text-center"><?php echo $rows['memberID'];?></td>
                <td class = "get-Pname"><?php echo $rows['lname'].", ".$rows['fname'].", ".$rows['mname'];?></td>
                <td class = "get-Pcontact"><?php echo $rows['contactNo'];?></td>
                <td class = "get-Pbday"><?php echo $rows['dateOfBirth'];?></td>
                <td class = "get-Pstatus"><?php echo $rows['sex'];?></td>
                <td class = "get-Pemail"><?php echo $rows['email'];?></td>
                <td class = "get-Pstatus"><?php echo $rows['maritalStatus'];?></td>
                <td class = "">
                    <div class="text-center">
                        <button class="btn updatePastor">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg>
                        </button>
                    </div>
                </td>
               
           </tr>
<?php            
       } 
   }

//MEMBER TABLE MEMBER TABLE MEMBER TABLE MEMBER TABLE MEMBER TABLE MEMBER TABLE MEMBER TABLE MEMBER TABLE MEMBER TABLE MEMBER TABLE MEMBER TABLE 
   public function viewMember() {
     $sql = "select c.churchName, m.* from member as m inner join church as c on c.churchID = m.churchID_FK";
    
   $stmt = $this -> connect() -> query($sql);
   $a = 0;
   while ($rows = $stmt -> fetch()) {
?>                   
       <tr>
           <td class = "text-center"><b> 
                <?php 
                    if($bool = true){
                        echo $a+1;
                        $a++;
                    }
                ?>
            </b></td>
            <td class = "get-memberID text-center"><?php echo $rows['memberID'];?></td>
            <td class = "get-ChurchN"><?php echo $rows['churchName'];?></td>
            <td class = "get-MemberN"><?php echo $rows['lname'].", ".$rows['fname'].", ".$rows['mname'];?></td>
            <td class = "get-MemberC"><?php echo $rows['contactNo'];?></td>
            <td class = "get-MemberB"><?php echo $rows['dateOfBirth'];?></td>
            <td class = "get-MemberG"><?php echo $rows['sex'];?></td>
            <td class = "get-MemberE"><?php echo $rows['email'];?></td>
            <td class = "get-MemberS"><?php echo $rows['maritalStatus'];?></td>
            <td class = "get-MemberP"><?php echo $rows['position'];?></td>
            <td>
                <div class="text-center">
                    <button class="btn updateMembers">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                        </svg>
                    </button>
                </div>
            </td>
           
       </tr>
<?php            
        } 
    }

    public function viewChurchMember($username) {
        if($username != NULL ){
            $sql = "SELECT m.*, c.* FROM `member` as m inner join `church` as c on c.churchID = m.churchID_FK where m.churchID_FK = (SELECT churchID_FK from account where username = ?)";
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

                        <?php // disabling churchName in church Account
                        if($_SESSION['user'] == $_SESSION['admin'] || $_SESSION['user'] == $_SESSION['chairsec'] ) {
                        ?>
                        <td class = "get-ChurchN"><?php echo $rows['churchName'];?></td>
                        <?php
                        }
                        ?>
                        
                        <td class = "get-MemberN"><?php echo $rows['lname'].", ".$rows['fname'].", ".$rows['mname'];?></td>
                        <td class = "get-MemberC"><?php echo $rows['contactNo'];?></td>
                        <td class = "get-MemberB"><?php echo $rows['dateOfBirth'];?></td>
                        <td class = "get-MemberG"><?php echo $rows['sex'];?></td>
                        <td class = "get-MemberE"><?php echo $rows['email'];?></td>
                        <td class = "get-MemberS"><?php echo $rows['maritalStatus'];?></td>
                        <td class = "get-MemberP"><?php echo $rows['position'];?></td>
                        <td>
                            <div class="text-center">
                                <button class="btn updateMembers">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                    </svg>
                                </button>
                            </div>
                        </td>
                        
                    </tr>
<?php            
                } 

        }else{

        }
    }

    public function cemeteryList() {
            $sql = "SELECT c.*, p.*, r.*, ch.*, m.* FROM (((((`cemeterylist` as `c`inner join `payment` as p on c.requestFormID = p.paymentID) inner join `requestform` as r on p.requestID = r.requestID)inner join `account` as a on r.churchAccID = a.churchAccID)inner join `church` as `ch` on a.churchID_FK = ch.churchID)inner join `member` as m on a.pastorID_FK = m.memberID)";
            $stmt =$this->connect()->query($sql);
           
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
                        <td class = "get-requestID text-center">
                            <?php echo $rows['requestID']; ?>
                        </td>
                        <td class = "get-DesceasedName"><?php echo $rows['d_lname'].", ".$rows['d_fname'].", ".$rows['d_mname'];?></td>
                        <td><?php echo $rows['churchName'];?></td>
                        <td>
                            <?php
                                echo $rows['Internment'];
                                //if($user == $pic) {
                                // $date = $rows['Internment'];
                                
                                    //explode the date to get month, day and year
                                    //$date = explode(" ", $date);
                                    
                                    //get age from date or birthdate
                                    //$yr = (date("md", date("U", mktime(0, 0, 0, $date[0], $date[1], $date[2]))) > date("md")
                                    //? ((date("Y") - $date[0]) - 1)
                                    //: (date("Y") - $date[0]));
                                // echo "<b>(". $yr . "yr/s)</b><br>";
                                // if($yr < 5) {
                                    //    echo "Pass";
                                    //}else if ($yr == 5) {
                                        // if($this-> OnDueChecker($rows['burial_id']) == false){
                                        //     echo "<b>WILL SEND SMS</b>";
                                        //     $this->smsDue($rows['contactNo'],$rows['fname'],$rows['mname'],$rows['lname'],$rows['burial_fname_dec'],$rows['burial_mname_dec'],$rows['burial_lname_dec'],$rows['terment_date']);
                                        //     $this->smsUpdate(1,$rows['burial_id']);
                                        // } else {
                                        //     echo "<b>SMS SENT!</b>";
                                        // }
                                    //}else if ($yr > 5) {
                                        // if($this-> OverDueChecker($rows['burial_id']) == false){
                                        //     echo "<b>PAYMENT OVER DUE</b>: WILL SEND SMS";
                                        //     $this->smsOverDue($rows['contactNo'],$rows['fname'],$rows['mname'],$rows['lname'],$rows['burial_fname_dec'],$rows['burial_mname_dec'],$rows['burial_lname_dec'],$rows['terment_date']);
                                        //     $this->smsUpdate(2,$rows['burial_id']);
                                        // } else {
                                        //     echo "<b>SMS SENT!</b>";
                                        // }
                                    //};
                                //}
                            ?>
                        </td>
                        <td class = "text-center"><?php echo $rows['a_lname'].", ".$rows['a_fname'].", ".$rows['a_mname'];?></td>
                        <td class = "text-center"><?php echo $rows['contact'];?></td>
                        <td class = "text-center"><?php echo $rows['lname'].", ".$rows['fname'].", ".$rows['mname'];?></td>
                        <td class = "text-center"><?php echo $rows['contactNo'];?></td>
                        
                        <!-- update button -->
                        <td>             
                            <div class="text-center">
                                <button class="btn ">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
<?php           
                    } 
    }

    public function ossuarylist() {
        $sql = "SELECT c.*, p.*, r.*, ch.*, m.* FROM (((((`ossuarylist` as `c`inner join `payment` as p on c.requestFormID = p.paymentID) inner join `requestform` as r on p.requestID = r.requestID)inner join `account` as a on r.churchAccID = a.churchAccID)inner join `church` as `ch` on a.churchID_FK = ch.churchID)inner join `member` as m on a.pastorID_FK = m.memberID)";
        $stmt =$this->connect()->query($sql);
       
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
                    <td class = "get-requestID text-center">
                        <?php echo $rows['requestID']; ?>
                    </td>
                    <td class = "get-DesceasedName"><?php echo $rows['d_lname'].", ".$rows['d_fname'].", ".$rows['d_mname'];?></td>
                    <td><?php echo $rows['churchName'];?></td>
                    <td><?php echo $rows['Internment'];?></td>
                    <td class = "text-center"><?php echo $rows['a_lname'].", ".$rows['a_fname'].", ".$rows['a_mname'];?></td>
                    <td class = "text-center"><?php echo $rows['contact'];?></td>
                    <td class = "text-center"><?php echo $rows['lname'].", ".$rows['fname'].", ".$rows['mname'];?></td>
                    <td class = "text-center"><?php echo $rows['contactNo'];?></td>
                    
                    <!-- update button -->
                    <td>             
                        <div class="text-center">
                            <button class="btn ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>
<?php           
                } 
}

//BURIAL TABLE ||BURIAL TABLE ||BURIAL TABLE ||BURIAL TABLE ||BURIAL TABLE ||BURIAL TABLE ||BURIAL TABLE ||BURIAL TABLE ||BURIAL TABLE ||BURIAL TABLE ||
    public function viewGenBurial($user, $id) {
        $admin = 'admin@alicf.com';
        $chairsec = 'chairsec@alicf.com';
        $pic = 'pic@alicf.com';
        $treasurer = 'treasurer@alicf.com';

        if($user == $admin || $user == $chairsec){
            //condition for burial
            if($id == 1) {
            //     $sql = "SELECT b.*, p.fname, p.mname, p.lname, p.contactNo, c.churchName, c.churchAddress, pay.* from ((((formburial as b inner join account on b.churchAccID = account.churchAccID)
            //     inner join pastor as p on account.pastorID_FK = p.pastorID)
            //    inner join church as c on account.churchID_FK = c.churchID)
            //   inner join payment as pay on b.burial_id = pay.burial_id)
            //    WHERE b.status != 'pending' AND pay.application_id = 1;";
            // CODE WILL BE USED FOR FUTURE DEVELOPMENT
            $sql = "SELECT f.*, c.churchName, m.*, p.* FROM ((((`requestform` as f inner join account as a on f.churchAccID = a.churchAccID)inner join church as c on c.churchID = a.churchID_FK)inner join member as m on m.memberID = a.pastorID_FK)inner join payment as p on p.requestID = f.requestID) WHERE f.formClassification = 'burial';";
            //condition for transferal
            }else if ($id == 2) {
                $sql = "SELECT f.*, c.churchName, m.*, p.* FROM ((((`requestform` as f inner join account as a on f.churchAccID = a.churchAccID)inner join church as c on c.churchID = a.churchID_FK)inner join member as m on m.memberID = a.pastorID_FK)inner join payment as p on p.requestID = f.requestID) WHERE f.formClassification = 'transfer';";
            }
            //condition for renewal
            else if ($id == 3) {
                $sql = "SELECT b.*, p.fname, p.mname, p.lname, p.contactNo, c.churchName, c.churchAddress from (((formburial as b inner join account on b.churchAccID = account.churchAccID)inner join pastor as p on account.pastorID_FK = p.pastorID) inner join church as c on account.churchID_FK = c.churchID) WHERE b.status != 'pending' AND b.application_id = 3";
            }
        } else {
            //condition for burial
            if($id == 1){
                $sql = "SELECT b.*, p.fname, p.mname, p.lname, p.contactNo, c.churchName, c.churchAddress from (((formburial as b inner join account on b.churchAccID = account.churchAccID)inner join pastor as p on account.pastorID_FK = p.pastorID) inner join church as c on account.churchID_FK = c.churchID) WHERE b.status != 'pending' AND b.payment = 1 AND b.application_id = 1";
            }//condition for transferal
            if($id == 2){
                $sql = "SELECT b.*, p.fname, p.mname, p.lname, p.contactNo, c.churchName, c.churchAddress from (((formburial as b inner join account on b.churchAccID = account.churchAccID)inner join pastor as p on account.pastorID_FK = p.pastorID) inner join church as c on account.churchID_FK = c.churchID) WHERE b.status != 'pending' AND b.payment = 1 AND b.transfer = 2";
            }//condition for renewal
            if($id == 3){
                $sql = "SELECT b.*, p.fname, p.mname, p.lname, p.contactNo, c.churchName, c.churchAddress from (((formburial as b inner join account on b.churchAccID = account.churchAccID)inner join pastor as p on account.pastorID_FK = p.pastorID) inner join church as c on account.churchID_FK = c.churchID) WHERE b.status != 'pending' AND b.payment = 1 AND b.renew = 3";
            }
        }
        
        $stmt =$this->connect()->prepare($sql);
        $stmt -> execute();
        $bool = true;
        $n = 0;
        $a=0;

        if($stmt->rowCount() == 0){
            ?>
                <tr>
                    <td colspan =14 ><div class="text-center fw-bold"><?php echo "<h1>NO REQUEST APPLICATION FORM ATM.</h1>"; ?></div></td>
                </tr>
            <?php
        }

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
                <td class = "get-requestID text-center">
                    <?php echo $rows['requestID']; ?>
                </td>
                <td class = "get-DesceasedName"><?php echo $rows['d_lname'].", ".$rows['d_fname'].", ".$rows['d_mname'];?></td>
                <td><?php echo $rows['churchName'];?></td>
                <td><?php echo $rows['DOD'];?></td>
                <td>
                    <?php
                        echo $rows['Internment'];
                        if($user == $pic) {
                            $date = $rows['Internment'];
                            //explode the date to get month, day and year
                            $date = explode(" ", $date);
                            //get age from date or birthdate
                            $yr = (date("md", date("U", mktime(0, 0, 0, $date[0], $date[1], $date[2]))) > date("md")
                            ? ((date("Y") - $date[0]) - 1)
                            : (date("Y") - $date[0]));
                            echo "<b>(". $yr . "yr/s)</b><br>";
                            if($yr < 5) {
                                echo "Pass";
                            }else if ($yr == 5) {
                                // if($this-> OnDueChecker($rows['burial_id']) == false){
                                //     echo "<b>WILL SEND SMS</b>";
                                //     $this->smsDue($rows['contactNo'],$rows['fname'],$rows['mname'],$rows['lname'],$rows['burial_fname_dec'],$rows['burial_mname_dec'],$rows['burial_lname_dec'],$rows['terment_date']);
                                //     $this->smsUpdate(1,$rows['burial_id']);
                                // } else {
                                //     echo "<b>SMS SENT!</b>";
                                // }
                            }else if ($yr > 5) {
                                // if($this-> OverDueChecker($rows['burial_id']) == false){
                                //     echo "<b>PAYMENT OVER DUE</b>: WILL SEND SMS";
                                //     $this->smsOverDue($rows['contactNo'],$rows['fname'],$rows['mname'],$rows['lname'],$rows['burial_fname_dec'],$rows['burial_mname_dec'],$rows['burial_lname_dec'],$rows['terment_date']);
                                //     $this->smsUpdate(2,$rows['burial_id']);
                                // } else {
                                //     echo "<b>SMS SENT!</b>";
                                // }
                            };
                        }
                    ?>
                </td>
                <td class = "text-center"><?php echo $rows['a_lname'].", ".$rows['a_fname'].", ".$rows['a_mname'];?></td>
                <td class = "text-center"><?php echo $rows['contact'];?></td>
                <!-- <td class = "text-center"><?php //echo $rows['lname'].", ".$rows['fname'].", ".$rows['mname'];?></td> -->
                <!-- <td class = "text-center"><?php //echo $rows['contactNo'];?></td> -->
                
                <?php
                if($user != $pic){
                ?>
                    <td class = "text-center">
                    <?php
                            if($rows['payment'] == 'unpaid'){
                    ?>  
                                <button class="btn setPayment">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="red" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                                    </svg>
                                </button>   
                    <?php
                            } else {
                    ?>
                                <button class="btn ">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="green" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                    </svg>
                                </button>
                    <?php
                            }
                    ?>
                    </td>
                <?php 
                }
                ?>
                <!-- receipt column -->
                <td class = "text-center">
                    <?php
                        if($rows['receiptNo'] == NULL){
                    ?>  
                            <button class="btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="red" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                                </svg>
                            </button>   
                    <?php
                        } else {
                            echo "".$rows['receiptNo'];
                        }
                    ?>
                </td>
                <!-- date/time column -->
                <td class = "text-center">
                    <?php
                        if($rows['payment_date'] == NULL){
                    ?>  
                            <button class="btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="red" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                                </svg>
                            </button>   
                    <?php
                        } else {
                            echo "".$rows['payment_date'];
                        }
                    ?>
                </td>
                <!-- update button -->
                <!-- <td>             
                    <div class="text-center">
                        <button class="btn ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg>
                        </button>
                    </div>
                </td> -->
            </tr>
<?php            
        } 
    }

    public function viewChurchBurial($user, $id) {
        if ($id == 1) {
            $sql = "SELECT b.*, p.fname, p.mname, p.lname, p.contactNo, c.churchName, c.churchAddress from (((formburial as b inner join account on b.churchAccID = account.churchAccID)inner join pastor as p on account.pastorID_FK = p.pastorID) inner join church as c on account.churchID_FK = c.churchID) WHERE b.status = 'pending' AND account.username = ? AND b.application_id = ?";
        } else if ($id == 2) {
            $sql = "SELECT b.*, p.fname, p.mname, p.lname, p.contactNo, c.churchName, c.churchAddress from (((formburial as b inner join account on b.churchAccID = account.churchAccID)inner join pastor as p on account.pastorID_FK = p.pastorID) inner join church as c on account.churchID_FK = c.churchID) WHERE b.status = 'pending' AND account.username = ? AND b.transfer = ?";
        } else if ($id == 3) {
            $sql = "SELECT b.*, p.fname, p.mname, p.lname, p.contactNo, c.churchName, c.churchAddress from (((formburial as b inner join account on b.churchAccID = account.churchAccID)inner join pastor as p on account.pastorID_FK = p.pastorID) inner join church as c on account.churchID_FK = c.churchID) WHERE b.status = 'pending' AND account.username = ? AND b.renew = ?";
        }

        $stmt =$this->connect()->prepare($sql);
        $stmt -> execute(array($user, $id));
        $bool = true;
        $n = 0;
        $a = 0;
        if($stmt->rowCount() == 0){
?>
            <tr>
                <td colspan =13 ><div class="text-center fw-bold"><?php echo "<h1>NO REQUEST APPLICATION FORM ATM.</h1>"; ?></div></td>
            </tr>
<?php
        }
        else {

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
                    <td class = "burialID text-center">
                        <?php echo $rows['burial_id']; ?>
                    </td>
                    <td class = "burialName"><?php echo $rows['burial_lname_dec'].", ".$rows['burial_fname_dec'].", ".$rows['burial_mname_dec'];?></td>
                    <td><?php echo $rows['churchName'];?></td>
                    <td><?php echo $rows['churchAddress'];?></td>
                    <td class = "text-center"><?php echo $rows['birth_dec'];?></td>
                    <td class = "text-center"><?php echo $rows['die_dec'];?></td>
                    <td class = "text-center">
                        <?php echo $rows['terment_date'];?>
                    </td>
                    <td class = "text-center"><?php echo $rows['terment_time'];?></td>
                    <td class = ""><?php echo $rows['fname']. ", " .$rows['lname']. " " .$rows['mname'];?></td>
                    <td class = "text-center"><?php echo $rows['contactNo'];?></td>
                    <td>
                        <?php
                        if($id == 1){
                        ?>
                            <div class="text-center">
                                <button class="btn verifyBurial">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="green" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                    </svg>
                                </button>
                            </div>
                        <?php
                        } else if ($id == 3) {
                        ?>
                            <div class="text-center">
                                <button class="btn verifyRenew">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="green" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                    </svg>
                                </button>
                            </div>
                        <?php
                        }
                        ?>             
                    </td>
                    <td>
                        <div class="text-center">
                            <button class="btn ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="red" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>
    <?php            
            } 
        }
    }
    
 // SMS || SMS || SMS || SMS || SMS || SMS || SMS || SMS || SMS || SMS || SMS || SMS || SMS || SMS || SMS || SMS || SMS || SMS || SMS || SMS || SMS || SMS || SMS || SMS || SMS || SMS || SMS || SMS || 
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
    //  SMS INTERACTIONS
    private function OnDueChecker ($burialID){
        $stmt = $this->connect()->prepare(
            "SELECT `SMS` from `formburial` WHERE `burial_id`= ? && `SMS` = 0");
        
            if (!$stmt->execute(array($burialID))) {
                $stmt = null;
                header("Location: ../Php/Displaylist/accountUI.php?error=checkerSMSVALUEStmtfailed");
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
    private function OverDueChecker ($burialID){
        $stmt = $this->connect()->prepare(
            "SELECT `SMS` from `formburial` WHERE `burial_id`= ? && `SMS` = 1");
        
            if (!$stmt->execute(array($burialID))) {
                $stmt = null;
                header("Location: ../Php/Displaylist/accountUI.php?error=checkerSMSVALUEStmtfailed");
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
    private function smsUpdate ($n,$burialID){
        $stmt = $this->connect()->prepare(
            "UPDATE `formburial` SET `SMS` = ? WHERE `formburial`.`burial_id` = ?");
        
            if (!$stmt->execute(array($n,$burialID))) {
                $stmt = null;
                header("Location: ../Php/Displaylist/accountUI.php?error=smsUPDATEVALUEStmtfailed");
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