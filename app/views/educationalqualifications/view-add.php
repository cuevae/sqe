<?php
$this->load->helper( 'url' );
?>

    <h3>Add a new educational qualifications</h3>

<?php if ( isset( $_error ) && !empty( $_error ) ): ?>
    <div class="error">
        <p><?= $_error; ?></p>
    </div>
<?php endif; ?>

<?= validation_errors(); ?>

<?php
//Start the form
$attributes = array( 'class' => 'educationalqualifications-form', 'id' => 'educationalqualifications-add' );
$action = 'educationalqualifications/add';
echo form_open( $action, $attributes );
?>

<?php
$id = 'qualificationType';
$label = 'Qualification Type: ';
$data = array(
    'name' => $id,
    'id' => $id,
    'max_length' => 16
);
echo form_label( $label, $id );
echo form_input( $data );
?>
    <br/>
<?php
$id = 'courseName';
$label = 'Course Name: ';
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
$id = 'EducationLevels_idEducationLevel';
$label = 'Education Level: ';
echo form_label( $label, $id );
echo form_dropdown( $id, $_educationLevels );
?>
    <br/>
<?php
$id = 'vocational';
$label = 'Vocational: ';
$data = array(
    'name' => $id,
    'id' => $id,
    'value' => '1',
    'checked' => TRUE
);
echo form_label( $label, $id );
echo form_checkbox( $data );
?>
    <br/>
<?php
$id = 'mainSubject';
$label = 'Main Subject: ';
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
$id = 'nameOfInstitutions';
$label = 'Name of Institutions: ';
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
$id = 'country';
$label = 'Country: ';
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
    'max_length' => 45,
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
$id = 'thesesTitle';
$label = 'Thesis title: ';
$data = array(
    'name' => $id,
    'id' => $id,
    'max_length' => 200
);
echo form_label( $label, $id );
echo form_input( $data );
?>
    <br/>
<?php
echo form_submit( 'submit-educationalqualifications', 'Add' );
?>
<?= form_close(); ?>

    <h3>Current educational qualifications</h3>

<?php if ( !isset( $_educationalQualifications ) || empty( $_educationalQualifications ) ) : ?>
    <p>You have no educational qualifications added. Please use the form above to start adding.</p>
<?php else : ?>
    <ol>
        <?php foreach ( $_educationalQualifications as $_qualification ): ?>
            <li>
                <p><?= $_qualification->getQualificationFullName(); ?> <a
                        href="<?= site_url( 'educationalqualifications/delete/' . $_qualification->getId() ) ?>">(x)</a>

                <div>
                    <ul>
                        <?php $var = $_qualification->getEducationLevelName() ?>
                        <?php if ( !empty( $var ) ) : ?>
                            <li>
                                Education level: <?= $var ?>
                            </li>
                            <?php unset( $var ); endif; ?>
                        <li>
                            Vocational: <?= $_qualification->getVocational() ? 'Yes' : 'No' ?>
                        </li>
                        <?php $var = $_qualification->getMainSubject() ?>
                        <?php if ( !empty( $var ) ) : ?>
                            <li>
                                Main subject: <?= $var ?>
                            </li>
                            <?php unset( $var ); endif; ?>
                        <?php $var = $_qualification->getNameOfInstitutions() ?>
                        <?php if ( !empty( $var ) ) : ?>
                            <li>
                                Name of institutions: <?= $var ?>
                            </li>
                            <?php unset( $var ); endif; ?>
                        <?php $var = $_qualification->getCountry() ?>
                        <?php if ( !empty( $var ) ) : ?>
                            <li>
                                Country: <?= $var ?>
                            </li>
                            <?php unset( $var ); endif; ?>
                        <?php $var = $_qualification->getResult() ?>
                        <?php if ( !empty( $var ) ) : ?>
                            <li>
                                Result: <?= $var ?>
                            </li>
                            <?php unset( $var ); endif; ?>
                        <?php $var = $_qualification->getThesesTitle() ?>
                        <?php if ( !empty( $var ) ) : ?>
                            <li>
                                Thesis title: <?= $var ?>
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