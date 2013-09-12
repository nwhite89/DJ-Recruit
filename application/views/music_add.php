<div class="container">
    <div class="row">
        <div class="span12">
            <h2>Add music specialties to <?php echo $djs[0]->name; ?></h2>
            <?php // Change the css classes to suit your needs    

            $attributes = array('class' => 'form-horizontal', 'id' => '');
            echo form_open('music/add/' . $djId, $attributes); ?>

            <div class="control-group<?php echo (form_error('music')?' error':'')?>">
                <label class="control-label" for="music">Music <span class="required">*</span></label>
                <div class="controls">
                    <input id="music" type="text" name="music"  value="<?php echo set_value('music'); ?>"  />
                    <?php echo form_error('music', '<span class="help-inline error">', '</span>'); ?>
                </div>
            </div>

            <div class="control-group">
                <div class="controls">
                    <?php
                        echo form_submit( 'submit', 'Submit', 'class="btn btn-primary"');
                    ?>
                </div>
            </div>

            <?php echo form_close(); ?>
        </div>
    </div>
</div>
