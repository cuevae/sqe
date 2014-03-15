<?php
/**
 * Created by PhpStorm.
 * User: Adeyeni
 * Date: 05/03/14
 * Time: 11:52
 */
?>
    Search Cv's

<?php echo form_open('collate/collater'); ?>

<?php
//Title
$skillName = array(
    'java' => 'Java',
    'c#' => 'C#',

);
echo form_label('Skill Name', 'skill'), " ";
echo form_dropdown('skill', $skillName, '');
?>

<?php
//Title
$skillLevel = array(
    'basic' => 'Basic',
    'good' => 'Good',
);
echo form_label( 'Skill Level', 'skill' ), " ";
echo form_dropdown( 'skill', $skillLevel, '' );
?>
<br/>

<?php
//Title
$options = array(
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
    'olevel' => 'OLevel',
    'bsc' => 'BSc',
    'msc' => 'MSc . ',
    'phd' => 'Phd',
);
echo form_label( 'Educational Qualification', 'educational_qualification' ), " ";
echo form_dropdown( 'educational_qualification', $qualificationType);
?>
<br/>

<?php
//Title
$qualificationName = array(
    'ccna' => 'CCNA',
    'ccnp' => 'CCNP',
);
echo form_label( 'Professional Qualification', 'professional_qualification' ), " ";
echo form_dropdown( 'professional_qualification', $qualificationName);
?>
<br/>

<?php
//Student Status
$options = array(
    'Full-Time' => 'Full-Time',
    'Part-Time' => 'Part-Time',
    'Not a student' => 'Not a student',

);
echo form_label('Student status', 'studentStatus'), " ";
echo form_dropdown('studentStatus', $options, '');
?>
<br/>

<?php
echo form_submit( 'submit-query', 'Submit!' );
?>

<?php echo form_close(); ?>

<?php if ( isset( $_jobseeker ) ) : ?>
    <?php if ( empty( $_jobseeker ) ) : ?>
        <h3>No results to display</h3>
    <?php else : ?>
        <h3>Found:</h3>
        <?=$_jobseeker->getFullName();?>
        <br/>
        <br/>
        And below the whole jobseeker object
        <br/>
        <br/>
        <?=var_dump( $_jobseeker ); ?>
    <?php endif; ?>
<?php endif; ?>
