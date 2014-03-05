<?php
/**
 * Created by PhpStorm.
 * User: mypc
 * Date: 04/03/14
 * Time: 12:44
 */
?>

<h2>My SignUp Form</h2>
<?= validation_errors(); ?>

<?php
//Start the form
$attributes = array( 'class' => 'curriculum-form', 'id' => 'curriculum-add' );
$action = 'signup/newuser/';
echo form_open( $action, $attributes );
?>
    <br/>
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
echo form_label( 'Username', 'username' ), " ";
echo form_input( $data );
?>
    <br/>
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
echo form_label( 'Password', 'password' ), " ";
echo form_password( $data );
?>
    <br/>
<?php
//Title
$options = array(
    'mr' => 'Mr.',
    'mrs' => 'Mrs.',
    'miss' => 'Ms.',
    'lord' => 'Lord',
);
echo form_label( 'Title', 'title' ), " ";
echo form_dropdown( 'title', $options, '' );
?>
    <br/>
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
echo form_label( 'Forename', 'forename1' ), " ";
echo form_password( $data );
?>
    <br/>
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
echo form_label( 'Forename2', 'forename2' ), " ";
echo form_password( $data );
?>
    <br/>
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
echo form_label( 'Surname', 'surname' ), " ";
echo form_password( $data );
?>
    <br/>
<?php
echo form_submit( 'submit-curriculum', 'Submit!' );
?>

<?= form_close(); ?>