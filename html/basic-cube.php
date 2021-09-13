<?php 
   
       try
    {
         $bdd = mysqli_connect("localhost","root", "", "oders1");
    }
        catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
    <title>Data Warehouse</title>
    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="css/colors/default.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header">
    <!-- ============================================================== -->
    <!-- Preloader -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Wrapper -->
    <!-- ============================================================== -->
    <div id="wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
       <?php include "php/navbar.php" ; ?>
        <!-- ============================================================== -->
        <!-- End Left Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Data Warehouse project</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    
                        <ol class="breadcrumb">
                            <li><a href="#">Basic table</a></li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /row -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Basic-Cube</h3>
                            <div class="table-responsive">
                                <?php 
   
                                       try
                                    {
                                         $bdd = mysqli_connect("localhost","root", "", "oders1");
                                    }
                                        catch (Exception $e)
                                    {
                                        die('Erreur : ' . $e->getMessage());
                                    }

                                    $result = mysqli_query($bdd, "SELECT  tblorders.OrderDate, tblorders.ShipCity, tblproducts.ProductName, tblorderdetails.Quantity
                                        FROM `tblorders`, tblorderdetails, tblproducts 
                                        WHERE tblorders.OrderID = tblorderdetails.OrderID AND tblorderdetails.ProductID = tblproducts.ProductID 
                                        ORDER BY `OrderDate");
                                    echo '<table class="table table-bordered table-condensed table-body-center">
                                    <thead>
                                    <tr class="data-heading">
                                        <th>OrderDate</th>
                                        <th>ShipCity</th>
                                        <th>ProductName</th>
                                        <th>Quantity</th>                                                                            
                                    </tr>
                                    </thead>';  
                                        
                                                 while($row=mysqli_fetch_array($result)){
                                            echo "<tbody>";        
                                            echo "<tr>";
                                                 echo "<td><b>".$row['OrderDate']."</td>";
                                                 echo "<td><b>".$row['ShipCity']."</td>";
                                                 echo "<td><b>".$row['ProductName']."</td>";
                                                 echo "<td><b>".$row['Quantity']."</td>";
                                            echo "</tr>";
                                            echo "</tbody>";
                                               }
                                               echo "</table>";
                                               mysqli_close($bdd);
                                        ?> 
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> <ul>
                            </footer>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="../plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.min.js"></script>
</body>

</html>