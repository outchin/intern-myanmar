<?php
include('core/init.php');
$data = $post->selectAll($company_table);
$company_name = $data[0]['name'];
$company_image = $data[0]['image'];
$company_email = $data[0]['email'];
$_SESSION['NowLang'] = "en";
$CurentLang = addslashes($_SESSION['NowLang']);
include_once ("../language/".$CurentLang.".php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="https://web-classic.dp.ua/"/>

    <link rel="icon" href="../assets/image/favicon/<?php echo $company_image; ?>" sizes="32x32">
    <title><?php echo $company_name ?></title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <meta name="msapplication-TileColor" content="#00bcd4">
    <meta name="msapplication-TileImage" content="assets/image/favicon/<?php echo $company_image; ?>">

    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="apple-touch-fullscreen" content="yes"/>
    <link rel="apple-touch-icon-precomposed" href="assets/image/favicon/<?php echo $company_image; ?>">

    <meta name="msapplication-tap-highlight" content="no">
    <meta name="document-state" content="Static"/>

    <link href="../assets/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="../assets/css/style.css" type="text/css" rel="stylesheet" media="screen,projection">

    <link href="../assets/css/prism.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="../assets/css/support.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="../assets/js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="../assets/js/plugins/chartist-js/chartist.min.css" type="text/css" rel="stylesheet" media="screen,projection">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" >
    <!-- MDBootstrap Datatables  -->

</head>
<body>

<!-- START HEADER -->
<header id="header" class="page-topbar">
    <!-- start header nav-->
    <div class="navbar-fixed">
        <nav class="header">
            <div class="nav-wrapper">
                <h1 class="logo-wrapper">
                    <a href="dashboard.php" class="brand-logo darken-1">
                        <img src="upload/company/<?php echo $data['image']; ?>" width="48" height="48" alt="logo"></a> <span class="logo-text">Pizza Delivery</span></h1>
                <ul class="right hide-on-med-and-down" style="margin-right: 5px;">
                    <li><a href="https://onesignal.com/" target="_blank"
                           class="waves-effect waves-block waves-light modal-trigger">
                            <i class="mdi-social-notifications"></i></a>
                    </li>
                    <li><a class="dropdown-button" href="javascript:void(0);"
                           data-activates="dropdown1"><i class="mdi-navigation-more-vert"></i></a>
                    </li>
                    <ul id="dropdown1" class="dropdown-content">
                        <li><a href="admin.php"><?php echo $lang['Company']; ?></a></li>
                        <li><a href="logout.php"><?php echo $lang['Exit']; ?></a></li>
                    </ul>
                </ul>
            </div>
        </nav>
    </div>
    <!-- end header nav-->
</header>
<!-- END HEADER -->

<!-- START MAIN -->
<div id="main">
    <!-- START WRAPPER -->
    <div class="wrapper">

        <!-- START LEFT SIDEBAR NAV-->
        <aside id="left-sidebar-nav">
            <ul id="slide-out" class="side-nav fixed leftside-navigation">
                <div class="rectangle-horiz"></div>
                <li class="bold">
                    <a href="dashboard.php" class="waves-effect waves-cyan">
                        <i class="mdi-action-dashboard"></i><?php echo $lang['StatusBar']; ?>
                    </a>
                </li>
                <div class="rectangle-horiz"></div>
                <div class="title-menu"><p><?php echo $lang['Admins']; ?></p></div>
                <div class="rectangle-horiz"></div>
                <li class="bold">
                    <a href="reservation.php" class="waves-effect waves-cyan">
                        <i class="mdi-action-shopping-cart"></i><?php echo $lang['Orders']; ?>
                    </a>
                </li>
                <div class="rectangle-horiz"></div>
                <li class="bold">
                    <a href="category.php" class="waves-effect waves-cyan">
                        <i class="mdi-file-folder"></i><?php echo $lang['Categorys']; ?>
                    </a>
                </li>
                <div class="rectangle-horiz"></div>
                <li class="bold">
                    <a href="menu.php" class="waves-effect waves-cyan">
                        <i class="mdi-action-list"></i><?php echo $lang['Admins']; ?>
                    </a>
                </li>
                <div class="rectangle-horiz"></div>
                <div class="title-menu"><p><?php echo $lang['Publications']; ?></p></div>
                <div class="rectangle-horiz"></div>
                <li class="bold">
                    <a href="gallery.php" class="waves-effect waves-cyan">
                        <i class="mdi-image-collections"></i><?php echo $lang['Gallery']; ?>
                    </a>
                </li>
                <div class="rectangle-horiz"></div>
                <li class="bold">
                    <a href="news.php" class="waves-effect waves-cyan">
                        <i class="mdi-action-description"></i><?php echo $lang['News']; ?>
                    </a>
                </li>
                <div class="rectangle-horiz"></div>
                <li class="bold">
                    <a href="banner.php" class="waves-effect waves-cyan">
                        <i class="mdi-image-crop-original"></i><?php echo $lang['Banner']; ?>
                    </a>
                </li>
                <div class="rectangle-horiz"></div>
                <div class="title-menu"><p><?php echo $lang['Settings']; ?></p></div>
                <div class="rectangle-horiz"></div>
                <li class="bold">
                    <a href="setting.php" class="waves-effect waves-cyan">
                        <i class="mdi-editor-attach-money"></i><?php echo $lang['TaxesCurrency']; ?>
                    </a>
                </li>
                <div class="rectangle-horiz"></div>
                <li class="bold">
                    <a href="admin.php" class="waves-effect waves-cyan">
                        <i class="mdi-image-timer-auto"></i><?php echo $lang['Administrator']; ?>
                    </a>
                </li>
                <div class="rectangle-horiz"></div>
                <li class="bold">
                    <a href="add-admin.php" class="waves-effect waves-cyan">
                        <i class="mdi-image-timer-auto"></i><?php echo $lang['Add Admin']; ?>
                    </a>
                </li>
                <div class="rectangle-horiz"></div>
                <li class="bold">
                    <a href="company.php" class="waves-effect waves-cyan">
                        <i class="mdi-action-store"></i><?php echo $lang['Company']; ?>
                    </a>
                </li>
                <div class="rectangle-horiz"></div>
                <li class="bold">
                    <a href="logout.php" class="waves-effect waves-cyan">
                        <i class="mdi-action-exit-to-app"></i><?php echo $lang['Exit']; ?>
                    </a>
                </li>
                <div class="rectangle-horiz"></div>
                <div style="text-align: center; color: #fff; padding-bottom: 80px;">
                    <div class="SuppFaq">
                        <a href="http://android.web-classic.dp.ua/support.php">
                            <i class="mdi-hardware-headset-mic"></i>
                        </a>
                    </div>
                    <a href="https://web-classic.dp.ua/" target="_blank"><p>Web studio Web-Classic</p></a>
                    <p>Version: 1.0.0</p>
                </div>
            </ul>
            <a href="#" data-activates="slide-out"
               class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only darken-2"><i
                        class="mdi-navigation-menu"></i></a>
        </aside>
        <!-- END LEFT SIDEBAR NAV-->