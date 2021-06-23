<?php
    include_once 'header.php';
?>  
    
    <?php
        if(isset($_POST['updatebtn'])){
            include_once 'include/dbh.php';

            $id = $_POST['update'];
                    
            $query = "SELECT * FROM users WHERE userID='$id'";
            $query_run = mysqli_query($conn, $query);

            foreach($query_run as $row){
    ?>
    <div class="display">
        <div class="container box2">
            <!--Create Accout Form--> 
            <form class="form" id="editAccount" action="include/edit.php" method="POST">
                <input type="hidden" name="update" value="<?php echo $row['userID'] ?>">
                <h1 class="title">Admin</h1>
                <h3 style="text-align: center;">Edit user</h3>
                <div class="classuser">
                    <select class="form_input name" name="usertype" style="width: 20%;" required>
                        <option value="" disabled selected>Select User Type</option>
                        <option type="number" value="1" <?php if ($row['userType'] == 1) {echo 'selected';} ?>>Admin</option>
                        <option type="number" value="0" <?php if ($row['userType'] == 0) {echo 'selected';} ?>>User</option>
                    </select>
                </div>
                <div class="try">
                    <div class="form-half">
                        <!--username-->
                        <label for="lastName" style="padding-right: 105px;">First Name:</label>
                        <label for="firstName">Last Name:</label>
                        <div class="form_input-group input_name">
                            <input type="text" class="name" placeholder="First Name" value="<?php echo $row['firstName'] ?>" name="firstName" required style="margin-right: 5px;">
                            <input type="text" class="name" placeholder="Last Name"  value="<?php echo $row['lastName'] ?>" name="lastName" required>
                        </div>
                        <!--Email-->
                        <div class="form_input-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form_input style" autofocus placeholder="Email Address" value="<?php echo $row['email'] ?>" name="email" required>
                        </div>
                        <!--Phone number-->
                        <div class="form_input-group">
                            <label for="phone_num">Phone number:</label>
                            <input type="tel" class="form_input" autofocus placeholder="Cellphone number" value="<?php echo $row['phone_num'] ?>" name="phone_num" required onkeypress="return onlyNumberKey(event)" required>
                            <div class="input-error-message"></div>
                        </div>
                        <!--Select Gender-->
 
                        <label for="gender">Sex</label>
                        <select class="form_input " name="gender" required>
                            <option value="Male" <?php if ($row['gender'] == 'Male') {echo 'selected';} ?>>Male</option>
                            <option value="Female" <?php if ($row['gender'] == 'Female') {echo 'selected';} ?>>Female</option>
                            <option value="Other" <?php if ($row['gender'] == 'Other') {echo 'selected';} ?>>Other</option>
                        </select>
                    </div>
                    <div class="form-half">
                        <!--Password-->
                        <label for="password">Password:</label>
                        <div class="form_input-group style">
                            <input type="password" class="form_input" autofocus placeholder="Password" value="<?php echo $row['repeatpwd'] ?>" name="pwd" onkeyup="CheckPasswordStrength(this.value)" required>
                            <div id="password_strength"></div>
                        </div>
                        <!--Confirm Password-->
                        <div class="form_input-group">
                            <label for="confirm">Confirm Password:</label>
                            <input type="password" class="form_input style" autofocus  placeholder="Confirm password" value="<?php echo $row['repeatpwd'] ?>" name="confirm" onkeyup="onkeypress()" required>
                            <div class="input-error-message"></div>
                        </div>
                        <!--Birthdate-->
                        <div class="form_input-group">
                            <label for="birthdate" class="label">Birthdate:</label>
                            <input type="date" class="form_input birthdate" value="<?php echo $row['birthdate'] ?>" name="birthdate" required style="margin-bottom: 5px;" required>
                        </div>
                        <!--Status-->
                        <label for="stat">Marital Status</label>
                        <select class="form_input" name="stat" required>
                            <option value="Single" <?php if ($row['stat'] == 'Single') {echo 'selected';} ?>>Single</option>
                            <option value="Married" <?php if ($row['stat'] == 'Married') {echo 'selected';} ?>>Married</option>
                            <option value="Divorced" <?php if ($row['stat'] == 'Divorced') {echo 'selected';} ?>>Divorced</option>
                            <option value="Widowed" <?php if ($row['stat'] == 'Widowed') {echo 'selected';} ?>>Widowed</option>
                        </select>  
                    </div>
                </div>
                <div class="form_text">
                    <p><a class="form_link" href="admin-page.php">Cancel</a></p>
                    <button class="form_button" type="submit" name="updatebtn">UPDATE</button>
                </div>
            </form>
        </div>
        <?php
            }    
        }
        ?>
    </div>

    <!--Signup Form-->
    <?php
        if(!isset($_POST['updatebtn'])){
    ?>
    <div class="display">
        <div class="container box2">
            <!--Create Accout Form--> 
            <form class="form" id="createAccount" action="include/signup.php" method="POST">
                <h1 class="title">Create Account</h1>
                <h3 style="text-align: center;">Make the most of your professional life</h3>
                <div class="form_message form_message--error">
                    <?php
                        if (!isset($_GET['signup'])){
                            header("");
                        } else {
                            $signupCheck = $_GET['signup'];
                            
                            if ($signupCheck == 'emptyfield') {
                                echo 'Empty field. You did not fill in all fields.';
                            } 
                            else if ($signupCheck == 'firstinvalid') {
                                echo 'First name contains invalid characters';
                            }
                            else if ($signupCheck == 'lastinvalid') {
                                echo 'Last name contains invalid characters';
                            }
                            elseif ($signupCheck == 'invalidcharacters'){
                                echo 'Name Contains invalid characters';
                            } 
                            elseif ($signupCheck == 'phonenumberandemailalreadytaken'){
                                echo 'phonenumber and email already taken';
                            } 
                            elseif ($signupCheck == 'phonenumberalreadytaken'){
                                echo 'phone number already taken';
                            } 
                            elseif ($signupCheck == 'emailalreadytaken'){
                                echo 'email already taken';
                            } 
                            elseif ($signupCheck == 'emptyusertype') {
                                echo 'Select User type';
                            }
                            elseif ($signupCheck == 'phonenumbermustcontain11digits'){
                                echo 'Phone number must contain 11 digits';
                            }
                        }
                    ?>
                </div>
                <div class="form_message form_message--success">
                    <?php
                        if (!isset($_GET['signup'])){
                            header("");
                        } else { 
                            $signupCheck = $_GET['signup'];

                            if ($signupCheck == 'success'){
                                echo "You have been signed up!";
                            }
                        }   
                    ?>
                </div>
                <div class="classuser">  
                    <select class="form_input name" name="usertype" style="width: 20%;" required>
                        <option value="" disabled selected>Select User Type</option>
                        <option type="number" value="1" <?php if (isset($_GET['usertype'])) {$user = $_GET['usertype']; if ($user == '1'){ echo 'selected';}} ?>>Admin</option>
                        <option type="number" value="0" <?php if (isset($_GET['usertype'])) {$user = $_GET['usertype']; if ($user == '0'){ echo 'selected';}} ?>>User</option>
                    </select>
                </div>
                <div class="try">
                    <div class="form-half">
                        <!--username-->
                        <label for="lastName" style="padding-right: 105px;">First Name:</label>
                        <label for="firstName">Last Name:</label>
                        <div class="form_input-group input_name">
                            <?php
                                if (isset($_GET['first'])){
                                    $first = $_GET['first'];
                                    echo '<input type="text" id="firstName" class="name" placeholder="First Name" name="firstName" required value='.$first.'>';
                                } else {
                                    echo '<input type="text" id="firstName" class="name" placeholder="First Name" name="firstName" required>';
                                }
                                if (isset($_GET['last'])){
                                    $last = $_GET['last'];
                                    echo '<input type="text" id="lastName" class="name" placeholder="Last Name" name="lastName" value='.$last.' required>';
                                } else {
                                    echo '<input type="text" id="lastName" class="name" placeholder="Last Name" name="lastName" required>';
                                }
                            ?>
                        </div>
                        <!--Email-->
                        <div class="form_input-group">
                            <label for="email">Email:</label>
                                <?php
                                    if (isset($_GET['email'])){
                                        $email = $_GET['email'];
                                        echo '<input type="email" class="form_input style" id="email" autofocus placeholder="Email Address" name="email" value='.$email.' required>';
                                    } else {
                                        echo '<input type="email" class="form_input style" id="email" autofocus placeholder="Email Address" name="email" required>';
                                    }
                                ?>
                        </div>
                        <!--Phone number-->
                        <div class="form_input-group">
                            <label for="phone_num">Phone number:</label>
                                <?php
                                    if (isset($_GET['phone'])){
                                        $phone = $_GET['phone'];
                                        echo '<input type="tel" id="phone_num" class="form_input" autofocus placeholder="Cellphone number" name="phone_num" value='.$phone.' required onkeypress="return onlyNumberKey(event)">';
                                    } else {
                                        echo '<input type="tel" id="phone_num" class="form_input" autofocus placeholder="Cellphone number" name="phone_num" required onkeypress="return onlyNumberKey(event)">';
                                    }
                                ?>
                            <div class="input-error-message"> </div>
                        </div>
                        <!--Select Gender-->
                        <div class="form_input-group padding">
                            <label for="gender" class="label">SEX:</label>
                            <?php
                                if (isset($_GET['gender'])){
                                    $gender = $_GET['gender'];
                                    
                            ?>
                                <input type="radio" name="gender" value="Male" <?php if ($gender == 'Male') {echo 'checked';}?> required>
                                    <label for="male">Male</label>
                                <input type="radio" name="gender" value="Female" <?php if ($gender == 'Female') {echo 'checked';}?>> 
                                    <label for="female">Female</label> 
                                <input type="radio" name="gender" value="Other" <?php if ($gender == 'Other') {echo 'checked';}?>> 
                                    <label for="custom">Other</label> 
                            <?php    
                                } else {
                                    echo "<input type='radio' name='gender' value='Male' required>",
                                        "<label for='male'>Male</label>",
                                        "<input type='radio' name='gender' value='Female'>", 
                                        "<label for='female'>Female</label>", 
                                        "<input type='radio' name='gender' value='Other'>", 
                                        "<label for='custom'>Other</label>"; 
                                }
                            ?>
                        </div>
                    </div>
                    <div class="form-half">
                        <!--Password-->
                        <label for="password">Password:</label>
                        <div class="form_input-group style">
                            <input type="password" id="this_password" class="form_input" autofocus placeholder="Password" name="pwd" onkeyup="CheckPasswordStrength(this.value)" required>
                            <div id="password_strength"></div>
                        </div>
                        <!--Confirm Password-->
                        <div class="form_input-group">
                            <label for="confirm">Confirm Password:</label>
                            <input type="password" id="confirm" class="form_input style" autofocus  placeholder="Confirm password" name="confirm" onkeyup="onkeypress()" required>
                            <div class="input-error-message"></div>
                        </div>
                        <!--Birthdate-->
                        <div class="form_input-group">
                            <label for="birthdate" class="label">Birthdate:</label>
                            <?php
                                if (isset($_GET['birthdate'])){
                                    $birtdate = $_GET['birthdate'];
                                    echo '<input type="date" class="form_input birthdate" name="birthdate" value='.$birtdate.' required style="margin-bottom: 5px;">';
                                } else {
                                    echo '<input type="date" class="form_input birthdate" name="birthdate" required style="margin-bottom: 5px;">';
                                }
                            ?>
                        </div>
                        <div class="form_input-group padding">
                            <!--Status-->
                            <?php
                                if (isset($_GET['status'])){
                                    $status = $_GET['status'];
                                        
                            ?>
                                <label for="stat" class="label">Status:</label>
                                    <input type="radio" name="stat" value="Single" <?php if ($status == 'Single') {echo 'checked';}?> required> 
                                <label for="Single">Single</label >
                                    <input type="radio" name="stat" value="Married" <?php if ($status == 'Married') {echo 'checked';}?>>
                                <label for="Married">Married</label>
                                    <input type="radio" name="stat" value="Divorced" <?php if ($status == 'Divorced') {echo 'checked';}?>>
                                <label for="Divorced">Divorced</label>
                                    <input type="radio" name="stat" value="Widowed" <?php  if ($status == 'Widowed') {echo 'checked';}?>>
                                <label for="Widowed">Widowed</label>
                        
                        <?php    
                            } else {
                                echo 
                                    "<label for='stat' class='label'>Status:</label>",
                                    "<input type='radio' name='stat' value='Single' required>", 
                                    "<label for='Single'>Single</label>",
                                    "<input type='radio' name='stat' value='Married'>",
                                    "<label for='Married'>Married</label>",
                                    "<input type='radio' name='stat' value='Divorced'>",
                                    "<label for='Divorced'>Divorced</label>",
                                    "<input type='radio' name='stat' value='Widowed'>".
                                    "<label for='Widowed'>Widowed</label>";
                            }
                        ?>
                        </div>
                    </div>
                </div>
                <div class="form_text">
                        <p>By creating an account you agree to our <a class="form_link" href="#">Terms & Privacy, </a><a class="form_link" href="#">User Agreement, </a> and <a class="form_link" href="#">Cookie Policy</a>.</p> 
                        <button class="form_button" type="submit" name="submit-button">Submit</button>
                        <p><a class="form_link" href="form-login.php">Already have an account? Log in</a></p>
                </div>
            </form>
        </div>
    </div>     
    <?php     
        }
    ?>
<?php
    include_once 'form-footer.php';
?>