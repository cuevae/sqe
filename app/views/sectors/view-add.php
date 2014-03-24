<h3>Add a new job sector</h3>

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
$attributes = array( 'class' => 'sectors-form', 'id' => 'sectors-add' );
$action = 'sectors/add';
echo form_open( $action, $attributes );
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
echo form_submit( 'submit-sector', 'Add', "class=btn btn-success btn-large"  );
?>
<?= form_close(); ?>

    <h3>Current job sectors</h3>

<?php if ( !isset( $_sectors ) || empty( $_sectors ) ) : ?>
    <p>You have no sectors added. spanPlease use the form to start adding.</p>
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