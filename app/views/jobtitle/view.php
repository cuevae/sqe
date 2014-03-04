<?php
/**
 * Created by PhpStorm.
 * User: manei
 * Date: 04/03/14
 * Time: 14:49
 */
?>

<?php foreach ( $jobTitles as $item ): ?>

    <h2><?php echo $item['jobTitle'] ?></h2>

<?php endforeach ?>

Please fill the form to filter

<?php echo form_open('jobtitle/viewone'); ?>

<?php
//Name
$data = array(
    'name' => 'query',
    'id' => 'query',
    'value' => '',
    'maxlength' => '100',
    'size' => '50',
    'style' => 'width:50%',
);
echo form_label( 'Query', 'query' ), " ";
echo form_input( $data );
?>

<?php
echo form_submit( 'submit-query', 'Submit!' );
?>

<?php echo form_close(); ?>