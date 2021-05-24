<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Data Processed</title>
</head>
<body>
    <div class="container-fluid">
        <div class="m-4 p-4">
            <div class="mb-2">
                <a href="index.php">Regresar</a>
            </div>
            <table class="table table-bordered table-sm table-responsive table-hover table-striped" width="100%">
                <?php

                function getInitialConfigs($idAcuerdo, $dateFrom, $dateTo){
                    return $idAcuerdo . '^^^^' . $dateFrom . '^' . $dateTo . '^BIENES';
                };

                function getRow($partition){
                    return explode("^", $partition);
                }

                function getDataFromScrape($response){
                    $stringForPartition = 'Nro^Ruc Proveedor^Proveedor^Ruc Entidad^Entidad^Tipo de Compra^Orden Electrónica^Estado de la Orden Electrónica^Orden Electrónica Estado^Fecha de Formalización^Fecha del ultimo estado^Plazo de entrega^Lugar de entrega^Sub Total^Costo de Envío^IGV^Total^Orden publicada^Descripcion Estado^Descripcion de cesión de derechos¬13^14^15^16¬6¬7¬8^17¯';
                    $dataFromScrape     = array_map('getRow', explode('¬', explode($stringForPartition, $response)[1]));

                    echo $dataFromScrape;

                    $tableData = '<thead>
                                        <tr class="table-info">
                                            <th>Ruc Proveedor</th>
                                            <th>Proveedor</th>
                                            <th>Ruc Entidad</th>
                                            <th>Entidad</th>
                                            <th>Tipo Compra</th>
                                            <th>Orden Electrónica</th>
                                            <th >Estado Ord. Elec.</th>
                                            <th >Ord. Electrónica Estado.</th>
                                            <th>Fecha Formalización</th>
                                            <th>Fecha último estado</th>
                                            <th>Estado Ord. Elec.</th>
                                            <th>Plazo de entrega</th>
                                            <th>Lugar de entrega</th>
                                            <th>Sub Total</th>
                                            <th>Costo Envío</th>
                                            <th>IGV</th>
                                            <th>Total</th>
                                            <th>Orden Publicada</th>
                                            <th>Descripción de Estado</th>
                                            <th>Desc. cesión derechos</th>
                                        </tr>
                                    </thead>
                                    <tbody>';

                    if($dataFromScrape[0] != ""){
                        echo '<h4> Se han encontrado '. count($dataFromScrape).' Órdenes Públicas</h4><br>';
                        foreach($dataFromScrape as $value){

                            echo '<pre>';
                            print_r($value);
                            echo '</pre>';

                            $row = '<tr>';
                            foreach($value as $fila){
                                $row .= '<td>'.$fila.'</td>';
                            }
                            $row .= '</tr>';
                            $tableData .= $row;
                        }
                        echo $tableData.'</tbody>';
                    }
                }

                 function initCurl($url, $id_acuerdo, $dateFrom, $dateTo){
                    // CURL DIRECTIVES
                    $ch = curl_init($url);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, getInitialConfigs($id_acuerdo, $dateFrom, $dateTo));
                    curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
                    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                    getDataFromScrape(curl_exec($ch));
                };

                $url = htmlspecialchars($_POST['url']);
                initCurl($url, $_POST['id_acuerdo'], $_POST['date_from'], $_POST['date_to']);
                ?>
            </table>
        </div>
    </div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>

<?php











//echo '<pre>';
//print_r($arrayResponse);
//echo '</pre>';






