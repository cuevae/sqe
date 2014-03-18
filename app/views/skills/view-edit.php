<?php
?>

<h3>Your skills</h3>

<?= validation_errors(); ?>

<?php
//Start the form
$attributes = array( 'class' => 'curriculum-form', 'id' => 'curriculum-edit' );
$action = 'curriculum/edit/'.$_idUser;
echo form_open_multipart( $action, $attributes );
?>

<?php #region Username
$id = 'username';
echo form_hidden( $id, $_jobseeker->getUsername() );
#endregion ?>

<<?php #region Land Line
$id = 'skillName';
$label = 'Skill Name: ';
$data = array(
    'name' => $id,
    'id' => $id,
    'value' => $_jobseeker->getLandline()
);
echo form_label( $label, $id );
echo form_input( $data );
#endregion?>
<br/>
<?php
echo form_submit( 'submit-curriculum', 'Submit!' );
?>
<?= form_close(); ?>