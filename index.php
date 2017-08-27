<?php
include($_SERVER['DOCUMENT_ROOT'] . '/migracao/model/Dadosantigos.php');
include($_SERVER['DOCUMENT_ROOT'] . '/migracao/model/Produtos.php');

$dataOld = new Dadosantigos();
$dataNew = new Produtos();
$dataOld->migrar();
//die();
//print "<pre>";
//print_r($dataOld->migrar());
//die();
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head> 
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>
            Migração
        </title>
    </head>
    <body>

        <div id='wrapper'>
            <div id='css'>
                <?php include('view/layouts/css.php'); ?>
            </div>

            <?php include('view/layouts/navigation.php'); ?>
            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><i class='fa fa-database'></i> Migração</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>

                <div class='row'>
                    <a href='#' class='btn btn-primary pull-right'><i class="fa fa-database" aria-hidden="true"></i> Migration</a>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Dados Antigos
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table id='' class='table table-striped table-bordered table-hover'>
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Produto</th>
                                                <th>Cor</th>
                                                <th>Tamanho</th>

                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            foreach ($dataOld->dataLst() as $value) {
//        print "<pre>";
//        print_r($dataOld->dataLst());
//        die();
                                                echo "<tr><td>" . $value->codigo . "</td>";
                                                echo "<td>" . $value->titulo . "</td>";
                                                echo "<td>" . $value->cor . "</td>";
                                                echo "<td>" . $value->tamanho . "</td></tr>";
                                            }
                                            ?>
                                        </tbody>

                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Dados Migrados
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Produto</th>
                                                <th>Cor</th>
                                                <th>Tamanho</th>

                                            </tr>

                                        </thead>


                                        <tbody>

                                            <?php
//                                        foreach ($dataNew->dataLst() as $value) {
////        print "<pre>";
////        print_r($value);
////        die();
//                                            echo "<tr><td>" . $value->codigo . "</td>";
//                                            echo "<td>" . $value->titulo . "</td>";
//                                        }
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



        <div id='js'>
            <?php include('view/layouts/js.php'); ?>

        </div>
    </body>

</html>
