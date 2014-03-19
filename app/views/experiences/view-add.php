<?php
?>

    <h3>Add new professional experience</h3>

<?= validation_errors(); ?>

<?php
//Start the form
$attributes = array( 'class' => 'experiences-form', 'id' => 'experience-add' );
$action = 'skills/add/';
echo form_open_multipart( $action, $attributes );
?>

<?php #region Date started
$id = 'dateFinished';
$label = 'Date Finished: ';
$data = array(
    'name' => $id,
    'id' => $id,
);
echo form_label( $label, $id );
echo form_input( $data );
#endregion
?>
<br/>
<?php #region Date finished
$id = 'dateFinished';
$label = 'Date Finished: ';
$data = array(
    'name' => $id,
    'id' => $id,
);
echo form_label( $label, $id );
echo form_input( $data );
#endregion
?>
<br/>
<?php #region jobTitle
$id = 'JobTitles_idJobTitles';
$label = 'Job Title: ';
echo form_label( $label, $id );
echo form_dropdown( $id, $_jobTitleOptions );
#endregion?>
<br/>

<?php #region Other job titles
$id = 'otherJobTitle';
$label = 'Other Job Title: ';
$data = array(
    'name' => $id,
    'id' => $id,
);
echo form_label( $label, $id );
echo form_input( $data );
#endregion
?>
<br/>

<?php #region Key duties
$id = 'keyDuties';
$label = 'Key Duties: ';
$data = array(
    'name' => $id,
    'id' => $id
);
echo form_label( $label, $id );
echo form_textarea( $data );
#endregion?>
<br/>

<?php #region Employement level
$id = 'EmploymentLevels_idLevelsOfEmployment';
$label = 'Employment Level: ';
echo form_label( $label, $id );
echo form_dropdown( $id, $_employmentLevelOptions );
#endregion?>
<br/>

<?php #region Other job titles
$id = 'employerName';
$label = 'Employer Name: ';
$data = array(
    'name' => $id,
    'id' => $id,
    'maxlength' => 45,
);
echo form_label( $label, $id );
echo form_input( $data );
#endregion
?>
<br/>

<?php
echo form_submit( 'submit-experience', 'Add' );
?>
<?= form_close(); ?>

    <h3>Current job experiences</h3>

<?php if ( !isset( $_experiences ) || empty( $_experiences ) ) : ?>
    <p>You have no experiences added. Please use the form above to start adding.</p>
<?php else : ?>
    <ul>
        <?php foreach ( $_experiences as $_experience ): ?>
            <li>
                <div>
                    Experience Here
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
