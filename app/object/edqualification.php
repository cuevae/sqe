<?php
/**
 * Created by PhpStorm.
 * User: manei
 * Date: 20/03/14
 * Time: 19:40
 */

class EdQualification extends Base
{

    protected $requiredFields = array('qualificationType', 'courseName');

    var $idEducationalQualifications;
    var $Persons_idUser;
    var $qualificationType;
    var $courseName;
    var $EducationLevels_idEducationLevel;
    var $vocational;
    var $mainSubject;
    var $nameOfInstitutions;
    var $country;
    var $yearObtained;
    var $result;
    var $thesesTitle;
    var $verified;
    var $howVerified;

    /** @var  EdLevel */
    protected $edLevel;

    public function getQualificationFullName( $htmlSafe = true )
    {
        $type = $this->getQualificationType( $htmlSafe );
        $courseName = $this->getCourseName( $htmlSafe );
        $yearObtained = $this->getYearObtained( $htmlSafe );

        $result = $type . ' ' . $courseName;
        $result .= ( $yearObtained ) ? ' [' . $yearObtained . ']' : '';

        return $result;
    }

    /**
     * @return mixed
     */
    public function getEducationLevelsId()
    {
        return $this->EducationLevels_idEducationLevel;
    }

    /**
     * @return mixed
     */
    public function getIdUser()
    {
        return $this->Persons_idUser;
    }

    /**
     * @return mixed
     */
    public function getEdLevel()
    {
        return $this->edLevel;
    }

    public function getEducationLevelName( $htmlSafe = true )
    {
        return $this->edLevel->getEducationLevel( $htmlSafe );
    }

    /**
     * @return mixed
     */
    public function getJobseeker()
    {
        return $this->_jobseeker;
    }

    /**
     * @param bool $htmlSafe
     * @return mixed
     */
    public function getCountry( $htmlSafe = true )
    {
        $result = $this->country;
        if ( $htmlSafe ) {
            $result = $this->sanitizeForHtmlOutput( $result );
        }

        return $result;
    }

    /**
     * @param bool $htmlSafe
     * @return mixed
     */
    public function getCourseName( $htmlSafe = true )
    {
        $result = $this->courseName;
        if ( $htmlSafe ) {
            $result = $this->sanitizeForHtmlOutput( $result );
        }

        return $result;
    }

    /**
     * @param bool $htmlSafe
     * @return mixed
     */
    public function getHowVerified( $htmlSafe = true )
    {
        $result = $this->howVerified;
        if ( $htmlSafe ) {
            $result = $this->sanitizeForHtmlOutput( $result );
        }

        return $result;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->idEducationalQualifications;
    }

    /**
     * @param bool $htmlSafe
     * @return mixed
     */
    public function getMainSubject( $htmlSafe = true )
    {
        $result = $this->mainSubject;
        if ( $htmlSafe ) {
            $result = $this->sanitizeForHtmlOutput( $result );
        }

        return $result;
    }

    /**
     * @param bool $htmlSafe
     * @return mixed
     */
    public function getNameOfInstitutions( $htmlSafe = true )
    {
        $result = $this->nameOfInstitutions;
        if ( $htmlSafe ) {
            $result = $this->sanitizeForHtmlOutput( $result );
        }

        return $result;
    }

    /**
     * @param bool $htmlSafe
     * @return mixed
     */
    public function getQualificationType( $htmlSafe = true )
    {
        $result = $this->qualificationType;
        if ( $htmlSafe ) {
            $result = $this->sanitizeForHtmlOutput( $result );
        }

        return $result;
    }

    /**
     * @param bool $htmlSafe
     * @return mixed
     */
    public function getResult( $htmlSafe = true )
    {
        $result = $this->result;
        if ( $htmlSafe ) {
            $result = $this->sanitizeForHtmlOutput( $result );
        }

        return $result;
    }

    /**
     * @param bool $htmlSafe
     * @return mixed
     */
    public function getThesesTitle( $htmlSafe = true )
    {
        $result = $this->thesesTitle;
        if ( $htmlSafe ) {
            $result = $this->sanitizeForHtmlOutput( $result );
        }

        return $result;
    }

    /**
     * @return mixed
     */
    public function getVerified()
    {
        return $this->verified;
    }

    /**
     * @return mixed
     */
    public function getVocational()
    {
        return $this->vocational;
    }

    /**
     * @param bool $htmlSafe
     * @return mixed
     */
    public function getYearObtained( $htmlSafe = true )
    {
        $result = $this->yearObtained;
        if ( $htmlSafe ) {
            $result = $this->sanitizeForHtmlOutput( $result );
        }

        return $result;
    }


} 