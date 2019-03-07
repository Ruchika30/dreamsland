  
  <?php
/////////////////////////////// SIGNUP CODE 
require 'library.php';
//require __DIR__ . '/library.php';
include 'database.php';
$app = new DemoLib();

$login_error_message = '';
$register_error_message = '';


// <!-- ---------- INFLUENCER --------------- -->
     
        $influname =  isset($_POST['fname']) ? $_POST['fname'] : ''; 
        $infldate =  isset($_POST['date']) ? $_POST['date'] : ''; 
        $inflmessage =  isset($_POST['imessage']) ? $_POST['imessage'] : '';

  if(isset($_POST['influencer-submit'])){

  try{

           if ($_POST['fname'] == "") {
                $register_error_message = ' name is required!';
        //    } else if ($_POST['fname'] == ""){
          //      $register_error_message = 'Full Name is required!';
         //  } 
          }else {
            $user_id = $app->Registerinflu($_POST['fname'],$_POST['date'], $_POST['imessage']);
            $mssgvalues = $app->getdata();
      

            }
             
    } // try ends
  catch(PDOException $error){
        echo 'ERROR: ' . $error->getMessage();
  }$conn = null;
}



?> 
<html>
<head>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <link rel="stylesheet"  href="signup.css">

<link href="css/agency.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="styleown.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="signupjs.js"></script>
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!------ Include the above in your HEAD tag ---------->


</head>
<body>

  
<div class="container">
    <div class="row">
      <!--div class="col-md-6 col-md-offset-3"-->
      
      <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-login">
          <div class="panel-heading">
            <div class="row">
              <div class="col-sm-6 ">
                <a href="#" class="active" id="register-form-link">Influencer</a>
              </div>
             
            </div>
            <hr>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-sm-12">
              <?php
                      if ($register_error_message != "") {
                          echo '<div class="alert alert-danger"><strong>Error: </strong> ' . $register_error_message . '</div>';
                      }
                   ?>

              
              <form id="register-form" action="signup.php" method="post" role="form" name= "influformdata" value ="influ" style="display: block;"  enctype="multipart/form-data" >
                    
                 
                
                  <div class="form-group">
                    <input type="text" name="fname" id="fname" tabindex="1" class="form-control" placeholder="Your Name" value="">
                  </div>

                 
                  <div class="form-group">
                    <input type="number" name="date" id="date" tabindex="1" class="form-control" placeholder="Contact number" value="">
                  </div>
              
                  <div class="form-group">
                    <textarea rows="4" cols="50" name="imessage" id="ipmessage" class="form-control"  placeholder="Something you want to tell us"></textarea>
                  </div>
                    <div class="row">
                      <div class="col-sm-6 col-sm-offset-3">
                        <input type="submit" name="influencer-submit" id="register-submit" tabindex="4" class="form-control btn btn-register"  value="ifi Register Now">
                      </div>

                      
              

                </form>
              
  
                <?php
                        if ($login_error_message != "") {
                            echo '<div class="alert alert-danger"><strong>Error: </strong> ' . $login_error_message . '</div>';
                        }
                ?>

                 
                    </div>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>


      <script type="text/javascript">
  
      </script>

    
  
  </body>
</html>
