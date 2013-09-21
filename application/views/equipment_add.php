<div class="container">
    <div class="row">
        <div class="span12">
            <h2>Add equipment</h2>
            <?php // Change the css classes to suit your needs    

            $attributes = array('class' => 'form-horizontal', 'id' => '');
            echo form_open('equipment/add/', $attributes); ?>

            <div class="control-group<?php echo (form_error('equipment')?' error':'')?>">
                <label class="control-label" for="equipment">Equipment <span class="required">*</span></label>
                <div class="controls">
                    <input id="equipment" type="text" name="equipment"  value="<?php echo set_value('equipment'); ?>"  />
                    <?php echo form_error('equipment', '<span class="help-inline error">', '</span>'); ?>
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
