<?php
/**
 * Created by PhpStorm.
 * User: manei
 * Date: 18/03/14
 * Time: 19:45
 */

class Skills_Model extends CI_Model
{

    protected $availableLevels = array( 'Basic', 'Good', 'Excellent' );

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getUserSkills( $idUser )
    {
        $this->db->select( '*' );
        $this->db->from( 'skills' );
        $this->db->where( 'Persons_idUser', $idUser );
        $results = $this->db->get()->result_array();

        $objects = array();
        foreach( $results as $result ){
            $skill = new Skill($result);
            $objects[] = $skill;
        }

        return $objects;
    }

    public function searchSkills( $name, $level = null, $verified = null )
    {
        $this->db->select( '*' );
        $this->db->from( 'skills' );
        $this->db->like( 'skillName', $name );
        if ( isset( $level ) && in_array( $level, $this->availableLevels ) ) {
            $this->db->where( 'skillLevel', $level );
        }
        if ( isset( $verified ) ) {
            $verified = ( ( $verified == true ) * 1 );
            $this->db->where( 'verified', $verified );
        }

        $result = $this->db->get()->result_array();

        return $result;
    }

    public function addSkill( Skill $skill )
    {
        try {
            $this->db->insert( 'skills', $skill );
        } catch ( Exception $e ) {
            return false;
        }

        return $this->db->insert_id();
    }

    public function deleteSkill( $skillId )
    {
        $this->db->where( 'idSkills', $skillId );
        $this->db->delete( 'skills' );
    }

    public function setVerified( $skillId, $howVerified = '' )
    {
        $data = [ 'verified' => 1, 'howVerified' => $howVerified ];
        $this->db->where( 'idSkills', $skillId );
        $this->db->update( 'skills', $data );
    }

    public function unsetVerified( $skillId )
    {
        $data = [ 'verified' => 0, 'howVerified' => null ];
        $this->db->where( 'idSkills', $skillId );
        $this->db->update( 'skills', $data );
    }

} 