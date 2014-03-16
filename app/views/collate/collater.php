<?php
/**
 * Created by PhpStorm.
 * User: Adeyeni
 * Date: 05/03/14
 * Time: 11:52
 */
?>
    Search Cv's

<?php echo form_open('collate/collatelist'); ?>

<?php
//Title
$skillName = array(
    'null' => 'Null ',
    'java' => 'Java',
    'c#' => 'C#',

);
echo form_label('Skill Name', 'skill'), " ";
echo form_dropdown('skillName', $skillName, '');
?>

<?php
//Title
$skillLevel = array(
    'null' => 'Null ',
    'basic' => 'Basic',
    'good' => 'Good',
);
echo form_label( 'Skill Level', 'skill' ), " ";
echo form_dropdown( 'skillLevel', $skillLevel, '' );
?>
<br/>

<?php
//Title
$options = array(
    'null' => 'Null ',
    'no experience' => 'No Experience',
    '1 year' => '1 year',
    '2 years' => '2 years + ',
    '5 years' => '5 years + ',
    'over 10 years' => 'Over 10 years',
);
echo form_label( 'Experience', 'experience' ), " ";
echo form_dropdown( 'experience', $options, '' );
?>
<br/>

<?php
//Title
$qualificationType = array(
    'null' => 'Null ',
    'olevel' => 'OLevel',
    'bsc' => 'BSc',
    'msc' => 'MSc . ',
    'phd' => 'Phd',
);
echo form_label( 'Educational Qualification', 'educational_qualification' ), " ";
echo form_dropdown( 'qualificationType', $qualificationType);
?>
<br/>

<?php
//Title
$qualificationName = array(
    'null' => 'Null ',
    'ccna' => 'CCNA',
    'ccnp' => 'CCNP',
);
echo form_label( 'Professional Qualification', 'professional_qualification' ), " ";
echo form_dropdown( 'qualificationName', $qualificationName);
?>
<br/>


<br/>

<?php
echo form_submit( 'submit-query', 'Submit!' );
?>

<?php echo form_close(); ?>


