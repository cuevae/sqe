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

    /**
     *
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model( 'curriculum' );
    }


    public function edit( $idUser )
    {
        $this->setEditFormRules();
        $tmpData['_educationLevelOptions'] = $this->curriculum->getAvailableEducationLevels();
        $tmpData['_idUser'] = $idUser;
        try {
            $jobseeker = $this->curriculum->getJobseekerDetails( $idUser );
        } catch ( Exception $e ) {
            show_404();
        }
        $tmpData['_jobseeker'] = $jobseeker;

        if ( $this->input->server( 'REQUEST_METHOD' ) === 'POST' ) {
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
        //$this->load->view( 'curriculum/edit', $tmpData );
    }


    public function view( $idUser )
    {
        $jobseeker = $this->curriculum->getJobseekerDetails( $idUser );

        if ( !$jobseeker instanceof Jobseeker ) {
            show_404();
        }

        $tmpData = [ '_jobseeker' => $jobseeker ];
        $this->viewData['main_content_view'] = $this->load->view( 'curriculum/view', $tmpData, TRUE );
        $this->viewData['title'] = 'View CV';
        $this->load->view( 'default', $this->viewData );
    }

    public function skills( $idUser )
    {
        $this->setSkillFormRules();
        $tmpData['_idUser'] = $idUser;
        try {
            $jobseeker = $this->curriculum->getJobseekerDetails( $idUser );
        } catch ( Exception $e ) {
            show_404();
        }
        $tmpData['_jobseeker'] = $jobseeker;

        if ( $this->input->server( 'REQUEST_METHOD' ) === 'POST' ) {
            if ( $this->form_validation->run() === false ) {
                $this->load->view( 'curriculum/skills', $tmpData );
            } else {
                try {
                    $data = $this->input->post();
                    $skill = new Skill( $data );
                } catch ( Exception $e ) {
                    $tmpData['errors'][] = [ 'bad_data' => 'Error in the given data.' ];
                    $this->load->view( 'curriculum/skills', $tmpData );
                }

                $result = $this->curriculum->saveJobseekerSkills( $jobseeker, $skill );

                if ( $data['save-and-add-more'] ) {
                    redirect( 'curriculum/skills' . $idUser );
                } else {
                    redirect( 'curriculum/view/' . $idUser );
                }
            }
        }

        $this->viewData['main_content_view'] = $this->load->view( 'curriculum/skills', $tmpData, TRUE );
        $this->viewData['title'] = 'Skills';
        $this->load->view( 'default', $this->viewData );
        //$this->load->view( 'curriculum/edit', $tmpData );
    }


    private function setEditFormRules()
    {
        $this->form_validation->set_rules( 'title', 'Title', 'trim|required|xss_clean' );
        $this->form_validation->set_rules( 'forename1', 'Forename', 'trim|required|xss_clean' );
        $this->form_validation->set_rules( 'surname', 'Surname', 'trim|required|xss_clean' );
    }

    private function setSkillFormRules()
    {
        $this->form_validation->set_rules( 'title', 'Title', 'trim|required|xss_clean' );
        $this->form_validation->set_rules( 'forename1', 'Forename', 'trim|required|xss_clean' );
        $this->form_validation->set_rules( 'surname', 'Surname', 'trim|required|xss_clean' );
    }

} 