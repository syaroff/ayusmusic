<?php 
    session_start();
    if(!empty($_SESSION['username'])) {
        header("Location: ../admin/dashboard.php");
    }
    include "../db/konek.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/main.style.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <title>Sig In |  A Y U S M U S I C</title>
    <style>
        body {
            height: 100vh !important;
            background: url('../assets/img/bglogin.jpg') center no-repeat;
            background-size: cover !important ;
        }
        .login-img {
            width: 50%;
        }
    </style>
</head>
<body>

    <div class="container container-fluid">
        <div class="row align-items-center" style="height: 100vh;">
            <div class="col-4 col-md-6 mx-auto">
                <div class="card flex-row flex-wrap" style="background: transparent;" >
                    <img src="../assets/img/login.jpg" class="img-fluid login-img">
                    <div class="card-block card-body bg-light p-5" style="width: 50%;">
                        <form method="post">
                            <h3 class="fw-bold">Sign In </h3>
                            <small>Portal login admin,hanya admin yang dapat masuk.</small>
                            <div class="mb-3 mt-5">
                                <input type="text" name="username" id="username" placeholder="Username" class="form-control" autofocus required>
                            </div>
                            <div class="mb-3 mt-3">
                                <input type="password" name="sandi" id="sandi" placeholder="Password" class="form-control" autofocus required>
                            </div>
                            <div class="mb-3 mt-3">
                                <input type="submit" name="submit" value="Sign In" class="btn btn-dark w-100">
                            </div>
                            <hr>
                            <div class="mb-2 text-center">
                                <small class="text-muted">A Y U S M U S I C</small>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
        if(isset($_POST['submit'])) {
            $login = mysqli_query($konek,"SELECT * FROM user WHERE sandi=MD5($_POST[sandi]) AND username='$_POST[username]'");
            $row= mysqli_fetch_assoc($login);
            if(mysqli_num_rows($login)) {
                $_SESSION['username'] = $_POST['username'];
                $_SESSION['nama'] = $row['nama'];
                echo "<script>window.location.href= '../admin/dashboard.php'</script>";
            }
        }
    ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>    <script src="asssets/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>