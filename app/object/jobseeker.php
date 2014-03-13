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

        $this->addressLine1 = $data['addressLine1'];
        $this->addressLine2 = $data['addressLine2'];
        $this->town = $data['town'];
        $this->postcode = $data['postcode'];
        $this->secondEmail = $data['secondEmail'];
        $this->personalUrl = $data['personalUrl'];
        $this->photo = $data['photo'];
        $this->female = $data['female'];
        $this->postcodeStart = $data['postcodeStart'];
        $this->authorityToWorkStatement = $data['authorityToWorkStatement'];
        $this->contactPreference = $data['contactPreference'];
        $this->EducationLevels_idEducationLevel = $data['educationLevel'];
        $this->noOfGcses = $data['noOfGcses'];
        $this->gcseEnglishGrade = $data['gcseEnglishGrade'];
        $this->gcseMathsGrade = $data['gcseMathsGrade'];
        $this->fiveOrMoreGcses = $data['fiveOrMoreGcses'];
        $this->noOfALevels = $data['noOfALevels'];
        $this->ucasPoints = $data['ucasPoints'];
        $this->studentStatus = $data['studentStatus'];
        $this->mobile = $data['mobile'];
        $this->landline = $data['landline'];
        $this->dob = $data['dob'];
        $this->penaltyPoints = $data['penaltyPoints'];

    }

} 