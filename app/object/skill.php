<?php
/**
 * Created by PhpStorm.
 * User: manei
 * Date: 15/03/14
 * Time: 21:44
 */

class Skill extends Base
{

    var $idSkills;
    var $Persons_idUser;
    var $skillName;
    var $verified;
    var $howVerified;

    protected $requiredFields = array( 'Persons_idUser', 'skillName' );

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
        if( $htmlSafe ){
            $result = $this->sanitizeForHtmlOutput( $result );
        }

        return $result;
    }



} 