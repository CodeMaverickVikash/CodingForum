<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body>

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-secondary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">vikash</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Tables:</h6>
                        <a class="collapse-item" href="users.php">Users</a>

                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>



        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php include 'includes/header.php'; ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Signup User</h1>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                            Add User
                        </button>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <div class="container">

                            <div class="d-flex justify-content-end">
                                <!-- Button to Open the Modal -->
                                <!-- <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#myModal">
                                    Add User
                                </button> -->
                            </div>

                            <!-- // Fetch data from database -->
                            <div id="records_contant">

                            </div>

                            <!-- The Modal -->
                            <div class="modal" id="myModal">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title mb-4">Add User</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="firstname">Firstname</label>
                                                <input type="text" id="firstname" class="form-control"
                                                    placeholder="firstname">
                                                <label for="lastname">Lastname</label>
                                                <input type="text" id="lastname" class="form-control"
                                                    placeholder="lastname">
                                                <label for="email">Email id</label>
                                                <input type="text" id="email" class="form-control" placeholder="email">
                                                <label for="password">Password</label>
                                                <input type="text" id="password" class="form-control"
                                                    placeholder="password">
                                            </div>
                                        </div>

                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal"
                                                onclick="addRecord()">Save</button>
                                            <button type="button" class="btn btn-danger"
                                                data-dismiss="modal">Close</button>
                                        </div>

                                    </div>
                                </div>
                            </div>


                            <!-- ///// Update model -->
                            <!-- The Modal -->
                            <div class="modal" id="update_user_model">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Update Detail</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="update_firstname">Firstname</label>
                                                <input type="text" id="update_firstname" class="form-control"
                                                    placeholder="firstname">
                                                <label for="update_lastname">Lastname</label>
                                                <input type="text" id="update_lastname" class="form-control"
                                                    placeholder="lastname">
                                                <label for="update_email">Email id</label>
                                                <input type="text" id="update_email" class="form-control"
                                                    placeholder="email">
                                                <label for="update_password">Password</label>
                                                <input type="text" id="update_password" class="form-control"
                                                    placeholder="password">
                                            </div>
                                        </div>

                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal"
                                                onclick="UpdateUserDetail()">Save</button>
                                            <button type="button" class="btn btn-danger"
                                                data-dismiss="modal">Close</button>
                                            <input type="hidden" name="" id="hidden_user_id">
                                        </div>

                                    </div>
                                </div>
                            </div>


                        </div>

                    </div>


                </div>



                <!-- Content Row -->
                <div class="row">

                    <!-- Content Column -->
                    <div class="col-lg-6 mb-4">
                        <div class="col-lg-6 mb-4">

                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white bottom-fixed">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="admin.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery library -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <!-- Popper JS -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script> -->
    <!-- Latest compiled JavaScript -->
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

    <script>
    // Insert data into database
    function addRecord() {
        var firstname = $('#firstname').val();
        var lastname = $('#lastname').val();
        var email = $('#email').val();
        var password = $('#password').val();
        $.ajax({
            url: "logic.php",
            type: "post",
            data: {
                firstname: firstname,
                lastname: lastname,
                email: email,
                password: password
            },

            success: function(data, status) {
                readRecords();
            }
        })
    }


    $(document).ready(function() {
        readRecords();
    });
    // Fetch data from database

    function readRecords() {
        var readrecord = "readrecord";
        $.ajax({
            url: 'logic.php',
            type: 'post',
            data: {
                readrecord: readrecord
            },

            success: function(data, status) {
                $('#records_contant').html(data);
            }
        })
    }


    // Delete record from database
    function DeleteUser(deleteid) {
        var conf = confirm("Are you sure");
        // console.log(deleteid);
        if (conf == true) {
            $.ajax({
                url: "logic.php",
                type: "post",
                data: {
                    deleteid: deleteid
                },

                success: function(data, status) {
                    readRecords();
                }
            });
        }
    }

    // Update data

    // getting detail from database
    function GetUserDetail(id) {
        // console.log(id);
        $('#hidden_user_id').val(id);

        $.post("logic.php", {
            id: id
        }, function(data, status) {
            var user = JSON.parse(data);
            $('#update_firstname').val(user.FirstName);
            $('#update_lastname').val(user.LastName);
            $('#update_email').val(user.Email_Id);
            $('#update_password').val(user.password);
        });
        $('#update_user_model').modal('show');
    }

    // updating the detail
    function UpdateUserDetail() {
        var firstname1 = $('#update_firstname').val();
        var lastname1 = $('#update_lastname').val();
        var email1 = $('#update_email').val();
        var password1 = $('#update_password').val();

        var hidden_user_id1 = $('#hidden_user_id').val();

        $.post('logic.php', {
                hidden_user_id2: hidden_user_id1,
                firstname2: firstname1,
                lastname2: lastname1,
                email2: email1,
                password2: password1,
            },
            function(data, status) {
                $('#update_user_model').modal('hide');
                readRecords();
            }
        )
    }
    </script>
</body>

</html>