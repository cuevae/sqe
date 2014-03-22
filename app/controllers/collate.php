<?php

/**
 * Created by PhpStorm.
 * User: Adeyeni
 * Date: 05/03/14
 * Time: 11:08
 */
class Collate extends MY_Controller
{
    /** @var  Sectors_Model */
    public $sectors;
    /** @var  Educationlevels_Model */
    public $educationlevels;
    /** @var  Skills_Model */
    public $skills;
    /** @var  EducationalQualifications_Model */
    public $edQualifications;
    /** @var  ProfessionalQualifications_Model */
    public $professionalQualifications;

    public function __construct()
    {
        parent::__construct();
        if ( !$this->isAdmin() ) {
            show_error( 'Admin access only', 401, 'Not Authorized' );
        }

        //Models
        $this->load->model( 'collate', 'model' );
        $this->load->model( 'sectors' );
        $this->load->model( 'educationlevels' );
        $this->load->model( 'skills' );
        $this->load->model( 'educationalqualifications', 'edQualifications' );
        $this->load->model( 'professionalqualifications', 'professionalQualifications' );

        //Form helpers
        $this->load->helper( 'form_helper' );
        $this->load->library( 'form_validation' );

    }

    public function index()
    {
        $tmpData['_sectorOptions'] = $this->sectors->getAvailableSectors() ? : array();
        $tmpData['_edLevelOptions'] = $this->educationlevels->getAvailableEducationLevels() ? : array();
        $tmpData['_skillOptions'] = $this->skills->getAvailableSkillNames() ? : array();
        $tmpData['_edQualificationOptions'] = $this->edQualifications->getAvailableEducationalQualifications() ? : array();
        $tmpData['_professionalQualificationOptions'] = $this->professionalQualifications->getAvailableProfessionalQualifications() ? : array();
        $tmpData['_error'] = $this->session->flashdata( 'error' );
        $tmpData['_success'] = $this->session->flashdata( 'success' );
        $this->viewData['main_content_view'] = $this->load->view( 'collate/collater', $tmpData, TRUE );
        $this->viewData['title'] = 'Ed Qualifications';
        $this->load->view( 'default', $this->viewData );
    }

    public function collatelist()
    {
        $post = $this->input->post();
        $data['results'] = $this->collate->run( $post );
        $this->load->view( 'collate/collatelist', $data );
    }

} 
