<?php

include 'config.php';

include_once(dirname(__FILE__) . '/../Models/index.php');

?>

<div class="container">
    <div class="row">
        <div class="col-12">

            <div class="container mb-5">
                <h2 class="mb-5 mt-5">
                    Import CSV file into Mysql using PHP
                </h2>

                <form action="" method="post"
                      name="frmCSVImport" id="frmCSVImport" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-md-4 control-label">
                            Choose CSV File
                        </label>
                        <input type="file" class="form-control-file border" name="file" id="file" accept=".csv">
                    </div>

                    <button type="submit" id="submit" name="import" class="btn btn-primary">
                        Import
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-12">
            <?php

            class СompareUsers
            {

                protected $arrayFromDB;
                protected $arrayFromCSV;

                function __construct($arrayFromDB, $arrayFromCSV)
                {
                    $this->arrayFromDB = $this->transformArray($arrayFromDB);
                    $this->arrayFromCSV = $this->transformArray($arrayFromCSV);
                }

                private function transformArray($array)
                {
                    $array_new = [];

                    foreach ($array as $item) {
                        $array_new[$item['uid']] = $item;
                    }

                    return $array_new;
                }

                public function get_changes($field = 'dateChange')
                {
                    $new_array = [];
                    $common_array = $this->get_common();

                    foreach ($common_array as $item) {
                        $key = $item['uid'];
                        if ($this->arrayFromDB[$key][$field] !== $this->arrayFromCSV[$key][$field]) {
                            array_push($new_array, $this->arrayFromCSV[$key]);
                        }
                    }
                    return $new_array;
                }

                private function get_common()
                {
                    $common_in_arrays = array_intersect_key($this->arrayFromDB, $this->arrayFromCSV);
                    return $common_in_arrays;
                }

                public function only_on_db()
                {
                    $only_on_db = array_diff_assoc($this->arrayFromDB, $this->arrayFromCSV);
                    return $only_on_db;
                }

                public function only_on_csv()
                {
                    $only_on_csv = array_diff_assoc($this->arrayFromCSV, $this->arrayFromDB);
                    return $only_on_csv;
                }
            }

            $array_from_csv = [];

            if (isset($_POST["import"])) {

                $fileName = $_FILES["file"]["tmp_name"];

                if ($_FILES["file"]["size"] > 0) {

                    $file = fopen($fileName, "r");
                    $flag = true;
                    while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {

                        if ($flag) {
                            $flag = false;
                            continue;
                        }
                        $user = [
                            'uid' => $column[0],
                            'firstName' => $column[1],
                            'lastName' => $column[2],
                            'birthDay' => $column[3],
                            'dateChange' => $column[4],
                            'description' => $column[5]
                        ];
                        $array_from_csv[] = $user;
                    }
                    fclose($file);

                    $compareArray = new СompareUsers($alldata, $array_from_csv);

                    $common_in_arrays = $compareArray->get_changes();
                    $common_in_arrays_count = count($common_in_arrays);
                    $select->insertUsers(array_values($common_in_arrays));
                    if ($common_in_arrays_count != 0) {
                        echo render_alert('warning', $common_in_arrays_count . " was updated in database");
                    }

                    $only_on_csv = $compareArray->only_on_csv();
                    $only_on_csv_count = count($only_on_csv);
                    $select->insertUsers(array_values($only_on_csv));
                    if ($only_on_csv_count != 0) {
                        echo render_alert('success', $only_on_csv_count . " was added to database");
                    }

                    $only_on_db = $compareArray->only_on_db();
                    $only_on_db_count = count($only_on_db);
                    $select->deleteUsers(array_keys($only_on_db));
                    if ($only_on_db_count != 0) {
                        echo render_alert('danger', $only_on_db_count . " was deleted from database");
                    }
                }
            }
            ?>

        </div>
    </div>
</div>
