<?php //include config
require_once('../includes/config.php');

//if not logged in redirect to login page
if (!$user->is_logged_in()) {
    header('Location: login.php');
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <title>Admin - Edit User</title>
    <link rel="stylesheet" href="../style/js/js.js">
    <link rel="stylesheet" href="../style/css/admin.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script language="JavaScript" type="text/javascript">
        function deluser(id, title) {
            if (confirm("Are you sure you want to delete '" + title + "'")) {
                window.location.href = 'users.php?deluser=' + id;
            }
        }
    </script>
</head>

<body>
    <div class="header">
        <a href="#" id="menu-action">
            <i class="fa fa-bars"></i>
            <span>Close</span>
        </a>
        <div class="logo"><img src="../style/images/fiveicon.png" width="2%">
            Admin Panel
        </div>
    </div>
    <div class="sidebar">
        <ul>
            <li><a href="index.php"><i class="fa fa-desktop"></i><span>Desktop</span></a></li>
            <li><a href="users.php"><i class="fa fa-users"></i><span>Users</span></a></li>
            <li><a href="#"><i class="fa fa-calendar"></i><span>Calendar</span></a></li>
            <li><a href="#"><i class="fas fa-envelope-square"></i><span>Messages</span></a></li>
            <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i><span>LogOut</span></a></li>
        </ul>
    </div>

    <!-- Content -->
    <div class="main">
        <div class="">
            <h2>Edit User</h2>
            <?php

            //if form has been submitted process it
            if (isset($_POST['submit'])) {

                //collect form data
                extract($_POST);

                //very basic validation
                if ($username == '') {
                    $error[] = 'Please enter the username.';
                }

                if (strlen($password) > 0) {

                    if ($password == '') {
                        $error[] = 'Please enter the password.';
                    }

                    if ($passwordConfirm == '') {
                        $error[] = 'Please confirm the password.';
                    }

                    if ($password != $passwordConfirm) {
                        $error[] = 'Passwords do not match.';
                    }
                }


                if ($email == '') {
                    $error[] = 'Please enter the email address.';
                }

                if (!isset($error)) {

                    try {

                        if (isset($password)) {

                            $hashedpassword = $user->password_hash($password, PASSWORD_BCRYPT);

                            //update into database
                            $stmt = $db->prepare('UPDATE blog_members SET username = :username, password = :password, email = :email WHERE memberID = :memberID');
                            $stmt->execute(array(
                                ':username' => $username,
                                ':password' => $hashedpassword,
                                ':email' => $email,
                                ':memberID' => $memberID
                            ));
                        } else {

                            //update database
                            $stmt = $db->prepare('UPDATE blog_members SET username = :username, email = :email WHERE memberID = :memberID');
                            $stmt->execute(array(
                                ':username' => $username,
                                ':email' => $email,
                                ':memberID' => $memberID
                            ));
                        }


                        //redirect to index page
                        header('Location: users.php?action=updated');
                        exit;
                    } catch (PDOException $e) {
                        echo $e->getMessage();
                    }
                }
            }

            ?>
            <?php
            //check for any errors
            if (isset($error)) {
                foreach ($error as $error) {
                    echo $error . '<br />';
                }
            }

            try {

                $stmt = $db->prepare('SELECT memberID, username, email FROM blog_members WHERE memberID = :memberID');
                $stmt->execute(array(':memberID' => $_GET['id']));
                $row = $stmt->fetch();
            } catch (PDOException $e) {
                echo $e->getMessage();
            }

            ?>
            <!-- Material form login -->
            <div class="card">

                <h5 class="card-header info-color white-text text-center py-4">
                    <strong>Sign in</strong>
                </h5>

                <!--Card content-->
                <div class="card-body px-lg-5 pt-0">

                    <!-- Form -->
                    <form class="text-center" action="" method="POST">

                        <!-- Email -->
                        <div class="md-form">
                            <input type='hidden' name='memberID' value='<?php echo $row['memberID']; ?>'>
                            <input type="text" id="materialLoginFormEmail" class="form-control" name="username" value="<?php echo''; ?>">
                            <label for="materialLoginFormEmail">Username</label>
                        </div>

                        <!-- Password -->
                        <div class="md-form">
                            <input type="password" id="materialLoginFormPassword" class="form-control">
                            <label for="materialLoginFormPassword">Password</label>
                        </div>

                </div>

                <!-- Sign in button -->
                <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">Sign in</button>



                </form>
                <!-- Form -->

            </div>

        </div>




        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>