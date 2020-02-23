<table style="width: 100%">
    <tr>
        <th>
            <img src="<?php echo base_url('web_asset/logo/MONOGRAM.jpg'); ?>" width="100px;" height="100px;" alt="" >
        </th>
        <th>
            <h3 style="text-align: center">কালিয়া চাপড়া চিনি কল উচ্চ বিদ্যালয়</h3>
            <h4 style="text-align: center">৪৩ বছর পূর্তি উদযাপন ও পুনর্মিলণী</h4>
            <h5 style="text-align: center">০২ মার্চ,২০১৮</h5>
        </th>
        <th>
            <?php if(!empty($info)){?>
                <img src="<?php echo $info->IMAGE != '' ? base_url('uploads/reunion/'.$info->IMAGE ) : ''; ?>" width="100px;" height="100px;" style="border-radius: 50px;" alt="Your Photo" >
            <?php }else{?>
                <img src="#" width="100px;" height="100px;" style="border-radius: 50px;" alt="Your Photo" >
            <?php }?>
        </th>
    </tr>
</table>
<?php
if (!empty($info)) {
    if ($info->TRXNUMBER != '') {
        if ($info->TOTALGUEST != 0) {
            $guest = $this->utilities->findAllByAttribute("applicantcsd", array("MOBILENUMBER" => $info->MOBILENUMBER));
        }
        ?>
            <table class="table table-bordered">
                <tr>
                    <th>Your Code</th>
                    <td colspan="3"><?php echo $info->USEDEFINEID . $info->SLID ?></td>
                </tr>
                <tr>
                    <th>Mobile</th>
                    <td><?php echo $info->MOBILENUMBER ?></td>
                    <th>Full Name</th>
                    <td><?php echo $info->FULLNAME ?></td>
                </tr>
                <tr>
                    <th>Batch(SSC) / Class</th>
                    <td><?php echo $info->BATCHYEAR ?></td>
                    <th>Gender</th>
                    <td><?php echo $info->SEX == 1 ? 'Male' : 'Female' ?></td>
                </tr>
                <tr>
                    <th>Amount Tk</th>
                    <td><?php echo $info->AMOUNT ?></td>
                    <th>TRX Number</th>
                    <td><?php echo $info->TRXNUMBER ?></td>
                </tr>
                <?php
                if ($info->TOTALGUEST != 0) {
                    foreach ($guest as $key => $value) {
                        ?>
                        <tr>
                            <th>Guest Id (<?php echo $key+1;?>)</th>
                            <td><?php echo $info->USEDEFINEID . $info->SLID . $value->SLID ?></td>
                            <th>Guest Name</th>
                            <td><?php echo $value->GUESTNAME ?></td>
                        </tr>
                        <?php
                    }
                }
                ?>
            </table>
        <?php
    } else {
        echo '<h2 style="text-align: center; color: red;">Please Complete Your Registration</h2>';
    }
} else {
    echo '<h2 style="text-align: center; color: red;">No Data Fountd</h2>';
}
?>
<p style="color: blue"><strong>বিশেষ দ্রষ্টব্যঃ</strong> নিবন্ধন ফি গৃহীত হওয়া সাপেক্ষে যাবতীয় তথ্য যাচাই বাছাই করে ৭২ ঘণ্টার মধ্যে মোবাইলে SMS এর মাধ্যমে অথবা কল করে আপনার নিবন্ধন নিশ্চিত করা হবে। </p>
<h4>নিয়মাবলীঃ</h4>
<p>১। এই নিবন্ধন কার্ডটি প্রদর্শন করে অনুষ্ঠানের পূর্বে নির্ধারিত বুথ অথবা ব্যাচ প্রতিনিধির কাছ থেকে আপনার পরিচয় 
    পত্র, লাঞ্চ কুপন সহ আনুষঙ্গিক সরঞ্জাম সংগ্রহ করুন। 
</p>
<p>২। এই নিবন্ধন কার্ডটি প্রদর্শন করে অনুষ্ঠানস্থলে প্রবেশ করুন।</p>
<p>৩। আপনার জন্য নির্ধারিত আসনসারিতে আসন গ্রহন করুন।</p>
<p>৪। অনুষ্ঠানের শৃঙ্খলার স্বার্থে পরিচয়পত্রের সাথে নিবন্ধন কার্ডটি সংগ্রহে রাখুন।</p>