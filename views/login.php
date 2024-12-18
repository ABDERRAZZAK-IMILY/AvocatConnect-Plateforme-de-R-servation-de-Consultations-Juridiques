
<?php

include 'db_connect.php';


function isAuth($role){
    if(isset($_COOKIE['id']) && isset($_COOKIE['role'])){
        return $_COOKIE['role'] == $role;
    }else if($role == 'guest'){
        return true;
    }

    return false;
}


if(!isAuth('guest')){
  header('Location: "../views/'.$_COOKIE['role'].'.php"');
}

$emailError = '';
$passwordError = '';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['email'])){
        $emailError = '';
    }else{
        $emailError = 'Email is required !';
        header('Location: "../views/'.htmlspecialchars($_COOKIE['role']).'.php"');

    }

    if(isset($_POST['password'])){
        $passwordError = '';
    }else{
        $passwordError = 'Password is required !';
            header('Location: "../views/'.htmlspecialchars($_COOKIE['role']).'.php"');
    }

    if(isset($_POST['email']) && isset($_POST['password'])){
        $stmt = $conn->prepare("SELECT id, role, password FROM user WHERE email = ? LIMIT 1");
        $stmt->bind_param('s', $_POST['email']);
        $stmt->execute();
        $stmt->bind_result($id, $role, $password);

        if($stmt->fetch()){
            $emailError = '';
            if(md5($_POST['password']) == $password){
                $passwordError = '';
                //correct 
                setcookie('id', $id, time() + 24 * 60 * 60, '/');
                setcookie('role', $role, time() + 24 * 60 * 60, '/');
                //reload page
                header('Location: '.$_SERVER['PHP_SELF']);
            }else{
                $passwordError = 'Wrong password';
            }
        }else{
            $emailError = 'There\'s nouser with this email !';
        }
    }
}



?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>LOGIN</title>

    <style>
        .gradient-custom-2 {
    background: #fccb90;
    
    background: -webkit-linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);
    
    background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);
    }
    
    @media (min-width: 768px) {
    .gradient-form {
    height: 100vh !important;
    }
    }
    @media (min-width: 769px) {
    .gradient-custom-2 {
    border-top-right-radius: .3rem;
    border-bottom-right-radius: .3rem;
    }
    }
    </style>
</head>
<body>
    

<section class="h-100 gradient-form">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4">

                <div class="text-center">
                  <h4 class="mt-1 mb-5 pb-1">AVOCATE CONNECT</h4>
                </div>

                <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                  <p>Please login to your account</p>

                  <div data-mdb-input-init class="form-outline mb-4">
                  <label class="form-label" for="form2Example11">EMAIL</label>
                    <input type="email" id="form2Example11" class="form-control" value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>"
                      placeholder="EMAIL" />
                      <span class="text-red-500 text-xs"><?php echo $emailError ?></span>
                  </div>

                  <div data-mdb-input-init class="form-outline mb-4">
                  <label class="form-label" for="form2Example22">Password</label>
                    <input type="password" id="form2Example22" class="form-control" />
                    <span class="text-red-500 text-xs"><?php echo $passwordError ?></span>
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>


                  <div class="d-flex align-items-center justify-content-center pb-4">
                    <p class="mb-0 me-2">Don't have an account?</p>
                    <a  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-danger" href="http://localhost/AvocatConnect%20%20Plateforme%20de%20R%C3%A9servation%20de%20Consultations%20Juridiques/AvocatConnect-Plateforme-de-R-servation-de-Consultations-Juridiques/views/inscption.php" >Create new</a>
                  </div>

                </form>

              </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
              <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                <h4 class="mb-4">We are more than just a company</h4>
                <p class="small mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                  exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>