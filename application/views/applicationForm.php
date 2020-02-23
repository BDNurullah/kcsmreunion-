<!DOCTYPE html>
<html dir="ltr" lang="en">
    <head>

        <!-- Meta Tags -->
        <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
        <meta name="description" content="CharityPress - Nonprofit, Crowdfunding & Charity HTML5 Template" />
        <meta name="keywords" content="building,business,construction,cleaning,transport,workshop" />
        <meta name="author" content="ThemeMascot" />

        <!-- Page Title -->
        <title><?php echo strip_tags($metaTitle); ?></title>

        <!-- Favicon and Touch Icons -->
        <link href="<?php echo base_url('web_asset/images/favicon.png'); ?>" rel="shortcut icon" type="image/png">
        <link href="<?php echo base_url('web_asset/images/apple-touch-icon.png'); ?>" rel="apple-touch-icon">
        <link href="<?php echo base_url('web_asset/images/apple-touch-icon-72x72.png'); ?>" rel="apple-touch-icon" sizes="72x72">
        <link href="<?php echo base_url('web_asset/images/apple-touch-icon-114x114.png'); ?>" rel="apple-touch-icon" sizes="114x114">
        <link href="<?php echo base_url('web_asset/images/apple-touch-icon-144x144.png'); ?>" rel="apple-touch-icon" sizes="144x144">

        <!-- Stylesheet -->
        <link href="<?php echo base_url('web_asset/css/bootstrap.min.css" rel="stylesheet'); ?>" type="text/css">
        <link href="<?php echo base_url('web_asset/css/jquery-ui.min.css" rel="stylesheet'); ?>" type="text/css">
        <link href="<?php echo base_url('web_asset/css/animate.css'); ?>" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url('web_asset/css/css-plugin-collections.css'); ?>" rel="stylesheet"/>
        <!-- CSS | menuzord megamenu skins -->
        <link id="menuzord-menu-skins" href="<?php echo base_url('web_asset/css/menuzord-skins/menuzord-boxed.css'); ?>" rel="stylesheet"/>
        <!-- CSS | Main style file -->
        <link href="<?php echo base_url('web_asset/css/style-main.css'); ?>" rel="stylesheet" type="text/css">
        <!-- CSS | Preloader Styles -->
        <link href="<?php echo base_url('web_asset/css/preloader.css'); ?>" rel="stylesheet" type="text/css">
        <!-- CSS | Custom Margin Padding Collection -->
        <link href="<?php echo base_url('web_asset/css/custom-bootstrap-margin-padding.css'); ?>" rel="stylesheet" type="text/css">
        <!-- CSS | Responsive media queries -->
        <link href="<?php echo base_url('web_asset/css/responsive.css'); ?>" rel="stylesheet" type="text/css">
        <!-- CSS | Style css. This is the file where you can place your own custom css code. Just uncomment it and use it. -->
        <!-- <link href="<?php echo base_url('web_asset/css/style.css" rel="stylesheet'); ?>" type="text/css"> -->

        <!-- Revolution Slider 5.x CSS settings -->
        <link  href="<?php echo base_url('web_asset/js/revolution-slider/css/settings.css'); ?>" rel="stylesheet" type="text/css"/>
        <link  href="<?php echo base_url('web_asset/js/revolution-slider/css/layers.css'); ?>" rel="stylesheet" type="text/css"/>
        <link  href="<?php echo base_url('web_asset/js/revolution-slider/css/navigation.css'); ?>" rel="stylesheet" type="text/css"/>

        <!-- CSS | Theme Color -->
        <link href="<?php echo base_url('web_asset/css/colors/theme-skin-blue-gary.css'); ?>" rel="stylesheet" type="text/css">

        <!-- external javascripts -->
        <script src="<?php echo base_url('web_asset/js/jquery-2.2.0.min.js'); ?>"></script>
        <script src="<?php echo base_url('web_asset/js/jquery-ui.min.js'); ?>"></script>
        <script src="<?php echo base_url('web_asset/js/bootstrap.min.js'); ?>"></script>
        <!-- JS | jquery plugin collection for this theme -->
        <script src="<?php echo base_url('web_asset/js/jquery-plugin-collection.js'); ?>"></script>

        <!-- Revolution Slider 5.x SCRIPTS -->
        <script src="<?php echo base_url('web_asset/js/revolution-slider/js/jquery.themepunch.tools.min.js'); ?>"></script>
        <script src="<?php echo base_url('web_asset/js/revolution-slider/js/jquery.themepunch.revolution.min.js'); ?>"></script>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="">
        <div id="wrapper" class="clearfix">
            <!-- preloader -->
            <div id="preloader">
                <div id="spinner">
                    <div class="preloader-dot-loading">
                        <div class="cssload-loading"><i></i><i></i><i></i><i></i></div>
                    </div>
                </div>
                <div id="disable-preloader" class="btn btn-default btn-sm">Disable Preloader</div>
            </div>

            <!-- Header -->
            <?php $this->load->view("layouts/web/header"); ?>

            <!-- Start main-content -->
            <div class="main-content">
                <!-- Section: home -->
                <?php echo $content ?>
            </div>
            <!-- end main-content -->

            <!-- Footer -->
            <?php $this->load->view("layouts/web/footer"); ?>
            <a class="scrollToTop" href="index-mp-layout1.html#"><i class="fa fa-angle-up"></i></a>
        </div>
        <!-- end wrapper -->

        <!-- Footer Scripts -->
        <!-- JS | Custom script for all pages -->
        <script src="<?php echo base_url('web_asset/js/custom.js'); ?>"></script>

        <!-- SLIDER REVOLUTION 5.0 EXTENSIONS  
              (Load Extensions only on Local File Systems ! 
               The following part can be removed on Server for On Demand Loading) -->
        <script type="text/javascript" src="<?php echo base_url('web_asset/js/revolution-slider/js/extensions/revolution.extension.actions.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('web_asset/js/revolution-slider/js/extensions/revolution.extension.carousel.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('web_asset/js/revolution-slider/js/extensions/revolution.extension.kenburn.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('web_asset/js/revolution-slider/js/extensions/revolution.extension.layeranimation.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('web_asset/js/revolution-slider/js/extensions/revolution.extension.migration.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('web_asset/js/revolution-slider/js/extensions/revolution.extension.navigation.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('web_asset/js/revolution-slider/js/extensions/revolution.extension.parallax.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('web_asset/js/revolution-slider/js/extensions/revolution.extension.slideanims.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('web_asset/js/revolution-slider/js/extensions/revolution.extension.video.min.js'); ?>"></script>

    </body>
</html>