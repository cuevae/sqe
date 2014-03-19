<?php
/**
 * Created by PhpStorm.
 * User: manei
 * Date: 19/03/14
 * Time: 20:51
 */

$this->load->helper( 'url' );

?>

    <h3>Add a new job sector</h3>

<?php if ( isset( $_error ) && !empty( $_error ) ): ?>
    <div class="error">
        <p><?= $_error; ?></p>
    </div>
<?php endif; ?>

<?= validation_errors(); ?>

<?php
//Start the form
$attributes = array( 'class' => 'sectors-form', 'id' => 'sectors-add' );
$action = 'sectors/add';
echo form_open_multipart( $action, $attributes );
?>

<?php #region Skill Name
$id = 'sectorTitle';
$label = 'Sector Title: ';
$data = array(
    'name' => $id,
    'id' => $id,
);
echo form_label( $label, $id );
echo form_input( $data );
#endregion
?>
    <br/>
<?php
echo form_submit( 'submit-sector', 'Add' );
?>
<?= form_close(); ?>

    <h3>Current job sectors</h3>

<?php if ( !isset( $_sectors ) || empty( $_sectors ) ) : ?>
    <p>You have no sectors added. Please use the form above to start adding.</p>
<?php else : ?>
    <ul>
        <?php foreach ( $_sectors as $_sector ): ?>
            <li>
                <?= $_sector->getSectorTitle(); ?> <a
                    href="<?= site_url( 'sectors/delete/' . $_sector->getIdSectors() ) ?>">(x)</a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>