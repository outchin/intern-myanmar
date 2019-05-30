<!--breadcrumbs start-->
<div id="breadcrumbs-wrapper" class=" grey lighten-3">
    <div class="container">
        <div class="row">
            <div class="col s12 m12 l12">
                <h5 class="breadcrumbs-title"><?php echo $lang['StatusBar']; ?></h5>
                <ol class="breadcrumb">
                    <li><a href="#" class="active"><?php echo $lang['Home']; ?></a></li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs end-->

<!--start container-->
<div class="container">
    <div class="section">

        <!--card stats start-->
        <div id="card-stats" class="seaction">
            <div class="row">
                <div class="col s12 m6 l3">
                    <a href="menu.php">
                        <div class="card">
                            <div class="card-content cart white-text">
                                <p class="card-stats-title"><?php echo $lang['Admins']; ?></p>
                                <h4 class="card-stats-number"><?php echo 100;?></h4>
                            </div>
                            <div class="card-action cart-bottum">
                                <div id="clients-bar"></div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col s12 m6 l3">
                    <a href="menu.php">
                        <div class="card">
                            <div class="card-content gds white-text">
                                <p class="card-stats-title"><?php echo $lang['Comments']; ?></p>
                                <h4 class="card-stats-number"><?php echo 200;?></h4>
                            </div>
                            <div class="card-action gds-bottum">
                                <div id="clients-bar"></div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col s12 m6 l3">
                    <a href="news.php">
                        <div class="card">
                            <div class="card-content new white-text">
                                <p class="card-stats-title"><?php echo $lang['Users']; ?></p>
                                <h4 class="card-stats-number"><?php echo 300;?></h4>
                            </div>
                            <div class="card-action news-bottum">
                                <div id="clients-bar"></div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col s12 m6 l3">
                    <a href="https://onesignal.com/" target="_blank">
                        <div class="card">
                            <div class="card-content pysh white-text">
                                <p class="card-stats-title"><?php echo $lang['Notification']; ?></p>
                                <h4 class="card-stats-number"><i class="mdi-social-notifications" style="color: #fff !important;"></i></h4>
                            </div>
                            <div class="card-action push-bottum">
                                <div id="clients-bar"></div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br><br>