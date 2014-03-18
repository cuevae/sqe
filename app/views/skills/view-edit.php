<?php
?>

    <h3>Add new skill</h3>

<?= validation_errors(); ?>

<?php
//Start the form
$attributes = array( 'class' => 'curriculum-form', 'id' => 'curriculum-edit' );
$action = 'skills/add/';
echo form_open_multipart( $action, $attributes );
?>

<?php #region Skill Name
$id = 'skillName';
$label = 'Skill Name: ';
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
$id = 'skillLevel';
$label = 'Level: ';
$options = array(
    'Basic' => 'Basic',
    'Good' => 'Good',
    'Excellent' => 'Excellent',
);
echo form_label( $label, $id );
echo form_dropdown( $id, $options );
#endregion
?>
    <br/>
<?php
echo form_submit( 'submit-skill', 'Add' );
?>
<?= form_close(); ?>

    <h3>Current skills</h3>

<?php if ( !isset( $_skills ) || empty( $_skills ) ) : ?>
    <p>You have no skills added. Please use the form above to start adding.</p>
<?php else : ?>
    <ul>
        <?php foreach ( $_skills as $_skill ): ?>
            <li>
                <?= $_skill->getSkillName(); ?> [<?= $_skill->getSkillLevel(); ?>] <?= $_skill->getVerified(); ?>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>