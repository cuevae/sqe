<h3>Add a new professional qualifications</h3>

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
$attributes = array( 'class' => 'professionalqualifications-form', 'id' => 'professionalqualifications-add' );
$action = 'professionalqualifications/add';
echo form_open( $action, $attributes );
?>

<?php
$id = 'qualificationName';
$label = 'Qualification Name: ';
$data = array(
    'name' => $id,
    'id' => $id,
    'max_length' => 100
);
echo form_label( $label, $id );
echo form_input( $data );
?>
<br/>
<?php
$id = 'Sectors_idSectors';
$label = 'Sector: ';
echo form_label( $label, $id );
echo form_dropdown( $id, $_sectors );
?>
<br/>
<?php
$id = 'otherSector';
$label = 'Other Sector: ';
$data = array(
    'name' => $id,
    'id' => $id,
    'max_length' => 45
);
echo form_label( $label, $id );
echo form_input( $data );
?>
<br/>
<?php
$id = 'awardingBody';
$label = 'Awarding Body: ';
$data = array(
    'name' => $id,
    'id' => $id,
    'max_length' => 45
);
echo form_label( $label, $id );
echo form_input( $data );
?>
<br/>
<?php
$id = 'yearObtained';
$label = 'Year Obtained: ';
$data = array(
    'name' => $id,
    'id' => $id,
    'max_length' => 45
);
echo form_label( $label, $id );
echo form_dropdown( $id, array_reverse( array_combine( range( 1920, date( 'Y' ) ), range( 1920, date( 'Y' ) ) ) ), date( 'Y' ) );
?>
<br/>
<?php
$id = 'result';
$label = 'Result: ';
$data = array(
    'name' => $id,
    'id' => $id,
    'max_length' => 20
);
echo form_label( $label, $id );
echo form_input( $data );
?>
<br/>
<?php
echo form_submit( 'submit-professionalqualifications', 'Add' );
?>
<?= form_close(); ?>

<h3>Current professional qualifications</h3>

<?php if ( !isset( $_professionalQualifications ) || empty( $_professionalQualifications ) ) : ?>
    <p>You have no professional qualifications added. Please use the form above to start adding.</p>
<?php else : ?>
    <ol>
        <?php foreach ( $_professionalQualifications as $_qualification ): ?>
            <li>
                <p><?= $_qualification->getQualificationName(); ?> <a
                        href="<?= site_url( 'professionalqualifications/delete/' . $_qualification->getId() ) ?>">(x)</a>

                <div>
                    <ul>
                        <?php $var = $_qualification->getSector() ?>
                        <?php if ( !empty( $var ) ) : ?>
                            <li>
                                Sector: <?= $var ?>
                            </li>
                            <?php unset( $var ); endif; ?>
                        <?php $var = $_qualification->getOtherSector() ?>
                        <?php if ( !empty( $var ) ) : ?>
                            <li>
                                Other sector: <?= $var ?>
                            </li>
                            <?php unset( $var ); endif; ?>
                        <?php $var = $_qualification->getAwardingBody() ?>
                        <?php if ( !empty( $var ) ) : ?>
                            <li>
                                Awarding body: <?= $var ?>
                            </li>
                            <?php unset( $var ); endif; ?>
                        <?php $var = $_qualification->getYearObtained() ?>
                        <?php if ( !empty( $var ) ) : ?>
                            <li>
                                Year obtained: <?= $var ?>
                            </li>
                            <?php unset( $var ); endif; ?>
                        <?php $var = $_qualification->getResult() ?>
                        <?php if ( !empty( $var ) ) : ?>
                            <li>
                                Result: <?= $var ?>
                            </li>
                            <?php unset( $var ); endif; ?>
                        <li>
                            Verified: <?= $_qualification->getVerified() ? 'Yes' : 'No' ?>
                        </li>
                        <?php $var = $_qualification->getHowVerified() ?>
                        <?php if ( !empty( $var ) ) : ?>
                            <li>
                                How verified: <?= $var ?>
                            </li>
                            <?php unset( $var ); endif; ?>
                    </ul>
                </div>
            </li>
        <?php endforeach; ?>
    </ol>
<?php endif; ?>