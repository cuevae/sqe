<?php
/**
 * Created by PhpStorm.
 * User: manei
 * Date: 18/03/14
 * Time: 19:45
 */

class Skills_Model extends CI_Model
{

    public function __construct()
    {
        parent::_construct();
        $this->load->database();
    }

    public function getSkills( $idUser )
    {

    }

    public function addSkill( $skillName, $skillLevel )
    {

    }

    public function deleteSkill( $skillId )
    {

    }

    public function setVerified( $skillId, $howVerified )
    {

    }

    public function unsetVerified( $skillId )
    {

    }

} 