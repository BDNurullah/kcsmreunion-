<div id="canvas">
    <section id="home" class="divider parallax layer-overlay" data-bg-img="<?php echo base_url('web_asset/coming-soon-Website.jpg'); ?>">
        <div class="display-table">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-push-3">
                        <div class="alert alert-info alert-dismissable">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Welcome to KCSM Re-Union</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    /* resize Window*/
    $(window).on("resize", function() {
//$("#map_canvas").height($(window).height()); 
        $('#canvas').height($(window).height() - 145);




    }).trigger("resize");
</script>