<?php
include 'config.php';

include_once(dirname(__FILE__).'/../Models/index.php');

$select = new UserModel($host, $user, $password, $database);

$alldata = $select->selectAll();

$titles = ['uid', 'firstName', 'lastName', 'birthDay', 'dateChange', 'description'];

    if (isset($_POST['download_csv'])) {

        function outputCsv($assocDataArray,  $titles) {

            $fp = fopen('php://output', 'w');
            if ($fp && $assocDataArray) {
                header('Content-Type: text/csv');
                header('Content-Disposition: attachment; filename="export.csv"');
                header('Pragma: no-cache');
                header('Expires: 0');

                fputcsv($fp, $titles);
                foreach ($assocDataArray as $value) {
                    fputcsv($fp, $value);
                }
                die;
            }

        }

        outputCsv($alldata, $titles);

        exit;

    }