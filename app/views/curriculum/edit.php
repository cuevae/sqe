<?php
/**
 * Created by PhpStorm.
 * User: manei
 * Date: 03/03/14
 * Time: 17:44
 */
?>

    <h2>Add a CV</h2>
<?php if ( isset( $success ) && $success ) : ?>
    <h3><?= $success ?></h3>
<?php else : ?>
    <?= validation_errors(); ?>
<?php endif; ?>