<div class="container">
    <div class="row clearfix">
        <div class="col-md-12 column">
            <?php if ( isset( $_error ) && !empty( $_error ) ): ?>
                <div>
                    <p><?= $_error ?></p>
                </div>
            <?php elseif ( isset( $_success ) && !empty( $_success ) ): ?>
                <div>
                    <p><?= $_success ?></p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<div class="container">
    <div class="row clearfix">
        <div class="col-md-6 column">
            <h3>Add a new employment level</h3>
            <?php
            //Start the form
            $attributes = array( 'class' => 'elevels-form', 'id' => 'elevels-add' );
            $action = 'employmentlevels/add';
            echo form_open_multipart( $action, $attributes );
            ?>

            <?php #region Skill Name
            $id = 'employmentLevel';
            $label = 'Employment Level: ';
            $data = array(
                'name' => $id,
                'id' => $id,
            );
            echo form_label( $label, $id );
            echo form_input( $data );
            #endregion
            ?>
            <br/>
            <?php
            echo form_submit( 'submit-elevels', 'Add', "class=btn btn-success btn-large" );
            ?>
            <?= form_close(); ?>
        </div>
        <div class="col-md-6 column">
            <h3>Current employment levels</h3>
            <?php if ( !isset( $_levels ) || empty( $_levels ) ) : ?>
                <p>You have no sectors added. spanPlease use the form to start adding.</p>
            <?php else : ?>
                <ul>
                    <?php foreach ( $_levels as $_level ): ?>
                        <li>
                            <?= $_level->getEmploymentLevel(); ?> <a
                                href="<?= site_url( 'employmentlevels/delete/' . $_level->getId() ) ?>">(x)</a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
    </div>
</div>