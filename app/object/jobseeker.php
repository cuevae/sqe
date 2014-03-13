<?php
/**
 * Created by PhpStorm.
 * User: manei
 * Date: 05/03/14
 * Time: 13:07
 */

class Jobseeker extends Person
{

    public $addressLine1;
    public $addressLine2;
    public $town;
    public $postcode;
    public $secondEmail;
    public $personalUrl;
    public $photo;
    public $female;
    public $postcodeStart;
    public $authorityToWorkStatement;
    public $contactPreference;
    /** @var  Education_Level[] $educationLevels */
    public $EducationLevels_idEducationLevel;
    public $noOfGcses;
    public $gcseEnglishGrade;
    public $gcseMathsGrade;
    public $fiveOrMoreGcses;
    public $noOfALevels;
    public $ucasPoints;
    public $studentStatus;
    public $mobile;
    public $landline;
    public $dob;
    public $penaltyPoints;

    public function __construct( array $data )
    {
        parent::__construct( $data );

        foreach ( $data as $key => $value ) {
            if ( property_exists( $this, $key ) ) {
                $this->$key = $value;
            }
        }
    }

} 