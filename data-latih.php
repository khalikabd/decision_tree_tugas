<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Diagnosa Penyakit Dalam - Metode C 4.5</title>
    <link href="assets/vendor/fontawesome/css/fontawesome.min.css" rel="stylesheet">
    <link href="assets/vendor/fontawesome/css/solid.min.css" rel="stylesheet">
    <link href="assets/vendor/fontawesome/css/brands.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/master.css" rel="stylesheet">
    <link href="assets/vendor/flagiconcss/css/flag-icon.min.css" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <nav id="sidebar" class="">
            <div class="sidebar-header">
                <img src="assets/img/decision-tree.png" alt="decision tree logo" class="app-logo">
            </div>
            <ul class="list-unstyled components text-secondary">
                <li>
                    <a href="index.html"><i class="fas fa-home"></i> Dashboard</a>
                </li>
                <li>
                    <a href="data-latih.php"><i class="fas fa-table"></i> Data Latih</a>
                </li>
                <li>
                    <a href="perhitungan.php"><i class="fas fa-burn"></i> Entropy & Gain</a>
                </li>
                <li>
                    <a href="decision-tree.php"><i class="fas fa-sitemap"></i> Pohon Keputusan</a>
                </li>
                <li>
                    <a href="data-uji.php"><i class="fas fa-table"></i> Data Uji</a>
                </li>
                <li>
                    <a href="uji.php"><i class="fas fa-file-alt"></i> Pengujian</a>
                </li>
            </ul>
        </nav>
        <div id="body" class="">
            <!-- navbar navigation component -->
            <nav class="navbar navbar-expand-lg navbar-white bg-white">
                <button type="button" id="sidebarCollapse" class="btn btn-light">
                    <i class="fas fa-bars"></i><span></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    
                </div>
            </nav>
            <!-- end of navbar navigation -->
            <div class="content">
                <div class="container">
                <?php
                    // Open the CSV file
                    $fcsv = fopen( 'data-latih.csv', 'r' );
                    // Get header row
                    $row = fgetcsv( $fcsv );
                    // Output start of table & header row
                ?>    
                <div class="col-md-12 col-lg-12">
                            <div class="card">
                                
                                <div class="card-body">
                                    <div class="head">
                                        <h5 class="mb-0 btn btn-square btn-lg btn-info">Data Latih</h5>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-sm table-striped">
                                        <thead>
                                            <tr>
                                            <th>NO</th>
                                            <th><?= $row[0] ?></th>
                                            <th><?= $row[1] ?></th>
                                            <th><?= $row[2] ?></th>
                                            <th><?= $row[3] ?></th>
                                            <th><?= $row[4] ?></th>
                                            <th><?= $row[5] ?></th>
                                            <th><?= $row[6] ?></th>
                                            <th><?= $row[7] ?></th>
                                            <th><?= $row[8] ?></th>
                                            <th><?= $row[9] ?></th>
                                            <th><?= $row[10] ?></th>
                                            <th><?= $row[11] ?></th>
                                            <th><?= $row[12] ?></th>
                                            <th><?= $row[13] ?></th>
                                            <th><?= $row[14] ?></th>
                                            <th><?= $row[15] ?></th>
                                            <th><?= $row[16] ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>    
                                        <?php
                                        // Loop through rest of rows in CSV
                                        $i=1;
                                        while ( ( $row = fgetcsv( $fcsv ) ) !== false )
                                        {
                                        ?>
                                            <tr>
                                            <td><?= $i ?></td>
                                            <td><?= $row[0] ?></td>
                                            <td><?= $row[1] ?></td>
                                            <td><?= $row[2] ?></td>
                                            <td><?= $row[3] ?></td>
                                            <td><?= $row[4] ?></td>
                                            <td><?= $row[5] ?></td>
                                            <td><?= $row[6] ?></td>
                                            <td><?= $row[7] ?></td>
                                            <td><?= $row[8] ?></td>
                                            <td><?= $row[9] ?></td>
                                            <td><?= $row[10] ?></td>
                                            <td><?= $row[11] ?></td>
                                            <td><?= $row[12] ?></td>
                                            <td><?= $row[13] ?></td>
                                            <td><?= $row[14] ?></td>
                                            <td><?= $row[15] ?></td>
                                            <td><?= $row[16] ?></td>
                                            </tr>
                                        <?php
                                        $i++;
                                        }
                                        ?>
                                        </tbody>
                                        </table>    
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                
            </div>
        </div>
    </div>
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chartsjs/Chart.min.js"></script>
    <script src="assets/js/dashboard-charts.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>
