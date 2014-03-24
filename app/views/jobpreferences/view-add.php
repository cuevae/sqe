<h3>Add a new job preferences</h3>

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
$attributes = array( 'class' => 'preferences-form', 'id' => 'preference-add' );
$action = 'jobpreferences/add';
echo form_open( $action, $attributes );
?>

<?php
echo form_label( 'Job preference', 'JobTitles_idJobTitles' );
echo form_dropdown( 'JobTitles_idJobTitles', $_jobTitleOptions );
?>
<br/>
<?php
echo form_submit( 'submit-preference', 'Add', "class=btn btn-success btn-large" );
?>
<?= form_close(); ?>

<h3>Current job preferences</h3>

<?php if ( !isset( $_preferences ) || empty( $_preferences ) ) : ?>
    <p>You have no job preferences added. Please use the form above to start adding.</p>
<?php else : ?>
    <ul>
        <?php foreach ( $_preferences as $_preference ): ?>
            <li>
                <?= $_preference->getJobTitleFullName(); ?> <a
                    href="<?= site_url( 'jobpreferences/delete/' . $_preference->getJobTitleId() ) ?>">(x)</a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>