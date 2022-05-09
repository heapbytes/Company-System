<?php
    session_start();
    if ($_SESSION['role']=="admin"){
    ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <title>Dashboard - RichTech </title>
        <meta content="" name="description">
        <meta content="" name="keywords">
        <!-- Favicons -->
        <link href="../assets/img/favicon.png" rel="icon">
        <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">
        <!-- Google Fonts -->
        <link href="https://fonts.gstatic.com" rel="preconnect">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
        <!-- Vendor CSS Files -->
        <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
        <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
        <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
        <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
        <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">
        <!-- Template Main CSS File -->
        <link href="../assets/css/style.css" rel="stylesheet">
        <!-- =======================================================
            * Template Name: NiceAdmin - v2.2.2
            * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
            * Author: BootstrapMade.com
            * License: https://bootstrapmade.com/license/
            ======================================================== -->
    </head>
    <body>
        <!-- ======= Top and Side Bar ======= -->
        <?php include 'imports/nav-admin.php'; ?>
        <main id="main" class="main">
            <div class="row">
            <div class="col-lg-6 col-md-6" style="float:left; width:50%;">
                <div class="card" >
                    <div class="card-body">
                        <h5 class="card-title">Attendance Form</h5>
                        <!-- Vertical Form -->
                        <form class="row mb-3">
                            <div class="col-12">
                                <label for="inputNanme4" class="form-label">Employee id</label>
                                <input type="text" class="form-control" id="inputNanme4">
                            </div>
                            <div class="col-12">
                                <label for="inputPassword4" class="form-label">In time</label>
                                <input type="text" class="form-control" id="inputPassword4">
                            </div>
                            <div class="col-12">
                                <label for="inputPassword4" class="form-label">Out Time</label>
                                <input type="text" class="form-control" id="inputPassword4">
                            </div>
                            <div class="text-center">
                                <br>
                                <button type="submit" class="btn btn-primary">Enter</button>
                                <button type="reset" class="btn btn-secondary">Release</button>
                            </div>
                        </form>
                        <!-- Vertical Form -->
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6" style="float:right;">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Search by Employee Details</h5>
                        <!-- Vertical Form -->
                        <form class="row mb-3">
                            <div class="col-12">
                                <label for="inputNanme4" class="form-label">Employee id</label>
                                <input type="text" class="form-control" id="inputNanme4">
                            </div>
                            <div class="col-12">
                                <label for="inputPassword4" class="form-label">Date</label>
                                <input type="text" class="form-control" id="inputPassword4">
                            </div>
                            <div class="col-12">
                                <label for="inputPassword4" class="form-label">Month and year</label>
                                <input type="text" class="form-control" id="inputPassword4">
                            </div>
                            <div class="text-center">
                                <br>
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </form>
                        <!-- Vertical Form -->
                    </div>
                </div>
            </div>
            </div>
            <br>
            <br>
            <div class="pagetitle">
                <h1>Attendance</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Attendance</li>
                    </ol>
                </nav>
            </div>
            <!-- End Page Title -->
            <section class="section dashboard">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Current Logs</h5>
                                <!-- Employee Details Table -->
                                <?php
                                    include '../imports/config.php';
                                    $conn=mysqli_connect($server_name,$username,$password,$database_name);
                                    $sql_query = "SELECT * from empt";
                                    $records = mysqli_query($conn, $sql_query);
                                    $n=1;
                                    echo '<div class="table-responsive">';
                                    echo '<table class="table table-hover">';
                                        echo '<thead class="thead-dark">';
                                            echo '<tr>';
                                            echo '<th scope="col">#</th>';
                                            echo '<th scope="col">Empid</th>';
                                            echo '<th scope="col">Employee Name</th>';
                                            echo '<th scope="col">Word-Profile</th>';
                                            echo '<th scope="col">In-time</th>';
                                            echo '<th scope="col">Out-time</th>';
                                            echo '<th scope="col">Status</th>';
                                    
                                    
                                            echo '</tr>';
                                        echo '</thead>';
                                    
                                        echo '<tbody>';
                                        while($data = mysqli_fetch_array($records)){
                                            $empid=$data['empid'];
                                            $ename=$data['ename'];
                                            $dob=$data['dob'];
                                            $photo=$data['pphoto'];
                                            $cv=$data['cv'];
                                            $bio=$data['bio'];
                                            $wstatus=$data['wstatus'];
                                    
                                            $dob1=explode(" ",$dob);
                                            $dob=$dob1[0];
                                            
                                            echo '<tr>
                                                    <th scope="row">'.$n.'</th>
                                                    <td>'.$empid.'</td>
                                                    <td>'.$ename.'</td>
                                                    <td>'.$bio.'</td>
                                                    <td>'.$dob.'</td>
                                                    <td>'.$wstatus.'</td>
                                                    <td>'.$wstatus.'</td>
                                    
                                                    </tr>';
                                            $n+=1;
                                        }
                                        echo '</tbody>
                                        </table>';
                                        echo '</div>';
                                    
                                        mysqli_close($conn);
                                    ?>
                                <!-- End Client Project Working On! -->
                                <!-- Client Project Working On! -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <!-- End #main -->
        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
        <!-- Vendor JS Files -->
        <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
        <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/vendor/chart.js/chart.min.js"></script>
        <script src="../assets/vendor/echarts/echarts.min.js"></script>
        <script src="../assets/vendor/quill/quill.min.js"></script>
        <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
        <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
        <script src="../assets/vendor/php-email-form/validate.js"></script>
        <!-- Template Main JS File -->
        <script src="../assets/js/main.js"></script>
    </body>
</html>
<?php
    print("Op");
    }
    else{
    ob_start();
    header('Location: '.'../index.php');
    ob_end_flush();
    die();
    }
    ?>