<?php
/**
 * Created by PhpStorm.
 * User: manei
 * Date: 19/03/14
 * Time: 20:51
 */

$this->load->helper( 'url' );

?>

    <h3>Add a new education level</h3>

<?php if ( isset( $_error ) && !empty( $_error ) ): ?>
    <div class="error">
        <p><?= $_error; ?></p>
    </div>
<?php endif; ?>

<?= validation_errors(); ?>

<?php
//Start the form
$attributes = array( 'class' => 'edlevels-form', 'id' => 'edlevels-add' );
$action = 'educationlevels/add';
echo form_open( $action, $attributes );
?>

<?php
$id = 'educationLevel';
$label = 'Education Level: ';
$data = array(
    'name' => $id,
    'id' => $id,
);
echo form_label( $label, $id );
echo form_input( $data );
?>
    <br/>
<?php
echo form_submit( 'submit-edlevel', 'Add' );
?>
<?= form_close(); ?>

    <h3>Current Education Levels</h3>

<?php if ( !isset( $_edLevels ) || empty( $_edLevels ) ) : ?>
    <p>You have no education levels added. Please use the form above to start adding.</p>
<?php else : ?>
    <ul>
        <?php foreach ( $_edLevels as $_edLevel ): ?>
            <li>
                <?= $_edLevel->getEducationLevel(); ?> <a
                    href="<?= site_url( 'educationlevels/delete/' . $_edLevel->getIdEducationLevel() ) ?>">(x)</a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>