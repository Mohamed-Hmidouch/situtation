<?php 
namespace App\Controllers;
use App\AuthModel;
class AuthController{
    $userModel = new UserModel();
    $user = $userModel->findUser($email, $password);

    public function login($email,$password){
        if(!$user){
            "ml9inahch ajmi chuf l mode pass";
        }else{
            if($user->getRole()->getUsername() == "admin"){
                header("Location: ../../views/dashboard.php");
                exit();
            }else{
                                $_SESSION['error'] = "Invalid username or password.";
                header("Location: ../../views/auth/login.php");
                exit();
            }
            
        }
    }
}