<?php
?>

<h3>Add new referee</h3>

<?= validation_errors(); ?>

<?php
//Start the form
$attributes = array( 'class' => 'experiences-form', 'id' => 'experience-add' );
$action = 'skills/add/';
echo form_open_multipart( $action, $attributes );
?>
<?php
$id = 'title';
$label = 'Title: ';
$options = array(
    'mr' => 'Mr.',
    'ms' => 'Ms.',
    'mrs' => 'Mrs.',
    'miss' => 'Miss.'
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
$label = 'PermissionToStoreDetails: ';
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
$id = 'referenceDoc';
$label = 'ReferenceDoc: ';
$data = array(
    'name' => $id,
    'id' => $id
);
echo form_label( $label, $id );
echo form_upload( $data );
?>
<br/>

<?php
echo form_submit( 'submit-referee', 'Add' );
?>
<?= form_close(); ?>

<h3>Current referees</h3>

<?php if ( !isset( $_referees ) || empty( $_referees ) ) : ?>
    <p>You have no referees added. Please use the form above to start adding.</p>
<?php else : ?>
    <ul>
        <?php foreach ( $_referees as $_referee ): ?>
            <li>
                <div>
                    Experience Here
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
