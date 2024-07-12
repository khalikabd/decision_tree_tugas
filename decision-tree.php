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

            <?php
                require_once __DIR__ . '/vendor/autoload.php';

                use C45\C45;

                $filename = __DIR__ . '/data-latih.csv';

                $c45 = new C45([
                                'targetAttribute' => 'DIAGNOSA',
                                'trainingFile' => $filename,
                                'splitCriterion' => C45::SPLIT_GAIN,
                            ]);

                $tree = $c45->buildTree();
                $treeString = $tree->toString();
                $printRule = $tree->toRule();
            ?>

            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 page-header">
                            <h5 class="mb-0 btn btn-square btn-lg btn-info">Pohon Keputusan</h5>
                        </div>
                    </div>
                    <div class="row">
                    <?php

                    // print generated tree
                    echo '<pre>';
                    print_r($treeString);
                    echo '</pre>';

                    //echo $printRule;

                    ?>
                        
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
