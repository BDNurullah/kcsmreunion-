<?php if (!empty($applicants)) { ?>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Photo</th>
                <th>Batch(SSC) / Class</th>
                <th>Full Name</th>
                <th>Mobile</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($applicants as $key => $value) { ?>
                <tr>
                    <td><?php echo $key +1; ?></td>
                    <td>
                        <img src="<?php echo $value->IMAGE != '' ? base_url('uploads/reunion/'.$value->IMAGE ) :  base_url('uploads/reunion/'. ($value->SEX == 1 ? 'male.png' : 'female.png' )); ?>" width="25px;" height="25px;" style="border-radius: 5px;">
                    </td>
                    <td><?php echo strlen($value->BATCHYEAR) > 2 ? $value->BATCHYEAR : 'Class ' . $value->BATCHYEAR  ?></td>
                    <td><?php echo $value->FULLNAME ?></td>
                    <td><?php echo $value->MOBILENUMBER ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <?php
} else {
    echo '<h2 style="text-align: center; color: red;">No Applicant Found</h2>';
}?>