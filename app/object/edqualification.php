<?php
/**
 * Created by PhpStorm.
 * User: manei
 * Date: 20/03/14
 * Time: 19:40
 */

class EdQualification extends Base
{

    protected $requiredFields = array();

    var $idEducationalQualifications;
    var $Persons_idUser;
    var $qualificationType;
    var $courseName;
    var $EducationLevels_idEducationLevels;
    var $vocational;
    var $mainSubject;
    var $nameOfInstitutions;
    var $country;
    var $yearObtained;
    var $result;
    var $thesisTitle;
    var $verified;
    var $howVerified;

    protected $_jobseeker;
    protected $_edLevel;

    /**
     * @return mixed
     */
    public function getEducationLevelsIdEducationLevels()
    {
        return $this->EducationLevels_idEducationLevels;
    }

    /**
     * @return mixed
     */
    public function getPersonsIdUser()
    {
        return $this->Persons_idUser;
    }

    /**
     * @return mixed
     */
    public function getEdLevel()
    {
        return $this->_edLevel;
    }

    /**
     * @return mixed
     */
    public function getJobseeker()
    {
        return $this->_jobseeker;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @return mixed
     */
    public function getCourseName()
    {
        return $this->courseName;
    }

    /**
     * @return mixed
     */
    public function getHowVerified()
    {
        return $this->howVerified;
    }

    /**
     * @return mixed
     */
    public function getIdEducationalQualifications()
    {
        return $this->idEducationalQualifications;
    }

    /**
     * @return mixed
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @return mixed
     */
    public function getMainSubject()
    {
        return $this->mainSubject;
    }

    /**
     * @return mixed
     */
    public function getNameOfInstitutions()
    {
        return $this->nameOfInstitutions;
    }

    /**
     * @return mixed
     */
    public function getQualificationType()
    {
        return $this->qualificationType;
    }

    /**
     * @return array
     */
    public function getRequiredFields()
    {
        return $this->requiredFields;
    }

    /**
     * @return mixed
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * @return mixed
     */
    public function getThesisTitle()
    {
        return $this->thesisTitle;
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
     * @return mixed
     */
    public function getYearObtained()
    {
        return $this->yearObtained;
    }


} 