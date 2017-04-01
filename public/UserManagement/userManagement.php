<?php
/**
 * Created by PhpStorm.
 * User: Stefano Zizza
 * Date: 30.03.17
 * Time: 22:42
 */
use model\DBAccess;

include __DIR__ . '/../model/DBAccess.php';


$db = new DBAccess();

if (isset($_POST['action']) && $_POST['action'] == 'addUser') {
    $username = (isset($_POST['username']) ? $_POST['username'] : '');
    $vorname = (isset($_POST['prename']) ? $_POST['prename'] : '');
    $nachname = (isset($_POST['name']) ? $_POST['name'] : '');
    $password = (isset($_POST['password']) ? $_POST['password'] : '');
    $view = (isset($_POST['view']) ? $_POST['view'] : '0');
    $create = (isset($_POST['create']) ? $_POST['create'] : '0');
    $delete = (isset($_POST['delete']) ? $_POST['delete'] : '0');
    try {
        $db->beginnTransaction();
        if ($db->checkUsernameAvailability($username)) {
            $db->insertNewUser($username, $vorname, $nachname, $password, $view, $create, $delete);
            $db->commitChanges();
        } else {
            throw new PDOException('Username already exists');
        }
    } catch (PDOException $e) {
        $message = $e->getMessage();
        $db->rollBack();
    }
    unset($_POST);
}

if (isset($_GET['id'])) {
    $id = (isset($_GET['id'])) ? $_GET['id'] : '';
    $db->removeUser($id);
}
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
            foreach ($users as $item) {
                echo '<tr>';
                echo '<td>' . $item['uid'] . '</td>';
                echo '<td>' . $item['username'] . '</td>';
                echo '<td>' . $item['vorname'] . '</td>';
                echo '<td>' . $item['nachname'] . '</td>';
                echo '<td>' . $item['password'] . '</td>';
                echo '<td>';
                $permission = '';
                if ($item['view'] == '1') {
                    $permission = 'view | ';
                }
                if ($item['create'] == '1') {
                    $permission .= 'create | ';
                }
                if ($item['delete'] == '1') {
                    $permission .= 'delete';
                }
                echo $permission;


                echo '</td>';
                echo '<td><!--<a style="padding-right: 20px" class="fa fa-pencil fa-"></a>--><a href="/index.php?siteAction=um&id=' . $item['uid'] . '" class="fa fa-times"></a></td>';
                echo '</tr>';
            }
            ?>
            </tbody>
        </table>
    </div>
    <div class="text-danger">
        <h4><?= (isset($message)) ? $message : '' ?></h4>
    </div>
    <?php include __DIR__ . '/userAdd.html'; ?>
</div>
