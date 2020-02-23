<section id="home" class="divider parallax layer-overlay" data-bg-img="<?php echo base_url('web_asset/images/bg/kcsm.jpg'); ?>">
    <div class="display-table">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-push-3">
                    <div class="bg-lightest border-1px p-30 mb-0">
                        <h3 class="text-theme-colored mt-0 pt-5"> Apply Now<small> Please Enter Your Information</small></h3>
                        <span>All star <small style="color: red">*</small> mark field is required</span>
                        <hr>
                        <?php if ($this->session->flashdata('fail')) { ?>
                            <div class="alert alert-warning alert-dismissable">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Warning!</strong> <?php echo $this->session->flashdata('fail'); ?>.
                            </div>
                        <?php } ?>
                        <span id="answers"></span>
                        <form id="apply_form" name="apply_form" action="<?php echo site_url('registration/insert') ?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="<?php //echo $this->security->get_csrf_token_name(); ?>" value="<?php //echo $this->security->get_csrf_hash(); ?>">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="MOBILENUMBER">Mobile <small style="color: red">*</small></label>
                                        <input id="MOBILENUMBER" name="MOBILENUMBER" type="text" placeholder="+8801" minlength="11" maxlength="11" required="required" class="form-control onlynumber">
                                    </div>
                                    <span id="info"></span>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="FULLNAME">Full Name <small style="color: red">*</small></label>
                                        <input id="FULLNAME" name="FULLNAME" type="text" placeholder="Enter Your Name" required="required" class="form-control" style="text-transform:uppercase;">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="BATCHYEAR">Batch (SSC)/ Class <small style="color: red">*</small></label>
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
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="SEX">Gender <small style="color: red">*</small></label>
                                        <select id="SEX" name="SEX" class="form-control required">
                                            <option value="">Select</option>
                                            <option value="1">Male</option>
                                            <option value="2">Female</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="BLOODGROUP">Blood Group</label>
                                        <select id="BLOODGROUP" name="BLOODGROUP" class="form-control">
                                            <option value="">Select</option>
                                            <option value="A +">A +</option>
                                            <option value="A -">A -</option>
                                            <option value="B +">B +</option>
                                            <option value="B -">B -</option>
                                            <option value="AB +">AB +</option>
                                            <option value="AB -">AB -</option>
                                            <option value="O +">O +</option>
                                            <option value="O -">O -</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="IMAGE">Your Photo</label>
                                        <input id="IMAGE" name="IMAGE" class="file" type="file" multiple data-show-upload="false" data-show-caption="true">
                                        <small>Maximum upload file size: 12 MB</small>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="TOTALGUEST">Total Guest <small style="color: red">*</small></label>
                                        <input id="TOTALGUEST" name="TOTALGUEST" type="number" placeholder="Number of Guest" value="0"  min="0" max="3" required="required" class="form-control onlynumber">
                                    </div>
                                </div>
                                <div class="col-sm-6 hidden" id="guestfeeinfo">
                                    <br>
                                    <span style="font-size: 15px; color: green">Every Guest Fee : </span><span style="font-size: 15px; color: red"> 500 Taka</span><br/>
                                    <span style="font-size: 15px; color: green">Your Guest Fee : </span><span style="font-size: 15px; color: red"><span class="guestPayment"> 0 </span>  Taka</span>
                                </div>
                            </div>
                            <div class="row hidden" id="guest_info">
                                <div class="col-sm-12">
                                    <table class="table table-bordered" id="totalguesttable">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Guest Name</th>
                                                <th>Gender</th>
                                                <th>Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="PROFESSION">Profession (In a Word) </label>
                                <textarea id="PROFESSION" name="PROFESSION" class="form-control" rows="3" placeholder="Your profession/message"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="AMOUNT" id="AMOUNT" class="form-control" value="0" />
                                <span style="font-size: 15px; color: green">Your Total Fee Is : </span><span style="font-size: 20px; color: red"><span id="APPLICATIONFEE"> 0 </span> + <span class="guestPayment"> 0 </span> = <span id="totalTaka">0</span> Taka</span>
                            </div>
                            <div class="form-group">
                                <input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden" value="" />
                                <button type="submit" class="btn btn-block btn-dark btn-theme-colored btn-sm mt-20 pt-10 pb-10" data-loading-text="Please wait...">Submit</button>
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
    //var csrf_value = '<?php //echo $this->security->get_csrf_hash(); ?>';
    //csrf_test_name : csrf_value
