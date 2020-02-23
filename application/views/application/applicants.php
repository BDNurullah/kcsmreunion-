<section id="home" class="divider parallax layer-overlay" data-bg-img="<?php echo base_url('web_asset/images/bg/kcsm.jpg'); ?>">
    <div class="display-table">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-push-2">
<!--                    <div class="text-center mb-60"><a href="form-job-apply-style2.html#" class=""><img alt="" src="<?php echo base_url('web_asset/images/logo-wide.png') ?>"></a>
                    </div>-->
                    <div class="bg-lightest border-1px p-30 mb-0">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="BATCHYEAR">Batch (SSC) <small style="color: red">*</small></label>
                                    <select id="BATCHYEAR" name="BATCHYEAR" class="form-control required">
                                        <option value="">Select</option>
                                        <option value="6">Class 6</option>
                                        <option value="7">Class 7</option>
                                        <option value="8">Class 8</option>
                                        <option value="9">Class 9</option>
                                        <option value="10">Class 10</option>
                                        <?php foreach ($years as $key => $year) { ?>
                                            <option value="<?php echo $year ?>"><?php echo $year ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <button type="button" id="searchid" class="btn btn-block btn-dark btn-theme-colored btn-sm mt-20 pt-10 pb-10" data-loading-text="Please wait...">Search</button>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group" style="color: green">
                                    <h2><small>Total Applicant :</small> <?php echo count($applicants)?></h2>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="invoice">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
    $(document).ready(function () {
        $(document).on('click', '#searchid', function () {
            var batch = $("#BATCHYEAR").val();
            $.ajax({
                type: "POST",
                dataType: "html",
                url: "<?php echo site_url('registration/searchApplicants'); ?>",
                data: {batch: batch},
                success: function (data) {
                    $("#invoice").html(data)
                }
            })
        });
    })
</script>