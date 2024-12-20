<?php
include 'db_connect.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>INSCRIPTION</title>
    <style>
        .gradient-custom-2 {
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
        .hidden {
            display: none;
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
                                        <h4 class="mt-1 mb-5 pb-1">AVOCAT CONNECT</h4>
                                    </div>

                                    <form method="POST" action="" enctype="multipart/form-data">
                                        <p>Create your account</p>

                                        <select class="form-select" aria-label="Default select example" id="lerole" name="role">
                                            <option selected>Sign up as:</option>
                                            <option value="client">CLIENT</option>
                                            <option value="avocat">AVOCAT</option>
                                        </select>
                                        <br>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="firstName">Enter the Name</label>
                                            <input type="text" id="firstName" class="form-control" name="nome" placeholder="First Name" required />
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="lastName">Enter the Last Name</label>
                                            <input type="text" id="lastName" class="form-control" name="prenome" placeholder="Last Name" required />
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="email">Enter the Email</label>
                                            <input type="email" id="email" class="form-control" name="email" placeholder="Email" required />
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="password">Password</label>
                                            <input type="password" id="password" class="form-control" name="password" required />
                                        </div>

                                        <div class="hidden" id="specialty">
                                            <select class="form-select" aria-label="Specialty" name="specialty">
                                                <option selected>Choose Your Specialty:</option>
                                                <option value="Droit des affaires">Droit des affaires</option>
                                                <option value="Droit immobilier">Droit immobilier</option>
                                                <option value="Droit du travail">Droit du travail</option>
                                                <option value="Droit de la famille">Droit de la famille</option>
                                                <option value="Droit administratif">Droit administratif</option>
                                                <option value="Droit international">Droit international</option>
                                            </select>
                                            <section>
                                                <span>UPLOAD YOUR IMAGE</span>
                                               <input type="file" name="file" require>
                                            </section>
                                        </div>
                                        <br>
                                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>

                                        <div class="d-flex align-items-center justify-content-center pb-4">
                                            <p class="mb-0 me-2">Already have an account?</p>
                                            <a href="http://localhost/AvocatConnect%20%20Plateforme%20de%20R%C3%A9servation%20de%20Consultations%20Juridiques/AvocatConnect-Plateforme-de-R-servation-de-Consultations-Juridiques/views//login.php" class="btn btn-outline-danger">Login</a>
                                        </div>

                                    </form>

                                </div>
                            </div>
                            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                                <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                                    <h4 class="mb-4">We are more than just a company</h4>
                                    <p class="small mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.getElementById('lerole').addEventListener('change', function () {
            const roleSelection = this.value;
            const specialty = document.getElementById('specialty');

            if (roleSelection == 'avocat') {
                specialty.classList.remove('hidden');
            } else {
                specialty.classList.add('hidden');
            }
        });
    </script>

    
<script>
    let role = document.getElementById('lerole').value;
    if (role === "client"){

        <?php
if (isset($_POST['submit'])){
    $nome = $_POST['nome'];
    $prenom = $_POST['prenome'];
    $email = $_POST['email'];
    // $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    //   $password = md5($_POST['password']);

    $password = $_POST['password'];
    $role = $_POST['role'];
    $stmt3 = $conn->prepare("INSERT INTO user (name, prename, password, email, role) VALUES (?, ?, ?, ?, ?)");
    $stmt3->bind_param("sssss", $nome, $prenom, $password, $email, $role);
    $stmt3->execute();
    exit();
}


?>


    }else

        <?php
if (isset($_POST['submit'])) {
    $nome = $_POST['nome'];
    $prenom = $_POST['prenome'];
    $email = $_POST['email'];
    // $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    //   $password = md5($_POST['password']);

    $password = $_POST['password'];
    $specialty = $_POST['specialty'];
    $role = $_POST['role'];

    $file = $_FILES['file']['name'];
    $temp_file = $_FILES['file']['tmp_name'];

    $newfilename = uniqid() . "-" . $file;
    }else if (move_uploaded_file($temp_file, "../assest/upload/" . $newfilename)) {
        $stmt = $conn->prepare("INSERT INTO user (name, prename, password, email, role, photo) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $nome, $prenom, $password, $email, $role, $newfilename);




        if ($stmt->execute()) {
            echo "User  added successfully!";
            if ($role == 'avocat') {
                $stmt2 = $conn->prepare("INSERT INTO specialty (id_avocat, specialtyname) VALUES ((SELECT id FROM user WHERE email = ?), ?)");
                $stmt2->bind_param("ss", $email, $specialty);
                if ($stmt2->execute()) {
                    echo "specialty added successfully!";
                } else {
                    echo "error adding specialty: " . $stmt2->error;
                }
            }
        } else {
            echo "error: " . $stmt->error;
        }

        $stmt->close();
    } else{
        echo "error uploading file.";
    }

?>
</script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
