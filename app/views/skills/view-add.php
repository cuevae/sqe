<?php
?>

    <h3>Add new skill</h3>

<?php if ( isset( $_error ) && !empty( $_error ) ): ?>
    <div>
        <p><?= $_error ?></p>
    </div>
<?php elseif ( isset( $_success ) && !empty( $_success ) ): ?>
    <div>
        <p><?= $_success ?></p>
    </div>
<?php endif; ?>

<?php
//Start the form
$attributes = array( 'class' => 'curriculum-form', 'id' => 'curriculum-edit' );
$action = 'skills/add/';
echo form_open( $action, $attributes );
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
echo form_submit( 'submit-skill', 'Add', "class=btn btn-success btn-large"  );
?>
<?= form_close(); ?>

    <h3>Current skills</h3>

<?php if ( !isset( $_skills ) || empty( $_skills ) ) : ?>
    <p>You have no skills added. spanPlease use the form to start adding.</p>
<?php else : ?>
    <ul>
        <?php foreach ( $_skills as $_skill ): ?>
            <li>
                <?= $_skill->getSkillName(); ?> [<?= $_skill->getSkillLevel(); ?>] <a
                    href="<?= site_url( 'skills/delete/' . $_skill->getId() ) ?>">(x)</a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>