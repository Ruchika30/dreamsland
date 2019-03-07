  
  <?php
/////////////////////////////// SIGNUP CODE 
//include 'library.php';
require __DIR__ . '/library.php';
include 'database.php';
$app = new DemoLib();

$login_error_message = '';
$register_error_message = '';

//<!-- ---------- BBRAND  --------------- -->
$brandname = isset($_POST['brandname']) ? $_POST['brandname'] : '';  // TO avoid Undefined Index error
$branduser =  isset($_POST['busername']) ? $_POST['busername'] : ''; 
//$pwd = isset($_POST['bpassword']) ? $_POST['bpassword'] : ''; 
//$cpwd = isset($_POST['bconfpass']) ? $_POST['bconfpass'] : ''; 
$bemail = isset($_POST['bemail']) ? $_POST['bemail'] : ''; 
$brphone = isset($_POST['bphone']) ? $_POST['bphone'] : ''; 
$bcountry = isset($_POST['brcountry']) ? $_POST['brcountry'] : '';

// <!-- ---------- INFLUENCER --------------- -->
        $pgname =  isset($_POST['pgename']) ? $_POST['pgename'] : ''; 
        $influname =  isset($_POST['fname']) ? $_POST['fname'] : ''; 
        $inflcountry = isset($_POST['inflcountry']) ? $_POST['inflcountry'] : '';
        $inflphone =  isset($_POST['inphone']) ? $_POST['inphone'] : ''; 
       $rchpst =  isset($_POST['rchpost']) ? $_POST['rchpost'] : ''; 
        $rchstry =  isset($_POST['rchstr']) ? $_POST['rchstr'] : ''; 
        $ratepst =  isset($_POST['prpost']) ? $_POST['prpost'] : ''; 
        $ratestry =  isset($_POST['prstr']) ? $_POST['prstr'] : ''; 
        $rchweek =  isset($_POST['rchweek']) ? $_POST['rchweek'] : ''; 
        $avgimprstry =  isset($_POST['avgimprstry']) ? $_POST['avgimprstry'] : ''; 
        $stryuplds =  isset($_POST['stryuplds']) ? $_POST['stryuplds'] : ''; 
        $inflmessage =  isset($_POST['imessage']) ? $_POST['imessage'] : '';

        
        

  

