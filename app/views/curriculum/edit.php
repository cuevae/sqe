<?php
/**
 * Created by PhpStorm.
 * User: manei
 * Date: 03/03/14
 * Time: 17:44
 */
?>
<h2>Edit CV</h2>

<?php if ( isset( $success ) && $success ) : ?>
    <h3><?= $success ?></h3>
<?php else : ?>
    <?= validation_errors(); ?>
<?php endif; ?>

<?php
//Start the form
$attributes = array( 'class' => 'curriculum-form', 'id' => 'curriculum-edit' );
$action = 'curriculum/edit/';
echo form_open_multipart( $action, $attributes );
?>

<?php #region Title
$id = 'title';
$label = 'Title: ';
$options = array(
    'mr' => 'Mr.',
    'mrs' => 'Mrs.',
    'miss' => 'Ms.',
    'lord' => 'Lord',
);
echo form_label( $label, $id );
echo form_dropdown( $id, $options );
#endregion ?>

<?php #region Forename1
$id = 'forename1';
$label = 'Forename 1: ';
$data = array(
    'name' => $id,
    'id' => $id,
    'value' => set_value($id),
);
echo form_label( $label, $id );
echo form_input( $data );
#endregion?>

<?php #region Forename2
$id = 'forename2';
$label = 'Forename 2: ';
$data = array(
    'name' => $id,
    'id' => $id,
    'value' => set_value($id),
);
echo form_label( $label, $id );
echo form_input( $data );
#endregion ?>

<?php #region Surname
$id = 'surname';
$label = 'Surname: ';
$data = array(
    'name' => $id,
    'id' => $id,
    'value' => set_value($id)
);
echo form_label( $label, $id );
echo form_input( $data );
#endregion?>

<?php #region AddressLine1
$id = 'addressLine1';
$label = 'Address Line 1: ';
$data = array(
    'name' => $id,
    'id' => $id,
    'value' => set_value($id)
);
echo form_label( $label, $id );
echo form_input( $data );
#endregion?>

<?php #region AddressLine2
$id = 'addressLine2';
$label = 'Address Line 2: ';
$data = array(
    'name' => $id,
    'id' => $id,
    'value' => set_value($id)
);
echo form_label( $label, $id );
echo form_input( $data );
#endregion?>

<?php #region Town
$id = 'town';
$label = 'Town: ';
$data = array(
    'name' => $id,
    'id' => $id,
    'value' => set_value($id)
);
echo form_label( $label, $id );
echo form_input( $data );
#endregion?>

<?php #region Postcode
$id = 'postcode';
$label = 'Postcode: ';
$data = array(
    'name' => $id,
    'id' => $id,
    'value' => set_value($id)
);
echo form_label( $label, $id );
echo form_input( $data );
#endregion?>

<?php #region Second Email
$id = 'secondEmail';
$label = 'Alternative Email: ';
$data = array(
    'name' => $id,
    'id' => $id,
    'value' => set_value($id)
);
echo form_label( $label, $id );
echo form_input( $data );
#endregion?>

<?php #region Personal Url
$id = 'personalUrl';
$label = 'Website: ';
$data = array(
    'name' => $id,
    'id' => $id,
    'value' => set_value($id)
);
echo form_label( $label, $id );
echo form_input( $data );
#endregion?>

<?php #region Photo
$id = 'photo';
$label = 'Photo: ';
$data = array(
    'name' => $id,
    'id' => $id
);
echo form_label( $label, $id );
echo form_upload( $data );
#endregion?>

<?php #region Male/Female
$id = 'sex';
$label = 'Sex: ';
$options = array(
    'male' => 'Male',
    'female' => 'Female',
);
echo form_label( $label, $id );
echo form_dropdown( $id, $options );
#endregion?>

<?php #region Authority To Work Statement
$id = 'authorityToWorkStatement';
$label = 'Authority To Work Statement: ';
$data = array(
    'name' => $id,
    'id' => $id,
    'value' => set_value($id)
);
echo form_label( $label, $id );
echo form_textarea( $data );
#endregion?>

