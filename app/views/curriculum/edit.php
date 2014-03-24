<?php
/** @var $_jobseeker Jobseeker */
?>

    <div class="container">
        <div class="row clearfix">
            <div class="col-md-12 column">
                <h2>Edit CV</h2>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row clearfix">
            <div class="col-md-12 column">
                <?php if ( isset( $success ) && $success ) : ?>
                    <h3><?= $success ?></h3>
                <?php else : ?>
                    <?= validation_errors(); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="container">
    <div class="row clearfix">
    <div class="col-md-6 column">
        <?php
        //Start the form
        $attributes = array( 'class' => 'curriculum-form', 'id' => 'curriculum-edit' );
        $action = 'curriculum/edit/' . $_idUser;
        echo form_open_multipart( $action, $attributes );
        ?>
        <?php #region Username
        $id = 'username';
        echo form_hidden( $id, $_jobseeker->getUsername() );
        #endregion
        ?>
        <?php #region Title
        $id = 'title';
        $label = 'Title: ';
        $options = array(
            'mr' => 'Mr.',
            'ms' => 'Ms.',
            'mrs' => 'Mrs.',
            'miss' => 'Miss.'
        );
        echo form_label( $label, $id );
        echo form_dropdown( $id, $options, $_jobseeker->getTitle( false ) );
        #endregion
        ?>
        <br/>
        <?php #region Forename1
        $id = 'forename1';
        $label = 'Forename 1: ';
        $data = array(
            'name' => $id,
            'id' => $id,
            'value' => $_jobseeker->getForename1( false ),
        );
        echo form_label( $label, $id );
        echo form_input( $data );
        #endregion
        ?>
        <br/>
        <?php #region Forename2
        $id = 'forename2';
        $label = 'Forename 2: ';
        $data = array(
            'name' => $id,
            'id' => $id,
            'value' => $_jobseeker->getForename2( false ),
        );
        echo form_label( $label, $id );
        echo form_input( $data );
        #endregion
        ?>
        <br/>
        <?php #region Surname
        $id = 'surname';
        $label = 'Surname: ';
        $data = array(
            'name' => $id,
            'id' => $id,
            'value' => $_jobseeker->getSurname( false )
        );
        echo form_label( $label, $id );
        echo form_input( $data );
        #endregion
        ?>
        <br/>
        <?php #region AddressLine1
        $id = 'addressLine1';
        $label = 'Address Line 1: ';
        $data = array(
            'name' => $id,
            'id' => $id,
            'value' => $_jobseeker->getAddressLine1( false )
        );
        echo form_label( $label, $id );
        echo form_input( $data );
        #endregion
        ?>
        <br/>
        <?php #region AddressLine2
        $id = 'addressLine2';
        $label = 'Address Line 2: ';
        $data = array(
            'name' => $id,
            'id' => $id,
            'value' => $_jobseeker->getAddressLine2( false )
        );
        echo form_label( $label, $id );
        echo form_input( $data );
        #endregion
        ?>
        <br/>
        <?php #region Town
        $id = 'town';
        $label = 'Town: ';
        $data = array(
            'name' => $id,
            'id' => $id,
            'value' => $_jobseeker->getTown( false )
        );
        echo form_label( $label, $id );
        echo form_input( $data );
        #endregion
        ?>
        <br/>
        <?php #region Postcode
        $id = 'postcode';
        $label = 'Postcode: ';
        $data = array(
            'name' => $id,
            'id' => $id,
            'value' => $_jobseeker->getPostcode( false )
        );
        echo form_label( $label, $id );
        echo form_input( $data );
        #endregion
        ?>
        <br/>
        <?php #region Second Email
        $id = 'secondEmail';
        $label = 'Alternative Email: ';
        $data = array(
            'name' => $id,
            'id' => $id,
            'value' => $_jobseeker->getSecondEmail( false )
        );
        echo form_label( $label, $id );
        echo form_input( $data );
        #endregion
        ?>
        <br/>
        <?php #region Personal Url
        $id = 'personalUrl';
        $label = 'Website: ';
        $data = array(
            'name' => $id,
            'id' => $id,
            'value' => $_jobseeker->getPersonalUrl( false )
        );
        echo form_label( $label, $id );
        echo form_input( $data );
        #endregion
        ?>
        <br/>
        <?php /*#region Photo
$id = 'photo';
$label = 'Photo: ';
$data = array(
    'name' => $id,
    'id' => $id
);
echo form_label( $label, $id );
echo form_upload( $data );
#endregion*/
        ?>
        <br/>
        <?php #region Male/Female
        $id = 'sex';
        $label = 'Sex: ';
        $options = array(
            'male' => 'Male',
            'female' => 'Female',
        );
        echo form_label( $label, $id );
        echo form_dropdown( $id, $options, $_jobseeker->isFemale() ? 'female' : 'male' );
        #endregion
        ?>
        <br/>
        <?php #region Authority To Work Statement
        $id = 'authorityToWorkStatement';
        $label = 'Authority To Work Statement: ';
        $data = array(
            'name' => $id,
            'id' => $id,
            'value' => $_jobseeker->getAuthorityToWorkStatement( false )
        );
        echo form_label( $label, $id );
        echo form_textarea( $data );
        #endregion
        ?>
        <br/>
        <?php #region Contact Preference
        $id = 'contactPreference';
        $label = 'Contact Preference: ';
        $options = array(
            'Email' => 'Email',
            'Landline' => 'Landline',
            'Mobile' => 'Mobile'
        );
        echo form_label( $label, $id );
        echo form_dropdown( $id, $options, $_jobseeker->getContactPreference() );
        #endregion
        ?>
    </div>
    <div class="col-md-6 column">

        <?php #region Education Level
        $id = 'EducationLevels_idEducationLevel';
        $label = 'Education Level: ';
        echo form_label( $label, $id );
        echo form_dropdown( $id, $_educationLevelOptions, $_jobseeker->getEducationLevelId() );
        #endregion
        ?>
        <br/>
        <?php #region No Of GCSEs
        $id = 'noOfGcses';
        $label = 'Number Of GCSEs: ';
        $options = array( 0 => 'None', 5 => 'Five', 6 => 'Six',
                          7 => 'Seven', 8 => 'Eight', 9 => 'Nine',
                          10 => 'Ten', 11 => 'Eleven', 12 => 'Twelve' );
        echo form_label( $label, $id );
        echo form_dropdown( $id, $options, $_jobseeker->getNoOfGcses() );
        #endregion
        ?>
        <br/>
        <?php #region GCSE English Grade
        $id = 'gcseEnglishGrade';
        $label = 'GCSE English Grade: ';
        $data = array(
            'name' => $id,
            'id' => $id,
            'value' => $_jobseeker->getGcseEnglishGrade( false )
        );
        echo form_label( $label, $id );
        echo form_input( $data );
        #endregion
        ?>
        <br/>
        <?php #region GCSE Maths Grade
        $id = 'gcseMathsGrade';
        $label = 'GCSE Maths Grade: ';
        $data = array(
            'name' => $id,
            'id' => $id,
            'value' => $_jobseeker->getGcseMathsGrade( false )
        );
        echo form_label( $label, $id );
        echo form_input( $data );
        #endregion
        ?>
        <br/>
        <?php #region No Of A Levels
        $id = 'noOfAlevels';
        $label = 'Number Of A Levels: ';
        $options = array( 0 => 'None', 5 => 'Five', 6 => 'Six',
                          7 => 'Seven', 8 => 'Eight', 9 => 'Nine',
                          10 => 'Ten', 11 => 'Eleven', 12 => 'Twelve' );
        echo form_label( $label, $id );
        echo form_dropdown( $id, $options, $_jobseeker->getNoOfAlevels() );
        #endregion
        ?>
        <br/>
        <?php #region UCAS Points
        //20 to 280
        $id = 'ucasPoints';
        $label = 'UCAS Points: ';
        $data = array(
            'name' => $id,
            'id' => $id,
            'value' => $_jobseeker->getUcasPoints()
        );
        echo form_label( $label, $id );
        echo form_input( $data );
        #endregion
        ?>
        <br/>
        <?php #region Student Status
        $id = 'studentStatus';
        $label = 'Student Status: ';
        $options = array(
            1 => 'Full-time',
            2 => 'Part-time',
            3 => 'Not a student'
        );
        echo form_label( $label, $id );
        echo form_dropdown( $id, $options, $_jobseeker->getUcasPoints() );
        #endregion
        ?>
        <br/>
        <?php #region Mobile
        $id = 'mobile';
        $label = 'Mobile: ';
        $data = array(
            'name' => $id,
            'id' => $id,
            'value' => $_jobseeker->getMobile()
        );
        echo form_label( $label, $id );
        echo form_input( $data );
        #endregion
        ?>
        <br/>
        <?php #region Land Line
        $id = 'landline';
        $label = 'Land Line: ';
        $data = array(
            'name' => $id,
            'id' => $id,
            'value' => $_jobseeker->getLandline()
        );
        echo form_label( $label, $id );
        echo form_input( $data );
        #endregion
        ?>
        <br/>
        <?php #region DOB
        //20 to 280
        $id = 'dob';
        $label = 'Date Of Birth: ';
        $data = array(
            'name' => $id,
            'id' => $id,
            'value' => set_value( $id ),
            'class' => 'datepicker',
            'value' => $_jobseeker->getDob()
        );
        echo form_label( $label, $id );
        echo form_input( $data );
        #endregion
        ?>
        <br/>
        <?php #region Penalty Points
        $id = 'penaltyPoints';
        $label = 'Penalty Points: ';
        $data = array(
            'name' => $id,
            'id' => $id,
            'value' => $_jobseeker->getPenaltyPoints()
        );
        echo form_label( $label, $id );
        echo form_input( $data );
        #endregion
        ?>
    </div>
    </div>
    </div>
    <div class="container">
        <div class="row clearfix">
            <div class="col-md-12 column">
                <?php
                echo form_submit( 'submit-curriculum', 'Submit', "class=btn btn-success btn-large" );
                ?>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
