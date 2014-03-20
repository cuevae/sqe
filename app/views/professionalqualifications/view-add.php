<?php
$this->load->helper( 'url' );
?>

    <h3>Add a new professional qualifications</h3>

<?php if ( isset( $_error ) && !empty( $_error ) ): ?>
    <div class="error">
        <p><?= $_error; ?></p>
    </div>
<?php endif; ?>

<?= validation_errors(); ?>

<?php
//Start the form
$attributes = array( 'class' => 'professionalqualifications-form', 'id' => 'professionalqualifications-add' );
$action = 'professionalqualifications/add';
echo form_open( $action, $attributes );
?>

<?php
$id = 'qualificationName';
$label = 'Qualification Name: ';
$data = array(
    'name' => $id,
    'id' => $id,
    'max_length' => 100
);
echo form_label( $label, $id );
echo form_input( $data );
?>
    <br/>
<?php
$id = 'Sectors_idSectors';
$label = 'Sector: ';
echo form_label( $label, $id );
echo form_dropdown( $id, $_sectors );
?>
    <br/>
<?php
$id = 'otherSector';
$label = 'Other Sector: ';
$data = array(
    'name' => $id,
    'id' => $id,
    'max_length' => 45
);
echo form_label( $label, $id );
echo form_input( $data );
?>
    <br/>
<?php
$id = 'awardingBody';
$label = 'Awarding Body: ';
$data = array(
    'name' => $id,
    'id' => $id,
    'max_length' => 45
);
echo form_label( $label, $id );
echo form_input( $data );
?>
    <br/>
<?php
$id = 'yearObtained';
$label = 'yearObtained: ';
$data = array(
    'name' => $id,
    'id' => $id,
    'max_length' => 45
);
echo form_label( $label, $id );
echo form_input( $data );
?>
    <br/>
<?php
$id = 'result';
$label = 'Result: ';
$data = array(
    'name' => $id,
    'id' => $id,
    'max_length' => 20
);
echo form_label( $label, $id );
echo form_input( $data );
?>
    <br/>
<?php
echo form_submit( 'submit-professionalqualifications', 'Add' );
?>
<?= form_close(); ?>

    <h3>Current professional qualifications</h3>

<?php if ( !isset( $_professionalQualifications ) || empty( $_professionalQualifications ) ) : ?>
    <p>You have no professional qualifications added. Please use the form above to start adding.</p>
<?php else : ?>
    <ul>
        <?php foreach ( $_professionalQualifications as $_pqualification ): ?>
            <li>
                <p>
                    <?= $_pqualification->getQualificationName() . $_pqualification->getAwardingBody(); ?>
                </p>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>