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

<?php
//Start the form
$attributes = array( 'class' => 'cv-form', 'id' => 'cv-add' );
$action = 'cv/add/';
echo form_open( $action, $attributes );
?>

<?php
//Name
$data = array(
    'name' => 'username',
    'id' => 'username',
    'value' => set_value( 'username' ),
    'maxlength' => '100',
    'size' => '50',
    'style' => 'width:50%',
);
echo form_label( 'Username', 'username' );
echo form_input( $data );
?>

<?php
//Password
$data = array(
    'name' => 'password',
    'id' => 'password',
    'value' => '',
    'maxlength' => '100',
    'size' => '50',
    'style' => 'width:50%',
);
echo form_label( 'Password', 'password' );
echo form_password( $data );
?>

<?php
//Title
$options = array(
    'mr' => 'Mr.',
    'mrs' => 'Mrs.',
    'miss' => 'Ms.',
    'lord' => 'Lord',
);
echo form_label( 'Title', 'title' );
echo form_dropdown( 'title', $options, '' );
?>

<?php
//Forename1
$data = array(
    'name' => 'forename1',
    'id' => 'forename1',
    'value' => set_value('forename1'),
    'maxlength' => '100',
    'size' => '50',
    'style' => 'width:50%',
);
echo form_label( 'Forename', 'forename1' );
echo form_password( $data );
?>

<?php
//Forename2
$data = array(
    'name' => 'forename2',
    'id' => 'forename2',
    'value' => set_value('forename2'),
    'maxlength' => '100',
    'size' => '50',
    'style' => 'width:50%',
);
echo form_label( 'Forename2', 'forename2' );
echo form_password( $data );
?>

<?php
//Surname
$data = array(
    'name' => 'surname',
    'id' => 'surname',
    'value' => set_value('surname'),
    'maxlength' => '100',
    'size' => '50',
    'style' => 'width:50%',
);
echo form_label( 'Surname', 'surname' );
echo form_password( $data );
?>

<?php
echo form_submit( 'submit-cv', 'Submit!' );
?>