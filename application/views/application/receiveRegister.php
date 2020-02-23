<div class="row">
    <div class="col-md-12">
        <div class="panel panel-base">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-11 col-sm-10 col-xs-8">
                        <h3 class="panel-title">Money Collection List</h3>
                    </div>
                </div>
                <span class="pull-right clickable">
                    <i class="glyphicon glyphicon-chevron-up"></i>
                </span>
            </div>
            <div class="panel-body">
                <table id="datatable" class="table table-striped table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Photo</th>
                            <th>Batch(SSC)/ Class</th>
                            <th>Full Name</th>
                            <th>Mobile</th>
                            <th>TRX Number</th>
                            <th>Amount</th>
                            <th>Accept</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Photo</th>
                            <th>Batch(SSC)/ Class</th>
                            <th>Full Name</th>
                            <th>Mobile</th>
                            <th>TRX Number</th>
                            <th>Amount</th>
                            <th>Accept</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($applicants as $key => $value) { ?>
                            <tr>
                                <td><?php echo $key + 1; ?></td>
                                <td>
                                    <img src="<?php echo $value->IMAGE != '' ? base_url('uploads/reunion/' . $value->IMAGE) : base_url('uploads/reunion/' . ($value->SEX == 1 ? 'male.png' : 'female.png' )); ?>" width="25px;" height="25px;" style="border-radius: 5px;">
                                </td>
                                <td><?php echo strlen($value->BATCHYEAR) > 2 ? $value->BATCHYEAR : 'Class ' . $value->BATCHYEAR  ?></td>
                                <td><?php echo $value->FULLNAME ?></td>
                                <td><?php echo $value->MOBILENUMBER ?></td>
                                <td><?php echo $value->TRXNUMBER ?></td>
                                <td><?php echo $value->AMOUNT ?></td>
                                <td>
                                    <button type="button" class="btn btn-info btn-xs action" id="receive" ac_type="2" value="<?php echo $value->APPLICANTMSTID; ?>">Receive</button>
                                    <button type="button" class="btn btn-danger btn-xs action" id="cancel"  ac_type="3" value="<?php echo $value->APPLICANTMSTID; ?>">Cancel</button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $(document).on('click', '.action', function() {
            var applicantid = $(this).val();
            var ac_type = $(this).attr('ac_type');
            var $tr = $(this).closest('tr');
            if (confirm("Are You Sure!")) {
                $.ajax({
                    type: "POST",
                    dataType: "html",
                    url: "<?php echo site_url('Payment/receivePayment'); ?>",
                    data: {applicantid: applicantid, ac_type : ac_type},
                    success: function(data) {
                        if (data == 'Y') {
                            alert('You Are Successfully Receive');
                            $tr.find('td').fadeOut(1000, function() {
                                $tr.remove();
                            });
                        } else {
                            alert('Receive fail');
                        }
                    }
                })
            }
        });
    });
</script>