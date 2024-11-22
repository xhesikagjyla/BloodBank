<?php
error_reporting(0);
include('includes/config.php');
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

<!-- banner -->
<div class="slider">
    <div class="callbacks_container">
        <ul class="rslides callbacks callbacks1" id="slider4">
            <li>
                <div class="banner-top1">
                    <div class="banner-info_agile_w3ls">
                        <div class="container">
                            <h3><span>Blood bank services that you can trust</span></h3>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>

<!-- //banner -->
<div class="clearfix"></div>
<!-- treatments -->

<div class="screen-w3ls py-5">
    <div class="container py-xl-5 py-lg-3">
        <div class="w3ls-titles text-center mb-5">
            <h3 class="title">BLOOD GROUPS</h3>
            <span>
					<i class="fas fa-user-md"></i>
				</span>
            <p class="mt-2">Blood group of any human being will mainly fall in any one of the following groups..</p>
        </div>
        <div class="row">
            <div class="col-lg-6">

                <ul>
                    <li>A positive or A negative</li>
                    <li>B positive or B negative</li>
                    <li>O positive or O negative</li>
                    <li>AB positive or AB negative.</li>
                </ul><br>

                <p>A healthy diet helps ensure a successful blood donation, and also makes you feel better! Check out the following recommended foods to eat prior to your donation.</p>
            </div>
            <div class="col-lg-6">
                <img class="img-fluid rounded" src="images/blood-donor (1).jpg" alt="">
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-md-8">
                <h4 style="padding-top: 30px;">UNIVERSAL DONORS AND RECIPIENTS</h4>
                <p>
                    The most common blood type is O, followed by type A. Type O individuals are often called "universal donors" since their blood can be transfused into persons with any blood type. Those with type AB blood are called "universal recipients" because they can receive blood of any type.</p>
            </div>
            <div class="col-md-4" style="padding-top: 30px;">
            </div>
        </div>
    </div>
</div>

<!-- blog -->
<div class="blog-w3ls py-5" id="blog">
    <div class="container py-xl-5 py-lg-3">
        <div class="w3ls-titles text-center mb-5">
            <h3 class="title text-white">Some of the Donors</h3>
            <span>
					<i class="fas fa-user-md text-white"></i>
				</span>
        </div>
        <div class="row package-grids mt-5">
            <?php
            $status=1;
            $sql = "SELECT * from tblblooddonars where status=:status order by rand() limit 6";
            $query = $dbh -> prepare($sql);
            $query->bindParam(':status',$status,PDO::PARAM_STR);
            $query->execute();
            $results=$query->fetchAll(PDO::FETCH_OBJ);
            $cnt=1;

            if($query->rowCount() > 0){
                foreach($results as $result){ ?>
                    <div class="col-md-4 pricing" style="margin-top:2%;">
                    <div class="price-top">
                        <img src="images/blood-donor.jpg" alt="" class="img-fluid" />
                        <h3><?php echo htmlentities($result->FullName);?></h3>
                    </div>

                    <div class="price-bottom p-4">
                        <h4 class="text-dark mb-3">Gender: <?php echo htmlentities($result->Gender);?></h4>
                        <p class="card-text"><b>Blood Group :</b> <?php echo htmlentities($result->BloodGroup);?></p>

                        <a class="btn btn-primary" style="color:#fff" href="contact-blood.php?cid=<?php echo $result->id;?>">Request</a>
                    </div>
                    </div><?php }} ?>


        </div>
    </div>
</div>

<!-- footer -->
<?php include('includes/footer.php');?>


</body>
</html>
