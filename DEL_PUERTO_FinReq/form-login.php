<?php
    include_once 'header.php';
?>
<body>
    <div class="display">
        <div class="left-box" id="ID">
            <h1>Login, Sign in</h1>
            <p> Manage your professional identity. Build and engage with your professional network. Access knowledge, insights and opportunities.</p>
        </div>
        <div class="container box">
            <?php
                if(isset($_SESSION['userid'])){
                    echo '<h1 class="title">This account is already logged in</h1>';  
                    header('Location: index.php');     
                }
                else {
                    header("");
            ?>
            <form class="form" id="login" action="include/login.php" method="POST">
                <h1 class="title">Login</h1>
                <div class="form_message form_message--error">
                    <?php
                        if (!isset($_GET['login'])){
                            header("");
                        } else { 
                            $signupCheck = $_GET['login'];

                            if ($signupCheck == 'wrongpassword'){
                                echo "Wrong Password";
                            } elseif ($signupCheck == 'nouser'){
                                echo "User not found";
                            }elseif ($signupCheck == 'emptyfield'){
                                echo "Empty field";
                            }
                        }   
                    ?>
                </div>
                <!--UserName Input Form-->
                <div class="form_input-group">
                    <label for="userID">Email/Phone number</label>
                    <?php
                        if (isset($_GET['first'])){
                            $emailuid = $_GET['first'];
                            echo '<input type="text" class="form_input" autofocus placeholder="Email address or phone number" name="userID" value='.$emailuid.'>';
                        } else {
                            echo '<input type="text" class="form_input" autofocus placeholder="Email address or phone number" name="userID">';
                        }
                    ?>
                </div>
                <!--Password Input Form-->
                <label for="password">Password</label>
                <div class="form_input-group style">
                    <input type="password" class="form_input" name="password" id="password" placeholder="Password">
                    <em class="far fa-eye" id="togglePassword"></em>
                </div>
                <p><a href="#" class="form_link">Forgot password?</a></p>
                <!--LOG IN BUTTON-->
                <label>
                    <input type="checkbox" checked="checked" name="remember"> Remember me
                </label>
                <button class="form_button" type="submit" name="loginButton">Log in</button>
                <p class="form_text">Don't have an account?<a class="form_link" href="form-signup.php">Join now</a> </p>
            </form>
            <?php
                }
            ?>
        </div>
    </div>
<?php
    include_once 'form-footer.php';
?>