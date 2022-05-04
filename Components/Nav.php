<style>
    .fa-angle-down {
        margin-left: 10px;
    }

    .dropbtn {
        font-size: 16px;
        border: none;
    }

    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        min-width: 250px;
        z-index: 1;
        left: -90%;
    }

    .dropdown-content a {

        font-size: 20px !important;
        text-decoration: none;
        display: block;
        text-align: start;
        width: 150%;
        line-height: 3.3rem;

    }

    .dropdown:hover .dropdown-content {
        display: block;
    }

    .dropdown_bg {
        position: absolute;
        z-index: -5;
        left: -12%;
    }

    .axa {
        display: flex;
        justify-content: space-around;
    }

    .join_select {
        border: 2px solid red;
    }

    input[type='radio'][name='buttonGroup'] {
        display: none;
    }

    .lab {
        display: inline-block;
        padding: 1px;
        border: 2px solid #917CFF;
        border-radius: 5px;
        background-color: 'white';
        width: 10em;
        text-align: center;
        padding-top: 14px;
        margin-bottom: 15px;
        color: #917CFF;
        font-weight: bold;
    }

    .dropdown-content a span {
        color: #172B52;
    }

    .dropdown-content a span:hover {
        color: #917CFF;
    }

    input[type='radio'][name='buttonGroup']:checked+label {
        background-color: #917CFF;
        color: white
    }

    /* modal close button */
    .clinic-modal-header {
        border-bottom: 0;
    }

    .clinic-modal-header>button {
        position: absolute;
        top: 30px;
        right: 30px;
    }

    .clinic-modal-title {
        margin-left: 2%;
    }

    @media (max-width: 700px) {
        .axa {
            display: inline-block;
            justify-content: space-around;
        }

        .dropdown_bg {
            position: absolute;
            z-index: -5;
            width: 100%;
            left: -4%;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            min-width: 250px;
            z-index: 1;
            left: -45%;
        }

        .dropdown-content a {

            font-size: 14px !important;
            text-decoration: none;
            display: block;
            text-align: start;
            width: 150%;
            line-height: 2rem !important;

        }
    }
</style>

<nav class="navbar">
    <div class="content">

        <img style="cursor: pointer;" class="logo" onclick="location.href = './index.php';" src="./Assets/Images/logo.png">

        <ul class="menu-list" style="align-items: center;">
            <div class="icon cancel-btn">
                <i class="fas fa-times"></i>
            </div>
            <li class="nav-menu"><a class="<?php if ($page == 'home') {
                                                echo 'activelink';
                                            } ?>" href="./index.php">Home</a></li>
            <li class="nav-menu"><a class="<?php if ($page == 'about') {
                                                echo 'activelink';
                                            } ?>" href="./About.php" href="./About.php">About Us</a></li>
                                             <li class="nav-menu"><a class="<?php if ($page == 'blog') {
            echo 'activelink';
                } ?>" href="./blog.php" href="./blog.php">Blog</a></li>  
            <div class="dropdown">
                <li class="ser dropbtn nav-menu"><a class="<?php if ($page == 'services') {
                                                                echo 'activelink';
                                                            } ?>" href="#?">Services</a>

                    <div class="dropdown-content text">
                        <img class="dropdown_bg" src="./Assets/Images/Rectangle 186.png">
                        <br>
                        <a href="./Service.php"><span><i class="fas fa-angle-right"></i>&emsp; Primary Services</span></a>
                        <a href="./Doctor-on-call.php"><span><i class="fas fa-angle-right"></i>&emsp; Consult a Doctor Online</span></a>
                        <a href="./Smart-clinic.php"><span><i class="fas fa-angle-right"></i>&emsp; Visit a Smart Clinic near you</span></a>
                        <a href="./doctor_at_home.php"><span><i class="fas fa-angle-right"></i> &emsp; Call a Doctor at Home</span></a>

                    </div>

            </div>
            </li>
            <li class="nav-menu"><a class="<?php if ($page == 'pricing') {
                                                echo 'activelink';
                                            } ?>" href="./pricing_privatepay.php">Pricing</a></li>
            <li class="nav-menu"><a class="<?php if ($page == 'contact') {
                                                echo 'activelink';
                                            } ?>" href="./contact.php">Contact Us</a></li>

            <div class="dropdown">
                <li><a id="myBtn" class="btn1" data-bs-toggle="modal" data-bs-target="#myModal" href="#">Join Us</a></li>

            </div>
            </li>

        </ul>
        <div class="icon menu-btn">
            <i class="fas fa-bars"></i>
        </div>
    </div>
