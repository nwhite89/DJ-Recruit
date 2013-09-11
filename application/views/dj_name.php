<div class="container">
    <div class="row">
        <div class="span12">
            <h2>DJs</h2>
            <h4><?php echo $djs[0]->name; ?></h4>
            <p>
                <span class="bold">Date of Birth: </span>
            </p>
            <p>
                <span class="bold">Mobile Number: </span><?php echo $djs[0]->mobile; ?>
            </p>
            <p>
                <span class="bold">E-Mail Address: </span><?php echo $djs[0]->email; ?>
            </p>
            <p>
                <span class="bold">Address: </span><br />
                    <?php echo $djs[0]->address_line1; ?> <br />
                    <?php echo $djs[0]->address_line2; ?> <br />
                    <?php echo $djs[0]->town; ?> <br />
                    <?php echo $djs[0]->postcode; ?>
            </p>
            <p>
                <span class="bold">Equipment <a class="btn btn-mini btn-primary" href="<?php echo base_url(); ?>equipment/add/<?php echo $djs[0]->id; ?>">Add</a></span><br />
                <table id="equipment-table" class="table list table-condensed table-hover" width="100%;">
                <thead>
                    <tr>
                        <th>Equipment</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                <?php 
                    foreach ($equipment as $key => $value) {
                        echo '<tr>';
                            echo '<td>' . $value->equipment . '</td>';
                            echo '<td style="text-align:right;"><a class="btn btn-danger btn-mini" href="'.base_url().'equipment/remove/'.$value->id.'">Delete</a></td>';
                        echo '</tr>';
                    }
                ?>
                </tbody>
            </table>
            </p>
        </div>
    </div>
</div>
