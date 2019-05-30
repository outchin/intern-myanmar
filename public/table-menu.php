<?php
$salt = time('now');
$token = hash("sha512",$salt);
$_SESSION['token'] = $token;
if(isset($_SESSION['token'])) {
    $data = $post->selectAll($tbl_admin);

    if (sizeof($data) > 1)             // no Admins
    {


        ?>
        <br><br>
        <a href="add-admin.php" class="btn waves-effect waves-light indigo">Add Admin</a>

        <table id="myTable" class="display table table-dark">
            <thead>
            <tr>
                <th class="th-sm">Profile
                </th>
                <th class="th-sm">Name
                </th>
                <th class="th-sm">Email
                </th>
                <th class="th-sm">Position
                </th>
                <th class="th-sm">Action
                </th>

            </tr>
            </thead>
            <tbody>
            <?php
            for($i= 0 ;$i<sizeof($data);$i++)
            {
                echo "<tr>";
                    $image = $data[$i]["image"];
                    echo "<td><img src='../assets/image/admins/$image' width='60' height='40'> </td>";
                    echo "<td>".$data[$i]["name"]."</td>";
                    echo "<td>".$data[$i]["email"]."</td>";
                    echo "<td>".$data[$i]["position"]."</td>";
                    ?>
                <td style="text-align:  center;">
                    <a href="update-admin.php?id=<?php echo $data[$i]['id'];?>">
                       Update
                    </a>

                    <a href="core/classes/delete.php?delete_admin&&admin_id=<?php echo $data[$i]['id'];?>&&token=<?php echo $token ?>">
                        Delete
                    </a>


                </td>
                <?php

                echo "</tr>";
            }
            ?>


            </tfoot>
        </table>

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Delete File</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="lead">Are you sure you want to delete?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary rounded-pill" data-dismiss="modal">Cancel</button>
                <a href="" role="button" class="btn btn-danger rounded-pill delete-confirm">Yes, I sure</a>
            </div>
        </div>
    </div>

        <?php
    }
    else{
       ?>
        <section id="content">

            <!--breadcrumbs start-->
            <div id="breadcrumbs-wrapper" class=" grey lighten-3">
                <div class="container">
                    <div class="row">
                        <div class="col s12 m12 l12">
                            <h5 class="breadcrumbs-title"><?php echo $lang['Goods']; ?></h5>
                            <ol class="breadcrumb">
                                <li><a href="dashboard.php"><?php echo $lang['StatusBar']; ?></a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!--breadcrumbs end-->

            <!--start container-->
            <div class="container">
                <div class="section">
                    <div class="col s12 m12 l9">
                        <div class="row">
                            <form method="get" class="col s12">
                                <div class="row">
                                    <table>
                                        <tr>
                                            <td width="15%">
                                                <div class="input-field col s12">
                                                    <a href="add-menu.php" class="btn waves-effect waves-light indigo"><i
                                                                class="mdi-content-add"></i></a>
                                                </div>
                                            </td>
                                            <td width="40%">
                                                <div class="input-field col s12">
                                                    <input type="text" class="validate" name="keyword">
                                                    <label for="first_name"><?php echo $lang['Search']; ?></label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-field col s12">
                                                    <button type="submit" name="btnSearch"
                                                            class="btn-floating btn-large waves-effect waves-light"><i
                                                                class="mdi-action-search"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </form>
                        </div>
                    </div>


                    <div class="col s12 m12 l9">
                        <div class="row">
                            <form method="get" class="col s12">
                                <div class="row">
                                    <div class="input-field col s12" style="text-align:  center;margin-top: 120px;">
                                        <h5><?php echo $lang['AdminNotFount']; ?></h5>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <br><br><br><br><br><br><br><br><br><br>
<?php
    }
}
?>
