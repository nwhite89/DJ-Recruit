<div class="container">
    <div class="hero-unit">
        <h2><?php echo $djs[0]->name; ?></h2>
        <dl class="dl-horizontal">
            <dt>Date of Birth:</dt>
            <dd>
                <?php 
                    if ($djs[0]->dob != null || $djs[0]->dob != '') { 
                        echo date("d-m-Y", $djs[0]->dob);
                    } else {
                        echo '&nbsp;';
                    }
                ?>
            </dd>
            <dt>
                Mobile Number:
            </dt>
            <dd>
                <?php echo $djs[0]->mobile; ?>
            </dd>
            <dt>
                E-Mail Address:
            </dt>
            <dd>
                <?php echo $djs[0]->email; ?>
            </dd>
            <dt>
                Address:
            </dt>
            <dd>
                <address>
                        <strong><?php echo $djs[0]->address_line1; ?></strong> <br />
                        <?php echo $djs[0]->address_line2; ?> <br />
                        <?php echo $djs[0]->town; ?> <br />
                        <?php echo $djs[0]->postcode; ?>
                </address>
            </dd>
        </dl>
    </div>
    <div class="row">
        <div class="span12">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a href="#equipment" data-toggle="tab">Equipment</a>
                </li>
                <li>
                    <a href="#music" data-toggle="tab">Music Specialiy</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="equipment">
                    <a href="#equipment-modal" role="button" class="btn btn-primary pull-right" data-toggle="modal">Add</a><br />
                    <table id="equipment-table" class="table list table-condensed table-hover table-striped" width="100%;">
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
                                    echo '<td>' . $value->name . '</td>';
                                    echo '<td style="text-align:right;"><a class="btn btn-danger btn-mini dj-delete-check" href="'.base_url().'equipment/remove/'.$value->id.'">Delete</a></td>';
                                echo '</tr>';
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane" id="music">
                    <a href="#music-modal" role="button" class="btn btn-primary pull-right" data-toggle="modal">Add</a><br />
                    <table id="music-table" class="table list table-condensed table-hover table-striped" width="100%;">
                        <thead>
                            <tr>
                                <th>Music</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php 
                            foreach ($music as $key => $value) {
                                echo '<tr>';
                                    echo '<td>' . $value->music . '</td>';
                                    echo '<td style="text-align:right;"><a class="btn btn-danger btn-mini dj-delete-check" href="'.base_url().'music/remove/'.$value->id.'">Delete</a></td>';
                                echo '</tr>';
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
    $typeahead = array();
    $equipmentListArr = array();
    foreach ($equipmentList as $key => $value) {
        $typeahead[] = '"'.$value->name.'"';
        $equipmentListArr[] = $value->name; 
    }
    echo '<script> var equipmentList = ' . json_encode($equipmentListArr) . '</script>';
?>
<div class="modal hide fade" id="equipment-modal">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3>Add Equipment</h3>
    </div>
    <div class="modal-body">
        <form action="<?php echo base_url(); ?>dj/addEquipment" type="post">
            <p>Search through current equipment list</p>
            <input type="text" name="dj-equipment" id="dj-equipment" data-items="4" data-source='[<?php echo implode(', ', $typeahead); ?>]' placeholder="Equipment" data-provide="typeahead" autocomplete="off">
            <span class="error hide"></span>
            <input type="hidden" name="dj-id" id="dj" value="<?php echo $djs[0]->id; ?>">
        </form>
    </div>
    <div class="modal-footer">
        <a href="#" class="btn" data-dismiss="modal" aria-hidden="true">Close</a>
        <a href="#" class="btn btn-primary modal-submit-btn disabled">Submit</a>
    </div>
</div>
