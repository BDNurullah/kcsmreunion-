<section id="home" class="divider parallax layer-overlay" data-bg-img="<?php echo base_url('web_asset/images/bg/kcsm.jpg'); ?>">
    <div class="display-table">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-push-2">
                    <div class="bg-lightest border-1px p-30 mb-0">
                        <?php if ($this->session->flashdata('success')) { ?>
                            <div class="alert alert-success alert-dismissable">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Success!</strong> <?php echo $this->session->flashdata('success'); ?>
                            </div>
                        <?php } ?>
                        <div class="alert alert-info alert-dismissable">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Info!</strong> Please Enter Your Mobile Number, For Print info.
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="MOBILENUMBER">Mobile <small style="color: red">*</small></label>
                                    <input id="MOBILENUMBER" name="MOBILENUMBER" type="text" placeholder="+8801" minlength="11" maxlength="11" required="required" class="form-control spacebar">
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <button type="button" id="searchid" class="btn btn-block btn-dark btn-theme-colored btn-sm mt-20 pt-10 pb-10" data-loading-text="Please wait...">Search</button>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="invoice">

                        </div>
                        <input type="button" id="printButton" class="btn btn-info btn-sm hidden" onclick="printDiv('invoice')" value="print" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $(function () {
            $(document).on('keydown', '#MOBILENUMBER', function (e) {
                -1 !== $.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) || (/65|67|86|88/.test(e.keyCode) && (e.ctrlKey === true || e.metaKey === true)) && (!0 === e.ctrlKey || !0 === e.metaKey) || 35 <= e.keyCode && 40 >= e.keyCode || (e.shiftKey || 48 > e.keyCode || 57 < e.keyCode) && (96 > e.keyCode || 105 < e.keyCode) && e.preventDefault()
            });
        });
        $(function () {
            $('.spacebar').on('keypress', function (e) {
                if (e.which == 32)
                    return false;
            });
        });
        $(document).on('click', '#searchid', function () {
            var mobile = $("#MOBILENUMBER").val();
            $.ajax({
                type: "POST",
                dataType: "html",
                url: "<?php echo site_url('registration/printInvoice'); ?>",
                data: {mobile: mobile},
                success: function (data) {
                    $("#invoice").html(data);
                    $("#printButton").removeClass('hidden');
                }
            })
        });
    });
</script>