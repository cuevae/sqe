<?php
/**
 * Created by PhpStorm.
 * User: manei
 * Date: 18/03/14
 * Time: 23:46
 */

class Experience extends Base
{

    var $idExperience;
    var $Persons_idUser;
    var $dateStarted;
    var $dateFinished;
    var $JobTitles_idJobTitles;
    var $otherJobTitle;
    var $keyDuties;
    var $EmploymentLevels_idLevelsOfEmployment;
    var $employerName;
    var $verified;
    var $howVerified;

    private $jobTitle;
    private $jobSector;

    protected $requiredFields = array( 'Persons_idUser', 'dateStarted', 'JobTitles_idJobTitle' );

    public function getExperienceId()
    {
        return $this->idExperience;
    }

    public function getIdUser()
    {
        return $this->Persons_idUser;
    }

    public function getDateStarted( $format = 'Y-m-d' )
    {
        $date = date( $format, strtotime( $this->dateStarted ) );
        if ( $date === false ) {
            $date = date( 'Y-m-d', strtotime( $this->dateStarted ) );
        }

        return $date;
    }

    public function getDateFinished( $format = 'Y-m-d' )
    {
        $date = $this->dateFinished;
        if ( !empty( $this->dateFinished ) ) {
            $date = date( $format, strtotime( $this->dateFinished ) );
            if ( $date === false ) {
                $date = date( 'Y-m-d', strtotime( $this->dateStarted ) );
            }
        }

        return $date;
    }

    public function getJobTitle( $htmlSafe = true )
    {
        $result = $this->jobTitle;
        if ( $htmlSafe ) {
            $result = $this->sanitizeForHtmlOutput( $result );
        }

        return $result;
    }

    public function getOtherJobTitle( $htmlSafe = true )
    {
        $result = $this->otherJobTitle;
        if ( $htmlSafe ) {
            $result = $this->sanitizeForHtmlOutput( $result );
        }

        return $result;
    }

    public function getJobSector( $htmlSafe = true )
    {
        $result = $this->jobSector;
        if ( $htmlSafe ) {
            $result = $this->sanitizeForHtmlOutput( $result );
        }

        return $result;
    }

    public function getKeyDuties( $htmlSafe = true )
    {
        $result = $this->keyDuties;
        if ( $htmlSafe ) {
            $result = $this->sanitizeForHtmlOutput( $result );
        }

        return $result;
    }

    public function getEmploymentLevel( $htmlSafe = true )
    {
        $result = $this->employmentLevel;
        if ( $htmlSafe ) {
            $result = $this->sanitizeForHtmlOutput( $result );
        }

        return $result;
    }

}
