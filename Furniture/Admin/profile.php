<?php 
include('index.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>

    <link rel="stylesheet" href="css/pstyle.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/style.css">

    <style>
        .set_page{
            margin: 4px 0px 0px 103px;
        }
    </style>
</head>

<body>
    <div class="set_page">
        <div class="container mt-4 set_page">
            <input class="form-control mb-4 fs-5 fw-bold" type="text" value="Edit profile"
                aria-label="readonly input example" readonly>
            <div class="main-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card ">
                            <div class="card-body  ">
                                <div class="d-flex flex-column align-items-center text-center pt-3 ">
                                    <img src="images/rushil.jpeg" alt="Admin" class="rounded-circle " width="110">
                                    <!-- <img src="images/rushil.jpeg" alt="Admin" class="rounded-circle p-1 bg-primary" width="110"> -->
                                    <div class="mt-3">
                                        <h4 class="mb-3">ABC XYZ</h4>
                                        <button class="btn btn-outline-primary mb-3">Change Photo</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <button class="btn btn-outline-danger mb-3 w-100">Logout</button>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger w-100" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Delete Your Account
                        </button>
                    </div>

                    <!-- edit section -->
                    <div class="col-lg-8 ">
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-sm-2">
                                        <h6 class="mb-0">Full Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-2">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-2">
                                        <h6 class="mb-0">Phone</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-2">
                                        <h6 class="mb-0">Password</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="password" class="form-control" value="">
                                    </div>
                                </div>
                                <!-- <div class="row mb-3">
                                    <div class="col-sm-2">
                                        <h6 class="mb-0">Your Gender</h6>
                                    </div>
                                    <div class="col-sm-9 ">
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" id="radio1" name="optradio"
                                                value="Male" checked>Male
                                            <label class="form-check-label" for="radio1"></label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" id="radio2" name="optradio"
                                                value="Female">Female
                                            <label class="form-check-label" for="radio2"></label>
                                        </div>
                                    </div>
                                </div> -->
                                <!-- <div class="row mb-3">
                                    <div class="col-sm-2">
                                        <h6 class="mb-0">Country</h6>
                                    </div>
                                    <div class="col-sm-7 text-secondary">
                                        <select class="form-select " aria-label="Default select example">
                                            <option selected>select country</option>
                                            <option value="India">India</option>
                                            <option value="USA">USA</option>
                                            <option value="Canada">Canada</option>
                                        </select>
                                    </div>
                                </div> -->
                                <!-- <div class="row mb-3">
                                    <div class="col-sm-2">
                                        <h6 class="mb-0">States</h6>
                                    </div>
                                    <div class="col-sm-3 text-secondary">
                                        <select class="form-select " aria-label="Default select example">
                                            <option selected>select states</option>
                                            <option value="India">India</option>
                                            <option value="USA">USA</option>
                                            <option value="Canada">Canada</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-1">
                                        <h6 class="mb-0">City</h6>
                                    </div>
                                    <div class="col-sm-3 text-secondary">
                                        <select class="form-select " aria-label="Default select example">
                                            <option selected>select city</option>
                                            <option value="India">India</option>
                                            <option value="USA">USA</option>
                                            <option value="Canada">Canada</option>
                                        </select>
                                    </div>
                                </div> -->
                                <!-- <div class="row mb-3">
                                    <div class="col-sm-2">
                                        <h6 class="mb-0">Address</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <textarea name="" class="form-control" id="" cols="30" rows="3"></textarea>
                                    </div>
                                </div> -->
                                <div class="row">
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="button" class="btn btn-primary px-4" value="Save Changes">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Are You Sure !</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">No</button>
                                        <button type="button" class="btn btn-danger">Yes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>