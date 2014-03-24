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
            <h3>Add a new job title</h3>
            <?php
            //Start the form
            $attributes = array( 'class' => 'jobtitles-form', 'id' => 'jobtitles-add' );
            $action = 'jobtitles/add';
            echo form_open( $action, $attributes );
            ?>

            <?php #region Skill Name
            $id = 'jobTitle';
            $label = 'Job Title: ';
            $data = array(
                'name' => $id,
                'id' => $id,
            );
            echo form_label( $label, $id );
            echo form_input( $data );
            #endregion
            ?>
            <br/>
            <?php #region Title
            $id = 'Sectors_idSectors';
            $label = 'Sector: ';
            echo form_label( $label, $id );
            echo form_dropdown( $id, $_sectors );
            #endregion
            ?>
            <br/>
            <?php
            echo form_submit( 'submit-jobtitle', 'Add', "class=btn btn-success btn-large" );
            ?>
            <?= form_close(); ?>
        </div>
        <div class="col-md-6 column">
            <h3>Current job titles</h3>
            <?php if ( !isset( $_jobtitlesBySector ) || empty( $_jobtitlesBySector ) ) : ?>
                <p>You have no job titles added. spanPlease use the form to start adding.</p>
            <?php else : ?>
                <ul>
                    <?php foreach ( $_jobtitlesBySector as $sector => $_jobtitles ): ?>
                        <li>Sector: <?= $sector; ?>
                            <ol>
                                <?php foreach ($_jobtitles as $_jobtitle): ?>
                                <li>
                                    <?= $_jobtitle->getJobTitle(); ?> <a
                                        href="<?= site_url( 'jobtitles/delete/' . $_jobtitle->getId() ) ?>">(x)</a>
                                    <?php endforeach; ?>
                                </li>
                            </ol>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
    </div>
</div>