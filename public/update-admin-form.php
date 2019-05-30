<!-- START CONTENT -->
<section id="content">

    <!--breadcrumbs start-->
    <div id="breadcrumbs-wrapper" class=" grey lighten-3">
        <div class="container">
            <div class="row">
                <div class="col s12 m12 l12">
                    <h5 class="breadcrumbs-title"><?php echo $lang['EditingGoods']; ?></h5>
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
            <div class="row">
                <div class="col s12 m12 l12">
                    <div class="row">
                        <form method="post" class="col s12" enctype="multipart/form-data">
                            <div class="row">
                                <div class="input-field col s12">
                                    <?php echo isset($error['update_data']) ? $error['update_data'] : '';?>

                                    <div class="row">
                                        <div class="col s12 m12 l5">
                                            <div class="card-panel">
                                                <div class="row">

                                                    <div class="input-field col s12">
                                                        <input type="text" name="name" id="name" value="<?php echo "" ?>" required/>
                                                        <label for="name"><?php echo $lang['Name']; ?></label><?php echo isset($error['menu_name']) ? $error['menu_name'] : '';?>
                                                    </div>

                                                    <div class="input-field col s12">
                                                        <input type="email" name="email" id="email" value="<?php echo "";?>" required/>
                                                        <label for="price"><?php echo $lang['Email']; ?> </label><?php echo isset($error['price']) ? $error['price'] : '';?>
                                                    </div>


                                                    <div class="input-field col s12">
                                                        <input type="text" name="position" id="position" value="<?php echo ""?>" required/>
                                                        <label for="position"><?php echo $lang['position']; ?></label><?php echo isset($error['wevoam']) ? $error['wevoam'] : '';?>
                                                    </div>

                                                    <div class="input-field col s12">
                                                        <select name="category_id">
                                                            <?php while($stmt_category->fetch()){
                                                                if($category_data['category_id'] == $data['category_id']){?>
                                                                    <option value="<?php echo $category_data['category_id']; ?>" selected="<?php echo $data['category_id']; ?>" ><?php echo $category_data['category_name']; ?></option>
                                                                <?php }else{ ?>
                                                                    <option value="<?php echo $category_data['category_id']; ?>" ><?php echo $category_data['category_name']; ?></option>
                                                                <?php }} ?>
                                                        </select>
                                                        <label><?php echo $lang['Category']; ?></label><?php echo isset($error['category_id']) ? $error['category_id'] : '';?>
                                                    </div>

                                                    <img src="<?php echo $data['menu_image']; ?>" width="210" height="160"/>
                                                    <div class="file-field input-field col s12">
                                                        <?php echo isset($error['menu_image']) ? $error['menu_image'] : '';?>
                                                        <input class="file-path validate" type="text" disabled/>
                                                        <div class="btn">
                                                            <span><?php echo $lang['Picture']; ?></span>
                                                            <input type="file" name="menu_image" id="menu_image" value="" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Form with placeholder -->
                                        <div class="col s12 m12 l7">
                                            <div class="card-panel">

                                                <div class="row">
                                                    <div class="input-field col s12">
                                                        <span class="grey-text text-grey lighten-2"><?php echo $lang['Description']; ?></span>
                                                        <?php echo isset($error['menu_description']) ? $error['menu_description'] : '';?>
                                                        <textarea name="menu_description" id="menu_description" class="materialize-textarea" rows="16"><?php echo $data['menu_description']; ?></textarea>
                                                        <script type="text/javascript" src="assets/js/ckeditor/ckeditor.js"></script>
                                                        <script type="text/javascript">
                                                            CKEDITOR.replace( 'menu_description' );
                                                            CKEDITOR.config.height=285;
                                                        </script>
                                                    </div>
                                                    <div class="input-field col s12">
                                                        <a href="menu.php" class="btn waves-effect waves-light indigo left" ><?php echo $lang['Back']; ?></a>

                                                        <button class="btn cyan waves-effect waves-light right"
                                                                type="submit" name="btnEdit"><?php echo $lang['Add']; ?>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>