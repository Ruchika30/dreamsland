 
 <?php
class DemoLib
{
 
   
    public function Registerinflu($pgname,$infldate, $inflmessage)
    {

        $influname =  isset($_POST['fname']) ? $_POST['fname'] : ''; 
        $infldate =  isset($_POST['date']) ? $_POST['date'] : ''; 
        $inflmessage =  isset($_POST['imessage']) ? $_POST['imessage'] : '';
        

            try {
                $db = DB();
                //$query = $db->prepare("INSERT INTO `influencers`(`pgname`,`fullname`,`inflcountry`,`inflphone`,`rchweek`,`impweek`,`nmbofuploads`,`ratepost`,`ratestory`,`avgimprstry`,`stryuplds`,`influencermssgs`) VALUES(:pagemname,:fullname,:inflcountry,:inphone,:rchweek,:impweek,:nmbofuploads,:ratepost,:ratestry,:avgimprstry,:stryuplds,:inflmessage)");
                $query = $db->prepare("INSERT INTO `cmttable`(`Name`,`date`,`message`) VALUES(:fullname,:thisdate,:inflmessage)");


                $query->bindValue(':fullname', $influname);
                $query->bindValue(':thisdate', $infldate);
                $query->bindValue(':inflmessage', $inflmessage);

                $query->execute();
              //  return $db->lastInsertId();
            } catch (PDOException $e) {
                exit($e->getMessage());
            }
    }
    


    public function getdata()
    {
        
        try {
            $db = DB();
            $query = $db->prepare("SELECT Name, message FROM cmttable ");
            $query->execute();


            $rows = $query->fetchAll(PDO::FETCH_ASSOC);
            foreach($rows as $key => $arrRows){
                echo '<div class="alert alert-danger"><strong>Name: </strong>' .$arrRows['Name']. '<br>Message:' .$arrRows['message']. '</div><br />';
                
            }

            

  /*
            $rows = $query->fetchAll(PDO::FETCH_ASSOC);
            print_r($rows);
            foreach($rows as $key => $arrRows){
                 
                 echo  $arrRows['message'] ."<br/>"; 
                 
                  } 
  */
           
        }
            
         catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
 

    /*
     * Check Email
     *
     * @param $email
     * @return boolean
     * 
    public function isEmail($bemail)
    {
        $bemail = isset($_POST['bemail']) ? $_POST['bemail'] : ''; 
        try {
            $db = DB();
            $query = $db->prepare("SELECT user_id FROM brandusers WHERE bemail=:bemail");
            //$query->bindParam("bemail", $bemail, PDO::PARAM_STR);
            $query->bindValue(':bemail', $bemail);
            $query->execute();
            if ($query->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
 */

 /*
    public function Login($branduser, $pwd)
    {
        $branduser =  isset($_POST['busername']) ? $_POST['busername'] : ''; 
        $pwd = isset($_POST['bpassword']) ? $_POST['bpassword'] : ''; 
        try {
            $db = DB();
            $query = $db->prepare("SELECT * FROM brandusers WHERE (busername=:busername OR bemail=:busername) AND bpassword=:bpassword");
            $query->bindParam("busername", $branduser, PDO::PARAM_STR);
            $enc_password = hash('sha256', $pwd);
            $query->bindValue(':bpassword', $enc_password);
            $query->execute();
            if ($query->rowCount() > 0) {
                $result = $query->fetch(PDO::FETCH_OBJ);
                return $result->user_id;
            } else {
               header("Location:localhost/thissite/index.html"); // Redirect user to the profile.php
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function UserDetails($user_id)
    {
        try {
            $db = DB();
            $query = $db->prepare("SELECT * FROM brandusers WHERE user_id=:user_id");
            $query->bindValue(':user_id', $user_id);
            //$query->bindParam("user_id", $user_id, PDO::PARAM_STR);
            $query->execute();
            if ($query->rowCount() > 0) {
                return $query->fetch(PDO::FETCH_OBJ);
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
}
 */
}
?>

