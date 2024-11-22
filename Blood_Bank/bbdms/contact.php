<?php
session_start();
error_reporting(0);
include('includes/config.php');

if(isset($_POST['send'])) {

    $name=$_POST['fullname'];
    $email=$_POST['email'];
    $contactno=$_POST['contactno'];
    $message=$_POST['message'];

    $sql="INSERT INTO  tblcontactusquery(name,EmailId,ContactNumber,Message) VALUES(:name,:email,:contactno,:message)";

    $query = $dbh->prepare($sql);
    $query->bindParam(':name',$name,PDO::PARAM_STR);
    $query->bindParam(':email',$email,PDO::PARAM_STR);
    $query->bindParam(':contactno',$contactno,PDO::PARAM_STR);
    $query->bindParam(':message',$message,PDO::PARAM_STR);
    $query->execute();
    $lastInsertId = $dbh->lastInsertId();

    if($lastInsertId){
        echo '<script>alert("Query Sent. We will contact you shortly.")</script>';
    } else  {
        echo "<script>alert('Something went wrong. Please try again.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="English">

<head>
    <link rel="icon" href="admin/img/organs.png" type="image/x-icon">
    <title>BBMS</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <link rel="stylesheet" href="css/fontawesome-all.css">

    <!-- Web-Fonts -->
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
          rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
          rel="stylesheet">
    <!-- //Web-Fonts -->

</head>

<body>
<?php include('includes/header.php');?>

<!-- banner 2 -->
<div class="inner-banner-w3ls">
    <div class="container">

    </div>
    <!-- //banner 2 -->
</div>


<!-- contact -->
<div class="agileits-contact py-5">
    <div class="py-xl-5 py-lg-3">
        <div class="w3ls-titles text-center mb-5">
            <h3 class="title">Contact Us</h3>
            <span>
					<i class="fas fa-user-md"></i>
				</span>

        </div>
        <div class="d-flex">
            <div class="col-lg-5 w3_agileits-contact-left">
            </div>
            <div class="col-lg-7 contact-right-w3l">
                <h5 class="title-w3 text-center mb-5">Get In Touch</h5>
                <form action="#" method="post">
                    <div class="d-flex space-d-flex">
                        <div class="form-group grid-inputs">
                            <input type="text" class="form-control" id="name" name="fullname" placeholder="Please enter your name.">
                        </div>
                        <div class="form-group grid-inputs">
                            <input type="tel" class="form-control" id="phone" name="contactno"  placeholder="Please enter your phone number.">
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" id="email" name="email" required placeholder="Please enter your email address.">
                    </div>


                    <div class="form-group">
                        <textarea rows="10" cols="100" class="form-control" id="message" name="message" placeholder="Please enter your message" maxlength="999" style="resize:none"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Send Message" name="send">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- //contact -->


<?php include('includes/footer.php');?>


</body>

</html>
