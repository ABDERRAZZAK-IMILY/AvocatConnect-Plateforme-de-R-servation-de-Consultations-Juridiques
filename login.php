
<?php

include 'db_connect.php';



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
    

<section class="h-100 gradient-form" style="background-color: #eee;">
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

                <form>
                  <p>Please login to your account</p>

                  <div data-mdb-input-init class="form-outline mb-4">
                  <label class="form-label" for="form2Example11">Username</label>
                    <input type="email" id="form2Example11" class="form-control"
                      placeholder="USER NAME" />
                  </div>

                  <div data-mdb-input-init class="form-outline mb-4">
                  <label class="form-label" for="form2Example22">Password</label>
                    <input type="password" id="form2Example22" class="form-control" />
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>


                  <div class="d-flex align-items-center justify-content-center pb-4">
                    <p class="mb-0 me-2">Don't have an account?</p>
                    <a  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-danger" href="http://localhost/AvocatConnect%20%20Plateforme%20de%20R%C3%A9servation%20de%20Consultations%20Juridiques/AvocatConnect-Plateforme-de-R-servation-de-Consultations-Juridiques/inscption.php" >Create new</a>
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