<?php session_start();
include('includes/config.php');

if(isset($_SESSION['login'])){
    header("Location:index.php");
    exit;
}
if(isset($_POST['login']))
{
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $sql ="SELECT id FROM tblblooddonars WHERE EmailId=:email and Password=:password";
    $query=$dbh->prepare($sql);
    $query->bindParam(':email',$email,PDO::PARAM_STR);
    $query-> bindParam(':password', $password, PDO::PARAM_STR);
    $query-> execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    if($query->rowCount() > 0) {
        foreach ($results as $result) {
            $_SESSION['bbdmsdid']=$result->id;}
        $_SESSION['login']=$_POST['email'];
        echo "<script type='text/javascript'> document.location ='index.php'; </script>";
    }
    else{
        echo "<script>alert('Invalid Details');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <link rel="icon" href="admin/img/organs.png" type="image/x-icon">
    <title>BBMS</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <link rel="stylesheet" href="css/fontawesome-all.css">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
</head>

<body>
<?php include('includes/header.php');?>

<!-- banner 2 -->
<div class="inner-banner-w3ls">
    <div class="container">
    </div>
</div>

<section class="about py-5">
    <div class="container py-xl-5 py-lg-3">
        <div class="login px-4 mx-auto mw-100">
            <h5 class="text-center mb-4">Login Now</h5>
            <form action="#" method="post" name="login">
                <div class="form-group">
                    <label>Email ID</label>
                    <input type="email" class="form-control" name="email" placeholder="" required="">
                </div>
                <div class="form-group">
                    <label class="mb-2">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder=""
                           required="">
                </div>
                <button type="submit" class="btn submit mb-4" name="login">Login</button>

                <p class="account-w3ls text-center pb-4" style="color:#000">
                    Don't have an account?
                    <a href="sign-up.php">Create one now</a>
                </p>
            </form>
        </div>

    </div>
</section>
<?php include('includes/footer.php');?>
</body>
</html>