</script>
<script type="text/javascript">
    $("#apply_form").validate({
    });
    $(document).ready(function() {
        //start a new session
        $(document).on("change", "#TOTALGUEST", function() {
            $("#totalguesttable tbody").html('');
            var no = parseInt($(this).val());
            var fee = parseInt($("#AMOUNT").val());
            var total = no * 500;
            var total_fee = fee + total;
            $("#totalTaka").text(total_fee);
            $(".guestPayment").text(total);
            if (no > 0 && no < 4) {
                for (var i = 1; i <= no; i++) {
                    $("#guestfeeinfo").removeClass('hidden');
                    $("#guest_info").removeClass('hidden');
                    $("#totalguesttable tbody").append('<tr>\n\
                                                        <td>' + i + '</td>\n\
                                                        <td><input id="GUESTNAME_' + i + '" name="GUESTNAME[]" class="form-control required" type="text" placeholder="Guest Name" required="required" style="text-transform:uppercase;"></td>\n\
                                                        <td><select id="GUESTSEX_' + i + '" name="GUESTSEX[]" class="form-control required" required="required"><option value="">Select</option><option value="1">Male</option><option value="2">Female</option></select></td>\n\
                                                        <td><input id="GAMOUNT_' + i + '" name="GAMOUNT[]" style="width: 80px;" class="form-control guest-amount" type="text" value="500" readonly="readonly"></td>\n\
                                                    </tr>');
                }
            } else {
                $("#guest_info").addClass('hidden');
            }
        });

        $(function() {
            $(document).on('keydown', '.onlynumber', function(e) {
                -1 !== $.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) || (/65|67|86|88/.test(e.keyCode) && (e.ctrlKey === true || e.metaKey === true)) && (!0 === e.ctrlKey || !0 === e.metaKey) || 35 <= e.keyCode && 40 >= e.keyCode || (e.shiftKey || 48 > e.keyCode || 57 < e.keyCode) && (96 > e.keyCode || 105 < e.keyCode) && e.preventDefault()
            });
        });
        $(function() {
            $('.onlynumber').on('keypress', function(e) {
                if (e.which == 32)
                    return false;
            });
        });
        $(document).on('change', '#BATCHYEAR', function() {
            var year = $(this).val();
            if (year >= 1981 && year <= 2004) {
                $('#AMOUNT').val('1000');
                $('#APPLICATIONFEE').text('1000');
            } else if(year <= 2010 && year >= 2005){
                $('#AMOUNT').val('800');
                $('#APPLICATIONFEE').text('800');
            } else if(year <= 2018 && year >= 2011){
                $('#AMOUNT').val('500');
                $('#APPLICATIONFEE').text('500');
            }else{
                $('#AMOUNT').val('200');
                $('#APPLICATIONFEE').text('200');
            }
            var no = parseInt($("#TOTALGUEST").val());
            var total = no * 500;
            var fee = parseInt($("#AMOUNT").val());
            var total_fee = fee + total;
            $("#totalTaka").text(total_fee);
        });
        $(document).on("blur", "#MOBILENUMBER", function() {
            var mobile = $(this).val();
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('registration/checkmobile'); ?>",
                data: {mobile: mobile},
                cache: false,
                success: function(data) {
                    if (data == 'Y') {
                        $("#MOBILENUMBER").val('');
                        $("#info").html('<span style="font-size: 12px; color: red;">This Number Already in Use</span>');
                    } else {
                        $("#info").html('');
                    }
                }
            });
        });
    });
</script>