<?php
    include 'header-admin.php';
?>
<main>
<div class="wrapper">
    <div class="pannel">
        <h2>Dashboard</h2>
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="index.php">Profile</a></li>
            <li><a href="index.php#main_about">About</a></li>
            <li><a href="index.php#main_project">Services</a></li>
            <li><a href="Gallery.php">Galerry</a></li>
            <li><a href="FAQ.php">FAQ</a></li>
            <li><a href="Contact.php">Contact</a></li>
        </ul> 
        <div class="social_media">
          <a href="#"></a>
          <a href="#"></a>
          <a href="#"></a>
        </div>
    </div>
    <div class="main_content center-box">
        <table class="box" id="database" with="100%">
            <caption>
                <h1>Administrator</h1>
                <h3> Users Table</h3>
                <div class="form_message form_message--error">
                    <?php
                        if (!isset($_GET['edit'])){
                            header("");
                        } else {
                            $edit = $_GET['edit'];
                                    
                            if ($edit == 'emptyfield') {
                                echo 'Edit: Empty field. You did not fill in all fields.';

                            } elseif ($edit == 'firstinvalid'){
                                echo 'Edit: First name Contains invalid characters';

                            } elseif ($edit == 'lastinvalid') {
                                echo 'Edit: Last name Contains invalid characters';

                            } elseif ($edit == 'phonenumbermustcontain11digits'){
                                echo 'Edit: Phone  number must contain 11 digts';
                            }
                             elseif ($edit == 'phonenumberandemailalreadytaken'){
                                echo 'Edit: Phonenumber and email already taken';

                            } elseif ($edit == 'phonenumberalreadytaken'){
                                echo 'Edit: Phone number already taken';

                            } elseif ($edit == 'emailalreadytaken'){
                                echo 'Edit: Email already taken';

                            } elseif ($edit == 'emptyusertype') {
                                echo 'Edit: Select User type';
                            } elseif ($edit == 'passworddontmatch'){
                                echo 'Edit: Password Dont Match!';
                            }
                        }
                    ?>
                    </div>
                    <div class="form_message form_message--success">
                        <?php
                            if (!isset($_GET['success'])){
                                header("");
                            } else { 
                                $edit = $_GET['success'];

                                if ($edit == 'userupdated'){
                                    echo "Edit: Your Data is updated";
                                }
                            }   
                            ?>
                        </div>
            </caption>
        <?php 
            include_once 'include/dbh.php';
            $query = "SELECT * FROM  users";
            $query_run = mysqli_query($conn, $query);
        ?>
            <thead>
                <tr>
                    <th id="id">ID</th>
                    <th id="type">User Type</th>
                    <th id="fname">First Name</th>
                    <th id="lname">Last Name</th>
                    <th id="email">E-mail</th>
                    <th id="num">Phone number</th>
                    <th id="sex">Sex</th>
                    <th id="pwd">Password</th>
                    <th id="pwd">Repeat Password</th>
                    <th id="bdatae">Birthdate</th>
                    <th id="stat">Marital Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if(mysqli_num_rows($query_run) > 0) {
                        while($row = mysqli_fetch_assoc($query_run)) {
                ?>
                <tr>
                    <td><?php  echo $row['userID']; ?></td>
                    <td><?php if ($row['userType']  == 1){ echo 'Admin'; } else {echo 'User';}?></td>
                    <td><?php  echo $row['firstName']; ?></td>
                    <td><?php  echo $row['lastName']; ?></td>
                    <td><?php  echo $row['email']; ?></td>
                    <td><?php  echo $row['phone_num']; ?></td>
                    <td><?php  echo $row['gender']; ?></td>
                    <td><?php  echo $row['pwd']; ?></td>
                    <td><?php  echo $row['repeatpwd']; ?></td>
                    <td><?php  echo $row['birthdate']; ?></td>
                    <td><?php  echo $row['stat']; ?></td>
                    <td>
                        <form action="form-signup.php" method="post">
                            <input type="hidden" name="update" value="<?php echo $row['userID']; ?>">
                            <button class="form_input" type="submit" name="updatebtn">Edit</button>
                        </form>
                    </td>
                    <td>
                        <form action="include/delete.php" method="post">
                            <input type="hidden" name="deleteID" value="<?php echo $row['userID']; ?>">
                            <button class="form_input" type="submit" name="delete">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php
                    } 
                }
                else {
                    echo "No Record Found";
                }
                ?>
            </tbody>
        </table>
        <div style="text-align: end;">
            <a href="./form-signup.php"><button class="form_button" style="width: 30%;">Add user</button></a>
        </div>
    </div>
</div>
</main>    
<script src="./main.js"></script>
</body>
</html>
