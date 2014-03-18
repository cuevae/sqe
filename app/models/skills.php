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
        parent::__construct();
        $this->load->database();
    }

    public function getSkills( $idUser )
    {

    }

    public function addSkill( $idUser, $skillName, $skillLevel, $verified = null, $howVerified = null )
    {
        $data = [ 'Persons_idUser' => $idUser, 'skillName' => $skillName, 'skillLevel' => $skillLevel ];

        if ( !empty( $verified ) ) {
            $data['verified'] = ( $verified == true );
        }

        if ( !empty( $howVerified ) ) {
            $data['howVerified'] = $howVerified;
        }

        try {
            $this->db->insert( 'skills', $data );
        } catch ( Exception $e ) {
            return false;
        }

        return $this->db->insert_id();
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