if (!isset($_POST['submit']) && !empty($_POST["brandname"]) ){

    
  

        try {

     
            if ($_POST['brandname'] == "") {
                $login_error_message = 'Brand Name field is required!';
            } else if ($_POST['bemail'] == "") {
                $login_error_message = 'Email field is required!';
            //}else if ($_POST['busername'] == "") {
               // $login_error_message = 'Username field is required!';
            //}else if ($_POST['country'] == "") {
               // $login_error_message = 'Country field is required!';
          //  } else if ($_POST['bphone'] == "") {
            //    $login_error_message = 'Phone number is required!';
            // } else if ($_POST['bpassword'] == "") {
                //$login_error_message = 'Password field is required!';
             //else if ($_POST['bpassword'] != $_POST['bconfpass'] ){
              //$login_error_message = 'Password dont match';
            }else if (!filter_var($_POST['bemail'], FILTER_VALIDATE_EMAIL)) {
                $login_error_message = 'Invalid email address!';
            } else if ($app->isEmail($_POST['bemail'])) {
                $login_error_message = 'Email is already in use!';
            } //else if ($app->isUsername($_POST['busername'])) {
                //$login_error_message = 'Username is already in use!';
             else {
              //  $user_id = $app->Registerbrand($_POST['brandname'], $_POST['bemail'],$_POST['bphone'] , $_POST['busername'], $_POST['bpassword'], $_POST['bconfpass']);
                $user_id = $app->Registerbrand($_POST['brandname'], $_POST['bemail'],$_POST['bphone'] , $_POST['busername'], $_POST['brcountry'] );
                
                // set session and redirect user to the profile page

            //    $_SESSION['user_id'] = $user_id;
               header("Location: https://theviraladvertising.com/Tva_signin/reg-com.php");
            }
        
  } //Try ends
        catch(PDOException $error) {
            echo 'ERROR: ' . $error->getMessage();
        }$conn = null;
    
}

  
  else
 {
  if(isset($_POST['influencer-submit'])){
     
    $target_dir = "influImageData/";
    $target_file = $target_dir . basename($_FILES["influphoto"]["name"]);
    move_uploaded_file($_FILES["influphoto"]["tmp_name"], $target_file);

  try{


          
           if ($_POST['pgename'] == "") {
                $register_error_message = 'Page name is required!';
        //    } else if ($_POST['fname'] == ""){
          //      $register_error_message = 'Full Name is required!';
         //  } else if ($_POST['inphone'] == ""){
           //    $register_error_message = 'Phone number is required!';
          //  } else if ($_POST['inflcountry'] == "") {
            //    $login_error_message = 'Country field is required!';
         //   }else if ($_POST['rchpost'] == "") {
           //     $register_error_message = 'Avg reach per post is required.Put 0 if none!';
          //  } else if ($_POST['rchstr'] == "") {
           //     $register_error_message = 'Avg reach per story is required.Put 0 if none!';
        //  }else if ($_POST['prpost'] == "") {
          //      $register_error_message = 'Post rate is required';
       //   }else if ($_POST['prstr'] == "") {
         //       $register_error_message = 'Story rate is required!';
          }else {
            $user_id = $app->Registerinflu($_POST['pgename'], $_POST['fname'],$_POST['inphone'], $_POST['prpost'], $_POST['prstr'], $_POST['inflcountry'], $_POST['rchweek'],$_POST['avgimprstry'],$_POST['stryuplds'], $_POST['imessage'],  $_POST['rchpost'], $_POST['rchstr']);
            header("Location: https://theviraladvertising.com/Tva_signin/reg-com.php"); // Redirect user to the profile.php

            }
             
    } // try ends
  catch(PDOException $error){
        echo 'ERROR: ' . $error->getMessage();
  }$conn = null;
}

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
              <div class="col-sm-6">
                <a href="#" class="" id="login-form-link">Brand</a>
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
                      <input type="text" name="pgename" id="pgename" tabindex="1" class="form-control" placeholder="Page Name*" value="">
                  </div>
                
                
                  <div class="form-group">
                    <input type="text" name="fname" id="fname" tabindex="1" class="form-control" placeholder="Your Name" value="">
                  </div>

                  <div class="form-group">
                   <label type="text" tabindex="1" >Country:</label>
                       
                  <!--input type="text" name="country" id="country" tabindex="1" class="form-control" placeholder="Country" value=""-->
                    <select name="inflcountry" id="inflcountry">
                      <option value="" disabled="disabled" selected="selected">Please select a country</option>
                      <option value=""  selected="selected">Select Country</option> 
                              <option value="India">India</option> 
                              <option value="United States">United States</option> 
                              <option value="United Kingdom">United Kingdom</option> 
                              <option value="Afghanistan">Afghanistan</option> 
                              <option value="Albania">Albania</option> 
                              <option value="Algeria">Algeria</option> 
                              <option value="American Samoa">American Samoa</option> 
                              <option value="Andorra">Andorra</option> 
                              <option value="Angola">Angola</option> 
                              <option value="Anguilla">Anguilla</option> 
                              <option value="Antarctica">Antarctica</option> 
                              <option value="Antigua and Barbuda">Antigua and Barbuda</option> 
                              <option value="Argentina">Argentina</option> 
                              <option value="Armenia">Armenia</option> 
                              <option value="Aruba">Aruba</option> 
                              <option value="Australia">Australia</option> 
                              <option value="Austria">Austria</option> 
                              <option value="Azerbaijan">Azerbaijan</option> 
                              <option value="Bahamas">Bahamas</option> 
                              <option value="Bahrain">Bahrain</option> 
                              <option value="Bangladesh">Bangladesh</option> 
                              <option value="Barbados">Barbados</option> 
                              <option value="Belarus">Belarus</option> 
                              <option value="Belgium">Belgium</option> 
                              <option value="Belize">Belize</option> 
                              <option value="Benin">Benin</option> 
                              <option value="Bermuda">Bermuda</option> 
                              <option value="Bhutan">Bhutan</option> 
                              <option value="Bolivia">Bolivia</option> 
                              <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option> 
                              <option value="Botswana">Botswana</option> 
                              <option value="Bouvet Island">Bouvet Island</option> 
                              <option value="Brazil">Brazil</option> 
                              <option value="British Indian Ocean Territory">British Indian Ocean Territory</option> 
                              <option value="Brunei Darussalam">Brunei Darussalam</option> 
                              <option value="Bulgaria">Bulgaria</option> 
                              <option value="Burkina Faso">Burkina Faso</option> 
                              <option value="Burundi">Burundi</option> 
                              <option value="Cambodia">Cambodia</option> 
                              <option value="Cameroon">Cameroon</option> 
                              <option value="Canada">Canada</option> 
                              <option value="Cape Verde">Cape Verde</option> 
                              <option value="Cayman Islands">Cayman Islands</option> 
                              <option value="Central African Republic">Central African Republic</option> 
                              <option value="Chad">Chad</option> 
                              <option value="Chile">Chile</option> 
                              <option value="China">China</option> 
                              <option value="Christmas Island">Christmas Island</option> 
                              <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option> 
                              <option value="Colombia">Colombia</option> 
                              <option value="Comoros">Comoros</option> 
                              <option value="Congo">Congo</option> 
                              <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option> 
                              <option value="Cook Islands">Cook Islands</option> 
                              <option value="Costa Rica">Costa Rica</option> 
                              <option value="Cote D'ivoire">Cote D'ivoire</option> 
                              <option value="Croatia">Croatia</option> 
                              <option value="Cuba">Cuba</option> 
                              <option value="Cyprus">Cyprus</option> 
                              <option value="Czech Republic">Czech Republic</option> 
                              <option value="Denmark">Denmark</option> 
                              <option value="Djibouti">Djibouti</option> 
                              <option value="Dominica">Dominica</option> 
                              <option value="Dominican Republic">Dominican Republic</option> 
                              <option value="Ecuador">Ecuador</option> 
                              <option value="Egypt">Egypt</option> 
                              <option value="El Salvador">El Salvador</option> 
                              <option value="Equatorial Guinea">Equatorial Guinea</option> 
                              <option value="Eritrea">Eritrea</option> 
                              <option value="Estonia">Estonia</option> 
                              <option value="Ethiopia">Ethiopia</option> 
                              <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option> 
                              <option value="Faroe Islands">Faroe Islands</option> 
                              <option value="Fiji">Fiji</option> 
                              <option value="Finland">Finland</option> 
                              <option value="France">France</option> 
                              <option value="French Guiana">French Guiana</option> 
                              <option value="French Polynesia">French Polynesia</option> 
                              <option value="French Southern Territories">French Southern Territories</option> 
                              <option value="Gabon">Gabon</option> 
                              <option value="Gambia">Gambia</option> 
                              <option value="Georgia">Georgia</option> 
                              <option value="Germany">Germany</option> 
                              <option value="Ghana">Ghana</option> 
                              <option value="Gibraltar">Gibraltar</option> 
                              <option value="Greece">Greece</option> 
                              <option value="Greenland">Greenland</option> 
                              <option value="Grenada">Grenada</option> 
                              <option value="Guadeloupe">Guadeloupe</option> 
                              <option value="Guam">Guam</option> 
                              <option value="Guatemala">Guatemala</option> 
                              <option value="Guinea">Guinea</option> 
                              <option value="Guinea-bissau">Guinea-bissau</option> 
                              <option value="Guyana">Guyana</option> 
                              <option value="Haiti">Haiti</option> 
                              <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option> 
                              <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option> 
                              <option value="Honduras">Honduras</option> 
                              <option value="Hong Kong">Hong Kong</option> 
                              <option value="Hungary">Hungary</option> 
                              <option value="Iceland">Iceland</option> 
                              <option value="Indonesia">Indonesia</option> 
                              <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option> 
                              <option value="Iraq">Iraq</option> 
                              <option value="Ireland">Ireland</option> 
                              <option value="Israel">Israel</option> 
                              <option value="Italy">Italy</option> 
                              <option value="Jamaica">Jamaica</option> 
                              <option value="Japan">Japan</option> 
                              <option value="Jordan">Jordan</option> 
                              <option value="Kazakhstan">Kazakhstan</option> 
                              <option value="Kenya">Kenya</option> 
                              <option value="Kiribati">Kiribati</option> 
                              <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option> 
                              <option value="Korea, Republic of">Korea, Republic of</option> 
                              <option value="Kuwait">Kuwait</option> 
                              <option value="Kyrgyzstan">Kyrgyzstan</option> 
                              <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option> 
                              <option value="Latvia">Latvia</option> 
                              <option value="Lebanon">Lebanon</option> 
                              <option value="Lesotho">Lesotho</option> 
                              <option value="Liberia">Liberia</option> 
                              <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option> 
                              <option value="Liechtenstein">Liechtenstein</option> 
                              <option value="Lithuania">Lithuania</option> 
                              <option value="Luxembourg">Luxembourg</option> 
                              <option value="Macao">Macao</option> 
                              <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option> 
                              <option value="Madagascar">Madagascar</option> 
                              <option value="Malawi">Malawi</option> 
                              <option value="Malaysia">Malaysia</option> 
                              <option value="Maldives">Maldives</option> 
                              <option value="Mali">Mali</option> 
                              <option value="Malta">Malta</option> 
                              <option value="Marshall Islands">Marshall Islands</option> 
                              <option value="Martinique">Martinique</option> 
                              <option value="Mauritania">Mauritania</option> 
                              <option value="Mauritius">Mauritius</option> 
                              <option value="Mayotte">Mayotte</option> 
                              <option value="Mexico">Mexico</option> 
                              <option value="Micronesia, Federated States of">Micronesia, Federated States of</option> 
                              <option value="Moldova, Republic of">Moldova, Republic of</option> 
                              <option value="Monaco">Monaco</option> 
                              <option value="Mongolia">Mongolia</option> 
                              <option value="Montserrat">Montserrat</option> 
                              <option value="Morocco">Morocco</option> 
                              <option value="Mozambique">Mozambique</option> 
                              <option value="Myanmar">Myanmar</option> 
                              <option value="Namibia">Namibia</option> 
                              <option value="Nauru">Nauru</option> 
                              <option value="Nepal">Nepal</option> 
                              <option value="Netherlands">Netherlands</option> 
                              <option value="Netherlands Antilles">Netherlands Antilles</option> 
                              <option value="New Caledonia">New Caledonia</option> 
                              <option value="New Zealand">New Zealand</option> 
                              <option value="Nicaragua">Nicaragua</option> 
                              <option value="Niger">Niger</option> 
                              <option value="Nigeria">Nigeria</option> 
                              <option value="Niue">Niue</option> 
                              <option value="Norfolk Island">Norfolk Island</option> 
                              <option value="Northern Mariana Islands">Northern Mariana Islands</option> 
                              <option value="Norway">Norway</option> 
                              <option value="Oman">Oman</option> 
                              <option value="Pakistan">Pakistan</option> 
                              <option value="Palau">Palau</option> 
                              <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option> 
                              <option value="Panama">Panama</option> 
                              <option value="Papua New Guinea">Papua New Guinea</option> 
                              <option value="Paraguay">Paraguay</option> 
                              <option value="Peru">Peru</option> 
                              <option value="Philippines">Philippines</option> 
                              <option value="Pitcairn">Pitcairn</option> 
                              <option value="Poland">Poland</option> 
                              <option value="Portugal">Portugal</option> 
                              <option value="Puerto Rico">Puerto Rico</option> 
                              <option value="Qatar">Qatar</option> 
                              <option value="Reunion">Reunion</option> 
                              <option value="Romania">Romania</option> 
                              <option value="Russian Federation">Russian Federation</option> 
                              <option value="Rwanda">Rwanda</option> 
                              <option value="Saint Helena">Saint Helena</option> 
                              <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option> 
                              <option value="Saint Lucia">Saint Lucia</option> 
                              <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option> 
                              <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option> 
                              <option value="Samoa">Samoa</option> 
                              <option value="San Marino">San Marino</option> 
                              <option value="Sao Tome and Principe">Sao Tome and Principe</option> 
                              <option value="Saudi Arabia">Saudi Arabia</option> 
                              <option value="Senegal">Senegal</option> 
                              <option value="Serbia and Montenegro">Serbia and Montenegro</option> 
                              <option value="Seychelles">Seychelles</option> 
                              <option value="Sierra Leone">Sierra Leone</option> 
                              <option value="Singapore">Singapore</option> 
                              <option value="Slovakia">Slovakia</option> 
                              <option value="Slovenia">Slovenia</option> 
                              <option value="Solomon Islands">Solomon Islands</option> 
                              <option value="Somalia">Somalia</option> 
                              <option value="South Africa">South Africa</option> 
                              <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option> 
                              <option value="Spain">Spain</option> 
                              <option value="Sri Lanka">Sri Lanka</option> 
                              <option value="Sudan">Sudan</option> 
                              <option value="Suriname">Suriname</option> 
                              <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option> 
                              <option value="Swaziland">Swaziland</option> 
                              <option value="Sweden">Sweden</option> 
                              <option value="Switzerland">Switzerland</option> 
                              <option value="Syrian Arab Republic">Syrian Arab Republic</option> 
                              <option value="Taiwan, Province of China">Taiwan, Province of China</option> 
                              <option value="Tajikistan">Tajikistan</option> 
                              <option value="Tanzania, United Republic of">Tanzania, United Republic of</option> 
                              <option value="Thailand">Thailand</option> 
                              <option value="Timor-leste">Timor-leste</option> 
                              <option value="Togo">Togo</option> 
                              <option value="Tokelau">Tokelau</option> 
                              <option value="Tonga">Tonga</option> 
                              <option value="Trinidad and Tobago">Trinidad and Tobago</option> 
                              <option value="Tunisia">Tunisia</option> 
                              <option value="Turkey">Turkey</option> 
                              <option value="Turkmenistan">Turkmenistan</option> 
                              <option value="Turks and Caicos Islands">Turks and Caicos Islands</option> 
                              <option value="Tuvalu">Tuvalu</option> 
                              <option value="Uganda">Uganda</option> 
                              <option value="Ukraine">Ukraine</option> 
                              <option value="United Arab Emirates">United Arab Emirates</option> 
                              <option value="United Kingdom">United Kingdom</option> 
                              <option value="United States">United States</option> 
                              <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option> 
                              <option value="Uruguay">Uruguay</option> 
                              <option value="Uzbekistan">Uzbekistan</option> 
                              <option value="Vanuatu">Vanuatu</option> 
                              <option value="Venezuela">Venezuela</option> 
                              <option value="Viet Nam">Viet Nam</option> 
                              <option value="Virgin Islands, British">Virgin Islands, British</option> 
                              <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option> 
                              <option value="Wallis and Futuna">Wallis and Futuna</option> 
                              <option value="Western Sahara">Western Sahara</option> 
                              <option value="Yemen">Yemen</option> 
                              <option value="Zambia">Zambia</option> 
                              <option value="Zimbabwe">Zimbabwe</option>
                  </select>
                  </div>
                
                
                
                  <div class="form-group">
                    <input type="number" name="inphone" id="inphone" tabindex="1" class="form-control" placeholder="Contact number" value="">
                  </div>

                  <div class="form-group">
                  <label type="text" name="" >Post insights:</label>
                    <input type="text" name="rchweek" id="rchweek" tabindex="1" class="form-control" placeholder="Average reach per week" value="">
                  </div>
                
                  <div class="form-group">
                    <input type="text" name="rchpost" id="rchpost" tabindex="1" class="form-control" placeholder="Average impression per week" value="">
                  </div>
                  
                  <div class="form-group">
                    <input type="number" name="rchstr" id="rchstr" tabindex="1" class="form-control" placeholder="No. of uploads per day" value="">
                  </div>


                  <label type="text" name="" >Story insights:</label>
                  <div class="form-group">
                    <input type="text" name="avgimprstry" id="avgimprstry" tabindex="1" class="form-control" placeholder="Average impression per story" value="">
                  </div>

                  <div class="form-group">
                    <input type="number" name="stryuplds" id="stryuplds" tabindex="1" class="form-control" placeholder="No. of uploads per day" value="">
                  </div>
               
                  <div class="form-group">
                    <label type="text" name="" >If any difficulty in filling details, kindly upload screenshot of your<br>'Instagram Insights' page & we will take care of the rest</label>
                    <input type="file" name="influphoto">
                  </div>

                  <div class="form-group">
                    <label type="text" name="" >Promotion rate:<br>

                    <input type="text" name="prpost" id="prpost" class="form-control" placeholder="per post"><br><input type="text" name="prstr" id="prstr" class="form-control" placeholder="per story"><br>
                    <p>You can leave the space blank if you are in doubt. We will ensure that you get the best market rates.</p>
                    </label>
                  </div>
                  


                  <div class="form-group">
                    <textarea rows="4" cols="50" name="imessage" id="ipmessage" class="form-control"  placeholder="Something you want to tell us"></textarea>
                  </div>
                    <div class="row">
                      <div class="col-sm-6 col-sm-offset-3">
                        <input type="submit" name="influencer-submit" id="register-submit" tabindex="4" class="form-control btn btn-register"  value="Register Now">
                      </div>
                    </div>
                

                </form>

  
                <?php
                        if ($login_error_message != "") {
                            echo '<div class="alert alert-danger"><strong>Error: </strong> ' . $login_error_message . '</div>';
                        }
                    ?>

                  <form id="login-form" action="#" method="post" name= "brandformdata" value="brand" role="form" style="display: none;" >
                      <div class="form-group">
                        <input type="text" name="brandname" id="brandname" tabindex="1" class="form-control" placeholder="Brand Name*" value="">
                      </div>
                      <div class="form-group">
                        <input type="text" name="busername" id="busername" tabindex="1" class="form-control" placeholder="Your Name" value="">
                      </div>
                      <div class="form-group">
                         <!--input type="text" name="brcountry" id="brcountry" tabindex="1" class="form-control" placeholder="Country" value=""-->
                         <label type="text" tabindex="1" >Country:</label>
                           <select name="brcountry" id="brcountry" >
                            <option value="" disabled="disabled" selected="selected">Please select a country</option>
                            <option value=""  selected="selected">Select Country</option> 
                              <option value="India">India</option> 
                              <option value="United States">United States</option> 
                              <option value="United Kingdom">United Kingdom</option> 
                              <option value="Afghanistan">Afghanistan</option> 
                              <option value="Albania">Albania</option> 
                              <option value="Algeria">Algeria</option> 
                              <option value="American Samoa">American Samoa</option> 
                              <option value="Andorra">Andorra</option> 
                              <option value="Angola">Angola</option> 
                              <option value="Anguilla">Anguilla</option> 
                              <option value="Antarctica">Antarctica</option> 
                              <option value="Antigua and Barbuda">Antigua and Barbuda</option> 
                              <option value="Argentina">Argentina</option> 
                              <option value="Armenia">Armenia</option> 
                              <option value="Aruba">Aruba</option> 
                              <option value="Australia">Australia</option> 
                              <option value="Austria">Austria</option> 
                              <option value="Azerbaijan">Azerbaijan</option> 
                              <option value="Bahamas">Bahamas</option> 
                              <option value="Bahrain">Bahrain</option> 
                              <option value="Bangladesh">Bangladesh</option> 
                              <option value="Barbados">Barbados</option> 
                              <option value="Belarus">Belarus</option> 
                              <option value="Belgium">Belgium</option> 
                              <option value="Belize">Belize</option> 
                              <option value="Benin">Benin</option> 
                              <option value="Bermuda">Bermuda</option> 
                              <option value="Bhutan">Bhutan</option> 
                              <option value="Bolivia">Bolivia</option> 
                              <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option> 
                              <option value="Botswana">Botswana</option> 
                              <option value="Bouvet Island">Bouvet Island</option> 
                              <option value="Brazil">Brazil</option> 
                              <option value="British Indian Ocean Territory">British Indian Ocean Territory</option> 
                              <option value="Brunei Darussalam">Brunei Darussalam</option> 
                              <option value="Bulgaria">Bulgaria</option> 
                              <option value="Burkina Faso">Burkina Faso</option> 
                              <option value="Burundi">Burundi</option> 
                              <option value="Cambodia">Cambodia</option> 
                              <option value="Cameroon">Cameroon</option> 
                              <option value="Canada">Canada</option> 
                              <option value="Cape Verde">Cape Verde</option> 
                              <option value="Cayman Islands">Cayman Islands</option> 
                              <option value="Central African Republic">Central African Republic</option> 
                              <option value="Chad">Chad</option> 
                              <option value="Chile">Chile</option> 
                              <option value="China">China</option> 
                              <option value="Christmas Island">Christmas Island</option> 
                              <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option> 
                              <option value="Colombia">Colombia</option> 
                              <option value="Comoros">Comoros</option> 
                              <option value="Congo">Congo</option> 
                              <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option> 
                              <option value="Cook Islands">Cook Islands</option> 
                              <option value="Costa Rica">Costa Rica</option> 
                              <option value="Cote D'ivoire">Cote D'ivoire</option> 
                              <option value="Croatia">Croatia</option> 
                              <option value="Cuba">Cuba</option> 
                              <option value="Cyprus">Cyprus</option> 
                              <option value="Czech Republic">Czech Republic</option> 
                              <option value="Denmark">Denmark</option> 
                              <option value="Djibouti">Djibouti</option> 
                              <option value="Dominica">Dominica</option> 
                              <option value="Dominican Republic">Dominican Republic</option> 
                              <option value="Ecuador">Ecuador</option> 
                              <option value="Egypt">Egypt</option> 
                              <option value="El Salvador">El Salvador</option> 
                              <option value="Equatorial Guinea">Equatorial Guinea</option> 
                              <option value="Eritrea">Eritrea</option> 
                              <option value="Estonia">Estonia</option> 
                              <option value="Ethiopia">Ethiopia</option> 
                              <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option> 
                              <option value="Faroe Islands">Faroe Islands</option> 
                              <option value="Fiji">Fiji</option> 
                              <option value="Finland">Finland</option> 
                              <option value="France">France</option> 
                              <option value="French Guiana">French Guiana</option> 
                              <option value="French Polynesia">French Polynesia</option> 
                              <option value="French Southern Territories">French Southern Territories</option> 
                              <option value="Gabon">Gabon</option> 
                              <option value="Gambia">Gambia</option> 
                              <option value="Georgia">Georgia</option> 
                              <option value="Germany">Germany</option> 
                              <option value="Ghana">Ghana</option> 
                              <option value="Gibraltar">Gibraltar</option> 
                              <option value="Greece">Greece</option> 
                              <option value="Greenland">Greenland</option> 
                              <option value="Grenada">Grenada</option> 
                              <option value="Guadeloupe">Guadeloupe</option> 
                              <option value="Guam">Guam</option> 
                              <option value="Guatemala">Guatemala</option> 
                              <option value="Guinea">Guinea</option> 
                              <option value="Guinea-bissau">Guinea-bissau</option> 
                              <option value="Guyana">Guyana</option> 
                              <option value="Haiti">Haiti</option> 
                              <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option> 
                              <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option> 
                              <option value="Honduras">Honduras</option> 
                              <option value="Hong Kong">Hong Kong</option> 
                              <option value="Hungary">Hungary</option> 
                              <option value="Iceland">Iceland</option> 
                              <option value="Indonesia">Indonesia</option> 
                              <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option> 
                              <option value="Iraq">Iraq</option> 
                              <option value="Ireland">Ireland</option> 
                              <option value="Israel">Israel</option> 
                              <option value="Italy">Italy</option> 
                              <option value="Jamaica">Jamaica</option> 
                              <option value="Japan">Japan</option> 
                              <option value="Jordan">Jordan</option> 
                              <option value="Kazakhstan">Kazakhstan</option> 
                              <option value="Kenya">Kenya</option> 
                              <option value="Kiribati">Kiribati</option> 
                              <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option> 
                              <option value="Korea, Republic of">Korea, Republic of</option> 
                              <option value="Kuwait">Kuwait</option> 
                              <option value="Kyrgyzstan">Kyrgyzstan</option> 
                              <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option> 
                              <option value="Latvia">Latvia</option> 
                              <option value="Lebanon">Lebanon</option> 
                              <option value="Lesotho">Lesotho</option> 
                              <option value="Liberia">Liberia</option> 
                              <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option> 
                              <option value="Liechtenstein">Liechtenstein</option> 
                              <option value="Lithuania">Lithuania</option> 
                              <option value="Luxembourg">Luxembourg</option> 
                              <option value="Macao">Macao</option> 
                              <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option> 
                              <option value="Madagascar">Madagascar</option> 
                              <option value="Malawi">Malawi</option> 
                              <option value="Malaysia">Malaysia</option> 
                              <option value="Maldives">Maldives</option> 
                              <option value="Mali">Mali</option> 
                              <option value="Malta">Malta</option> 
                              <option value="Marshall Islands">Marshall Islands</option> 
                              <option value="Martinique">Martinique</option> 
                              <option value="Mauritania">Mauritania</option> 
                              <option value="Mauritius">Mauritius</option> 
                              <option value="Mayotte">Mayotte</option> 
                              <option value="Mexico">Mexico</option> 
                              <option value="Micronesia, Federated States of">Micronesia, Federated States of</option> 
                              <option value="Moldova, Republic of">Moldova, Republic of</option> 
                              <option value="Monaco">Monaco</option> 
                              <option value="Mongolia">Mongolia</option> 
                              <option value="Montserrat">Montserrat</option> 
                              <option value="Morocco">Morocco</option> 
                              <option value="Mozambique">Mozambique</option> 
                              <option value="Myanmar">Myanmar</option> 
                              <option value="Namibia">Namibia</option> 
                              <option value="Nauru">Nauru</option> 
                              <option value="Nepal">Nepal</option> 
                              <option value="Netherlands">Netherlands</option> 
                              <option value="Netherlands Antilles">Netherlands Antilles</option> 
                              <option value="New Caledonia">New Caledonia</option> 
                              <option value="New Zealand">New Zealand</option> 
                              <option value="Nicaragua">Nicaragua</option> 
                              <option value="Niger">Niger</option> 
                              <option value="Nigeria">Nigeria</option> 
                              <option value="Niue">Niue</option> 
                              <option value="Norfolk Island">Norfolk Island</option> 
                              <option value="Northern Mariana Islands">Northern Mariana Islands</option> 
                              <option value="Norway">Norway</option> 
                              <option value="Oman">Oman</option> 
                              <option value="Pakistan">Pakistan</option> 
                              <option value="Palau">Palau</option> 
                              <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option> 
                              <option value="Panama">Panama</option> 
                              <option value="Papua New Guinea">Papua New Guinea</option> 
                              <option value="Paraguay">Paraguay</option> 
                              <option value="Peru">Peru</option> 
                              <option value="Philippines">Philippines</option> 
                              <option value="Pitcairn">Pitcairn</option> 
                              <option value="Poland">Poland</option> 
                              <option value="Portugal">Portugal</option> 
                              <option value="Puerto Rico">Puerto Rico</option> 
                              <option value="Qatar">Qatar</option> 
                              <option value="Reunion">Reunion</option> 
                              <option value="Romania">Romania</option> 
                              <option value="Russian Federation">Russian Federation</option> 
                              <option value="Rwanda">Rwanda</option> 
                              <option value="Saint Helena">Saint Helena</option> 
                              <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option> 
                              <option value="Saint Lucia">Saint Lucia</option> 
                              <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option> 
                              <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option> 
                              <option value="Samoa">Samoa</option> 
                              <option value="San Marino">San Marino</option> 
                              <option value="Sao Tome and Principe">Sao Tome and Principe</option> 
                              <option value="Saudi Arabia">Saudi Arabia</option> 
                              <option value="Senegal">Senegal</option> 
                              <option value="Serbia and Montenegro">Serbia and Montenegro</option> 
                              <option value="Seychelles">Seychelles</option> 
                              <option value="Sierra Leone">Sierra Leone</option> 
                              <option value="Singapore">Singapore</option> 
                              <option value="Slovakia">Slovakia</option> 
                              <option value="Slovenia">Slovenia</option> 
                              <option value="Solomon Islands">Solomon Islands</option> 
                              <option value="Somalia">Somalia</option> 
                              <option value="South Africa">South Africa</option> 
                              <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option> 
                              <option value="Spain">Spain</option> 
                              <option value="Sri Lanka">Sri Lanka</option> 
                              <option value="Sudan">Sudan</option> 
                              <option value="Suriname">Suriname</option> 
                              <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option> 
                              <option value="Swaziland">Swaziland</option> 
                              <option value="Sweden">Sweden</option> 
                              <option value="Switzerland">Switzerland</option> 
                              <option value="Syrian Arab Republic">Syrian Arab Republic</option> 
                              <option value="Taiwan, Province of China">Taiwan, Province of China</option> 
                              <option value="Tajikistan">Tajikistan</option> 
                              <option value="Tanzania, United Republic of">Tanzania, United Republic of</option> 
                              <option value="Thailand">Thailand</option> 
                              <option value="Timor-leste">Timor-leste</option> 
                              <option value="Togo">Togo</option> 
                              <option value="Tokelau">Tokelau</option> 
                              <option value="Tonga">Tonga</option> 
                              <option value="Trinidad and Tobago">Trinidad and Tobago</option> 
                              <option value="Tunisia">Tunisia</option> 
                              <option value="Turkey">Turkey</option> 
                              <option value="Turkmenistan">Turkmenistan</option> 
                              <option value="Turks and Caicos Islands">Turks and Caicos Islands</option> 
                              <option value="Tuvalu">Tuvalu</option> 
                              <option value="Uganda">Uganda</option> 
                              <option value="Ukraine">Ukraine</option> 
                              <option value="United Arab Emirates">United Arab Emirates</option> 
                              <option value="United Kingdom">United Kingdom</option> 
                              <option value="United States">United States</option> 
                              <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option> 
                              <option value="Uruguay">Uruguay</option> 
                              <option value="Uzbekistan">Uzbekistan</option> 
                              <option value="Vanuatu">Vanuatu</option> 
                              <option value="Venezuela">Venezuela</option> 
                              <option value="Viet Nam">Viet Nam</option> 
                              <option value="Virgin Islands, British">Virgin Islands, British</option> 
                              <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option> 
                              <option value="Wallis and Futuna">Wallis and Futuna</option> 
                              <option value="Western Sahara">Western Sahara</option> 
                              <option value="Yemen">Yemen</option> 
                              <option value="Zambia">Zambia</option> 
                              <option value="Zimbabwe">Zimbabwe</option>
                  </select>
                  </div>

                      <div class="form-group">
                        <input type="number" name="bphone" id="bphone" tabindex="1" class="form-control" placeholder="Contact number" value="">
                      </div>
                      <!--div class="form-group">
                        <input type="password" name="bpassword" id="bpassword" tabindex="1" class="form-control" placeholder="Password" value=""><br>
                        <input type="checkbox" onclick="showPass()">Show Password
                      </div>
                      <div class="form-group">
                        <input type="password" name="bconfpass" id="bconfpass" tabindex="1" class="form-control" placeholder="Confirm Password" value="">
                        <input type="checkbox" onclick="confshowPass()">Show Password
                      </div-->
                      <div class="form-group">
                        <input type="email" name="bemail" id="bemail" tabindex="1" class="form-control" placeholder="Email Address*" value="">
                      </div>
                      <div class="form-group">
                        <textarea rows="4" cols="50" name="bmessage" id="bmessage" class="form-control"  placeholder="Something you want to tell us"></textarea>
                        
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-sm-6 col-sm-offset-3">
                            <input type="submit" name="brand-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Register Now">
                          </div>
                        </div>
                      </div>
                    </form>
                    </div>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>


      <script type="text/javascript">
  
        $(function() {

            
          $('#register-form-link').click(function(e) {
            $("#register-form").delay(100).fadeIn(100);
            $("#login-form").fadeOut(100);
            $('#login-form-link').removeClass('active');
            $(this).addClass('active');
            e.preventDefault();
          });
          $('#login-form-link').click(function(e) {
            $("#login-form").delay(100).fadeIn(100);
            $("#register-form").fadeOut(100);
            $('#register-form-link').removeClass('active');
            $(this).addClass('active');
            e.preventDefault();
          });

        });
      </script>

    
  
  </body>
</html>
