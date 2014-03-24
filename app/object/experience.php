<?php
/**
 * Created by PhpStorm.
 * User: manei
 * Date: 18/03/14
 * Time: 23:46
 */

class Experience extends Base
{

    var $idExperiences;
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

    /** @var  Jobtitle */
    protected $jobtitle;
    /** @var  Sector */
    protected $sector;
    /** @var  Employmentlevel */
    protected $employmentlevel;

    protected $requiredFields = array( 'Persons_idUser', 'dateStarted', 'JobTitles_idJobTitles' );

    public function getExperienceId()
    {
        return $this->idExperiences;
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

    public function getJobTitleName( $htmlSafe = true )
    {
        $result = $this->jobtitle->getJobTitle( $htmlSafe );
        return $result;
    }

    public function getJobTitleId()
    {
        return $this->JobTitles_idJobTitles;
    }

    public function getOtherJobTitle( $htmlSafe = true )
    {
        $result = $this->otherJobTitle;
        if ( $htmlSafe ) {
            $result = $this->sanitizeForHtmlOutput( $result );
        }

        return $result;
    }

    public function getSectorTitle( $htmlSafe = true )
    {
        $result = $this->sector->getSectorTitle( $htmlSafe );
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
        $result = $this->employmentlevel->getEmploymentLevel( $htmlSafe );
        return $result;
    }


    public function getEmployerName( $htmlSafe = true )
    {
        $result = $this->employerName;
        if ( $htmlSafe ) {
            $result = $this->sanitizeForHtmlOutput( $result );
        }

        return $result;
    }

    public function getVerified()
    {
        return $this->verified;
    }

    public function getHowVerified( $htmlSafe = true )
    {
        $result = $this->howVerified;
        if ( $htmlSafe ) {
            $result = $this->sanitizeForHtmlOutput( $result );
        }

        return $result;
    }

    public function getExperienceName( $htmlSafe = true )
    {
        $jobTitle = $this->jobtitle->getJobTitle( $htmlSafe );
        $employerName = $this->getEmployerName( $htmlSafe );
        $dateStarted = $this->getDateStarted();
        $dateFinished = $this->getDateFinished();

        $result = $jobTitle;
        $result .= ( $employerName ) ? ' @ ' . $employerName : '';
        $result .= ( $dateStarted ) ? ' [' . $dateStarted . ' - ' : '';
        $result .= ( $dateFinished ) ? ' ' . $dateFinished . ']' : ']';

        return $result;
    }

}
