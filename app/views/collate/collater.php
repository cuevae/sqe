<h3>Search Cv's</h3>

<?php echo form_open( 'collate/collatelist' ); ?>

<?php
echo form_label( 'Sector', 'sector' );
echo form_dropdown( 'sector', array( -1 => '-' ) + $_sectorOptions );
?>
<br/>
<?php
echo form_label( 'Skill Name', 'skill' );
echo form_dropdown( 'skillName', array( -1 => '-' ) + $_skillOptions );
?>
<?php
/*$id = 'verified';
$label = 'Verified only: ';
$data = array(
    'name' => $id,
    'id' => $id,
    'value' => '1',
    'checked' => FALSE
);
echo form_label( $label, $id );
echo form_checkbox( $data );
*/?>
<br/>
<?php
echo form_label( 'Education Level', 'educationLevel' );
echo form_dropdown( 'educationLevel', array( -1 => '-' ) + $_edLevelOptions );
?>
<br/>
<?php
$_gcsePassOptions = array( 1, 2, 3, 4, 5, 6, 7, 8, 9 );
echo form_label( 'Numer of GCSE pass', 'noGcsePass' );
echo form_dropdown( 'noGcsePass', array( -1 => '-' ) + $_gcsePassOptions );
?>
<br/>
<?php
echo form_label( 'Educational Qualification', 'educationalQualification' );
echo form_dropdown( 'educationalQualification', array( -1 => '-' ) + $_edQualificationOptions );
?>
<br/>
<?php
echo form_label( 'Professional Qualification', 'professionalQualification' );
echo form_dropdown( 'professionalQualification', array( -1 => '-' ) + $_professionalQualificationOptions );
?>

<?php
//Title
$options = array(
    '-1' => '-',
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
echo form_submit( 'submit-query', 'Submit!' );
?>

<?php echo form_close(); ?>


