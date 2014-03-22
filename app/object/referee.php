<?php
/**
 * Created by PhpStorm.
 * User: manei
 * Date: 20/03/14
 * Time: 20:52
 */

class Referee extends Base
{

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
     * @param bool $htmlSafe
     * @return mixed
     */
    public function getContactPhone( $htmlSafe = true )
    {
        $result = $this->contactPhone;
        if ( $htmlSafe ) {
            $result = $this->sanitizeForHtmlOutput( $result );
        }

        return $result;
    }

    /**
     * @param bool $htmlSafe
     * @return mixed
     */
    public function getEmail( $htmlSafe = true )
    {
        $result = $this->email;
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
     * @param bool $htmlSafe
     * @return mixed
     */
    public function getForename( $htmlSafe = true )
    {
        $result = $this->forename;
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
     * @param bool $htmlSafe
     * @return mixed
     */
    public function getRelationship( $htmlSafe = true )
    {
        $result = ucfirst( strtolower( $this->relationship ) );
        if ( $htmlSafe ) {
            $result = $this->sanitizeForHtmlOutput( $result );
        }

        return $result;
    }

    /**
     * @param bool $htmlSafe
     * @return mixed
     */
    public function getSurname( $htmlSafe = true )
    {
        $result = $this->surname;
        if ( $htmlSafe ) {
            $result = $this->sanitizeForHtmlOutput( $result );
        }

        return $result;
    }

    /**
     * @param bool $htmlSafe
     * @return mixed
     */
    public function getTitle( $htmlSafe = true )
    {
        $result = ucfirst( strtolower( $this->title ) );
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

    public function getFullName( $htmlSafe = true )
    {
        $title = $this->getTitle( $htmlSafe );
        $forename = $this->getForename( $htmlSafe );
        $surname = $this->getSurname( $htmlSafe );

        $result = '';
        $result .= ( $title ) ? $title . ', ' : '';
        $result .= $forename;
        $result .= ( $surname ) ? ' ' . $surname : '';

        return $result;
    }


    public function hasEmail()
    {
        return !empty( $this->email );
    }


}