<?php #region Contact Preference
$id = 'contactPreference';
$label = 'Contact Preference: ';
$options = array(
    'email' => 'Email',
    'landLine' => 'Land Line',
    'mobile' => 'Mobile'
);
echo form_label( $label, $id );
echo form_dropdown( $id, $options );
#endregion?>

<?php #region Education Level
$id = 'educationLevel';
$label = 'Education Level: ';
echo form_label( $label, $id );
echo form_dropdown( $id, $_educationLevelOptions );
#endregion?>

<?php #region No Of GCSEs
$id = 'noOFGcses';
$label = 'Number Of GCSEs: ';
$options = array( 0 => 'None', 5 => 'Five', 6 => 'Six',
                  7 => 'Seven', 8 => 'Eight', 9 => 'Nine',
                  10 => 'Ten', 11 => 'Eleven', 12 => 'Twelve' );
echo form_label( $label, $id );
echo form_dropdown( $id, $options );
#endregion?>

<?php #region GCSE English Grade
$id = 'gcseEnglishGrade';
$label = 'GCSE English Grade: ';
$data = array(
    'name' => $id,
    'id' => $id,
    'value' => set_value($id)
);
echo form_label( $label, $id );
echo form_input( $data );
#endregion?>

<?php #region GCSE Maths Grade
$id = 'gcseMathsGrade';
$label = 'GCSE Maths Grade: ';
$data = array(
    'name' => $id,
    'id' => $id,
    'value' => set_value($id)
);
echo form_label( $label, $id );
echo form_input( $data );
#endregion?>

<?php #region No Of A Levels
$id = 'noOFALevels';
$label = 'Number Of A Levels: ';
$options = array( 0 => 'None', 5 => 'Five', 6 => 'Six',
                  7 => 'Seven', 8 => 'Eight', 9 => 'Nine',
                  10 => 'Ten', 11 => 'Eleven', 12 => 'Twelve' );
echo form_label( $label, $id );
echo form_dropdown( $id, $options );
#endregion?>

<?php #region UCAS Points
//20 to 280
$id = 'ucasPoints';
$label = 'UCAS Points: ';
$data = array(
    'name' => $id,
    'id' => $id,
    'value' => set_value($id)
);
echo form_label( $label, $id );
echo form_input( $data );
#endregion?>

<?php #region Student Status
$id = 'studentStatus';
$label = 'Student Status: ';
$options = array(
    1 => 'Status 1',
    2 => 'Status 2',
    3 => 'Status 3'
);
echo form_label( $label, $id );
echo form_dropdown( $id, $options );
#endregion?>

<?php #region Mobile
$id = 'mobile';
$label = 'Mobile: ';
$data = array(
    'name' => $id,
    'id' => $id,
    'value' => set_value($id)
);
echo form_label( $label, $id );
echo form_input( $data );
#endregion?>

<?php #region Land Line
$id = 'landLine';
$label = 'Land Line: ';
$data = array(
    'name' => $id,
    'id' => $id,
    'value' => set_value($id)
);
echo form_label( $label, $id );
echo form_input( $data );
#endregion?>

<?php #region DOB
//20 to 280
$id = 'dob';
$label = 'Date Of Birth: ';
$data = array(
    'name' => $id,
    'id' => $id,
    'value' => set_value($id)
);
echo form_label( $label, $id );
echo form_input( $data );
#endregion?>

<?php #region Penalty Points
$id = 'penaltyPoints';
$label = 'Penalty Points: ';
$data = array(
    'name' => $id,
    'id' => $id,
    'value' => set_value($id)
);
echo form_label( $label, $id );
echo form_input( $data );
#endregion?>

<?php
echo form_submit( 'submit-curriculum', 'Submit!' );
?>
<?= form_close(); ?>