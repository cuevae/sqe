<?php
/**
 * Created by PhpStorm.
 * User: manei
 * Date: 03/03/14
 * Time: 17:41
 */

class Curriculum extends MY_Controller
{

    /** @var  $curriculum Curriculum_Model */
    var $curriculum;
    /** @var  Skills_Model */
    var $skills;
    /** @var  Experiences_Model */
    var $experiences;
    /** @var  EducationalQualifications_Model */
    var $eqs;
    /** @var  ProfessionalQualifications_Model */
    var $pqs;
    /** @var  Referees_Model */
    var $referees;

    /**
     *
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model( 'curriculum' );
        $this->load->model( 'skills' );
        $this->load->model( 'experiences' );
        $this->load->model( 'professionalqualifications', 'pqs' );
        $this->load->model( 'educationalqualifications', 'eqs' );
        $this->load->model( 'referees' );
    }


    /**
     * Handles the CV main information edit
     */
    public function edit( $idUser = null )
    {
        $idUser = $idUser ? : $this->getIdUser();
        if ( $idUser != $this->getIdUser() && !$this->isAdmin() ) {
            show_404();
        }

        $tmpData['_educationLevelOptions'] = $this->curriculum->getAvailableEducationLevels();
        $tmpData['_idUser'] = $idUser;

        try {
            $jobseeker = $this->curriculum->getJobseekerDetails( $idUser );
        } catch ( Exception $e ) {
            show_404();
        }
        $tmpData['_jobseeker'] = $jobseeker;

        if ( $this->input->server( 'REQUEST_METHOD' ) === 'POST' ) {
            $this->setEditFormRules();
            if ( $this->form_validation->run() === false ) {
                $this->load->view( 'curriculum/edit', $tmpData );
            } else {
                try {
                    $data = $this->input->post();
                    $data['idUser'] = $idUser; #TODO: userId should be picked from SESSION
                    $data['female'] = ( $data['sex'] == 'female' );
                    if ( $data['postcode'] ) {
                        $data['postcode'] = strtoupper( $data['postcode'] );
                        preg_match( '#^[A-Z]+[0-9]{2}#', $data['postcode'], $matches );
                        $data['postcodeStart'] = $matches[0];
                    }
                    $data['fiveOrMoreGcses'] = ( $data['noOfGcses'] >= 5 );
                    $jobseeker = new Jobseeker( $data );
                } catch ( Exception $e ) {
                    $tmpData['errors'][] = [ 'bad_data' => 'Error in the given data.' ];
                    $this->load->view( 'curriculum/edit', $tmpData );
                }

                $result = $this->curriculum->saveJobseekerDetails( $jobseeker );

                redirect( 'curriculum/view/' . $idUser );
            }
        }

        $this->viewData['main_content_view'] = $this->load->view( 'curriculum/edit', $tmpData, TRUE );
        $this->viewData['title'] = 'Edit';
        $this->load->view( 'default', $this->viewData );
    }


    /**
     * Handles the CV display
     */
    public function view( $idUser = null )
    {
        $idUser = $idUser ? : $this->getIdUser();
        if ( $idUser != $this->getIdUser() && !$this->isAdmin() ) {
            show_404();
        }

        $jobseeker = $this->curriculum->getJobseekerDetails( $idUser );
        if ( !$jobseeker instanceof Jobseeker ) {
            show_404();
        }
        $skills = $this->skills->getUserSkills( $idUser );
        $experiences = $this->experiences->getUserExperiences( $idUser );
        $eqs = $this->eqs->getUserEdQualifications( $idUser );
        $pqs = $this->pqs->getUserProfessionalQualifications( $idUser );
        $referees = $this->referees->getUserReferees( $idUser );
        $tmpData = [ '_jobseeker' => $jobseeker,
                     '_skills' => $skills,
                     '_experiences' => $experiences,
                     '_edQualifications' => $eqs,
                     '_profQualifications' => $pqs,
                     '_referees' => $referees,
        ];
        $this->viewData['main_content_view'] = $this->load->view( 'curriculum/view', $tmpData, TRUE );
        $this->viewData['title'] = 'View CV';
        $this->load->view( 'default', $this->viewData );
    }


    public function pdf( $idUser = null )
    {
        $idUser = $idUser ? : $this->getIdUser();
        if ( $idUser != $this->getIdUser() && !$this->isAdmin() ) {
            show_404();
        }

        $jobseeker = $this->curriculum->getJobseekerDetails( $idUser );
        if ( !$jobseeker instanceof Jobseeker ) {
            show_404();
        }
        $skills = $this->skills->getUserSkills( $idUser );
        $experiences = $this->experiences->getUserExperiences( $idUser );
        $eqs = $this->eqs->getUserEdQualifications( $idUser );
        $pqs = $this->pqs->getUserProfessionalQualifications( $idUser );
        $referees = $this->referees->getUserReferees( $idUser );
        $tmpData = [ '_jobseeker' => $jobseeker,
                     '_skills' => $skills,
                     '_experiences' => $experiences,
                     '_edQualifications' => $eqs,
                     '_profQualifications' => $pqs,
                     '_referees' => $referees,
        ];
        $tmpData['_alreadyPdf'] = true;
        $data['_view'] = $this->load->view( 'curriculum/view', $tmpData, TRUE );
        $data['_username'] = $this->session->userdata( 'username' );

        $this->load->view( 'curriculum/pdf', $data );
    }

    private function setEditFormRules()
    {
        $this->form_validation->set_rules( 'title', 'Title', 'trim|required|xss_clean' );
        $this->form_validation->set_rules( 'forename1', 'Forename', 'trim|required|xss_clean' );
        $this->form_validation->set_rules( 'surname', 'Surname', 'trim|required|xss_clean' );
    }

} 