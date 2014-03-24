<?php
/**
 * Created by PhpStorm.
 * User: manei
 * Date: 15/03/14
 * Time: 21:44
 */

class Skill extends Base
{

    protected $idSkills;
    var $Persons_idUser;
    var $skillName;
    var $skillLevel;
    var $verified;
    var $howVerified;

    protected $requiredFields = array( 'Persons_idUser', 'skillName' );
    protected $availableSkillLevels = array( 'Basic', 'Good', 'Excellent' );

    public function getId()
    {
        return $this->idSkills;
    }

    public function getPersonsidUser()
    {
        return $this->Persons_idUser;
    }

    public function getSkillName( $htmlSafe = true )
    {
        $result = $this->skillName;
        if ( $htmlSafe ) {
            $result = $this->sanitizeForHtmlOutput( $result );
        }

        return $result;
    }

    public function isVerified()
    {
        return $this->verified == true;
    }

    public function getHowVerified( $htmlSafe = true )
    {
        $result = $this->howVerified;
        if ( $htmlSafe ) {
            $result = $this->sanitizeForHtmlOutput( $result );
        }

        return $result;
    }

    public function getVerified( $htmlSafe = true )
    {
        $result = '';

        if ( $this->isVerified() ) {
            $result = 'Verified: ' . $this->getHowVerified( false );
        }

        if ( !empty( $result ) && $htmlSafe ) {
            $result = $this->sanitizeForHtmlOutput( $result );
        }

        return $result;
    }

    public function getAvailableSkillLevels()
    {
        return $this->availableSkillLevels;
    }

    public function getSkillLevel( $htmlSafe = true )
    {
        $result = $this->skillLevel;
        if ( $htmlSafe ) {
            $result = $this->sanitizeForHtmlOutput( $result );
        }

        return $result;
    }


    public function getFullName( $htmlSafe = true )
    {
        $level = $this->getSkillLevel( $htmlSafe );
        $name = $this->getSkillName( $htmlSafe );

        $result = '';
        $result .= $name;
        if ( !empty( $level ) ) {
            $result .= ' [' . $level . ']';
        }

        return $result;
    }


}