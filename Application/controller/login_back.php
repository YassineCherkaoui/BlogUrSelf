<?php require('../includes/config.php');
require('../includes/session.php'); 



// ----------------------------------register part --------------------------------------


if(isset($_POST["Register_submit"])){

    $username = $_POST['username'];
	$email = $_POST['email'];
    $password = $_POST['password'];
    $repeat_password = $_POST['repeat_password'];

    $password_hash=password_hash($password, PASSWORD_DEFAULT);

    $query= "SELECT * FROM author WHERE email=?";
    $stmt = $db->prepare($query);
    $stmt->bind_param("s",$email);
    $stmt->execute();
    $result= $stmt->get_result();
    $row1 = mysqli_num_rows($result);



    if (empty($username) && empty($email) && empty($password) && empty($repeat_password) ) {
        header("Location: ../view/login.php");
        $_SESSION["message"] ="Say All fields must be filled out";
    }elseif ($password !== $repeat_password) {
        header("Location: ../view/login.php");
        $_SESSION["message"] ="Say Both password values must be same";
    }elseif ($row1 == 1) {
        header("Location: ../view/login.php");
        $_SESSION["message"] ="Say Email is Already in use";

        
    }else{
        $stmt =$db->prepare("INSERT Into author (username,email,password) values(?,?,?)");
		$stmt->bind_param("sss", $username, $email, $password_hash);
		$stmt->execute();		
        header("Location: ../view/login.php");
        $_SESSION["message2"] ="Say Great now you can login";


        
    }

}




// ----------------------------------login part --------------------------------------

if(isset($_POST["submit_Login"])){

   
	$email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        header("Location: ../view/login.php");
        $_SESSION["message"] ="Say All fields must be filled out";
    }elseif ($row1 == 1) {
        header("Location: ../view/index.php");
        
       
    }
    else { 
        $query= "SELECT * FROM author WHERE email=?";
        $stmt =$db->prepare($query);
        $stmt->bind_param("s",$email);
        $stmt->execute();
        $result= $stmt->get_result();
        $row2 = $result->fetch_assoc();

        $password_check = password_verify($password, $row2["password"]);
        

        if ($password_check) {
            header("Location: ../view/blogger_profile.php");
            $_SESSION["username"] = $row2["username"];
			$_SESSION["author_id"] =  $row2["author_id"];

        } else {
            header("Location: ../view/login.php");
            $_SESSION["message"] ="Say Invalid Email / Password";
        }
        
    }


}









?>


