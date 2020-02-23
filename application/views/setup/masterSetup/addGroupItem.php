<style type="text/css">
    .button_self{
        clear: both;

    }
    .form-group{
        margin-bottom: 24px;
    }
</style>

<?php echo form_open('', 'id="save_group_data"', array('class' => 'form-horizontal')); ?>


<div class="form-group">
    <label class="col-sm-3 control-label"><?php echo $this->lang->line('item_name') ?></label>
    <a class="help-icon" data-container="body" data-toggle="popover" data-placement="right" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
        <i class="fa fa-question-circle"></i>
    </a>
    <div class="col-sm-6">
        <?php echo form_input(array('name' => 'LOOKUP_DATA_NAME', 'id' => 'LOOKUP_DATA_NAME', 'class' => 'form-control', 'placeholder' => "Item  Name", 'required' => 'required')); ?>
        <input type="hidden" name="LOOKUP_GRP_ID" id="LOOKUP_GRP_ID" value="<?php echo $lkp_grp_id; ?>" class="form-control input-sm">
        <input type="hidden" name="USE_CHAR_NUMB" id="USE_CHAR_NUMB" value="<?php echo $USE_CHAR_NUMB; ?>" class="form-control input-sm">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label"><?php echo $this->lang->line('short_name') ?></label>
    <a class="help-icon" data-container="body" data-toggle="popover" data-placement="right" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
        <i class="fa fa-question-circle"></i>
    </a>
    <div class="col-sm-6">
        <?php
        if ($USE_CHAR_NUMB == 'N') {
            echo form_input(array('name' => 'NUMB_LOOKUP', 'class' => 'form-control', 'placeholder' => "Short Name", 'required' => 'required'));
        } else {
            echo form_input(array('name' => 'CHAR_LOOKUP', 'class' => 'form-control', 'placeholder' => "Short Name", 'required' => 'required'));
        }
        ?>
    </div>
</div>

<div class="form-group self">
    <label class="col-sm-3 control-label"><?= $this->lang->line('is_active'); ?></label>
    <div class="col-sm-6">
        <div class="checkbox checkbox-inline checkbox-primary styled">
            <?php echo form_checkbox('ACTIVE_FLAG', 1, TRUE, 'id="ACTIVE_FLAG"', array('class' => 'styled')); ?>
            <label for="is_active"></label>
        </div>
    </div>

</div>
<div class="form-group button_self">
    <div class="col-sm-offset-3">
        <button type="submit" class="btn btn-primary "><?php echo $this->lang->line('submit') ?></button>
    </div>
</div>
<?php echo form_close(); ?>
<script src="<?php echo base_url(); ?>dist/scripts/jquery.alphanum.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#CHAR_LOOKUP').alpha(); 
        $('#NUMB_LOOKUP').numeric(); 
        
    });
</script>