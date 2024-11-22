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
            <h3 class="title">Blood Donor List</h3>
            <span>
					<i class="fas fa-user-md"></i>
				</span>
            <p class="mt-2">Blood donors play a crucial role in saving lives by selflessly contributing their blood, providing a lifeline for medical treatments</p>
        </div>

        <div class="d-flex">

            <div class="row package-grids mt-5" style="padding-left: 50px;">
                <?php

                $status=1;
                $sql = "SELECT * from tblblooddonars where status=:status";
                $query = $dbh -> prepare($sql);
                $query->bindParam(':status',$status,PDO::PARAM_STR);
                $query->execute();
                $results=$query->fetchAll(PDO::FETCH_OBJ);
                $cnt=1;

                if($query->rowCount() > 0){
                    foreach($results as $result){ ?>
                        <div class="col-md-4 pricing">
                            <div class="price-top">
                                <img src="images/blood-donor.jpg" alt="Blood Donot" style="border:1px #000 solid" class="img-fluid" />
                                <h3><?php echo htmlentities($result->FullName);?></h3>
                            </div>
                            <div class="price-bottom p-4">


                                <table class="table table-bordered">

                                    <tbody>
                                    <tr>
                                        <th>Gender</th>
                                        <td><?php echo htmlentities($result->Gender);?></td>
                                    </tr>

                                    <tr>
                                        <td>Blood Group</td>
                                        <td><?php echo htmlentities($result->BloodGroup);?></td>
                                    </tr>

                                    <tr>
                                        <td>Mobile No.</td>
                                        <td><?php echo htmlentities($result->MobileNumber);?></td>
                                    </tr>

                                    <tr>
                                        <td>Email ID</td>
                                        <td><?php echo htmlentities($result->EmailId);?></td>
                                    </tr>

                                    <tr>
                                        <td>Age</td>
                                        <td><?php echo htmlentities($result->Age);?></td>
                                    </tr>

                                    <tr>
                                        <td>Address</td>
                                        <td><?php echo htmlentities($result->Address);?></td>
                                    </tr>

                                    <tr>
                                        <td>Message</td>
                                        <td><?php echo htmlentities($result->Message);?></td>
                                    </tr>

                                    </tbody>
                                </table>

                                <a class="btn btn-primary" style="color:#fff"  href="contact-blood.php?cid=<?php echo $result->id;?>">Request</a>
                            </div>
                        </div><br>
                    <?php }} ?>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php');?>


</body>
</html>
