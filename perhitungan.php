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
              
                    // Loop through rest of rows in CSV
                    $total_all = 0;
                    $total_disp = 0;
                    $total_maag = 0;
                    $total_gerd = 0;
                    for ($i=0;$i<=15;$i++) {
                        $xy[$i]['all'] = 0;
                        $xt[$i]['all'] = 0;
                        $xy[$i]['disp'] = 0;
                        $xt[$i]['disp'] = 0;
                        $xy[$i]['maag'] = 0;
                        $xt[$i]['maag'] = 0;
                        $xy[$i]['gerd'] = 0;
                        $xt[$i]['gerd'] = 0;
                    }
                    while ( ( $row = fgetcsv( $fcsv ) ) !== false )
                    {
                        $total_all++;
                        if (in_array("dispepsia", $row)) {
                            $total_disp++;
                            for ($i=0;$i<=15;$i++) {
                                if ($row[$i] == "Y") {
                                    $xy[$i]['disp']++;
                                } else {
                                    $xt[$i]['disp']++;
                                }
                            }
                        }    
                        
                        if (in_array("Maag", $row)) {
                            $total_maag++;
                            for ($i=0;$i<=15;$i++) {
                                if ($row[$i] == "Y") {
                                    $xy[$i]['maag']++;
                                } else {
                                    $xt[$i]['maag']++;
                                }
                            }
                        }
                            
                        if (in_array("GERD", $row)) {
                            $total_gerd++;
                            for ($i=0;$i<=15;$i++) {
                                if ($row[$i] == "Y") {
                                    $xy[$i]['gerd']++;
                                } else {
                                    $xt[$i]['gerd']++;
                                }
                            }
                        } 

                        for ($i=0;$i<=15;$i++) {
                            if ($row[$i] == "Y") {
                                $xy[$i]['all']++;
                            } else {
                                $xt[$i]['all']++;
                            }
                        }
                        
                        $entropy_all = -(($total_disp/$total_all)*log($total_disp/$total_all,2)+
                                        ($total_maag/$total_all)*log($total_maag/$total_all,2)+
                                        ($total_gerd/$total_all)*log($total_gerd/$total_all,2));
                                     
                    }

                ?>
                                        
                    <div class="col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="head">
                                    <h5 class="mb-0 btn btn-square btn-lg btn-info">Perhitungan Entropy & Gain</h5>
                                </div>
                                <br>
                                <div class="table-responsive">
                                    <table class="table table-sm table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Variabel</th>
                                            <th>Jumlah Data</th>
                                            <th>Dispepsia</th>
                                            <th>Maag</th>
                                            <th>Gerd</th>
                                            <th>Entropy</th>
                                            <th>Gain</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>Semua</td>
                                            <td><?=$total_all?></td>
                                            <td><?=$total_disp?></td>
                                            <td><?=$total_maag?></td>
                                            <td><?=$total_gerd?></td>
                                            <td><?=$entropy_all?></td>
                                            <td></td>
                                        </tr>
                                        <?php
                                        for ($i=0;$i<=15;$i++) {
                                            $entro_y = -(($xy[$i]['disp']/$xy[$i]['all'])*log($xy[$i]['disp']/$xy[$i]['all'],2)+
                                                        ($xy[$i]['maag']/$xy[$i]['all'])*log($xy[$i]['maag']/$xy[$i]['all'],2)+
                                                        ($xy[$i]['gerd']/$xy[$i]['all'])*log($xy[$i]['gerd']/$xy[$i]['all'],2));
                                            $entro_t = -(($xt[$i]['disp']/$xt[$i]['all'])*log($xt[$i]['disp']/$xt[$i]['all'],2)+
                                                        ($xt[$i]['maag']/$xt[$i]['all'])*log($xt[$i]['maag']/$xt[$i]['all'],2)+
                                                        ($xt[$i]['gerd']/$xt[$i]['all'])*log($xt[$i]['gerd']/$xt[$i]['all'],2));;
                                            $gain = $entropy_all-(($xy[$i]['all']/$total_all)*$entro_y + ($xt[$i]['all']/$total_all)*$entro_t);
                                        ?>
                                        <tr><td colspan="7" style="background-color:#ddd; font-weight:bold">X<?=$i+1?></td></tr>
                                        <tr>
                                            <td>Ya</td>
                                            <td><?=$xy[$i]['all']?></td>
                                            <td><?=$xy[$i]['disp']?></td>
                                            <td><?=$xy[$i]['maag']?></td>
                                            <td><?=$xy[$i]['gerd']?></td>
                                            <td><?=$entro_y?></td>
                                            <td><?=$gain?></td>
                                        </tr>
                                        <tr>
                                            <td>Tidak</td>
                                            <td><?=$xt[$i]['all']?></td>
                                            <td><?=$xt[$i]['disp']?></td>
                                            <td><?=$xt[$i]['maag']?></td>
                                            <td><?=$xt[$i]['gerd']?></td>
                                            <td><?=$entro_t?></td>
                                            <td></td>
                                        </tr>
                                        <?php
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
