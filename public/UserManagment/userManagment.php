<?php
/**
 * Created by PhpStorm.
 * User: Stefano Zizza
 * Date: 30.03.17
 * Time: 22:42
 */


$db = new DBAccess();


$users = $db->getUsers();

var_dump($users);

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
                var_dump($item);
                echo '<tr>';
                echo '<td>' . $item['uid'] . '</td>';
                echo '<td>' . $item['username'] . '</td>';
                echo '<td>' . $item['vorname'] . '</td>';
                echo '<td>' . $item['nachname'] . '</td>';
                echo '<td>' . $item['password'] . '</td>';
                echo '<td>' . $item['permission'] . '</td>';
                echo '<td><a style="padding-right: 20px" class="fa fa-pencil fa-"></a><a class="fa fa-times"></a></td>';
                echo '</tr>';
            }
            ?>
            </tbody>
        </table>
    </div>
    <div class="table-responsive">
        <form action="../index.php" method="post">
            <h2 class="modal-header">Add New User</h2>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Username</th>
                    <th>Vorname</th>
                    <th>Nachname</th>
                    <th>Password</th>
                    <th>Permissions</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        <label for="username" class="sr-only">Username</label>
                        <input class="form-control"
                               type="text"
                               id="username"
                               name="username"
                               placeholder="Username" required>
                    </td>
                    <td>
                        <label for="vorname" class="sr-only">Vorname</label>
                        <input class="form-control"
                               type="text"
                               id="vorname"
                               name="vorname"
                               placeholder="Vorname" required>
                    </td>
                    <td>
                        <label for="nachname" class="sr-only">Nachname</label>
                        <input class="form-control"
                               type="text"
                               id="nachname"
                               name="nachname"
                               placeholder="Nachname" required>
                    </td>
                    <td>
                        <label for="password" class="sr-only">Password</label>
                        <input class="form-control"
                               type="password"
                               id="password"
                               name="password"
                               placeholder="Password" required>
                    </td>
                    <td>
                        <label for="permissions" class="sr-only">Permissions</label>
                        <input class="form-control"
                               type="text"
                               id="permissions"
                               name="permissions"
                               placeholder="Permissions" required>
                    </td>
                    <td>
                        <button class="btn btn-primary btn-block" type="submit">Add</button>
                    </td>
                </tr>
        </form>

        </tbody>
    </div>
</div>


<!--
//include __DIR__ . '/managmentView.html';


              <tbody >
                <tr >
                  <td > 1,001 </td >
                  <td > Lorem</td >
                  <td > ipsum</td >
                  <td > dolor</td >
                  <td > sit</td >
                </tr >
                <tr >
                  <td > 1,002 </td >
                  <td > amet</td >
                  <td > consectetur</td >
                  <td > adipiscing</td >
                  <td > elit</td >
                </tr >
                <tr >
                  <td > 1,003 </td >
                  <td > Integer</td >
                  <td > nec</td >
                  <td > odio</td >
                  <td > Praesent</td >
                </tr >
                <tr >
                  <td > 1,003 </td >
                  <td > libero</td >
                  <td > Sed</td >
                  <td > cursus</td >
                  <td > ante</td >
                </tr >
                <tr >
                  <td > 1,004 </td >
                  <td > dapibus</td >
                  <td > diam</td >
                  <td > Sed</td >
                  <td > nisi</td >
                </tr >
                <tr >
                  <td > 1,005 </td >
                  <td > Nulla</td >
                  <td > quis</td >
                  <td > sem</td >
                  <td > at</td >
                </tr >
                <tr >
                  <td > 1,006 </td >
                  <td > nibh</td >
                  <td > elementum</td >
                  <td > imperdiet</td >
                  <td > Duis</td >
                </tr >
                <tr >
                  <td > 1,007 </td >
                  <td > sagittis</td >
                  <td > ipsum</td >
                  <td > Praesent</td >
                  <td > mauris</td >
                </tr >
                <tr >
                  <td > 1,008 </td >
                  <td > Fusce</td >
                  <td > nec</td >
                  <td > tellus</td >
                  <td > sed</td >
                </tr >
                <tr >
                  <td > 1,009 </td >
                  <td > augue</td >
                  <td > semper</td >
                  <td > porta</td >
                  <td > Mauris</td >
                </tr >
                <tr >
                  <td > 1,010 </td >
                  <td > massa</td >
                  <td > Vestibulum</td >
                  <td > lacinia</td >
                  <td > arcu</td >
                </tr >
                <tr >
                  <td > 1,011 </td >
                  <td > eget</td >
                  <td > nulla</td >
                  <td >Class</td >
                  <td > aptent</td >
                </tr >
                <tr >
                  <td > 1,012 </td >
                  <td > taciti</td >
                  <td > sociosqu</td >
                  <td > ad</td >
                  <td > litora</td >
                </tr >
                <tr >
                  <td > 1,013 </td >
                  <td > torquent</td >
                  <td > per</td >
                  <td > conubia</td >
                  <td > nostra</td >
                </tr >
                <tr >
                  <td > 1,014 </td >
                  <td > per</td >
                  <td > inceptos</td >
                  <td > himenaeos</td >
                  <td > Curabitur</td >
                </tr >
                <tr >
                  <td > 1,015 </td >
                  <td > sodales</td >
                  <td > ligula</td >
                  <td > in</td >
                  <td > libero</td >
                </tr >
              </tbody >
            </table >
          </div >