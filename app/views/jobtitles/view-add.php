<?php
/**
 * Created by PhpStorm.
 * User: manei
 * Date: 19/03/14
 * Time: 20:51
 */

$this->load->helper( 'url' );

?>

    <h3>Add a new job title</h3>

<?php if ( isset( $_error ) && !empty( $_error ) ): ?>
    <div class="error">
        <p><?= $_error; ?></p>
    </div>
<?php endif; ?>

<?= validation_errors(); ?>

<?php
//Start the form
$attributes = array( 'class' => 'jobtitles-form', 'id' => 'jobtitles-add' );
$action = 'jobtitles/add';
echo form_open_multipart( $action, $attributes );
?>

<?php #region Skill Name
$id = 'jobTitle';
$label = 'Job Title: ';
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
$id = 'Sectors_idSectors';
$label = 'Sector: ';
echo form_label( $label, $id );
echo form_dropdown( $id, $_sectors );
#endregion
?>
    <br/>
<?php
echo form_submit( 'submit-jobtitle', 'Add' );
?>
<?= form_close(); ?>

    <h3>Current job titles</h3>

<?php if ( !isset( $_jobtitlesBySector ) || empty( $_jobtitlesBySector ) ) : ?>
    <p>You have no job titles added. Please use the form above to start adding.</p>
<?php else : ?>
    <ul>
        <?php foreach ( $_jobtitlesBySector as $sector => $_jobtitles ): ?>
            <li><?= $sector; ?>
                <ol>
                    <?php foreach ($_jobtitles as $_jobtitle): ?>
                    <li>
                        <?= $_jobtitle->getJobTitle(); ?> <a
                            href="<?= site_url( 'jobtitles/delete/' . $_jobtitle->getId() ) ?>">(x)</a>
                        <?php endforeach; ?>
                    </li>
                </ol>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>