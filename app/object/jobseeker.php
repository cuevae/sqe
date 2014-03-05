<?php
/**
 * Created by PhpStorm.
 * User: manei
 * Date: 05/03/14
 * Time: 13:07
 */

class Jobseeker_Object extends Person_Object
{

    protected $addressLine1;
    protected $addressLine2;
    protected $town;
    protected $postcode;
    protected $secondEmail;
    protected $personalUrl;
    protected $photo;
    protected $female;
    protected $postcodeStart;
    protected $authorityToWorkStatement;
    protected $contactPreference;
    /** @var  Education_Level[] $educationLevels */
    protected $educationLevels;
    protected $noOfGcses;
    protected $gcseEnglishGrade;
    protected $gcseMathsGrade;
    protected $fiveOrMoreGcses;
    protected $noOfALevels;
    protected $ucasPoints;
    protected $studentStatus;
    protected $mobile;
    protected $landline;
    protected $dob;
    protected $penaltyPoints;

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