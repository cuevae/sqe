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
    public $EducationLevels_idEducationLevel;
    public $noOfGcses;
    public $gcseEnglishGrade;
    public $gcseMathsGrade;
    public $fiveOrMoreGcses;
    public $noOfAlevels;
    public $ucasPoints;
    public $studentStatus;
    public $mobile;
    public $landline;
    public $dob;
    public $penaltyPoints;

    protected $educationLevel;
    protected $skills;

    public function __construct( array $data )
    {
        parent::__construct( $data );

        foreach ( $data as $key => $value ) {
            if ( property_exists( $this, $key ) ) {
                $this->$key = $value;
            }
        }
    }

    public function getAuthorityToWorkStatement( $htmlSafe = true )
    {
        $result = $this->authorityToWorkStatement;

        if ( $htmlSafe ) {
            $result = $this->sanitizeForHtmlOutput( $result );
        }

        return $result;
    }

    public function getFullAddress( $htmlSafe = true )
    {
        $result = '';
        $result .= $this->addressLine1;
        $extraElements = [ 'addressLine2', 'postcode', 'town' ];
        foreach ( $extraElements as $element ) {
            if ( property_exists( $this, $element ) && !empty( $this->$element ) ) {
                $result .= "\n" . $this->$element;
            }
        }

        if ( $htmlSafe ) {
            $result = $this->sanitizeForHtmlOutput( $result );
        }

        return $result;
    }


    public function getLandline( $htmlSafe = true )
    {
        $result = $this->landline;
        if ( $htmlSafe ) {
            $result = $this->sanitizeForHtmlOutput( $result );
        }

        return $result;
    }

    public function getMobile( $htmlSafe = true )
    {
        $result = $this->mobile;
        if ( $htmlSafe ) {
            $result = $this->sanitizeForHtmlOutput( $result );
        }

        return $result;
    }

    public function getPersonalUrl( $htmlSafe = true )
    {
        $result = $this->personalUrl;
        if ( $htmlSafe ) {
            $result = $this->sanitizeForHtmlOutput( $result );
        }

        return $result;
    }

    public function getSecondEmail( $htmlSafe = true )
    {
        $result = $this->secondEmail;
        if ( $htmlSafe ) {
            $result = $this->sanitizeForHtmlOutput( $result );
        }

        return $result;
    }

    public function getContactPreference( $htmlSafe = true )
    {
        $result = $this->contactPreference;
        if ( $htmlSafe ) {
            $result = $this->sanitizeForHtmlOutput( $result );
        }

        return $result;
    }

    public function getEducationLevelId()
    {
        return $this->EducationLevels_idEducationLevel;
    }

    public function getEducationLevel( $htmlSafe = true )
    {
        $result = $this->educationLevel;
        if ( $htmlSafe ) {
            $result = $this->sanitizeForHtmlOutput( $result );
        }

        return $result;
    }

    public function getNoOfGcses( $htmlSafe = true )
    {
        $result = $this->noOfGcses;
        if ( $htmlSafe ) {
            $result = $this->sanitizeForHtmlOutput( $result );
        }

        return $result;
    }

    public function getAddressLine1( $htmlSafe = true )
    {
        $result = $this->addressLine1;
        if ( $htmlSafe ) {
            $result = $this->sanitizeForHtmlOutput( $result );
        }

        return $result;
    }

    public function getAddressLine2( $htmlSafe = true )
    {
        $result = $this->addressLine2;
        if ( $htmlSafe ) {
            $result = $this->sanitizeForHtmlOutput( $result );
        }

        return $result;
    }

    public function getTown( $htmlSafe = true )
    {
        $result = $this->town;
        if ( $htmlSafe ) {
            $result = $this->sanitizeForHtmlOutput( $result );
        }

        return $result;
    }

    public function getPostcode( $htmlSafe = true )
    {
        $result = $this->postcode;
        if ( $htmlSafe ) {
            $result = $this->sanitizeForHtmlOutput( $result );
        }

        return $result;
    }

    public function getFemale( $htmlSafe = true )
    {
        $result = $this->female;
        if ( $htmlSafe ) {
            $result = $this->sanitizeForHtmlOutput( $result );
        }

        return $result;
    }

    public function getDob()
    {
        return $this->dob;
    }

    public function isFemale()
    {
        return $this->female == 1;
    }

    public function isMale()
    {
        return !$this->isFemale();
    }

    public function getGcseEnglishGrade( $htmlSafe = true )
    {
        $result = $this->gcseEnglishGrade;
        if ( $htmlSafe ) {
            $result = $this->sanitizeForHtmlOutput( $result );
        }

        return $result;
    }

    public function getGcseMathsGrade( $htmlSafe = true )
    {
        $result = $this->gcseMathsGrade;
        if ( $htmlSafe ) {
            $result = $this->sanitizeForHtmlOutput( $result );
        }

        return $result;
    }

    public function getNoOfAlevels( $htmlSafe = true )
    {
        $result = $this->noOfAlevels;
        if ( $htmlSafe ) {
            $result = $this->sanitizeForHtmlOutput( $result );
        }

        return $result;
    }

    public function getUcasPoints( $htmlSafe = true )
    {
        $result = $this->ucasPoints;
        if ( $htmlSafe ) {
            $result = $this->sanitizeForHtmlOutput( $result );
        }

        return $result;
    }

    public function getPenaltyPoints( $htmlSafe = true )
    {
        $result = $this->penaltyPoints;
        if ( $htmlSafe ) {
            $result = $this->sanitizeForHtmlOutput( $result );
        }

        return $result;
    }

    public function getStudentStatus( $htmlSafe = true )
    {
        $result = $this->studentStatus;
        if ( $htmlSafe ) {
            $result = $this->sanitizeForHtmlOutput( $result );
        }

        return $result;
    }

    public function getSkills()
    {
        return $this->skills;
    }
}