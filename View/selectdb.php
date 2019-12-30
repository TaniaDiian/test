<?php

include 'config.php';

include_once(dirname(__FILE__) . '/../Models/index.php');

$select = new UserModel($host, $user, $password, $database);

$alldata = $select->selectAll();

if ($alldata) { ?>

    <div class="container">
        <div class="row">
            <div class="col-12">

                <h2 class="mt-5">
                    Date from DB
                </h2>

                <div class="table-responsive">
                    <table id='userTable' class="table table-striped mt-5 mb-5">

                        <thead class="thead-dark">
                        <tr>
                            <th>uid</th>
                            <th>firstName</th>
                            <th>lastName</th>
                            <th>birthDay</th>
                            <th>dateChange</th>
                            <th>description</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php foreach ($alldata as $row) { ?>
                            <tr>
                                <td><?php echo $row['uid']; ?></td>
                                <td><?php echo $row['firstName']; ?></td>
                                <td><?php echo $row['lastName']; ?></td>
                                <td><?php echo $row['birthDay']; ?></td>
                                <td><?php echo $row['dateChange']; ?></td>
                                <td><?php echo $row['description']; ?></td>
                            </tr>
                        <?php } ?>
                        </tbody>

                    </table>
                </div>

                <div class="container mt-5">
                    <form method="post" id="download_form" action="">
                        <input type="submit" name="download_csv" class="btn btn-primary" value="Download CSV"/>
                    </form>
                </div>

            </div>
        </div>
    </div>

<?php } ?>
