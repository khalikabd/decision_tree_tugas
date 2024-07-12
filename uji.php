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
                            <h5 class="mb-0 btn btn-square btn-lg btn-info">Pengujian Algoritma C4.5</h5>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">Form Pengujian</div>
                                <div class="card-body">
                                    <h5 class="card-title"></h5>
                                    <form method="post" action="" class="">
                                        <div class="mb-3 row">
                                            <label class="col-sm-4">X1 - Mual</label>
                                            <div class="col-sm-2">
                                                <div class="form-check form-check-inline">
                                                  <input class="form-check-input" type="radio" name="x1" id="x1-1" value="Y" checked>
                                                  <label class="form-check-label" for="radio1">Ya</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                  <input class="form-check-input" type="radio" name="x1" id="x1-2" value="T">
                                                  <label class="form-check-label" for="radio2">Tidak</label>
                                                </div>
                                            </div>
                                            <label class="col-sm-4">X9 - Perut terasa penuh</label>
                                            <div class="col-sm-2">
                                                <div class="form-check form-check-inline">
                                                  <input class="form-check-input" type="radio" name="x9" id="x9-1" value="Y" checked>
                                                  <label class="form-check-label" for="radio1">Ya</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                  <input class="form-check-input" type="radio" name="x9" id="x9-2" value="T">
                                                  <label class="form-check-label" for="radio2">Tidak</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="line"></div><br>
                                        <div class="mb-3 row">
                                            <label class="col-sm-4">X2 - Muntah</label>
                                            <div class="col-sm-2">
                                                <div class="form-check form-check-inline">
                                                  <input class="form-check-input" type="radio" name="x2" id="x2-1" value="Y" checked>
                                                  <label class="form-check-label" for="radio1">Ya</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                  <input class="form-check-input" type="radio" name="x2" id="x2-2" value="T">
                                                  <label class="form-check-label" for="radio2">Tidak</label>
                                                </div>
                                            </div>
                                            <label class="col-sm-4">X10 - Cepat kenyang</label>
                                            <div class="col-sm-2">
                                                <div class="form-check form-check-inline">
                                                  <input class="form-check-input" type="radio" name="x10" id="x10-1" value="Y" checked>
                                                  <label class="form-check-label" for="radio1">Ya</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                  <input class="form-check-input" type="radio" name="x10" id="x10-2" value="T">
                                                  <label class="form-check-label" for="radio2">Tidak</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="line"></div><br>
                                        <div class="mb-3 row">
                                            <label class="col-sm-4">X3 - Nyeri pada hati</label>
                                            <div class="col-sm-2">
                                                <div class="form-check form-check-inline">
                                                  <input class="form-check-input" type="radio" name="x3" id="x3-1" value="Y" checked>
                                                  <label class="form-check-label" for="radio1">Ya</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                  <input class="form-check-input" type="radio" name="x3" id="x3-2" value="T">
                                                  <label class="form-check-label" for="radio2">Tidak</label>
                                                </div>
                                            </div>
                                            <label class="col-sm-4">X11 - Mengeluarkan gas asam dari mulut</label>
                                            <div class="col-sm-2">
                                                <div class="form-check form-check-inline">
                                                  <input class="form-check-input" type="radio" name="x11" id="x11-1" value="Y" checked>
                                                  <label class="form-check-label" for="radio1">Ya</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                  <input class="form-check-input" type="radio" name="x11" id="x11-2" value="T">
                                                  <label class="form-check-label" for="radio2">Tidak</label>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="line"></div><br>
                                        <div class="mb-3 row">
                                            <label class="col-sm-4">X4 - Nafsu makan berkurang</label>
                                            <div class="col-sm-2">
                                                <div class="form-check form-check-inline">
                                                  <input class="form-check-input" type="radio" name="x4" id="x4-1" value="Y" checked>
                                                  <label class="form-check-label" for="radio1">Ya</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                  <input class="form-check-input" type="radio" name="x4" id="x4-2" value="T">
                                                  <label class="form-check-label" for="radio2">Tidak</label>
                                                </div>
                                            </div>
                                            <label class="col-sm-4">X12 - Nyeri dibelakang tulang dada</label>
                                            <div class="col-sm-2">
                                                <div class="form-check form-check-inline">
                                                  <input class="form-check-input" type="radio" name="x12" id="x12-1" value="Y" checked>
                                                  <label class="form-check-label" for="radio1">Ya</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                  <input class="form-check-input" type="radio" name="x12" id="x12-2" value="T">
                                                  <label class="form-check-label" for="radio2">Tidak</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="line"></div><br>
                                        <div class="mb-3 row">
                                            <label class="col-sm-4">X5 - Mulut terasa pahit</label>
                                            <div class="col-sm-2">
                                                <div class="form-check form-check-inline">
                                                  <input class="form-check-input" type="radio" name="x5" id="x5-1" value="Y" checked>
                                                  <label class="form-check-label" for="radio1">Ya</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                  <input class="form-check-input" type="radio" name="x5" id="x5-2" value="T">
                                                  <label class="form-check-label" for="radio2">Tidak</label>
                                                </div>
                                            </div>
                                            <label class="col-sm-4">X13 - Suara serak</label>
                                            <div class="col-sm-2">
                                                <div class="form-check form-check-inline">
                                                  <input class="form-check-input" type="radio" name="x13" id="x13-1" value="Y" checked>
                                                  <label class="form-check-label" for="radio1">Ya</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                  <input class="form-check-input" type="radio" name="x13" id="x13-2" value="T">
                                                  <label class="form-check-label" for="radio2">Tidak</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="line"></div><br>
                                        <div class="mb-3 row">
                                            <label class="col-sm-4">X6 - Sering bersendawa</label>
                                            <div class="col-sm-2">
                                                <div class="form-check form-check-inline">
                                                  <input class="form-check-input" type="radio" name="x6" id="x6-1" value="Y" checked>
                                                  <label class="form-check-label" for="radio1">Ya</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                  <input class="form-check-input" type="radio" name="x6" id="x6-2" value="T">
                                                  <label class="form-check-label" for="radio2">Tidak</label>
                                                </div>
                                            </div>
                                            <label class="col-sm-4">X14 - Penurunan berat badan</label>
                                            <div class="col-sm-2">
                                                <div class="form-check form-check-inline">
                                                  <input class="form-check-input" type="radio" name="x14" id="x14-1" value="Y" checked>
                                                  <label class="form-check-label" for="radio1">Ya</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                  <input class="form-check-input" type="radio" name="x14" id="x14-2" value="T">
                                                  <label class="form-check-label" for="radio2">Tidak</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="line"></div><br>
                                        <div class="mb-3 row">
                                            <label class="col-sm-4">X7 - Regurgitas</label>
                                            <div class="col-sm-2">
                                                <div class="form-check form-check-inline">
                                                  <input class="form-check-input" type="radio" name="x7" id="x7-1" value="Y" checked>
                                                  <label class="form-check-label" for="radio1">Ya</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                  <input class="form-check-input" type="radio" name="x7" id="x7-2" value="T">
                                                  <label class="form-check-label" for="radio2">Tidak</label>
                                                </div>
                                            </div>
                                            <label class="col-sm-4">X15 - Sesak pada bagian tengah atas perut</label>
                                            <div class="col-sm-2">
                                                <div class="form-check form-check-inline">
                                                  <input class="form-check-input" type="radio" name="x15" id="x15-1" value="Y" checked>
                                                  <label class="form-check-label" for="radio1">Ya</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                  <input class="form-check-input" type="radio" name="x15" id="x15-2" value="T">
                                                  <label class="form-check-label" for="radio2">Tidak</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="line"></div><br>
                                        <div class="mb-3 row">
                                            <label class="col-sm-4">X8 - Kembung</label>
                                            <div class="col-sm-2">
                                                <div class="form-check form-check-inline">
                                                  <input class="form-check-input" type="radio" name="x8" id="x8-1" value="Y" checked>
                                                  <label class="form-check-label" for="radio1">Ya</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                  <input class="form-check-input" type="radio" name="x8" id="x8-2" value="T">
                                                  <label class="form-check-label" for="radio2">Tidak</label>
                                                </div>
                                            </div>
                                            <label class="col-sm-4">X16 - Perasaan panas di dada dan perut</label>
                                            <div class="col-sm-2">
                                                <div class="form-check form-check-inline">
                                                  <input class="form-check-input" type="radio" name="x16" id="x16-1" value="Y" checked>
                                                  <label class="form-check-label" for="radio1">Ya</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                  <input class="form-check-input" type="radio" name="x16" id="x16-2" value="T">
                                                  <label class="form-check-label" for="radio2">Tidak</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="line"></div><br>
                                        
                                        <div class="mb-3 row">
                                            <div class="col-sm-4">
                                                <button type="submit" name="submit" class="btn btn-primary mb-2"><i class="fas fa-save"></i> Proses</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php
                    $testingData = array();
                    if (isset($_POST['submit']))
                    {
                        $testingData = [
                            'X1' => $_POST['x1'],
                            'X2' => $_POST['x2'],
                            'X3' => $_POST['x3'],
                            'X4' => $_POST['x4'],
                            'X5' => $_POST['x5'],
                            'X6' => $_POST['x6'],
                            'X7' => $_POST['x7'],
                            'X8' => $_POST['x8'],
                            'X9' => $_POST['x9'],
                            'X10' => $_POST['x10'],
                            'X11' => $_POST['x11'],
                            'X12' => $_POST['x12'],
                            'X13' => $_POST['x13'],
                            'X14' => $_POST['x14'],
                            'X15' => $_POST['x15'],
                            'X16' => $_POST['x16'],
                        ]; 
                        
                    ?>
                        
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Gejala :</h5>
                                            <div class="row">
                                                <div class="col-md-4">
                                                <ul>
                                                    <li>Mual (X1) : <?=$_POST['x1']?></li>
                                                    <li>Muntah (X2) : <?=$_POST['x2']?></li>
                                                    <li>Nyeri pada hati (X3) : <?=$_POST['x3']?></li>
                                                    <li>Nafsu makan berkurang (X4) : <?=$_POST['x4']?></li>
                                                    <li>Mulut terasa pahit (X5) : <?=$_POST['x5']?></li>
                                                    <li>Sering bersendawa (X6) : <?=$_POST['x6']?></li>
                                                </ul>
                                                </div>
                                                <div class="col-md-4">
                                                <ul>
                                                    <li>Regurgitas (X7) : <?=$_POST['x7']?></li>
                                                    <li>Kembung (X8) : <?=$_POST['x8']?></li>
                                                    <li>Perut terasa penuh (X9) : <?=$_POST['x9']?></li>
                                                    <li>Cepat kenyang (X10) : <?=$_POST['x10']?></li>
                                                    <li>Mengeluarkan gas asam dari mulut (X11) : <?=$_POST['x11']?></li>
                                                </ul>
                                                </div>
                                                <div class="col-md-4">
                                                <ul>
                                                    <li>Nyeri dibelakang tulang dada (X12) : <?=$_POST['x12']?></li>
                                                    <li>Suara serak (X13) : <?=$_POST['x13']?></li>
                                                    <li>Penurunan berat badan (14) : <?=$_POST['x14']?></li>
                                                    <li>Sesak pada bagian tengah atas perut (X15) : <?=$_POST['x15']?></li>
                                                    <li>Perasaan panas di dada dan perut (X16) : <?=$_POST['x16']?></li>
                                                </ul>
                                                </div>
                                            </div>
                                            <h5 class="card-title">Hasil Diagnosa : <span class="btn btn-info"><?=$tree->classify($testingData);?></span></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
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
