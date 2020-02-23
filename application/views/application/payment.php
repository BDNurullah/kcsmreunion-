<section id="home" class="divider parallax layer-overlay" data-bg-img="<?php echo base_url('web_asset/images/bg/kcsm.jpg'); ?>">
    <div class="display-table">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-push-3">
<!--                    <div class="text-center mb-60"><a href="form-job-apply-style2.html#" class=""><img alt="" src="<?php echo base_url('web_asset/images/logo-wide.png') ?>"></a>
                    </div>-->
                    <div class="bg-lightest border-1px p-30 mb-0">
                        <h3 class="text-theme-colored mt-0 pt-5"> Pay Now<small> Please Enter Your Information</small></h3>
                        <hr>
                        <?php if ($this->session->flashdata('success')) { ?>
                            <div class="alert alert-success alert-dismissable">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Success!</strong> <?php echo $this->session->flashdata('success'); ?>
                            </div>
                            <div class="alert alert-success alert-dismissable">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Info!</strong> <?php echo $this->session->flashdata('Bill'); ?>
                            </div>
                        <?php } elseif ($this->session->flashdata('fail')) { ?>
                            <div class="alert alert-warning alert-dismissable">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Warning!</strong> <?php echo $this->session->flashdata('fail'); ?>.
                            </div>
                        <?php } ?>
                        <div class="alert alert-info alert-dismissable">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Info!</strong> Please Pay Your Fee, For Complete Your Registration.
                        </div>
                        <form id="apply_form" name="apply_form" action="<?php echo site_url('registration/receive') ?>" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="MOBILENUMBER">Bill Number <small style="color: red">*</small></label>
                                        <input id="MOBILENUMBER" name="MOBILENUMBER" type="text" placeholder="+8801" minlength="11" maxlength="11" required="required" class="form-control spacebar">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <br>
                                    <h5 id="info" style="color: green"><== Type Your Mobile Number</h5>
                                </div>
                            </div>
                            <div class="row wrongnumber">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="TRXNUMBER">Txn.Id<small style="color: red">*</small></label>
                                        <input id="TRXNUMBER" name="TRXNUMBER" type="text" placeholder="Enter Your Trx Number" required="required" class="form-control spacebar">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <br>
                                    <h5 id="trx" style="color: green"><== Type Your Txn.Id Number</h5>
                                </div>
                            </div>
                            <div class="form-group wrongnumber">
                                <input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden" value="" />
                                <button type="submit" class="btn btn-block btn-dark btn-theme-colored btn-sm mt-20 pt-10 pb-10" data-loading-text="Please wait...">Pay Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Job Form Validation-->
<script type="text/javascript">
    $("#apply_form").validate({
    });
    $(document).ready(function () {
        $(function () {
            $(document).on('keydown', '#MOBILENUMBER', function (e) {
                -1 !== $.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) || (/65|67|86|88/.test(e.keyCode) && (e.ctrlKey === true || e.metaKey === true)) && (!0 === e.ctrlKey || !0 === e.metaKey) || 35 <= e.keyCode && 40 >= e.keyCode || (e.shiftKey || 48 > e.keyCode || 57 < e.keyCode) && (96 > e.keyCode || 105 < e.keyCode) && e.preventDefault()
            });
        });
        $(function() {
            $('.spacebar').on('keypress', function(e) {
                if (e.which == 32)
                    return false;
            });
        });
        $(document).on('blur', '#MOBILENUMBER', function () {
            var mobile = $(this).val();
            $.ajax({
                type: "POST",
                dataType: "html",
                url: "<?php echo site_url('registration/searchPaymentStatus'); ?>",
                data: {mobile: mobile},
                success: function (data) {
                    if (data == 'N') {
                        $("#info").html('<span style="font-size: 15px; color: red;">This Number Is Wrong Please Type Rignt Number</span>');
                        $('#MOBILENUMBER').val('')
                        $("#TRXNUMBER").val('')
                    } else {
                        $("#info").html(data)
                    }
                }
            })
        });
        $(document).on('blur', '#TRXNUMBER', function () {
            var trx = $(this).val();
            $.ajax({
                type: "POST",
                dataType: "html",
                url: "<?php echo site_url('registration/checktrx'); ?>",
                data: {trx: trx},
                success: function (data) {
                    if (data == 'N') {
                        $("#trx").html('<span style="font-size: 15px; color: red;">This Txn.Id Number Is Wrong Please Type Rignt Number</span>');
                        $("#TRXNUMBER").val('');
                    } else {
                        $("#trx").html('');
                    }
                }
            })
        });
    });
</script>