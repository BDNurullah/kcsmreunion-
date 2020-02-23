<!DOCTYPE html>
<html dir="ltr" lang="en">
    <head>
        <?php $this->load->view("layouts/web/head"); ?>
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
            </div>
            <?php $this->load->view("layouts/web/header"); ?>
            <!-- start main-content -->
            <div class="main-content">
                <!-- Section: home -->
                <?php echo $content ?>
            </div>
            <!-- end main-content -->

            <footer id="footer" class="footer bg-black-222">
                <?php $this->load->view("layouts/web/footer"); ?>
            </footer>
            <a class="scrollToTop" href="form-job-apply-style2.html#"><i class="fa fa-angle-up"></i></a>
        </div>
        <!-- end wrapper -->

        <!-- Footer Scripts -->
        <!-- JS | Custom script for all pages -->
        <script src="<?php echo base_url('web_asset/js/custom.js'); ?>"></script>
    </body>
</html>