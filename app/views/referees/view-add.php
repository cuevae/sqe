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
            <h3>Add new referee</h3>
            <?php
            //Start the form
            $attributes = array( 'class' => 'referee-form', 'id' => 'referee-add' );
            $action = 'referees/add/';
            echo form_open_multipart( $action, $attributes );
            ?>
            <?php
            $id = 'title';
            $label = 'Title: ';
            $options = array(
                'Mr' => 'Mr.',
                'Ms' => 'Ms.',
                'Mrs' => 'Mrs.',
                'Miss' => 'Miss.'
            );
            echo form_label( $label, $id );
            echo form_dropdown( $id, $options );
            ?>
            <br/>
            <?php
            $id = 'forename';
            $label = 'Forename: ';
            $data = array(
                'name' => $id,
                'id' => $id,
            );
            echo form_label( $label, $id );
            echo form_input( $data );
            ?>
            <br/>
            <?php
            $id = 'surname';
            $label = 'Surname: ';
            $data = array(
                'name' => $id,
                'id' => $id,
            );
            echo form_label( $label, $id );
            echo form_input( $data );
            ?>
            <br/>
            <?php
            $id = 'email';
            $label = 'Email: ';
            $data = array(
                'name' => $id,
                'id' => $id,
            );
            echo form_label( $label, $id );
            echo form_input( $data );
            ?>
            <br/>
            <?php
            $id = 'contactPhone';
            $label = 'Contact Phone: ';
            $data = array(
                'name' => $id,
                'id' => $id,
            );
            echo form_label( $label, $id );
            echo form_input( $data );
            ?>
            <br/>
            <?php
            $id = 'relationship';
            $label = 'Relationship: ';
            $options = array(
                'employer' => 'Employer',
                'academic' => 'Academic',
            );
            echo form_label( $label, $id );
            echo form_dropdown( $id, $options );
            ?>
            <br/>
            <?php
            $id = 'permissionToContact';
            $label = 'Permission To Contact: ';
            $data = array(
                'name' => $id,
                'id' => $id,
                'value' => 'permissionToContact',
                'checked' => TRUE
            );
            echo form_label( $label, $id );
            echo form_checkbox( $data );
            ?>
            <br/>
            <?php
            $id = 'permissionToStoreDetails';
            $label = 'Permission To Store Details: ';
            $data = array(
                'name' => $id,
                'id' => $id,
                'value' => 'permissionToStoreDetails',
                'checked' => TRUE
            );
            echo form_label( $label, $id );
            echo form_checkbox( $data );
            ?>
            <br/>
            <?php
/*$id = 'referenceDoc';
$label = 'ReferenceDoc: ';
$data = array(
    'name' => $id,
    'id' => $id
);
echo form_label( $label, $id );
echo form_upload( $data );
*/?><!--
<br/>-->
            <?php
            echo form_submit( 'submit-referee', 'Add', "class=btn btn-success btn-large" );
            ?>
            <?= form_close(); ?>
        </div>
        <div class="col-md-6 column">
            <h3>Current referees</h3>
            <?php if ( !isset( $_referees ) || empty( $_referees ) ) : ?>
                <p>You have no referees added. spanPlease use the form to start adding.</p>
            <?php else : ?>
                <ol>
                    <?php foreach ( $_referees as $_referee ): ?>
                        <li>
                            <p><?= $_referee->getFullName(); ?> <a
                                    href="<?= site_url( 'referees/delete/' . $_referee->getId() ) ?>">(x)</a>

                            <div>
                                <ul>
                                    <?php $var = $_referee->getEmail() ?>
                                    <?php if ( !empty( $var ) ) : ?>
                                        <li>
                                            Email: <?= $var ?>
                                        </li>
                                        <?php unset( $var ); endif; ?>
                                    <?php $var = $_referee->getContactPhone() ?>
                                    <?php if ( !empty( $var ) ) : ?>
                                        <li>
                                            Contact phone: <?= $var ?>
                                        </li>
                                        <?php unset( $var ); endif; ?>
                                    <?php $var = $_referee->getRelationship() ?>
                                    <?php if ( !empty( $var ) ) : ?>
                                        <li>
                                            Relationship: <?= $var ?>
                                        </li>
                                        <?php unset( $var ); endif; ?>
                                    <li>
                                        Permission to contact: <?= $_referee->getPermissionToContact() ? 'Yes' : 'No' ?>
                                    </li>
                                    <li>
                                        Permission to store
                                        details: <?= $_referee->getPermissionToStoreDetails() ? 'Yes' : 'No' ?>
                                    </li>
                                    <li>
                                        Verified: <?= $_referee->getVerified() ? 'Yes' : 'No' ?>
                                    </li>
                                    <?php $var = $_referee->getHowVerified() ?>
                                    <?php if ( !empty( $var ) ) : ?>
                                        <li>
                                            How verified: <?= $var ?>
                                        </li>
                                        <?php unset( $var ); endif; ?>
                                </ul>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ol>
            <?php endif; ?>
        </div>
    </div>
</div>
