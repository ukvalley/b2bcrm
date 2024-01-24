@extends('recruiter.panel.layout')

@section('content')

<!-- Begin page -->
<!-- Begin page -->

<div class="main-container container">
    <!-- welcome user -->
    <div class="container mt-3">
        <h2>Institutions : Lakehead University, University of Regina. </h2>

        <div id="accordion">
            <div class="card">
                <div class="card-header">
                    <a class="btn" data-bs-toggle="collapse" href="#collapseOne">
                        Personal Details
                    </a>
                </div>






                <div id="collapseOne" class="collapse" data-bs-parent="#accordion">
                    <div class="card-body">
                        <form class="mt-3" method="POST" action="{{ route('agent.personalApplicationForm') }}">
                            @csrf
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                            <input type="hidden" name="student_id" value="{{$Student->id}}">
                            <label for="title" v class="form-label"><b>What is your title?(required)</b> </label>
                            <select class="form-control" id="title" class="form-control" name="title">
                                <option value="Mr">Mr</option>
                                <option value="Mrs" {{ old('Mrs', $App_data->title) =='Mrs' ? 'selected' : '' }}>Mrs</option>
                                <option value="Miss" {{ old('Miss', $App_data->title) =='Miss' ? 'selected' : '' }}>Miss</option>
                                <option value="Ms" {{ old('Ms', $App_data->title) =='Ms' ? 'selected' : '' }}>Ms</option>
                                <option value="Dr" {{ old('Dr', $App_data->title) =='Dr' ? 'selected' : '' }}>Dr</option>
                                <option value="MX" {{ old('MX', $App_data->title) =='MX' ? 'selected' : '' }}>MX</option>

                            </select>
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror




                            <label for="fname"><b>Given Name(s):</b></label>
                            <input class="form-control" type="text" id="fname" value="{{ old('fname', $App_data->fname ?? '') }}" name="fname" placeholder="Alfonsus Adi" required="">
                            @error('fname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                            <label for="pname"><b>Please enter your full name as per passport (first name , family name)(required)</b></label>
                            <input class="form-control" type="text" id="pname" value="{{ old('pname', $App_data->pname ?? '') }}" name="pname" placeholder="Putra" required="">
                            @error('pname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror



                            <label for="dob"><b>Date of Birth:(required)</b></label>
                            <input class="form-control" type="date" id="dob" value="{{ old('dob', $App_data->dob ?? '') }}" name="dob" placeholder="" required="">
                            <p>Please enter date of birth </p>
                            @error('dob')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror



                            <div class="checkbox">
                                <label><b>Gender (on passport)</b></label><br>
                                <input class="check" id="gender_male" name="gender" type="radio" value="male" {{ old('gender', $App_data->gender) == 'male' ? 'checked' : '' }}>
                                <b>Male</b><br>
                                <input class="check" id="gender_female" name="gender" type="radio" value="female" {{ old('gender', $App_data->gender) == 'female' ? 'checked' : '' }}>
                                <b>Female</b><br>
                                <input class="check" id="gender_unspecified" name="gender" type="radio" value="unspecified" {{ old('gender', $App_data->gender) == 'unspecified' ? 'checked' : '' }}>
                                <b>Unspecified</b><br>
                                <input class="check" id="gender_mrs" name="gender" type="radio" value="mrs" {{ old('gender', $App_data->gender) == 'mrs' ? 'checked' : '' }}>
                                <b>Mrs</b><br>
                            </div>
                            @error('gender')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <br>


                            <label for="nationality"><b>Nationality*</b></label>
                            <select class="form-control" id="nationality" name="nationality" required="">
                                <option data-countryCode="ID" value="62">Indonesia (+62)</option>
                                <option data-countryCode="DZ" value="213">Algeria (+213)</option>
                                <option data-countryCode="AD" value="376">Andorra (+376)</option>
                                <option data-countryCode="AO" value="244">Angola (+244)</option>
                                <option data-countryCode="AI" value="1264">Anguilla (+1264)</option>
                                <option data-countryCode="AG" value="1268">Antigua &amp; Barbuda (+1268)</option>
                                <option data-countryCode="AR" value="54">Argentina (+54)</option>
                                <option data-countryCode="AM" value="374">Armenia (+374)</option>
                                <option data-countryCode="AW" value="297">Aruba (+297)</option>
                                <option data-countryCode="AU" value="61">Australia (+61)</option>
                                <option data-countryCode="AT" value="43">Austria (+43)</option>
                                <option data-countryCode="AZ" value="994">Azerbaijan (+994)</option>
                                <option data-countryCode="BS" value="1242">Bahamas (+1242)</option>
                                <option data-countryCode="BH" value="973">Bahrain (+973)</option>
                                <option data-countryCode="BD" value="880">Bangladesh (+880)</option>
                                <option data-countryCode="BB" value="1246">Barbados (+1246)</option>
                                <option data-countryCode="BY" value="375">Belarus (+375)</option>
                                <option data-countryCode="BE" value="32">Belgium (+32)</option>
                                <option data-countryCode="BZ" value="501">Belize (+501)</option>
                                <option data-countryCode="BJ" value="229">Benin (+229)</option>
                                <option data-countryCode="BM" value="1441">Bermuda (+1441)</option>
                                <option data-countryCode="BT" value="975">Bhutan (+975)</option>
                                <option data-countryCode="BO" value="591">Bolivia (+591)</option>
                                <option data-countryCode="BA" value="387">Bosnia Herzegovina (+387)</option>
                                <option data-countryCode="BW" value="267">Botswana (+267)</option>
                                <option data-countryCode="BR" value="55">Brazil (+55)</option>
                                <option data-countryCode="BN" value="673">Brunei (+673)</option>
                                <option data-countryCode="BG" value="359">Bulgaria (+359)</option>
                                <option data-countryCode="BF" value="226">Burkina Faso (+226)</option>
                                <option data-countryCode="BI" value="257">Burundi (+257)</option>
                                <option data-countryCode="KH" value="855">Cambodia (+855)</option>
                                <option data-countryCode="CM" value="237">Cameroon (+237)</option>
                                <option data-countryCode="CA" value="1">Canada (+1)</option>
                                <option data-countryCode="CV" value="238">Cape Verde Islands (+238)</option>
                                <option data-countryCode="KY" value="1345">Cayman Islands (+1345)</option>
                                <option data-countryCode="CF" value="236">Central African Republic (+236)</option>
                                <option data-countryCode="CL" value="56">Chile (+56)</option>
                                <option data-countryCode="CN" value="86">China (+86)</option>
                                <option data-countryCode="CO" value="57">Colombia (+57)</option>
                                <option data-countryCode="KM" value="269">Comoros (+269)</option>
                                <option data-countryCode="CG" value="242">Congo (+242)</option>
                                <option data-countryCode="CK" value="682">Cook Islands (+682)</option>
                                <option data-countryCode="CR" value="506">Costa Rica (+506)</option>
                                <option data-countryCode="HR" value="385">Croatia (+385)</option>
                                <option data-countryCode="CU" value="53">Cuba (+53)</option>
                                <option data-countryCode="CY" value="90392">Cyprus North (+90392)</option>
                                <option data-countryCode="CY" value="357">Cyprus South (+357)</option>
                                <option data-countryCode="CZ" value="42">Czech Republic (+42)</option>
                                <option data-countryCode="DK" value="45">Denmark (+45)</option>
                                <option data-countryCode="DJ" value="253">Djibouti (+253)</option>
                                <option data-countryCode="DM" value="1809">Dominica (+1809)</option>
                                <option data-countryCode="DO" value="1809">Dominican Republic (+1809)</option>
                                <option data-countryCode="EC" value="593">Ecuador (+593)</option>
                                <option data-countryCode="EG" value="20">Egypt (+20)</option>
                                <option data-countryCode="SV" value="503">El Salvador (+503)</option>
                                <option data-countryCode="GQ" value="240">Equatorial Guinea (+240)</option>
                                <option data-countryCode="ER" value="291">Eritrea (+291)</option>
                                <option data-countryCode="EE" value="372">Estonia (+372)</option>
                                <option data-countryCode="ET" value="251">Ethiopia (+251)</option>
                                <option data-countryCode="FK" value="500">Falkland Islands (+500)</option>
                                <option data-countryCode="FO" value="298">Faroe Islands (+298)</option>
                                <option data-countryCode="FJ" value="679">Fiji (+679)</option>
                                <option data-countryCode="FI" value="358">Finland (+358)</option>
                                <option data-countryCode="FR" value="33">France (+33)</option>
                                <option data-countryCode="GF" value="594">French Guiana (+594)</option>
                                <option data-countryCode="PF" value="689">French Polynesia (+689)</option>
                                <option data-countryCode="GA" value="241">Gabon (+241)</option>
                                <option data-countryCode="GM" value="220">Gambia (+220)</option>
                                <option data-countryCode="GE" value="7880">Georgia (+7880)</option>
                                <option data-countryCode="DE" value="49">Germany (+49)</option>
                                <option data-countryCode="GH" value="233">Ghana (+233)</option>
                                <option data-countryCode="GI" value="350">Gibraltar (+350)</option>
                                <option data-countryCode="GR" value="30">Greece (+30)</option>
                                <option data-countryCode="GL" value="299">Greenland (+299)</option>
                                <option data-countryCode="GD" value="1473">Grenada (+1473)</option>
                                <option data-countryCode="GP" value="590">Guadeloupe (+590)</option>
                                <option data-countryCode="GU" value="671">Guam (+671)</option>
                                <option data-countryCode="GT" value="502">Guatemala (+502)</option>
                                <option data-countryCode="GN" value="224">Guinea (+224)</option>
                                <option data-countryCode="GW" value="245">Guinea - Bissau (+245)</option>
                                <option data-countryCode="GY" value="592">Guyana (+592)</option>
                                <option data-countryCode="HT" value="509">Haiti (+509)</option>
                                <option data-countryCode="HN" value="504">Honduras (+504)</option>
                                <option data-countryCode="HK" value="852">Hong Kong (+852)</option>
                                <option data-countryCode="HU" value="36">Hungary (+36)</option>
                                <option data-countryCode="IS" value="354">Iceland (+354)</option>
                                <option data-countryCode="IN" value="91">India (+91)</option>

                                <option data-countryCode="IR" value="98">Iran (+98)</option>
                                <option data-countryCode="IQ" value="964">Iraq (+964)</option>
                                <option data-countryCode="IE" value="353">Ireland (+353)</option>
                                <option data-countryCode="IL" value="972">Israel (+972)</option>
                                <option data-countryCode="IT" value="39">Italy (+39)</option>
                                <option data-countryCode="JM" value="1876">Jamaica (+1876)</option>
                                <option data-countryCode="JP" value="81">Japan (+81)</option>
                                <option data-countryCode="JO" value="962">Jordan (+962)</option>
                                <option data-countryCode="KZ" value="7">Kazakhstan (+7)</option>
                                <option data-countryCode="KE" value="254">Kenya (+254)</option>
                                <option data-countryCode="KI" value="686">Kiribati (+686)</option>
                                <option data-countryCode="KP" value="850">Korea North (+850)</option>
                                <option data-countryCode="KR" value="82">Korea South (+82)</option>
                                <option data-countryCode="KW" value="965">Kuwait (+965)</option>
                                <option data-countryCode="KG" value="996">Kyrgyzstan (+996)</option>
                                <option data-countryCode="LA" value="856">Laos (+856)</option>
                                <option data-countryCode="LV" value="371">Latvia (+371)</option>
                                <option data-countryCode="LB" value="961">Lebanon (+961)</option>
                                <option data-countryCode="LS" value="266">Lesotho (+266)</option>
                                <option data-countryCode="LR" value="231">Liberia (+231)</option>
                                <option data-countryCode="LY" value="218">Libya (+218)</option>
                                <option data-countryCode="LI" value="417">Liechtenstein (+417)</option>
                                <option data-countryCode="LT" value="370">Lithuania (+370)</option>
                                <option data-countryCode="LU" value="352">Luxembourg (+352)</option>
                                <option data-countryCode="MO" value="853">Macao (+853)</option>
                                <option data-countryCode="MK" value="389">Macedonia (+389)</option>
                                <option data-countryCode="MG" value="261">Madagascar (+261)</option>
                                <option data-countryCode="MW" value="265">Malawi (+265)</option>
                                <option data-countryCode="MY" value="60">Malaysia (+60)</option>
                                <option data-countryCode="MV" value="960">Maldives (+960)</option>
                                <option data-countryCode="ML" value="223">Mali (+223)</option>
                                <option data-countryCode="MT" value="356">Malta (+356)</option>
                                <option data-countryCode="MH" value="692">Marshall Islands (+692)</option>
                                <option data-countryCode="MQ" value="596">Martinique (+596)</option>
                                <option data-countryCode="MR" value="222">Mauritania (+222)</option>
                                <option data-countryCode="YT" value="269">Mayotte (+269)</option>
                                <option data-countryCode="MX" value="52">Mexico (+52)</option>
                                <option data-countryCode="FM" value="691">Micronesia (+691)</option>
                                <option data-countryCode="MD" value="373">Moldova (+373)</option>
                                <option data-countryCode="MC" value="377">Monaco (+377)</option>
                                <option data-countryCode="MN" value="976">Mongolia (+976)</option>
                                <option data-countryCode="MS" value="1664">Montserrat (+1664)</option>
                                <option data-countryCode="MA" value="212">Morocco (+212)</option>
                                <option data-countryCode="MZ" value="258">Mozambique (+258)</option>
                                <option data-countryCode="MN" value="95">Myanmar (+95)</option>
                                <option data-countryCode="NA" value="264">Namibia (+264)</option>
                                <option data-countryCode="NR" value="674">Nauru (+674)</option>
                                <option data-countryCode="NP" value="977">Nepal (+977)</option>
                                <option data-countryCode="NL" value="31">Netherlands (+31)</option>
                                <option data-countryCode="NC" value="687">New Caledonia (+687)</option>
                                <option data-countryCode="NZ" value="64">New Zealand (+64)</option>
                                <option data-countryCode="NI" value="505">Nicaragua (+505)</option>
                                <option data-countryCode="NE" value="227">Niger (+227)</option>
                                <option data-countryCode="NG" value="234">Nigeria (+234)</option>
                                <option data-countryCode="NU" value="683">Niue (+683)</option>
                                <option data-countryCode="NF" value="672">Norfolk Islands (+672)</option>
                                <option data-countryCode="NP" value="670">Northern Marianas (+670)</option>
                                <option data-countryCode="NO" value="47">Norway (+47)</option>
                                <option data-countryCode="OM" value="968">Oman (+968)</option>
                                <option data-countryCode="PW" value="680">Palau (+680)</option>
                                <option data-countryCode="PA" value="507">Panama (+507)</option>
                                <option data-countryCode="PG" value="675">Papua New Guinea (+675)</option>
                                <option data-countryCode="PY" value="595">Paraguay (+595)</option>
                                <option data-countryCode="PE" value="51">Peru (+51)</option>
                                <option data-countryCode="PH" value="63">Philippines (+63)</option>
                                <option data-countryCode="PL" value="48">Poland (+48)</option>
                                <option data-countryCode="PT" value="351">Portugal (+351)</option>
                                <option data-countryCode="PR" value="1787">Puerto Rico (+1787)</option>
                                <option data-countryCode="QA" value="974">Qatar (+974)</option>
                                <option data-countryCode="RE" value="262">Reunion (+262)</option>
                                <option data-countryCode="RO" value="40">Romania (+40)</option>
                                <option data-countryCode="RU" value="7">Russia (+7)</option>
                                <option data-countryCode="RW" value="250">Rwanda (+250)</option>
                                <option data-countryCode="SM" value="378">San Marino (+378)</option>
                                <option data-countryCode="ST" value="239">Sao Tome &amp; Principe (+239)</option>
                                <option data-countryCode="SA" value="966">Saudi Arabia (+966)</option>
                                <option data-countryCode="SN" value="221">Senegal (+221)</option>
                                <option data-countryCode="CS" value="381">Serbia (+381)</option>
                                <option data-countryCode="SC" value="248">Seychelles (+248)</option>
                                <option data-countryCode="SL" value="232">Sierra Leone (+232)</option>
                                <option data-countryCode="SG" value="65">Singapore (+65)</option>
                                <option data-countryCode="SK" value="421">Slovak Republic (+421)</option>
                                <option data-countryCode="SI" value="386">Slovenia (+386)</option>
                                <option data-countryCode="SB" value="677">Solomon Islands (+677)</option>
                                <option data-countryCode="SO" value="252">Somalia (+252)</option>
                                <option data-countryCode="ZA" value="27">South Africa (+27)</option>
                                <option data-countryCode="ES" value="34">Spain (+34)</option>
                                <option data-countryCode="LK" value="94">Sri Lanka (+94)</option>
                                <option data-countryCode="SH" value="290">St. Helena (+290)</option>
                                <option data-countryCode="KN" value="1869">St. Kitts (+1869)</option>
                                <option data-countryCode="SC" value="1758">St. Lucia (+1758)</option>
                                <option data-countryCode="SD" value="249">Sudan (+249)</option>
                                <option data-countryCode="SR" value="597">Suriname (+597)</option>
                                <option data-countryCode="SZ" value="268">Swaziland (+268)</option>
                                <option data-countryCode="SE" value="46">Sweden (+46)</option>
                                <option data-countryCode="CH" value="41">Switzerland (+41)</option>
                                <option data-countryCode="SI" value="963">Syria (+963)</option>
                                <option data-countryCode="TW" value="886">Taiwan (+886)</option>
                                <option data-countryCode="TJ" value="7">Tajikstan (+7)</option>
                                <option data-countryCode="TH" value="66">Thailand (+66)</option>
                                <option data-countryCode="TG" value="228">Togo (+228)</option>
                                <option data-countryCode="TO" value="676">Tonga (+676)</option>
                                <option data-countryCode="TT" value="1868">Trinidad &amp; Tobago (+1868)</option>
                                <option data-countryCode="TN" value="216">Tunisia (+216)</option>
                                <option data-countryCode="TR" value="90">Turkey (+90)</option>
                                <option data-countryCode="TM" value="7">Turkmenistan (+7)</option>
                                <option data-countryCode="TM" value="993">Turkmenistan (+993)</option>
                                <option data-countryCode="TC" value="1649">Turks &amp; Caicos Islands (+1649)</option>
                                <option data-countryCode="TV" value="688">Tuvalu (+688)</option>
                                <option data-countryCode="UG" value="256">Uganda (+256)</option>
                                <option data-countryCode="GB" value="44">UK (+44)</option>
                                <option data-countryCode="UA" value="380">Ukraine (+380)</option>
                                <option data-countryCode="AE" value="971">United Arab Emirates (+971)</option>
                                <option data-countryCode="UY" value="598">Uruguay (+598)</option>
                                <option data-countryCode="US" value="1">USA (+1)</option>
                                <option data-countryCode="UZ" value="7">Uzbekistan (+7)</option>
                                <option data-countryCode="VU" value="678">Vanuatu (+678)</option>
                                <option data-countryCode="VA" value="379">Vatican City (+379)</option>
                                <option data-countryCode="VE" value="58">Venezuela (+58)</option>
                                <option data-countryCode="VN" value="84">Vietnam (+84)</option>
                                <option data-countryCode="VG" value="84">Virgin Islands - British (+1284)</option>
                                <option data-countryCode="VI" value="84">Virgin Islands - US (+1340)</option>
                                <option data-countryCode="WF" value="681">Wallis &amp; Futuna (+681)</option>
                                <option data-countryCode="YE" value="969">Yemen (North)(+969)</option>
                                <option data-countryCode="YE" value="967">Yemen (South)(+967)</option>
                                <option data-countryCode="ZM" value="260">Zambia (+260)</option>
                                <option data-countryCode="ZW" value="263">Zimbabwe (+263)</option>
                            </select>
                            @error('nationality')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror



                            <label for="ethnicity"><b>Ethnicity:</b></label>
                            <input class="form-control" type="text" value="{{ old('ethnicity', $App_data->ethnicity ?? '') }}" id="ethnicity" name="ethnicity" required="">
                            @error('ethnicity')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror



                            <label for="born"><b>Which city and country were you born in? (city, country)</b></label>
                            <input class="form-control" type="text" id="born" value="{{ old('born', $App_data->born ?? '') }}" name="born" placeholder="Jakarta, Indonesia" required="">
                            @error('born')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror





                            <label for="address"><b>Current Postal Address (street, city state, postcode, country)(required)</b></label>
                            <textarea class="form-control" type="text" id="address" name="address" placeholder="Jl. Taman Nyiur 12, blok R/12A, Sunter Agung, Tj. Priok, North Jakarta 14350">{{ old('address', $App_data->address ?? '') }}</textarea>
                            @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                            <label for="city"><b>Which city do you live in?</b></label>
                            <input class="form-control" type="text" value="{{ old('city', $App_data->city ?? '') }}" id="city" name="city" placeholder="North Jakarta" required="">
                            @error('city')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror



                            <label for="province"><b>What State/Province/Territory do you live in?</b></label>
                            <input class="form-control" type="text" value="{{ old('province', $App_data->province ?? '') }}" id="province" name="province" placeholder="DKI Jakarta" required="">
                            @error('province')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror



                            <label for="postcode"><b>What is your postcode (zip code)?</b></label>
                            <input class="form-control" type="text" value="{{ old('postcode', $App_data->postcode ?? '') }}" id="postcode" name="postcode" placeholder="DKI Jakarta" required="">
                            @error('postcode')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror


                            <div class="checkbox">
                                <label>
                                    <b>Are you currently living in the country you are applying to?</b><br>
                                    <input class="check" type="radio" id="current_country_yes" name="current_country" value="Yes" {{ old('current_country', $App_data->current_country) == 'Yes' ? 'checked' : '' }}>
                                    <b>Yes</b><br>
                                    <input class="check" type="radio" id="current_country_no" name="current_country" value="No" {{ old('current_country', $App_data->current_country) == 'No' ? 'checked' : '' }}>
                                    <b>No</b><br>
                                </label>
                                @error('current_country')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <br>

                            <label for="email"><b>What is your email address?(required)</b></label>
                            <input class="form-control" type="email" value="{{ old('email', $App_data->email ?? '') }}" id="email" name="email" placeholder="alfonsusadiputra@gmail.com" required="">
                            <P> What is your primary email address? </P>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror



                            <label for="phone"><b> What is your home phone number? </b></label>
                            <input class="form-control" type="text" value="{{ old('phone', $App_data->phone ?? '') }}" id="phone" name="phone" required="">
                            <p> Please include the country code e.g. +91 999 999 9999 </p>
                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror



                            <label for="cell"><b> What is your mobile (cell) phone number? </b></label>
                            <input class="form-control" type="text" id="cell" value="{{ old('cell', $App_data->cell ?? '') }}" name="cell" placeholder="+62 858 8602 9524" required="">
                            <p> Please include the country code e.g. +91 999 999 9999 </p>
                            @error('cell')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror



                            <label for="number"> <b> What is your work phone number?</b> </label>
                            <input class="form-control" type="text" value="{{ old('number', $App_data->number ?? '') }}" id="number" name="number" required="">
                            <p> Please include the country code e.g. +91 999 999 9999 </p>
                            @error('number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror



                            <label for="semail"><b> What is your secondary email address?</b> </label>
                            <input class="form-control" type="email" value="{{ old('semail', $App_data->semail ?? '') }}" id="semail" name="semail" required="">
                            <P> If you have a secondary email address please provide details. If not, please enter NA. </P>
                            @error('semail')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror


                            <label for="wid"><b> WhatsApp ID: </b></label>
                            <input class="form-control" type="text" id="wid" value="{{ old('wid', $App_data->fname ?? '') }}" name="wid" placeholder="+62 858 8602 9524" required="">
                            <p> If you have one. </p>
                            @error('wid')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror



                            <label for="e_address"> <b>Please list two emergency contacts below. (Indicate relationship and contact information for both.)</b>
                            </label>
                            <textarea class="form-control" type="text" id="e_address" name="e_address" placeholder="Monica-monicaaf308@gmail.com- 6285173227299-agent">{{ old('e_address', $App_data->e_address ?? '') }}</textarea>
                            <p> Please list details of an emergency contact: Name, Relationship, Full Address, Phone landline & Mobile, Email etc. </p>

                            <div class="checkbox">
                                <label><b>Language of Correspondence:</b><br>
                                    <input class="check" id="lang_of_c_a" name="lang_of_c" type="radio" value="a" {{ old('lang_of_c', $App_data->lang_of_c) == 'a' ? 'checked' : '' }}>
                                    <b>A</b><br>
                                    <input class="check" id="lang_of_c_b" name="lang_of_c" type="radio" value="b" {{ old('lang_of_c', $App_data->lang_of_c) == 'b' ? 'checked' : '' }}>
                                    <b>B</b><br>
                                    <input class="check" id="lang_of_c_mrs" name="lang_of_c" type="radio" value="mrs" {{ old('lang_of_c', $App_data->lang_of_c) == 'mrs' ? 'checked' : '' }}>
                                    <b>Mrs</b><br>
                                </label>
                                @error('lang_of_c')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>





                            <div class="checkbox">
                                <label><b>Do you have a disability, impairment, or medical condition which may affect your studies?</b><br>
                                    <input class="check" id="disability_yes" name="disability" type="radio" value="yes" {{ old('disability', $App_data->disability) == 'yes' ? 'checked' : '' }}>
                                    <b>Yes</b><br>
                                    <input class="check" id="disability_no" name="disability" type="radio" value="no" {{ old('disability', $App_data->disability) == 'no' ? 'checked' : '' }}>
                                    <b>No</b><br>
                                </label>
                                @error('disability')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            </div>

                            @enderror




                            <div class="col-lg-12" style="text-align: right;">


                                <button type="submit" class="btn btn-success" id="save-edit"><i class="fa-solid fa-floppy-disk"></i> Save and Continue</button>


                            </div>
                        </form>




                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <a class="collapsed btn" data-bs-toggle="collapse" href="#collapseTwo">
                        Education
                    </a>
                </div>

                <form class="mt-3" method="POST" action="{{ route('agent.educationUpdate') }}">
                    @csrf
                    <div id="collapseTwo" class="collapse" data-bs-parent="#accordion">
                        <div class="card-body">
                            <input type="hidden" name="student_id" value="{{$Student->id}}">
                            <input type="hidden" name="personalId" value="{{$App_data->id}}">




                            <label for="title1"><b>Do you identify yourself as an Aboriginal person that is, First Nations, Metis, Inuit?</b></label>
                            <select class="form-control" id="title1" name="title1">
                                <option value="No" {{ old('title1', $Education_data->title1) == 'No' ? 'selected' : '' }}>No</option>
                                <option value="First Nations" {{ old('title1', $Education_data->title1) == 'First Nations' ? 'selected' : '' }}>First Nations</option>
                                <option value="Metis" {{ old('title1', $Education_data->title1) == 'Metis' ? 'selected' : '' }}>Metis</option>
                                <option value="Inuit" {{ old('title1', $Education_data->title1) == 'Inuit' ? 'selected' : '' }}>Inuit</option>
                            </select>
                            @error('title1')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <label for="title2"><b>What is the highest level of education completed by your parent 1 or guardian 1?</b></label>
                            <select class="form-control" id="title2" name="title2">
                                <option value="Don't know" {{ old('title2', $Education_data->title2) == "Don't know" ? 'selected' : '' }}>Don't know</option>
                                <option value="Postgraduate Qualification" {{ old('title2', $Education_data->title2) == 'Postgraduate Qualification' ? 'selected' : '' }}>Postgraduate Qualification</option>
                                <option value="Bachelor Degree" {{ old('title2', $Education_data->title2) == 'Bachelor Degree' ? 'selected' : '' }}>Bachelor Degree</option>
                                <option value="Post School Qualification" {{ old('title2', $Education_data->title2) == 'Post School Qualification' ? 'selected' : '' }}>Post School Qualification</option>
                                <option value="Completed year 12 or equivalent" {{ old('title2', $Education_data->title2) == 'Completed year 12 or equivalent' ? 'selected' : '' }}>Completed year 12 or equivalent</option>
                                <option value="Completed year 11 or equivalent" {{ old('title2', $Education_data->title2) == 'Completed year 11 or equivalent' ? 'selected' : '' }}>Completed year 11 or equivalent</option>
                                <option value="Completed year 10 or equivalent" {{ old('title2', $Education_data->title2) == 'Completed year 10 or equivalent' ? 'selected' : '' }}>Completed year 10 or equivalent</option>
                                <option value="Did not Complete year 10" {{ old('title2', $Education_data->title2) == 'Did not Complete year 10' ? 'selected' : '' }}>Did not Complete year 10</option>
                                <option value="Not applicable" {{ old('title2', $Education_data->title2) == 'Not applicable' ? 'selected' : '' }}>Not applicable</option>
                            </select>
                            <p>Please select</p>
                            @error('title2')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror




                            <label for="address2"><b> List all extracurricular activities from the time you completed high school until the present.</b>

                            </label>
                            <textarea class="form-control" type="text" id="address2" value="{{ old('address2', $Education_data->address2 ?? '') }}" name="address2">{{ old('address2', $Education_data->address2 ?? '') }}</textarea>
                            <p> For example, volunteering, hobbies, sports, employment, travel, etc. Include any completed while attending a postsecondary educational institution. </p>
                            @error('address2')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror


                            <label for="university"><b> Are you a current or former student of this university/college/institution? </b></label>
                            <input class="form-control" type="text" id="university" value="{{ old('university', $Education_data->university ?? '') }}" name="university" placeholder="No" required="">
                            <p> If yes, please provide past/present student number. </p>
                            @error('university')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                            <div class="checkbox">
                                <label> <b>Are you applying for recognition of prior learning (RPL) i.e. credit transfer (CT) or credit from previous study?</b> <br>
                                    <input class="check" name="credit_transfer" type="radio" value="yes" {{ old('credit_transfer', $Education_data->credit_transfer) == 'yes' ? 'checked' : '' }}><b> Yes</b><br>
                                    <input class="check" name="credit_transfer" type="radio" value="no" {{ old('credit_transfer', $Education_data->credit_transfer) == 'no' ? 'checked' : '' }}><b> No</b><br>


                                    <P>If yes, please provide relevant supporting documentation e.g. certified academic transcript, subject outlines, course structure, duration of program, list of textbooks used etc. </P>
                            </div><br>
                            @error('credit_transfer')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                            <label for="puniversity"><b>Are you a past or present student of any other university?(required)</b></label>
                            <input class="form-control" type="text" id="puniversity" value="{{ old('puniversity', $Education_data->puniversity ?? '') }}" name="puniversity" placeholder="Yes. Bunda Mulia Unniversity, Indonesia" required="">
                            <p> If yes, provide the university name and country. </p>
                            @error('puniversity')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                            <label for="gap"> <b>Are there any gaps in your education or employment history? </b></label>
                            <input class="form-control" type="text" value="{{ old('gap', $Education_data->gap ?? '') }}" id="gap" name="gap" required="">
                            <p> If yes, please provide details. </p>
                            @error('gap')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror



                            <div class="checkbox">
                                <label> <b>Have you previously applied to this university/college/institution? </b><br></label>
                                <input class="check" type="radio" name="pre_applied" value="yes" {{ old('pre_applied', $Education_data->pre_applied) == 'yes' ? 'checked' : '' }}><b> Yes</b><br>
                                <input class="check" type="radio" name="pre_applied" value="no" {{ old('pre_applied', $Education_data->pre_applied) == 'no' ? 'checked' : '' }}><b> No</b><br>



                            </div><br>
                            @error('pre_applied')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror



                            <label for="pen"><b> Do you have a Personal Education Number (PEN)?</b> </label>
                            <input class="form-control" type="text" value="{{ old('pen', $Education_data->pen ?? '') }}" id="pen" name="pen" required="">
                            <p> If yes, please enter your number. </p>
                            @error('pen')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror



                            <label for="CEGEP"> <b>Quebec CEGEP Code Permanent:</b> </label>
                            <input class="form-control" type="text" id="CEGEP" value="{{ old('CEGEP', $Education_data->CEGEP ?? '') }}" name="CEGEP" required="">
                            <p>By providing your CEGEP Code Permanent, you authorize the OUAC to collect your CEGEP academic record from BCI, and to transfer that academic data to the Ontario university(ies) you have selected on your application. If this question does not apply to you, enter ‘Not Applicable’. </p>
                            @error('CEGEP')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror


                            <label for="english_school"><b> Total number of years in an English-language school system outside of Canada </b></label>
                            <select class="form-control" id="english_school" name="english_school">

                                <option value="NA">NA</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                            <P> If this question does not apply to you, choose ‘Not Applicable’. </P>
                            @error('english_school')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror





                            <a href="#demo1" class="btn btn-info" data-toggle="collapse">Add Secondary Education</a>
                            <p>If you have started, or completed secondary education then add the details here. if you've completed secondary multiple times you can add a second secondary section right after the first one. </p>
                            <div id="demo1" class="collapse">

                                <select class="form-control" id="language" name="language" required="">
                                    <option value="AF">Afrikaans</option>
                                    <option value="SQ">Albanian</option>
                                    <option value="AR">Arabic</option>
                                    <option value="HY">Armenian</option>
                                    <option value="EU">Basque</option>
                                    <option value="BN">Bengali</option>
                                    <option value="BG">Bulgarian</option>
                                    <option value="CA">Catalan</option>
                                    <option value="KM">Cambodian</option>
                                    <option value="ZH">Chinese (Mandarin)</option>
                                    <option value="HR">Croatian</option>
                                    <option value="CS">Czech</option>
                                    <option value="DA">Danish</option>
                                    <option value="NL">Dutch</option>
                                    <option value="EN">English</option>
                                    <option value="ET">Estonian</option>
                                    <option value="FJ">Fiji</option>
                                    <option value="FI">Finnish</option>
                                    <option value="FR">French</option>
                                    <option value="KA">Georgian</option>
                                    <option value="DE">German</option>
                                    <option value="EL">Greek</option>
                                    <option value="GU">Gujarati</option>
                                    <option value="HE">Hebrew</option>
                                    <option value="HI">Hindi</option>
                                    <option value="HU">Hungarian</option>
                                    <option value="IS">Icelandic</option>
                                    <option value="ID">Indonesian</option>
                                    <option value="GA">Irish</option>
                                    <option value="IT">Italian</option>
                                    <option value="JA">Japanese</option>
                                    <option value="JW">Javanese</option>
                                    <option value="KO">Korean</option>
                                    <option value="LA">Latin</option>
                                    <option value="LV">Latvian</option>
                                    <option value="LT">Lithuanian</option>
                                    <option value="MK">Macedonian</option>
                                    <option value="MS">Malay</option>
                                    <option value="ML">Malayalam</option>
                                    <option value="MT">Maltese</option>
                                    <option value="MI">Maori</option>
                                    <option value="MR">Marathi</option>
                                    <option value="MN">Mongolian</option>
                                    <option value="NE">Nepali</option>
                                    <option value="NO">Norwegian</option>
                                    <option value="FA">Persian</option>
                                    <option value="PL">Polish</option>
                                    <option value="PT">Portuguese</option>
                                    <option value="PA">Punjabi</option>
                                    <option value="QU">Quechua</option>
                                    <option value="RO">Romanian</option>
                                    <option value="RU">Russian</option>
                                    <option value="SM">Samoan</option>
                                    <option value="SR">Serbian</option>
                                    <option value="SK">Slovak</option>
                                    <option value="SL">Slovenian</option>
                                    <option value="ES">Spanish</option>
                                    <option value="SW">Swahili</option>
                                    <option value="SV">Swedish </option>
                                    <option value="TA">Tamil</option>
                                    <option value="TT">Tatar</option>
                                    <option value="TE">Telugu</option>
                                    <option value="TH">Thai</option>
                                    <option value="BO">Tibetan</option>
                                    <option value="TO">Tonga</option>
                                    <option value="TR">Turkish</option>
                                    <option value="UK">Ukrainian</option>
                                    <option value="UR">Urdu</option>
                                    <option value="UZ">Uzbek</option>
                                    <option value="VI">Vietnamese</option>
                                    <option value="CY">Welsh</option>
                                    <option value="XH">Xhosa</option>
                                </select>
                                @error('language')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror


                                <label for="main_language"> <b>Main Language</b> </label>
                                <input class="form-control" type="text" value="{{ old('main_language', $Education_data->main_language ?? '') }}" id="main_language" name="main_language" required="">
                                @error('main_language')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                                <label for="s_study_date"> <b> What date did you commence secondary studies? </b> </label>
                                <input class="form-control" type="date" value="{{ old('s_study_date', $Education_data->s_study_date ?? '') }}" id="s_study_date" name="s_study_date" required="">
                                <p> In MM/YYYY format, e.g. 09/2018 </p>
                                @error('s_study_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror



                                <label for="school_name"> <b>What is the name of the school or institution you studied at?
                                    </b> </label>
                                <input class="form-control" type="text" value="{{ old('school_name', $Education_data->school_name ?? '') }}" id="school_name" name="school_name" required="">
                                @error('school_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror



                                <label for="completed_study"> <b> When did you complete, or do you expect to complete, your secondary studies?
                                    </b> </label>
                                <input class="form-control" type="text" value="{{ old('completed_study', $Education_data->completed_study ?? '') }}" id="completed_study " name=" completed_study" required="">
                                <p> In MM/YYYY format, e.g. 09/2018 </p>
                                @error('completed_study')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror



                                <label for="course_title"> <b> What was the title of your secondary course?
                                    </b> </label>
                                <input class="form-control" type="text" value="{{ old('course_title', $Education_data->course_title ?? '') }}" id="course_title" name="course_title" required="">
                                <p> e.g. Australia, Victoria - (VCE) Victorian Certificate of Education or A-level etc </p>
                                @error('course_title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror



                                <label for="result"> <b>What results did you get?</b> </label>
                                <input class="form-control" type="text" value="{{ old('result', $Education_data->result ?? '') }}" id="result" name="result" required="">
                                @error('result')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror



                                <div class="checkbox">
                                    <label> <b> Did or will you receive your high school equivalency? </b><br></label>
                                    <input class="check" name="equivalence" type="radio" value="yes" {{ old('equivalence', $Education_data->equivalence) == 'yes' ? 'checked' : '' }}><b> Yes</b><br>
                                    <input class="check" name="equivalence" type="radio" value="no" {{ old('equivalence', $Education_data->equivalence) == 'no' ? 'checked' : '' }}><b> No</b><br>
                                    @error('equivalence')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>



                            </div><br>



                            <label for="qaceducation"> Qualifications Currently Studying </label><br>


                            <a href="#demo2" class="btn btn-info" data-toggle="collapse">Qualifications Currently Studying</a>
                            <p>If you have started or are completing any tertiary education, then please enter that here. Add as many blocks of information as you need</p>
                            <div id="demo2" class="collapse">
                                <div class="checkbox">
                                    <label> <b> Are you currently studying? </b><br>
                                        <input class="check" name="currently_studying" type="radio" value="yes" {{ old('currently_studying', $Education_data->currently_studying) == 'yes' ? 'checked' : '' }}><b> Yes</b><br>
                                        <input class="check" name="currently_studying" type="radio" value="no" {{ old('currently_studying', $Education_data->currently_studying) == 'no' ? 'checked' : '' }}><b> No</b><br>

                                    </label>
                                </div>
                                @error('currently_studying')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div><br>

                            <label for="qaceducation"> Qualifications Completed </label><br>


                            <a href="#demo3" class="btn btn-info" data-toggle="collapse"> Qualifications Completed </a>
                            <p> If you have completed any tertiary education then please enter that here. Add as many blocks of information as you need. </p>
                            <div id="demo3" class="collapse">

                                <label for="previous_study"> <b> Name of course/award you have previously studied(required)
                                    </b> </label>
                                <input class="form-control" type="text" id="previous_study" value="{{ old('previous_study', $Education_data->previous_study ?? '') }}" name="previous_study" required="">
                                <p>Provide details of all secondary/tertiary studies undertaken (attach certified/notarised copies of results). Please attach your academic transcripts, completion certificate and backlog letter (if available). You must also include an explanation of the grading system at your home institution (this information is often found on the reverse side of official academic transcripts). English translations are required if the original documents are not in English. </p>
                                @error('previous_study')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror


                                <label for="s_country"> <b> Name, Country and State/Province of Institution of previous studies:(required)
                                    </b> </label>
                                <input class="form-control" type="text" value="{{ old('s_country', $Education_data->s_country ?? '') }}" id="s_country" name="s_country" required="">
                                <p> Please provide all details for the institution where you previously completed study. Include name, country and location of the institution. </p>
                                @error('s_country')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror


                                <label for="s_institution"> <b> Name, Country and State/Province of Institution of previous studies:(required) Years enrolled (e.g March 2015 - June 2018):(required)
                                    </b> </label>
                                <input class="form-control" type="text" value="{{ old('s_institution', $Education_data->s_institution ?? '') }}" id="s_institution" name="s_institution" required="">
                                <p> Please include the month and year started and completed in your response </p>
                                @error('s_institution')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror


                                <div class="checkbox">
                                    <label> <b> Did you successfully complete this course/qualification? </b></label><br>
                                    <input class="check" name="completed_successfully" type="radio" value="yes" {{ old('completed_successfully', $Education_data->completed_successfully) == 'yes' ? 'checked' : '' }}><b> Yes</b><br>
                                    <input class="check" name="completed_successfully" type="radio" value="no" {{ old('completed_successfully', $Education_data->completed_successfully) == 'no' ? 'checked' : '' }}><b> No</b><br>



                                    @error('completed_successfully')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div><br>


                                <div class="checkbox">
                                    <label> <b> Was your previous study full-time or part-time? </b><br>
                                        <input class="check" name="study_fultime" type="radio" value="yes" {{ old('study_fultime', $Education_data->study_fultime) == 'yes' ? 'checked' : '' }}><b> Yes</b><br>
                                        <input class="check" name="study_fultime" type="radio" value="no" {{ old('study_fultime', $Education_data->study_fultime) == 'no' ? 'checked' : '' }}><b> No</b><br>

                                    </label>
                                    @error('study_fultime')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror



                                </div>


                                <label for="qaceducation">Employment </label><br>


                                <a href="#demo4" class="btn btn-info" data-toggle="collapse">Employment </a>
                                <p> Please enter any employment experience you may have </p>
                                <div id="demo4" class="collapse">
                                    <div class="checkbox">
                                        <label> <b> Do you have any relevant employment experience to be considered? </b></label><br>
                                        <input class="check" name="experience" type="radio" value="yes" {{ old('experience', $Education_data->experience) == 'yes' ? 'checked' : '' }}><b> Yes</b><br>
                                        <input class="check" name="experience" type="radio" value="no" {{ old('experience', $Education_data->experience) == 'no' ? 'checked' : '' }}><b> No</b><br>
                                        <p> If you would like this university to consider your employment history in support of your application, please attach a certified copy of your Curriculum Vitae (Résumé). </p>


                                        @error('experience')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror


                                    </div>

                                    <div class="checkbox">
                                        <label> <b> What best describes your current employment status? </b><br>
                                            <input class="check" type="radio" name="employment_status" value="Full-Time Employee" {{ old('employment_status', $Education_data->employment_status) == 'Full-Time Employee' ? 'checked' : '' }}><b> Full-Time Employee </b><br>
                                            <input class="check" type="radio" name="employment_status" value=" Part-Time Employee" {{ old('employment_status', $Education_data->employment_status) == 'Part-Time Employee' ? 'checked' : '' }}><b> Part-Time Employee </b><br>
                                            <input class="check" type="radio" name="employment_status" value="Self-Employed – Not Employing Others" {{ old('employment_status', $Education_data->employment_status) == 'Self-Employed – Not Employing Others' ? 'checked' : '' }}><b> Self-Employed – Not Employing Others </b><br>
                                            <input class="check" type="radio" name="employment_status" value=" Employer" {{ old('employment_status', $Education_data->employment_status) == 'Employer' ? 'checked' : '' }}><b> Employer </b><br>
                                            <p> Please chose one. </p>

                                        </label>
                                        @error('employment_status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror


                                    </div>
                                </div><br>

                                <div class="col-lg-12" style="text-align: right;">


                                    <button type="submit" class="btn btn-success" id="save-edit"><i class="fa-solid fa-floppy-disk"></i> Save and Continue</button>


                                </div>
                            </div>
                        </div>
                </form>

            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <a class="collapsed btn" data-bs-toggle="collapse" href="#collapseThree">
                Language
            </a>
        </div>
        <form class="mt-3" method="POST" action="{{ route('agent.languageUpdate') }}">
            @csrf

            <input type="hidden" name="student_id" value="{{$Student->id}}">

            <div id="collapseThree" class="collapse" data-bs-parent="#accordion">
                <div class="card-body">
                    <label for="first_language"> <b> What is your first/main language? </b> </label>
                    <input class="form-control" type="text" id="first_language" value="{{ old('first_language', $Education_data->first_language ?? '') }}" name="first_language" required="">
                    <p> First language could be the main language spoken at home or the language in which you are more proficient. </p>
                    @error('first_language')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <label for="language_known"><b> Number of languages you are proficient in: </b></label>
                    <select class="form-control" id="language_known" name="language_known">


                        <option name="language_known" value="1">1</option>
                        <option name="language_known" value="2">2</option>
                        <option name="language_known" value="3">3</option>
                        <option name="language_known" value="4">4</option>
                    </select>
                    @error('language_known')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror


                    <label for="proficiency"> <b> Language and Proficiency: </b> </label>
                    <input class="form-control" type="text" id="proficiency" value="{{ old('proficiency', $Education_data->proficiency ?? '') }}" name="proficiency" required="">
                    <p> List all the languages you are proficient in and the level to which you are proficient. For example, 1st - Sinhala - first language, speak, read, write, spoken at home. 2nd - English - speak, read, write, spoken at home etc. </p>
                    @error('proficiency')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror


                    <label for="language_demo"><b> How will you demonstrate you meet English language requirements? </b></label>
                    <select class="form-control" id="language_demo" name="language_demo">


                        <option value="1">a</option>
                        <option value="2">b</option>
                        <option value="3">c</option>
                        <option value="4">d</option>
                    </select>
                    @error('language_demo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror


                    <div class="checkbox">
                        <label> <b> Do you intend to study an English language course at this university/college/institution? </b><br>
                            <input name="eng_course" type="radio" value="yes" {{ old('eng_course', $Education_data->eng_course) == 'yes' ? 'checked' : '' }}><b> Yes</b><br>
                            <input name="eng_course" type="radio" value="no" {{ old('eng_course', $Education_data->eng_course) == 'no' ? 'checked' : '' }}><b> No</b><br>

                        </label>

                    </div><br>
                    @error('eng_course')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <div class="col-lg-12" style="text-align: right;">


                        <button type="submit" class="btn btn-success" id="save-edit"><i class="fa-solid fa-floppy-disk"></i> Save and Continue</button>


                    </div>
        </form>

    </div>
</div>
</div>

<div class="card">
    <div class="card-header">
        <a class="collapsed btn" data-bs-toggle="collapse" href="#collapseFour">
            Administration
        </a>
    </div>
    <form class="mt-3" method="POST" action="{{ route('agent.adminstrationUpdate') }}">
        @csrf

        <input type="hidden" name="student_id" value="{{$Student->id}}">

        <div id="collapseFour" class="collapse" data-bs-parent="#accordion">
            <div class="card-body">
                <label for="r_contact_details"><b> Referee Contact Details: (We will assume permission to contact referees unless an applicant has stated otherwise.)
                    </b>

                </label>
                <textarea class="form-control" type="text" value="{{ old('r_contact_details', $Education_data->r_contact_details ?? '') }}" id="r_contact_details" name="r_contact_details"></textarea>
                <p> Please include details for two referees, including name, position in organisation, organisation, address, telephone number and email. </p>
                @error('r_contact_details')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror


                <label for="agent_contact"><b> Please provide your agent's contact details.

                    </b>

                </label>
                <textarea class="form-control" type="text" value="{{ old('agent_contact', $Education_data->agent_contact ?? '') }}" id="agent_contact" name="agent_contact"></textarea>
                <p> Please provide: agent ID, agent name, agent address, agent telephone number and agent email. </p>
                @error('agent_contact')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror




                <label for="contact_details"><b> In case we need any additional details on this application, whom should we reach out within your team ?

                    </b>

                </label>

                <p> Please provide details of following: </p>


                <label for="contact_name"> <b>Name :(required)</b> </label>
                <input class="form-control" type="text" value="{{ old('contact_name', $Education_data->contact_name ?? '') }}" id="contact_name" name="contact_name" placeholder="Monica" required="">
                @error('contact_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <label for="contact_mobile"> <b>Contact No :(required)</b> </label>
                <input class="form-control" type="text" value="{{ old('contact_mobile', $Education_data->contact_mobile ?? '') }}" id="contact_mobile" name="contact_mobile" placeholder="6285173227299" required="">
                @error('contact_mobile')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <label for="contact_email"> <b>Email ID :(required)</b> </label>
                <input class="form-control" type="email" value="{{ old('contact_email', $Education_data->contact_email ?? '') }}" id="contact_email" name="contact_email" placeholder="inquire@civs.online" required="">
                @error('contact_email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <div class="checkbox">
                    <label> <b> Do you have a passport? </b> </label><br>
                    <input name="passport" type="radio" value="yes" {{ old('passport', $Education_data->passport) == 'yes' ? 'checked' : '' }}><b> Yes</b><br>
                    <input name="passport" type="radio" value="no" {{ old('passport', $Education_data->passport) == 'no' ? 'checked' : '' }}><b> No</b><br>


                    @error('passport')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div><br>

                <label for="passport_number"> <b> Please provide your passport number and expiry date. </b> </label>
                <input class="form-control" type="text" id="passport_number" value="{{ old('passport_number', $Education_data->passport_number ?? '') }}" name="passport_number" placeholder="C8682744" required="">
                <p> You are required to also provide a certified copy of your passport including your signature page. </p>
                @error('passport_number')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <div class="checkbox">
                    <label> <b> Do you currently hold a visa in any country or to which you are applying?(required) </b></label><br>
                    <input name="visa" type="radio" value="NA" {{ old('visa', $Education_data->visa) == 'NA' ? 'checked' : '' }}><b> Not applicable </b><br>
                    <input name="visa" type="radio" value="yes" {{ old('visa', $Education_data->visa) == 'yes' ? 'checked' : '' }}><b> Yes</b><br>
                    <input name="visa" type="radio" value="no" {{ old('visa', $Education_data->visa) == 'no' ? 'checked' : '' }}><b> No</b><br>


                    @error('visa')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div><br>

                <label for="visa_apply_note"> <b> When do you intend to apply for a current visa for the country you are applying to? </b> </label>
                <input class="form-control" type="text" id="visa_apply_note" name="visa_apply_note" value="{{ old('visa_apply_note', $Education_data->visa_apply_note ?? '') }}" placeholder="as soon as possible" required="">
                <p> Please enter N/A if not applicable. </p>
                @error('visa_apply_note')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror



                <label for="married"> <b>
                        Are you currently married? Date of Marriage:(required)
                    </b> </label>
                <input class="form-control" type="text" id="married" value="{{ old('married', $Education_data->married ?? '') }}" name="married" placeholder="NO/Yes" required="">
                @error('married')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror


                <label for="citizenship"> <b>
                        In which countries do you have citizenship?
                    </b> </label>
                <input class="form-control" type="text" id="citizenship" value="{{ old('citizenship', $Education_data->citizenship ?? '') }}" name="citizenship" placeholder="Indonesia" required="">
                <p> Select all countries that apply. </p>
                @error('citizenship')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <label for="app_submitted_from"> <b>Country this application is submitted from</b> </label>
                <input class="form-control" type="text" id="app_submitted_from" value="{{ old('address2', $Education_data->address2 ?? '') }}" name="app_submitted_from" placeholder="Indonesia" required="">
                @error('app_submitted_from')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror


                <label for="status_in_canada">Status in Canada:</label>
                <select class="form-control" id="status_in_canada" name="status_in_canada" required="">
                    <option value="SP-student_visa">Study permit (student visa)</option>
                    <option value="SQ">x</option>
                    <option value="AR">y</option>
                </select>
                @error('status_in_canada')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror


                <label for="sponcership_gov"> <b> Have you applied for or received sponsorship from your home government or any other foreign agency? </b> </label>
                <input class="form-control" type="text" id="sponcership_gov" value="{{ old('sponcership_gov', $Education_data->sponcership_gov ?? '') }}" name="sponcership_gov" placeholder="NO/Yes" required="">
                <p> If yes, please provide sponsor(s) name, contact details and the type of sponsorship. </p>
                @error('sponcership_gov')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <label for="receive_scholarship"> <b> Will you be receiving a scholarship? </b> </label>
                <input class="form-control" type="text" id="receive_scholarship" value="{{ old('receive_scholarship', $Education_data->receive_scholarship ?? '') }}" name="receive_scholarship" placeholder="NO/Yes" required="">
                <p> If yes, please provide details e.g. name of scholarship, how you obtained the scholarship, what the scholarship covers etc. </p>
                @error('receive_scholarship')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror


                <div class="checkbox">
                    <label> <b> I agree to the Medical Coverage Agreement. </b><br>

                        <input name="medical_agreement" type="radio" value="yes" {{ old('medical_agreement', $Education_data->medical_agreement) == 'yes' ? 'checked' : '' }}><b> Yes</b><br>
                        <input name="medical_agreement" type="radio" value="no" {{ old('medical_agreement', $Education_data->medical_agreement) == 'no' ? 'checked' : '' }}><b> No</b><br>
                        <p> Please check the University web page for Medical Insurance Coverage expectations. </p>

                    </label>
                    @error('medical_agreement')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                </div><br>
                <div class="col-lg-12" style="text-align: right;">


                    <button type="submit" class="btn btn-success" value="submit" id="save-edit"><i class="fa-solid fa-floppy-disk"></i> Save and Continue</button>


                </div>
    </form>


</div>
</div>
</div>

<div class="card">
    <div class="card-header">
        <a class="collapsed btn" data-bs-toggle="collapse" href="#collapseFive">
            Course Prefrences
        </a>
    </div>
    <form class="mt-3" method="POST" action="{{ route('agent.preferenceUpdate') }}">
        @csrf

        <input type="hidden" name="student_id" value="{{$Student->id}}">

        <div id="collapseFive" class="collapse" data-bs-parent="#accordion">
            <div class="card-body">
                <label><b> Notes for your course selection details for administration
                    </b></label>
                <textarea class="form-control" type="text" value="{{ old('admission_note', $Education_data->admission_note ?? '') }}" id="admission_note" name="admission_note"></textarea>
                <p> This field is to be used by counsellors to record any additional course selection information that is important for Administration to know. For example, cost changes for majors, Campus Location etc. </p><br>
                <div class="col-lg-12" style="text-align: right;">
                    @error('admission_note')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror


                    <button type="butsubmitton" class="btn btn-success" id="save-edit"><i class="fa-solid fa-floppy-disk"></i> Save and Continue</button>


                </div>
            </div>
        </div>
</div>


</div>
<!-- <div class="col-lg-12" style="text-align: right; margin-top: 2rem;" >
    
    
        <button type="button" class="btn btn-success" id="save-edit" style="margin-right: 2rem; "><i class="fa-solid fa-floppy-disk"></i>Shortlist</button><button type="button" class="btn btn-success" id="save-edit"><i class="fa-solid fa-floppy-disk"></i>Documents</button>
    
  
  </div> -->

</div>









</div>













<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Notes</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="#" method="POST" id="addNotesForm">

                    @csrf
                    <div class="form-group">
                        <label for="notesContent">Notes Content</label>
                        <textarea class="form-control" id="notesContent" name="notesContent" rows="5" style="height: 200px;"></textarea>
                    </div>

                    <div class="form-group">

                        <input class="form-control" type="hidden" value="{{$Student->id}}" class="form-control" id="student_id" name="student_id" />
                        <input class="form-control" type="hidden" value="{{Auth::User()->id}}" class="form-control" id="recruiter_id" name="recruiter_id" />
                    </div>

                    <div class="form-group">
                        <label for="communicationMedium">Select Communication Medium</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-control" class="form-check-input" type="radio" name="communicationMedium" id="whatsapp" value="whatsapp">
                            <label class="form-check-label" for="whatsapp">Whatsapp</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-control" class="form-check-input" type="radio" name="communicationMedium" id="messages" value="messages">
                            <label class="form-check-label" for="messages">Messages</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-control" class="form-check-input" type="radio" name="communicationMedium" id="email" value="email">
                            <label class="form-check-label" for="email">Email</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-control" class="form-check-input" type="radio" name="communicationMedium" id="faceToFace" value="faceToFace">
                            <label class="form-check-label" for="faceToFace">Face to Face</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-control" class="form-check-input" type="radio" name="communicationMedium" id="videoCall" value="videoCall">
                            <label class="form-check-label" for="videoCall">Video Call</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-control" class="form-check-input" type="radio" name="communicationMedium" id="other" value="other">
                            <label class="form-check-label" for="other">Other</label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </form>












                <!-- Main page content ends -->
            </div>
            </main>
            <!-- Page ends -->

            <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
            <!-- Include DataTables script -->
            <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

            <script src="path/to/jquery.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>



            <script>
                // JavaScript validation
                document.getElementById("addNotesForm").addEventListener("submit", function(event) {
                    const notesContent = document.getElementById("notesContent").value;
                    const communicationMedium = document.querySelector('input[name="communicationMedium"]:checked');

                    if (!notesContent || !communicationMedium) {
                        alert("Both fields are required.");
                        event.preventDefault();
                    }
                });
            </script>



            @endsection