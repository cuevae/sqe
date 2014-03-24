<?php
/**
 * Created by PhpStorm.
 * User: manei
 * Date: 20/03/14
 * Time: 20:28
 */

class ProfessionalQualification extends Base
{

    protected $requiredFields = array( 'Persons_idUser', 'qualificationName' );

    protected $idProfessionalQualifications;
    var $Persons_idUser;
    var $qualificationName;
    var $Sectors_idSectors;
    var $otherSector;
    var $awardingBody;
    var $yearObtained;
    var $result;
    var $verified;
    var $howVerified;

    protected $sector;
    protected $jobseeker;

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
    public function getSector()
    {
        return $this->sector;
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
    public function getYearObtained()
    {
        return $this->yearObtained;
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
    public function getSectorsIdSectors()
    {
        return $this->Sectors_idSectors;
    }

    /**
     * @return mixed
     */
    public function getAwardingBody()
    {
        return $this->awardingBody;
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
    public function getId()
    {
        return $this->idProfessionalQualifications;
    }

    /**
     * @return mixed
     */
    public function getJobseeker()
    {
        return $this->jobseeker;
    }

    /**
     * @return mixed
     */
    public function getOtherSector()
    {
        return $this->otherSector;
    }

    /**
     * @return mixed
     */
    public function getQualificationName()
    {
        return $this->qualificationName;
    }

    public function getFullName( $htmlSafe = true )
    {
        $name = $this->getQualificationName( $htmlSafe );
        $awardingBody = $this->getAwardingBody( $htmlSafe );
        $yearObtained = $this->getYearObtained();

        $result = '';
        $result .= $name;
        if ( !empty( $awardingBody ) ) {
            $result .= ' - ' . $awardingBody;
        }
        if ( !empty( $yearObtained ) ) {
            $result .= ' [' . $yearObtained . ']';
        }

        return $result;
    }


} 