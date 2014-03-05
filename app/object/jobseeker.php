<?php
/**
 * Created by PhpStorm.
 * User: manei
 * Date: 05/03/14
 * Time: 13:07
 */

class Jobseeker_Object extends Person_Object
{

    private $addressLine1;
    private $addressLine2;
    private $town;
    private $postcode;
    private $secondEmail;
    private $personalUrl;
    private $photo;
    private $female;
    private $postcodeStart;
    private $authorityToWorkStatement;
    private $contactPreference;
    /** @var  Education_Level[] $educationLevels */
    private $educationLevels;
    private $noOfGcses;
    private $gcseEnglishGrade;
    private $gcseMathsGrade;
    private $fiveOrMoreGcses;
    private $noOfALevels;
    private $ucasPoints;
    private $studentStatus;
    private $mobile;
    private $landline;
    private $dob;
    private $penaltyPoints;

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
        $this->educationLevels = $data['educationLevels'];
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