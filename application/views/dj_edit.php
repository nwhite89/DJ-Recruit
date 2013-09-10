<div class="container">
    <div class="row">
        <div class="span12">
            <h2>Edit DJ</h2>
            <?php // Change the css classes to suit your needs    

            $attributes = array('class' => 'form-horizontal', 'id' => '');
            echo form_open('djs/edit/' . $djs[0]->id, $attributes); ?>

            <div class="control-group<?php echo (form_error('name')?' error':'')?>">
                <label class="control-label" for="name">Name <span class="required">*</span></label>
                <div class="controls">
                    <input id="name" type="text" name="name"  value="<?php echo set_value('name', $djs[0]->name); ?>"  />
                    <?php echo form_error('name', '<span class="help-inline error">', '</span>'); ?>
                </div>
            </div>

            <div class="control-group<?php echo (form_error('email')?' error':'')?>">
                <label class="control-label" for="email">E-mail</label>
                <div class="controls">
                    <input id="email" type="text" name="email"  value="<?php echo set_value('email', $djs[0]->email); ?>"  />
                    <?php echo form_error('email','<span class="help-inline error">', '</span>'); ?>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="mobile">Mobile</label>
                <?php echo form_error('mobile'); ?>
                <div class="controls">
                    <input id="mobile" type="text" name="mobile"  value="<?php echo set_value('mobile', $djs[0]->mobile); ?>"  />
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="address_line1">Address Line 1</label>
                <?php echo form_error('address_line1'); ?>
                <div class="controls">
                    <input id="address_line1" type="text" name="address_line1"  value="<?php echo set_value('address_line1', $djs[0]->address_line1); ?>"  />
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="address_line2">Address Line 2</label>
                <?php echo form_error('address_line2'); ?>
                <div class="controls">
                    <input id="address_line2" type="text" name="address_line2"  value="<?php echo set_value('address_line2', $djs[0]->address_line2); ?>"  />
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="town">Town</label>
                <?php echo form_error('town'); ?>
                <div class="controls">
                    <input id="town" type="text" name="town"  value="<?php echo set_value('town', $djs[0]->town); ?>"  />
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="postcode">Postcode</label>
                <?php echo form_error('postcode'); ?>
                <div class="controls">
                    <input id="postcode" type="text" name="postcode"  value="<?php echo set_value('postcode', $djs[0]->postcode); ?>"  />
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
