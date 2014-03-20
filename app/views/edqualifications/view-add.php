<?php
$this->load->helper( 'url' );
?>

    <h3>Add a new educational qualifications</h3>

<?php if ( isset( $_error ) && !empty( $_error ) ): ?>
    <div class="error">
        <p><?= $_error; ?></p>
    </div>
<?php endif; ?>

<?= validation_errors(); ?>

<?php
//Start the form
$attributes = array( 'class' => 'edqualifications-form', 'id' => 'edqualifications-add' );
$action = 'edqualifications/add';
echo form_open( $action, $attributes );
?>

<?php
$id = 'qualificationType';
$label = 'Qualification Type: ';
$data = array(
    'name' => $id,
    'id' => $id,
    'max_length' => 16
);
echo form_label( $label, $id );
echo form_input( $data );
?>
    <br/>
<?php
$id = 'courseName';
$label = 'Course Name: ';
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
$id = 'EducationLevels_idEducationLevel';
$label = 'Education Level: ';
echo form_label( $label, $id );
echo form_dropdown( $id, $_educationLevels );
?>
    <br/>
<?php
$id = 'vocational';
$label = 'Vocational: ';
$data = array(
    'name' => $id,
    'id' => $id,
    'value' => 'vocational',
    'checked' => TRUE
);
echo form_label( $label, $id );
echo form_checkbox( $data );
?>
    <br/>
<?php
$id = 'mainSubject';
$label = 'Main Subject: ';
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
$id = 'nameOfInstitutions';
$label = 'Name of Institutions: ';
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
$id = 'country';
$label = 'Country: ';
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
$id = 'thesesTitle';
$label = 'Country: ';
$data = array(
    'name' => $id,
    'id' => $id,
    'max_length' => 200
);
echo form_label( $label, $id );
echo form_input( $data );
?>
    <br/>
<?php
echo form_submit( 'submit-edqualifications', 'Add' );
?>
<?= form_close(); ?>

    <h3>Current educational qualifications</h3>

<?php if ( !isset( $_educationalQualifications ) || empty( $_educationalQualifications ) ) : ?>
    <p>You have no educational qualifications added. Please use the form above to start adding.</p>
<?php else : ?>
    <ul>
        <?php foreach ( $_educationalQualifications as $_edqualification ): ?>
            <li>
                <p>
                    <?= $_edqualification->getCourseName() . $_edqualification->getQualificationType(); ?>
                </p>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>