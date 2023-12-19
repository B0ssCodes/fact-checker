<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Us</title>
    <link rel="stylesheet" href="styles.css?v=<?php echo time(); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
</head>
<body>
<?php include './templates/navbar.php'; // Include the Navbar
      include_once 'dbcon.php';
      $valid = true;
    
    ?>
    <div id="newsBody">
    <div id="newsInternalBody">
        
        <div id="newsTextBlock">
        <p class="newsText">Thank you for your interest in "The Fact Checker." We value your feedback and are here to assist you in any way we can. Please feel free to reach out to us using the following contact options:</p>
        <p class="newsText"><b>Address:</b> Zouk Mosbeh, NDU</p>
        <p class="newsText"><b>Phone:</b> +961 70 758 059</p>
        <p class="newsText"><b>Email:</b> contact@thefactchecker.com</p>

    </div>
    </div>
    </div>
<form method="post" action="contactus.php" autocomplete="off">
    <label for="fullName">Full name:</label>
    <input type="text" id="fullname" name="fullname" required>
    <?php 
                if(isset($_POST["fullname"]))
                {
                    $fullname = $_POST["fullname"];
                    $namepattern ='/^([A-Z][a-z]+)(( |-)([A-Z][a-z]+))+$/';
                    if(!preg_match($namepattern,$fullname))
                    {
                        echo '<p style="color:red;">Enter a valid name. Make sure the words are capitalized!</p><br>';
                        $valid = false;
                    }
                }
            ?>

  
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
  
    <label for="telephone">Telephone:</label>
    <input type="tel" id="telephone" name="telephone" required>

    <?php 
                if(isset($_POST["telephone"]))
                {
                    $telephone = $_POST["telephone"];
                    $phonepattern ='/^[+][0-9]{1,3} [0-9]{1,3}(( |-)[0-9]{3}){2}$/';
                    if(!preg_match($phonepattern,$telephone))
                    {
                        echo '<p style="color:red;">Phone number must be in the format +123 45-678-910</p><br>';
                        $valid = false;
                    }
                }
            ?>
  
    <label for="gender">Gender:</label>
    <select id="gender" name="gender" required>
      <option value="">Select gender</option>
      <option value="male">Male</option>
      <option value="female">Female</option>
      <option value="other">Other</option>
    </select>
  
    <label for="country">Country:</label>
    <select id="country" name= "country" required> 
        <option value="" selected="selected">Select Country</option> 
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
        <option value="India">India</option> 
        <option value="Indonesia">Indonesia</option> 
        <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option> 
        <option value="Iraq">Iraq</option> 
        <option value="Ireland">Ireland</option>
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
        <option value="North Macedonia">North Macedonia</option> 
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
        <option value="Palestine">Palestine</option> 
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
  
    <label for="purpose">Purpose:</label>
    <select id="purpose" name="purpose" required>
      <option value="">Select purpose</option>
      <option value="feedback">Feedback</option>
      <option value="comments">Comments</option>
      <option value="bug">Bug</option>
      <option value="question">Question</option>
    </select>
  
    <label for="subject">Subject:</label>
    <input type="text" id="subject" name="subject" required>
  
    <label for="comments">Comments:</label>
    <textarea id="comments" name="comments" required></textarea>
  
    <input type="submit"></button>
  </form>

  <?php 
 if($valid && (isset($_POST["fullname"]))&& isset($_POST["email"]) && isset($_POST["telephone"])){


  $fullname = $_POST["fullname"];
  $email = $_POST["email"];
  $telephone = $_POST["telephone"];
  $gender = $_POST["gender"];
  $country = $_POST["country"];
  $purpose = $_POST["purpose"];
  $subject = $_POST["subject"];
  $comments = $_POST["comments"];
 
         $sql = 'INSERT INTO form_data (fullname, email, telephone, gender, country, purpose, subject, comments) VALUES (:fullname, :email, :telephone, :gender, :country, :purpose, :subject, :comments)';
         $stmt = $pdo->prepare($sql);
         $stmt->execute(['fullname' =>$fullname, 'email' => $email, 'telephone' => $telephone, 'gender'=> $gender, 'country' => $country, 'purpose' => $purpose, 'subject' => $subject, 'comments' => $comments]);
          echo '<p style="color:green;">Your form has been submitted successfully!</p><br>';
  }
  else{
      echo "Missing Fields!";
  }
  ?>


  <footer id="contactUsFooter">
    <div>
        <h3 id="footerTitle">&copy; Copyright 2023 The Fact Checker. All Rights Reserved</h3>
        </div>
        <div id="footerDetailsDiv">
        <a href="/aboutUs.html"><h3 class="footerDetails">About Us</h3></a>
        <a href="/contactUs.html"><h3 class="footerDetails">Contact Us</h3></a>
        </div>
    </footer>
</body>
  </html>