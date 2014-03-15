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


    public function getFullName( $html = true )
    {
        $result = '';
        if ( !empty( $this->title ) ) {
            $result .= ucfirst( strtolower( $this->title ) ) . ', ';
        }
        $result .= ucfirst( strtolower( $this->forename1 ) );
        if ( !empty( $this->forename2 ) ) {
            $result .= ' ' . ucfirst( $this->forename2[0] ) . '. ';
        }
        $result .= ' ' . ucfirst( strtolower( $this->surname ) );

        if ( $html ) {
            $result = $this->sanitizeForHtmlOutput( $result );
        }

        return $result;
    }

    public function getAuthorityToWorkStatement( $html = true )
    {
        $result = $this->authorityToWorkStatement;

        if ( $html ) {
            $result = $this->sanitizeForHtmlOutput( $result );
        }

        return $result;
    }

    public function getFullAddress( $html = true )
    {
        $result = '';
        $result .= $this->addressLine1;
        $extraElements = [ 'addressLine2', 'postcode', 'town' ];
        foreach( $extraElements as $element ){
            if ( property_exists( $this, $element ) && !empty( $this->$element ) ) {
                $result .= "\n" . $this->$element;
            }
        }

        if ( $html ) {
            $result = $this->sanitizeForHtmlOutput( $result );
        }

        return $result;
    }


    public function getLandline( $html = true )
    {
        $result = $this->landline;
        if ( $html ) {
            $result = $this->sanitizeForHtmlOutput( $result );
        }

        return $result;
    }

    public function getMobile( $html = true )
    {
        $result = $this->mobile;
        if ( $html ) {
            $result = $this->sanitizeForHtmlOutput( $result );
        }

        return $result;
    }

    public function getPersonalUrl( $html = true )
    {
        $result = $this->personalUrl;
        if ( $html ) {
            $result = $this->sanitizeForHtmlOutput( $result );
        }

        return $result;
    }

    private function sanitizeForHtmlOutput( $text )
    {
        return nl2br( htmlentities( htmlspecialchars( $text , ENT_COMPAT, 'UTF-8' ) ) );
    }

} 