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
                    <a class="btn btn-primary pull-right" href="<?php echo base_url(); ?>equipment/add/<?php echo $djs[0]->id; ?>">Add</a><br />
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
                    <a class="btn btn-primary pull-right" href="<?php echo base_url(); ?>music/add/<?php echo $djs[0]->id; ?>">Add</a><br />
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
