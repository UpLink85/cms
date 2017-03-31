<?php
/**
 * Created by PhpStorm.
 * User: Stefano Zizza
 * Date: 30.03.17
 * Time: 22:42
 */


$db = new DBAccess();


$users = $db->getUsers();
?>

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header">User Managment</h1>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>UID</th>
                <th>Username</th>
                <th>Vorname</th>
                <th>Nachname</th>
                <th>Password</th>
                <th>Permissions</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>

            <?php
            $permission = '';
            foreach ($users as $item) {
                echo '<tr>';
                echo '<td>' . $item['uid'] . '</td>';
                echo '<td>' . $item['username'] . '</td>';
                echo '<td>' . $item['vorname'] . '</td>';
                echo '<td>' . $item['nachname'] . '</td>';
                echo '<td>' . $item['password'] . '</td>';
                echo '<td>';

                if ($item['view'] == 1) {
                    $permission = 'view | ';
                }
                if ($item['create'] == 1){
                    $permission .= 'create | ';
                }
                if ($item['delete'] == 1){
                    $permission .= 'delete';
                }
                echo $permission;


                echo '</td>';
                echo '<td><a style="padding-right: 20px" class="fa fa-pencil fa-"></a><a class="fa fa-times"></a></td>';
                echo '</tr>';
            }
            ?>
            </tbody>
        </table>
    </div>
    <?php include __DIR__ . '/userAdd.html'; ?>
</div>