</nav>

<!-- The Modal -->
<div class="modal joinus-modal" id="myModal">
    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header clinic-modal-header justify-content-right">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="container form-bg d-flex justify-content-center vertical-center-row">
            <div class="warpper">
                <input class="radio" id="one" name="group" type="radio">
                <input class="radio" id="two" name="group" type="radio">
                <input class="radio" id="three" name="group" type="radio" checked>
                <p class="modal-quest" style=" color: #22223f;">Who are you?</p>
                <div class="tabs">

                    <label class="tab" id="three-tab" for="three">Patient
                    </label>
                    <label class="tab" id="one-tab" for="one">Providers
                    </label>
                    <label class="tab" id="two-tab" for="two">Pharmacy
                    </label>
                </div>
                <div class="panels">
                    <div class="panel" id="one-panel">
                        <div class="form-body p-4 row d-flex align-content-center rounded-3 shadow-md" style="background-color: #fff;">
                            <form id="frmProviders" method="post" action="./DB_process/providers.php">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" required minlength="3" pattern="[A-Za-z]{3,30}" title="Please enter only character">
                                            <label for="first_name">First Name</label>

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" required pattern="[A-Za-z]{3,30}" title="Please enter only character">
                                            <label for="last_name">Last Name</label>

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="email" class="form-control" id="email" name="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="Email" title="Please entervalid mail e.g: example@mail.com">
                                            <label for="email">Email Address</label>

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="tel" class="form-control" id="phone" name="phone" required placeholder="Phone" minlength="10" maxlength="10" title="Phone no must be 10 digits">
                                            <label for="phone">Phone Number</label>

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="city" name="city" required placeholder="City" pattern="[A-Za-z]{4,50}" minlength="4" title="City name contains minimum  4 characters">
                                            <label for="city">City</label>

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <select class="form-select form-select-lg" aria-label="country" required id="country_list_provider" name="country">
                                        <option value="Canada" selected>Canada</option>
                                                <option value="United States">United States	</option>
                                                <option value="Afghanistan">Afghanistan</option>
                                                <option value="Åland Islands">Åland Islands</option>
                                                <option value="Albania">Albania</option>
                                                <option value="Algeria">Algeria</option>
                                                <option value="American Samoa">American Samoa</option>
                                                <option value="Andorra">Andorra</option>
                                                <option value="Angola">Angola</option>
                                                <option value="Anguilla">Anguilla</option>
                                                <option value="Antarctica">Antarctica</option>
                                                <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                                <option value="Argentina">Argentina</option>
                                                <option value="Armenia">Armenia </option>
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
                                                <option value="Bonaire">Bonaire</option>
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
                                                <option value="Cook Islands">Cook Islands </option>
                                                <option value="Costa Rica">Costa Rica</option>
                                                <option value="Côte d'Ivoire">Côte d'Ivoire</option>
                                                <option value="Croatia">Croatia</option>
                                                <option value="Cuba">Cuba</option>
                                                <option value="Curaçao">Curaçao</option>
                                                <option value="Cyprus">Cyprus</option>
                                                <option value="Czech Republic">Czech Republic</option>
                                                <option value="Denmark">Denmark </option>
                                                <option value="Djibouti">Djibouti </option>
                                                <option value="Dominica">Dominica</option>
                                                <option value="Dominican Republic">Dominican Republic</option>
                                                <option value="Ecuador">Ecuador </option>
                                                <option value="Egypt">Egypt </option>
                                                <option value="El Salvador">El Salvador </option>
                                                <option value="Equatorial Guinea">Equatorial Guinea </option>
                                                <option value="Eritrea">Eritrea </option>
                                                <option value="Estonia">Estonia </option>
                                                <option value="Ethiopia">Ethiopia </option>
                                                <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas) </option>
                                                <option value="Faroe Islands ">Faroe Islands </option>
                                                <option value="Fiji">Fiji </option>
                                                <option value="Finland">Finland </option>
                                                <option value="France">France </option>
                                                <option value="French Guiana">French Guiana </option>
                                                <option value="French Polynesia">French Polynesia </option>
                                                <option value="French Southern Territories">French Southern Territories </option>
                                                <option value="Gabon">Gabon	 </option>
                                                <option value="Gambia">Gambia </option>
                                                <option value="Georgia">Georgia </option>
                                                <option value="Germany">Germany </option>
                                                <option value="Ghana">Ghana </option>
                                                <option value="Gibraltar">Gibraltar </option>
                                                <option value="Greece">Greece </option>
                                                <option value="Greenland">Greenland </option>
                                                <option value="Grenada">Grenada </option>
                                                <option value="Guadeloupe">Guadeloupe </option>
                                                <option value="Guam">Guam </option>
                                                <option value="Guatemala">Guatemala </option>
                                                <option value="Guernsey">Guernsey </option>
                                                <option value="Guinea">Guinea </option>
                                                <option value="Guinea-Bissau">Guinea-Bissau </option>
                                                <option value="Guyana">Guyana </option>
                                                <option value="Haiti">Haiti </option>
                                                <option value="Heard Island and McDonald Islands">Heard Island and McDonald Islands </option>
                                                <option value="Holy See (Vatican City State)">Holy See (Vatican City State) </option>
                                                <option value="Honduras">Honduras	 </option>
                                                <option value="Hong Kong">Hong Kong </option>
                                                <option value="Hungary">Hungary	 </option>
                                                <option value="Iceland">Iceland	 </option>
                                                <option value="India">India </option>
                                                <option value="Indonesia">Indonesia </option>
                                                <option value="Iran">Iran </option>
                                                <option value="Iraq">Iraq </option>
                                                <option value="Ireland">Ireland </option>
                                                <option value="Isle">Isle </option>
                                                <option value="Israel">Israel </option>
                                                <option value="Italy">Italy </option>
                                                <option value="Jamaica">Jamaica </option>
                                                <option value="Japan">Japan </option>
                                                <option value="Jersey">Jersey </option>
                                                <option value="Jordan">Jordan </option>
                                                <option value="Kazakhstan">Kazakhstan </option>
                                                <option value="Kenya">Kenya </option>
                                                <option value="Kiribati">Kiribati </option>
                                                <option value="Korea, Democratic People's Republic of	KP">Korea, Democratic People's Republic of	KP</option>
                                                <option value="Korea, Republic of	KR">Korea, Republic of	KR</option>
                                                <option value="Kuwait">Kuwait </option>
                                                <option value="Kyrgyzstan">Kyrgyzstan </option>
                                                <option value="Lao People's Democratic Republic ">Lao People's Democratic Republic </option>
                                                <option value="Latvia">Latvia	 </option>
                                                <option value="Lebanon">Lebanon </option>
                                                <option value="Lesotho">Lesotho </option>
                                                <option value="Liberia">Liberia </option>
                                                <option value="Libya">Libya </option>
                                                <option value="Liechtenstein">Liechtenstein </option>
                                                <option value="Lithuania">Lithuania </option>
                                                <option value="Luxembourg">Luxembourg </option>
                                                <option value="Macao">Macao </option>
                                                <option value="Macedonia">Macedonia </option>
                                                <option value="Madagascar">Madagascar	 </option>
                                                <option value="Malawi">Malawi	 </option>
                                                <option value="Malaysia">Malaysia </option>
                                                <option value="Maldives">Maldives </option>
                                                <option value="Mali">Mali </option>
                                                <option value="Malta">Malta </option>
                                                <option value="Marshall Islands">Marshall Islands </option>
                                                <option value="Martinique">Martinique </option>
                                                <option value="Mauritania">Mauritania </option>
                                                <option value="Mauritius">Mauritius </option>
                                                <option value="Mayotte">Mayotte </option>
                                                <option value="Mexico">Mexico </option>
                                                <option value="Micronesia">Micronesia </option>
                                                <option value="Moldova">Moldova </option>
                                                <option value="Monaco">Monaco	 </option>
                                                <option value="Mongolia">Mongolia	</option>
                                                <option value="Montenegro">Montenegro	</option>
                                                <option value="Montserrat">Montserrat	</option>
                                                <option value="Morocco">Morocco	</option>
                                                <option value="Mozambique">Mozambique	</option>
                                                <option value="Myanmar">Myanmar	</option>
                                                <option value="Namibia">Namibia	</option>
                                                <option value="Nauru">Nauru	</option>
                                                <option value="Nepal">Nepal	</option>
                                                <option value="Netherlands">Netherlands	</option>
                                                <option value="New Caledonia">New Caledonia	</option>
                                                <option value="New Zealand">New Zealand	</option>
                                                <option value="Nicaragua">Nicaragua </option>
                                                <option value="Niger">Niger </option>
                                                <option value="Nigeria">Nigeria </option>
                                                <option value="Niue">Niue </option>
                                                <option value="Norfolk Island">Norfolk Island	 </option>
                                                <option value="Northern Mariana Islands">Northern Mariana Islands </option>
                                                <option value="Norway">Norway	</option>
                                                <option value="Oman">Oman	</option>
                                                <option value="Pakistan">Pakistan	 </option>
                                                <option value="Palau">Palau </option>
                                                <option value="Palestine">Palestine </option>
                                                <option value="Panama">Panama	 </option>
                                                <option value="Papua New Guinea">Papua New Guinea </option>
                                                <option value="Paraguay">Paraguay </option>
                                                <option value="Peru">Peru </option>
                                                <option value="Philippines">Philippines </option>
                                                <option value="Pitcairn">Pitcairn </option>
                                                <option value="Poland">Poland	 </option>
                                                <option value="Portugal">Portugal </option>
                                                <option value="Puerto Rico ">Puerto Rico </option>
                                                <option value="Qatar">Qatar </option>
                                                <option value="Réunion">Réunion </option>
                                                <option value="Romania">Romania </option>
                                                <option value="Russian Federation">Russian Federation </option>
                                                <option value="Rwanda">Rwanda </option>
                                                <option value="Saint Barthélemy">Saint Barthélemy </option>
                                                <option value="Saint Helena">Saint Helena </option>
                                                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis </option>
                                                <option value="Saint Lucia">Saint Lucia </option>
                                                <option value="Saint Martin">Saint Martin </option>
                                                <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon </option>
                                                <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines </option>
                                                <option value="Samoa">Samoa </option>
                                                <option value="San Marino ">San Marino </option>
                                                <option value="Sao Tome and Principe">Sao Tome and Principe </option>
                                                <option value="Saudi Arabi">Saudi Arabia </option>
                                                <option value="Senegal">Senegal </option>
                                                <option value="Serbia">Serbia	</option>
                                                <option value="Seychelles">Seychelles</option>
                                                <option value="Sierra Leone">Sierra Leone </option>
                                                <option value="Singapore">Singapore </option>
                                                <option value="Sint Maarten (Dutch part)">Sint Maarten (Dutch part) </option>
                                                <option value="Slovakia">Slovakia </option>
                                                <option value="Slovenia">Slovenia </option>
                                                <option value="Solomon Islands">Solomon Islands </option>
                                                <option value="Somalia">Somalia </option>
                                                <option value="South Africa">South Africa </option>
                                                <option value="South Georgia and the South Sandwich Islands">South Georgia and the South Sandwich Islands </option>
                                                <option value="South Sudan">South Sudan </option>
                                                <option value="Spain">Spain	</option>
                                                <option value="Sri Lanka">Sri Lanka	</option>
                                                <option value="Sudan">Sudan	</option>
                                                <option value="Suriname">Suriname	</option>
                                                <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen	</option>
                                                <option value="Swaziland">Swaziland	</option>
                                                <option value="Sweden">Sweden	</option>
                                                <option value="Switzerland">Switzerland	</option>
                                                <option value="Syrian Arab Republic">Syrian Arab Republic	</option>
                                                <option value="Taiwan">Taiwan</option>
                                                <option value="Tajikistan">Tajikistan	</option>
                                                <option value="Tanzania">Tanzania</option>
                                                <option value="Thailand">Thailand	</option>
                                                <option value="Timor-Leste">Timor-Leste	</option>
                                                <option value="Togo">Togo	</option>
                                                <option value="Tokelau">Tokelau	</option>
                                                <option value="Tonga">Tonga	</option>
                                                <option value="Trinidad and Tobago">Trinidad and Tobago	</option>
                                                <option value="Tunisia">Tunisia	</option>
                                                <option value="Turkey">Turkey	</option>
                                                <option value="Turkmenistan">Turkmenistan	</option>
                                                <option value="Turks and Caicos Islands">Turks and Caicos Islands	</option>
                                                <option value="Tuvalu">Tuvalu	</option>
                                                <option value="Uganda">Uganda	</option>
                                                <option value="Ukraine">Ukraine	</option>
                                                <option value="United Arab Emirates">United Arab Emirates	</option>
                                                <option value="United Kingdom">United Kingdom	</option>
                                                <option value="United States Minor Outlying Islands">United States Minor Outlying Islands	</option>
                                                <option value="Uruguay">Uruguay	</option>
                                                <option value="Uzbekistan">Uzbekistan	</option>
                                                <option value="Vanuatu">Vanuatu	</option>
                                                <option value="Venezuela">Venezuela </option>
                                                <option value="Viet Nam">Viet Nam	</option>
                                                <option value="Virgin Islands, British">Virgin Islands, British	</option>
                                                <option value="Virgin Islands, U.S.">Virgin Islands, U.S.	</option>
                                                <option value="Wallis and Futuna">Wallis and Futuna	</option>
                                                <option value="Western Sahara">Western Sahara	</option>
                                                <option value="Yemen">Yemen	</option>
                                                <option value="Zambia">Zambia	</option>
                                                <option value="Zimbabwe">Zimbabwe</option>
                                        </select>
                                    </div>
                                    <!-- <div class="col-lg-6">
                                        <select class="form-select form-select-lg" aria-label="disease" required id="disease" name="disease">
                                            <option selected>Trauma</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div> -->
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="specialty" name="specialty" required aria-describedby="specialty" placeholder="Specialty" minlength="6" title="specialty: atleast 6 alphanumeric character">
                                            <label for="specialty">Specialty</label>

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="licence" name="licence" required aria-describedby="licence" placeholder="Last Name" minlength="6" title="licence: atleast 6 alphanumeric character">
                                            <label for="licence">Licence Jurisdiction</label>

                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="mb-3">
                                            <textarea class="form-control" style="height: 100px;" placeholder="Message" id="message" name="message" required minlength="15" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <button style="display: none;" class="modal-back-btn closeModal">
                                        < </button>
                                            <button type="submit" name="provider-btn" class="popup-submit-btn">Submit</button>
                                </div>
                            </form>

                        </div>

                    </div>

                    <!-- .providers form -->

                    <!-- pharmacy form  -->
                    <div class="panel" id="two-panel">
                        <div class="form-body p-4 row d-flex align-content-center rounded-3 shadow-md" style="background-color: #fff;">
                            <form id="frmPharmacy" method="post" action="./DB_process/pharmacy.php">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="first_name_phar" name="first_name" placeholder="First Name" required minlength="3" pattern="[A-Za-z]{3,30}" title="Please enter only character">
                                            <label for="first_name_phar">First Name</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="last_name_phar" name="last_name" placeholder="Last Name" required minlength="3" pattern="[A-Za-z]{3,30}" title="Please enter only character">
                                            <label for="last_name_phar">Last Name</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="email" class="form-control" id="email_phar" name="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="Email" title="Please entervalid mail e.g: example@mail.com">
                                            <label for="email_phar">Email Address</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="phone_phar" name="phone" required minlength="10" maxlength="10" placeholder="Phone no.">
                                            <label for="phone_phar">Phone Number</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="city_phar" name="city" required placeholder="City" pattern="[A-Za-z]{4,50}" minlength="4" title="City name contains minimum  4 characters">
                                            <label for="city_phar">City</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <select class="form-select form-select-lg" aria-label="Default select example" required id="country_phar" name="country">
                                        <option value="Canada" selected>Canada</option>
                                                <option value="United States">United States	</option>
                                                <option value="Afghanistan">Afghanistan</option>
                                                <option value="Åland Islands">Åland Islands</option>
                                                <option value="Albania">Albania</option>
                                                <option value="Algeria">Algeria</option>
                                                <option value="American Samoa">American Samoa</option>
                                                <option value="Andorra">Andorra</option>
                                                <option value="Angola">Angola</option>
                                                <option value="Anguilla">Anguilla</option>
                                                <option value="Antarctica">Antarctica</option>
                                                <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                                <option value="Argentina">Argentina</option>
                                                <option value="Armenia">Armenia </option>
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
                                                <option value="Bonaire">Bonaire</option>
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
                                                <option value="Cook Islands">Cook Islands </option>
                                                <option value="Costa Rica">Costa Rica</option>
                                                <option value="Côte d'Ivoire">Côte d'Ivoire</option>
                                                <option value="Croatia">Croatia</option>
                                                <option value="Cuba">Cuba</option>
                                                <option value="Curaçao">Curaçao</option>
                                                <option value="Cyprus">Cyprus</option>
                                                <option value="Czech Republic">Czech Republic</option>
                                                <option value="Denmark">Denmark </option>
                                                <option value="Djibouti">Djibouti </option>
                                                <option value="Dominica">Dominica</option>
                                                <option value="Dominican Republic">Dominican Republic</option>
                                                <option value="Ecuador">Ecuador </option>
                                                <option value="Egypt">Egypt </option>
                                                <option value="El Salvador">El Salvador </option>
                                                <option value="Equatorial Guinea">Equatorial Guinea </option>
                                                <option value="Eritrea">Eritrea </option>
                                                <option value="Estonia">Estonia </option>
                                                <option value="Ethiopia">Ethiopia </option>
                                                <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas) </option>
                                                <option value="Faroe Islands ">Faroe Islands </option>
                                                <option value="Fiji">Fiji </option>
                                                <option value="Finland">Finland </option>
                                                <option value="France">France </option>
                                                <option value="French Guiana">French Guiana </option>
                                                <option value="French Polynesia">French Polynesia </option>
                                                <option value="French Southern Territories">French Southern Territories </option>
                                                <option value="Gabon">Gabon	 </option>
                                                <option value="Gambia">Gambia </option>
                                                <option value="Georgia">Georgia </option>
                                                <option value="Germany">Germany </option>
                                                <option value="Ghana">Ghana </option>
                                                <option value="Gibraltar">Gibraltar </option>
                                                <option value="Greece">Greece </option>
                                                <option value="Greenland">Greenland </option>
                                                <option value="Grenada">Grenada </option>
                                                <option value="Guadeloupe">Guadeloupe </option>
                                                <option value="Guam">Guam </option>
                                                <option value="Guatemala">Guatemala </option>
                                                <option value="Guernsey">Guernsey </option>
                                                <option value="Guinea">Guinea </option>
                                                <option value="Guinea-Bissau">Guinea-Bissau </option>
                                                <option value="Guyana">Guyana </option>
                                                <option value="Haiti">Haiti </option>
                                                <option value="Heard Island and McDonald Islands">Heard Island and McDonald Islands </option>
                                                <option value="Holy See (Vatican City State)">Holy See (Vatican City State) </option>
                                                <option value="Honduras">Honduras	 </option>
                                                <option value="Hong Kong">Hong Kong </option>
                                                <option value="Hungary">Hungary	 </option>
                                                <option value="Iceland">Iceland	 </option>
                                                <option value="India">India </option>
                                                <option value="Indonesia">Indonesia </option>
                                                <option value="Iran">Iran </option>
                                                <option value="Iraq">Iraq </option>
                                                <option value="Ireland">Ireland </option>
                                                <option value="Isle">Isle </option>
                                                <option value="Israel">Israel </option>
                                                <option value="Italy">Italy </option>
                                                <option value="Jamaica">Jamaica </option>
                                                <option value="Japan">Japan </option>
                                                <option value="Jersey">Jersey </option>
                                                <option value="Jordan">Jordan </option>
                                                <option value="Kazakhstan">Kazakhstan </option>
                                                <option value="Kenya">Kenya </option>
                                                <option value="Kiribati">Kiribati </option>
                                                <option value="Korea, Democratic People's Republic of	KP">Korea, Democratic People's Republic of	KP</option>
                                                <option value="Korea, Republic of	KR">Korea, Republic of	KR</option>
                                                <option value="Kuwait">Kuwait </option>
                                                <option value="Kyrgyzstan">Kyrgyzstan </option>
                                                <option value="Lao People's Democratic Republic ">Lao People's Democratic Republic </option>
                                                <option value="Latvia">Latvia	 </option>
                                                <option value="Lebanon">Lebanon </option>
                                                <option value="Lesotho">Lesotho </option>
                                                <option value="Liberia">Liberia </option>
                                                <option value="Libya">Libya </option>
                                                <option value="Liechtenstein">Liechtenstein </option>
                                                <option value="Lithuania">Lithuania </option>
                                                <option value="Luxembourg">Luxembourg </option>
                                                <option value="Macao">Macao </option>
                                                <option value="Macedonia">Macedonia </option>
                                                <option value="Madagascar">Madagascar	 </option>
                                                <option value="Malawi">Malawi	 </option>
                                                <option value="Malaysia">Malaysia </option>
                                                <option value="Maldives">Maldives </option>
                                                <option value="Mali">Mali </option>
                                                <option value="Malta">Malta </option>
                                                <option value="Marshall Islands">Marshall Islands </option>
                                                <option value="Martinique">Martinique </option>
                                                <option value="Mauritania">Mauritania </option>
                                                <option value="Mauritius">Mauritius </option>
                                                <option value="Mayotte">Mayotte </option>
                                                <option value="Mexico">Mexico </option>
                                                <option value="Micronesia">Micronesia </option>
                                                <option value="Moldova">Moldova </option>
                                                <option value="Monaco">Monaco	 </option>
                                                <option value="Mongolia">Mongolia	</option>
                                                <option value="Montenegro">Montenegro	</option>
                                                <option value="Montserrat">Montserrat	</option>
                                                <option value="Morocco">Morocco	</option>
                                                <option value="Mozambique">Mozambique	</option>
                                                <option value="Myanmar">Myanmar	</option>
                                                <option value="Namibia">Namibia	</option>
                                                <option value="Nauru">Nauru	</option>
                                                <option value="Nepal">Nepal	</option>
                                                <option value="Netherlands">Netherlands	</option>
                                                <option value="New Caledonia">New Caledonia	</option>
                                                <option value="New Zealand">New Zealand	</option>
                                                <option value="Nicaragua">Nicaragua </option>
                                                <option value="Niger">Niger </option>
                                                <option value="Nigeria">Nigeria </option>
                                                <option value="Niue">Niue </option>
                                                <option value="Norfolk Island">Norfolk Island	 </option>
                                                <option value="Northern Mariana Islands">Northern Mariana Islands </option>
                                                <option value="Norway">Norway	</option>
                                                <option value="Oman">Oman	</option>
                                                <option value="Pakistan">Pakistan	 </option>
                                                <option value="Palau">Palau </option>
                                                <option value="Palestine">Palestine </option>
                                                <option value="Panama">Panama	 </option>
                                                <option value="Papua New Guinea">Papua New Guinea </option>
                                                <option value="Paraguay">Paraguay </option>
                                                <option value="Peru">Peru </option>
                                                <option value="Philippines">Philippines </option>
                                                <option value="Pitcairn">Pitcairn </option>
                                                <option value="Poland">Poland	 </option>
                                                <option value="Portugal">Portugal </option>
                                                <option value="Puerto Rico ">Puerto Rico </option>
                                                <option value="Qatar">Qatar </option>
                                                <option value="Réunion">Réunion </option>
                                                <option value="Romania">Romania </option>
                                                <option value="Russian Federation">Russian Federation </option>
                                                <option value="Rwanda">Rwanda </option>
                                                <option value="Saint Barthélemy">Saint Barthélemy </option>
                                                <option value="Saint Helena">Saint Helena </option>
                                                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis </option>
                                                <option value="Saint Lucia">Saint Lucia </option>
                                                <option value="Saint Martin">Saint Martin </option>
                                                <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon </option>
                                                <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines </option>
                                                <option value="Samoa">Samoa </option>
                                                <option value="San Marino ">San Marino </option>
                                                <option value="Sao Tome and Principe">Sao Tome and Principe </option>
                                                <option value="Saudi Arabi">Saudi Arabia </option>
                                                <option value="Senegal">Senegal </option>
                                                <option value="Serbia">Serbia	</option>
                                                <option value="Seychelles">Seychelles</option>
                                                <option value="Sierra Leone">Sierra Leone </option>
                                                <option value="Singapore">Singapore </option>
                                                <option value="Sint Maarten (Dutch part)">Sint Maarten (Dutch part) </option>
                                                <option value="Slovakia">Slovakia </option>
                                                <option value="Slovenia">Slovenia </option>
                                                <option value="Solomon Islands">Solomon Islands </option>
                                                <option value="Somalia">Somalia </option>
                                                <option value="South Africa">South Africa </option>
                                                <option value="South Georgia and the South Sandwich Islands">South Georgia and the South Sandwich Islands </option>
                                                <option value="South Sudan">South Sudan </option>
                                                <option value="Spain">Spain	</option>
                                                <option value="Sri Lanka">Sri Lanka	</option>
                                                <option value="Sudan">Sudan	</option>
                                                <option value="Suriname">Suriname	</option>
                                                <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen	</option>
                                                <option value="Swaziland">Swaziland	</option>
                                                <option value="Sweden">Sweden	</option>
                                                <option value="Switzerland">Switzerland	</option>
                                                <option value="Syrian Arab Republic">Syrian Arab Republic	</option>
                                                <option value="Taiwan">Taiwan</option>
                                                <option value="Tajikistan">Tajikistan	</option>
                                                <option value="Tanzania">Tanzania</option>
                                                <option value="Thailand">Thailand	</option>
                                                <option value="Timor-Leste">Timor-Leste	</option>
                                                <option value="Togo">Togo	</option>
                                                <option value="Tokelau">Tokelau	</option>
                                                <option value="Tonga">Tonga	</option>
                                                <option value="Trinidad and Tobago">Trinidad and Tobago	</option>
                                                <option value="Tunisia">Tunisia	</option>
                                                <option value="Turkey">Turkey	</option>
                                                <option value="Turkmenistan">Turkmenistan	</option>
                                                <option value="Turks and Caicos Islands">Turks and Caicos Islands	</option>
                                                <option value="Tuvalu">Tuvalu	</option>
                                                <option value="Uganda">Uganda	</option>
                                                <option value="Ukraine">Ukraine	</option>
                                                <option value="United Arab Emirates">United Arab Emirates	</option>
                                                <option value="United Kingdom">United Kingdom	</option>
                                                <option value="United States Minor Outlying Islands">United States Minor Outlying Islands	</option>
                                                <option value="Uruguay">Uruguay	</option>
                                                <option value="Uzbekistan">Uzbekistan	</option>
                                                <option value="Vanuatu">Vanuatu	</option>
                                                <option value="Venezuela">Venezuela </option>
                                                <option value="Viet Nam">Viet Nam	</option>
                                                <option value="Virgin Islands, British">Virgin Islands, British	</option>
                                                <option value="Virgin Islands, U.S.">Virgin Islands, U.S.	</option>
                                                <option value="Wallis and Futuna">Wallis and Futuna	</option>
                                                <option value="Western Sahara">Western Sahara	</option>
                                                <option value="Yemen">Yemen	</option>
                                                <option value="Zambia">Zambia	</option>
                                                <option value="Zimbabwe">Zimbabwe</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="address" name="address" required placeholder="Address" minlength="6" title="adress must contain: atleast 6 character">
                                            <label for="address">Address</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="mb-3">
                                            <textarea class="form-control" style="height: 100px;" placeholder="Message" id="message_phar" name="message" required minlength="15" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <button style="display: none;"  class="closeModal"> </button>
                                            <button type="submit" name="pharmacy-btn"  class="popup-submit-btn">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- .pharmacy form -->

                    <!-- patient join us -->
                    <div class="panel" id="three-panel">
                        <div class="form-body p-4 row d-flex align-content-center rounded-3 shadow-md" style="background-color: #fff;">
                            <form id="frmPatientJoinUs" method="post" action="./DB_process/patient.php">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" required minlength="3" pattern="[A-Za-z]{3,30}" title="Please enter only character">
                                            <label for="first_name">First Name</label>

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" required pattern="[A-Za-z]{3,30}" title="Please enter only character">
                                            <label for="last_name">Last Name</label>

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="email" class="form-control" id="email" name="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="Email" title="Please entervalid mail e.g: example@mail.com">
                                            <label for="email">Email Address</label>

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="tel" class="form-control" id="phone" name="phone" required placeholder="Phone" minlength="10" maxlength="10" title="Phone no must be 10 digits">
                                            <label for="phone">Phone Number</label>
                                        </div>
                                    </div>
                                    <button style="display: none;" class="closeModal">
                                         </button>
                                            <button type="submit" name="patient-btn" class="popup-submit-btn">Submit</button>
                                </div>
                            </form>

                        </div>

                    </div>
                    <!-- .patient join us -->

                </div>
            </div>
        </div>
    </div>
</div>


<!-- jquery -->
<!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script> -->