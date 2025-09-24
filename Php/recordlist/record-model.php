<?php   

    class RecordModel extends Dbh{
        //to be fixed
        protected function UserAccount ($username) {
            $sql = "SELECT church.churchName FROM account INNER JOIN church ON account.churchID_FK = church.churchID WHERE account.username =`$username`";
            $stmt =$this->connect()->prepare($sql);
            $stmt->execute([$username]);
            $result = $stmt -> fetchAll(); 
            
            foreach ($result as $rows) {
                
                echo "test";

            }
        }

        protected function countChurch() {
            $sql = "SELECT * FROM pastor";
           $stmt =$this->connect()->prepare($sql);
           $stmt->execute();

           $result = $stmt->fetch();
           
           return $result;
        }

        protected function addChurch () {
            $sql = "";
            $stmt =$this->connect()->prepare($sql);
           $stmt->execute();

        }

        
        protected function SpecificChurch() {
            $sql = "SELECT * FROM church ";// new(churchID) - old(id)
           $stmt =$this->connect()->prepare($sql);
           $stmt->execute();

           $result = $stmt->fetchAll();
           
           return $result;
        }



        
    }