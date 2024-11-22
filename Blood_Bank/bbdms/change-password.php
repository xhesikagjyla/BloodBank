<?php
session_start();
include('includes/config.php');
if (strlen($_SESSION['bbdmsdid']) == 0) {
    header('location:logout.php');
} else {
    if (isset($_POST['change'])) {
        $uid = $_SESSION['bbdmsdid'];
        $cpassword = md5($_POST['currentpassword']);
        $newpassword = md5($_POST['newpassword']);
        $sql = "SELECT ID FROM tblblooddonars WHERE id=:uid and Password=:cpassword";
        $query = $dbh->prepare($sql);
        $query->bindParam(':uid', $uid, PDO::PARAM_STR);
        $query->bindParam(':cpassword', $cpassword, PDO::PARAM_STR);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        if ($query->rowCount() > 0) {
            $con = "update tblblooddonars set Password=:newpassword where id=:uid";
            $chngpwd1 = $dbh->prepare($con);
            $chngpwd1->bindParam(':uid', $uid, PDO::PARAM_STR);
            $chngpwd1->bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
            $chngpwd1->execute();

            echo '<script>alert("Your password successfully changed")</script>';
        } else {
            echo '<script>alert("Your current password is wrong")</script>';
        }
    }
}
?>
    <!DOCTYPE html>
    <html lang="zxx">

    <head>
        <link rel="icon" href="admin/img/organs.png" type="image/x-icon">
        <title>BBMS</title>
        <script type="text/javascript">
            function checkpass() {
                if (document.changepassword.newpassword.value != document.changepassword.confirmpassword.value) {
                    alert('New Password and Confirm Password field does not match');
                    document.changepassword.confirmpassword.focus();
                    return false;
                }
                return true;
            }
        </script>

        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
        <link rel="stylesheet" href="css/fontawesome-all.css">
        <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
              rel="stylesheet">
        <link href="//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
              rel="stylesheet">

    </head>
    <body>
    <?php include('includes/header.php'); ?>

    <!-- banner 2 -->
    <div class="inner-banner-w3ls">
        <div class="container"></div>
    </div>
    <!-- page details -->
    <div class="breadcrumb-agile">
        <div aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.php">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Change Password</li>
            </ol>
        </div>
    </div>
    <!-- //page details -->

    <!-- contact -->
    <div class="appointment py-5">
        <div class="py-xl-5 py-lg-3">
            <div class="w3ls-titles text-center mb-5">
                <h3 class="title">Change Password</h3>
                <span>
                    <i class="fas fa-user-md"></i>
                </span>
            </div>
            <div class="d-flex">
                <div class="appoint-img"></div>
                <div class="contact-right-w3l appoint-form">
                    <h5 class="title-w3 text-center mb-5">Reset your password if needed</h5>
                    <form action="#" method="post" onsubmit="return checkpass();" name="changepassword">

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Current Password</label>
                            <input type="password" class="form-control" name="currentpassword" id="currentpassword" required='true'>
                        </div>
                        <div class="form-group">
                            <label for="recipient-phone" class="col-form-label">New Password</label>
                            <input type="password" name="newpassword"  class="form-control" required="true">
                        </div>
                        <div class="form-group">
                            <label for="recipient-phone" class="col-form-label">Confirm Password</label>
                            <input type="password" class="form-control" name="confirmpassword" id="confirmpassword"  required='true'>
                        </div>

                        <input type="submit" value="Update" name="change" class="btn_apt">
                    </form>
                </div>
                <div class="clerafix"></div>
            </div>
        </div>
    </div>

    <?php include('includes/footer.php'); ?>

    </body>

    </html>
<?php ?>