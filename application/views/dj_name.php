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
        </div>
    </div>
</div>
