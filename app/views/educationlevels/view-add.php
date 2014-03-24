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
            <h3>Add a new education level</h3>
            <?php
            //Start the form
            $attributes = array( 'class' => 'edlevels-form', 'id' => 'edlevels-add' );
            $action = 'educationlevels/add';
            echo form_open( $action, $attributes );
            ?>

            <?php
            $id = 'educationLevel';
            $label = 'Education Level: ';
            $data = array(
                'name' => $id,
                'id' => $id,
            );
            echo form_label( $label, $id );
            echo form_input( $data );
            ?>
            <br/>
            <?php
            echo form_submit( 'submit-edlevel', 'Add', "class=btn btn-success btn-large" );
            ?>
            <?= form_close(); ?>
        </div>
        <div class="col-md-6 column">
            <h3>Current Education Levels</h3>

            <?php if ( !isset( $_edLevels ) || empty( $_edLevels ) ) : ?>
                <p>You have no education levels added. spanPlease use the form to start adding.</p>
            <?php else : ?>
                <ul>
                    <?php foreach ( $_edLevels as $_edLevel ): ?>
                        <li>
                            <?= $_edLevel->getEducationLevel(); ?> <a
                                href="<?= site_url( 'educationlevels/delete/' . $_edLevel->getIdEducationLevel() ) ?>">(x)</a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
    </div>
</div>