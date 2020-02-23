<div class="row">
    <div class="col-lg-4 col-md-6">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-money fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><h1><?php echo number_format($totalAmount,2) ?></h1></div>
                        <div><h3>Total Taka</h3></div>
                    </div>
                </div>
            </div>
            <a href="<?php echo site_url('Payment/applicant_list')?>">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-4 col-md-6">
        <div class="panel panel-success">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-money fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><h1><?php echo number_format($totalCollection,2) ?></h1></div>
                        <div><h3>Total Collection</h3></div>
                    </div>
                </div>
            </div>
            <a href="<?php echo site_url('Payment/applicant_list')?>">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-4 col-md-6">
        <div class="panel panel-danger">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-money fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><h1><?php echo number_format($totalAmount - $totalCollection,2) ?></h1></div>
                        <div><h3>Total Pending</h3></div>
                    </div>
                </div>
            </div>
            <a href="<?php echo site_url('Payment/applicant_list')?>">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-4 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><h1><?php echo count($applicants) ;?></h1></div>
                        <div><h3>Total Applicant</h3></div>
                    </div>
                </div>
            </div>
            <a href="<?php echo site_url('Payment/applicant_list')?>">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-4 col-md-6">
        <div class="panel panel-warning">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-users fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><h1><?php echo $guest; ?></h1></div>
                        <div><h3>Total Guest</h3></div>
                    </div>
                </div>
            </div>
            <a href="<?php echo site_url('Payment/applicant_list')?>">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    
    
</div>



<!--  flash message  -->
<div class="row">
    <div class="col-md-12">

        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success"
                 role="alert"><?php echo $this->session->flashdata('success'); ?></div>
             <?php endif; ?>

        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger"
                 role="alert"><?php echo $this->session->flashdata('error'); ?></div>
             <?php endif; ?>

    </div>
</div>