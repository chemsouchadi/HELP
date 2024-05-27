<?php

include 'db_connt.php';

if (isset($_POST['signUp'])) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password = md5($password);// هادي ظرتها باه تشفرلي لكود كون صراة كانش حاجة

    $checkEmail = "SELECT * chemsou where email='$email'";
    $result = $conn->query($checkEmail);
    if ($result->num_rows > 0) {
        echo "Email Address Already Exists !";
    } else {
        $insertQuery = "INSERT INTO chemsou(nom,prenom,email,psword)
                       VALUES ('$firstName','$lastName','$email','$password')";
        if ($conn->query($insertQuery) == TRUE) {
            header("location: index.php");
        } else {
            echo "Error:" . $conn->error;
        }
    }


}

if (isset($_POST['signIn'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password = md5($password); // هادي ظرتها باه تشفرلي لكود كون صراة كانش حاجة

    $sql = "SELECT * FROM chemsou WHERE email='$email' and psword='$password'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        session_start();
        $row = $result->fetch_assoc();
        $_SESSION['email'] = $row['email'];
        header("Location: mainpage.html ");
        exit();
    } else {
        echo "Not Found, Incorrect Email or Password";
    }

}
?>