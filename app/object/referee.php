<?php
/**
 * Created by PhpStorm.
 * User: manei
 * Date: 20/03/14
 * Time: 20:52
 */

class Referee extends Base {

    protected $requiredFields = array( 'Persons_idUser', 'forename', 'surname' );

    protected $idReferees;
    var $Persons_idUser;
    var $title;
    var $forename;
    var $surname;
    var $email;
    var $contactPhone;
    var $relationship;
    var $permissionToContact;
    var $permissionToStoreDetails;
    var $verified;
    var $howVerified;
    var $referenceDoc;

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
    public function getContactPhone()
    {
        return $this->contactPhone;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
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
    public function getForename()
    {
        return $this->forename;
    }

    /**
     * @return mixed
     */
    public function getIdReferees()
    {
        return $this->idReferees;
    }

    /**
     * @return mixed
     */
    public function getPermissionToContact()
    {
        return $this->permissionToContact;
    }

    /**
     * @return mixed
     */
    public function getPermissionToStoreDetails()
    {
        return $this->permissionToStoreDetails;
    }

    /**
     * @return mixed
     */
    public function getReferenceDoc()
    {
        return $this->referenceDoc;
    }

    /**
     * @return mixed
     */
    public function getRelationship()
    {
        return $this->relationship;
    }

    /**
     * @return mixed
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getVerified()
    {
        return $this->verified;
    }



} 