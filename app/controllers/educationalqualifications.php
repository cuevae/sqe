<?php
/**
 * Created by PhpStorm.
 * User: manei
 * Date: 20/03/14
 * Time: 19:38
 */

class EducationalQualifications extends MY_Controller
{

    /** @var  Educationalqualifications_Model */
    public $model;
    /** @var  Educationlevels_Model */
    public $el;

    public function __construct()
    {
        parent::__construct();
        $this->load->model( 'educationlevels', 'el' );
        $this->load->model( 'educationalqualifications', 'model' );
    }

    public function index()
    {
        $idUser = $this->getIdUser();
        $tmpData['_idUser'] = $idUser;
        $tmpData['_educationLevels'] = $this->el->getAvailableEducationLevels();
        $tmpData['_educationalQualifications'] = $this->model->getUserEdQualifications( $idUser );
        $tmpData['_error'] = $this->session->flashdata( 'error' );
        $tmpData['_success'] = $this->session->flashdata( 'success' );
        $this->viewData['main_content_view'] = $this->load->view( 'educationalqualifications/view-add', $tmpData, TRUE );
        $this->viewData['title'] = 'Ed Qualifications';
        $this->load->view( 'default', $this->viewData );
    }

    public function add()
    {
        if ( $this->input->server( 'REQUEST_METHOD' ) === 'POST' ) {
            $this->setFormRules();
            if ( $this->form_validation->run() === false ) {
                $this->session->set_flashdata( array( 'error' => validation_errors() ) );
            } else {
                try {
                    $data = $this->input->post();
                    $data['Persons_idUser'] = $this->getIdUser();
                    $obj = new EdQualification( $data );
                    $result = $this->model->addQualification( $this->getIdUser(), $obj );
                } catch ( Exception $e ) {
                    $this->session->set_flashdata( array( 'error' => 'There was a problem adding the educational qualification.' ) );
                }

                switch ( $result ) {
                    case -1:
                        $this->session->set_flashdata( array( 'error' => 'There was a problem adding the educational qualification.' ) );
                        break;
                    case -2:
                        $this->session->set_flashdata( array( 'error' => 'The educational qualification '
                            . $obj->getQualificationType() . ' ' . $obj->getCourseName() . ' already exists.' ) );
                        break;
                    default:
                        /*$this->session->set_flashdata( array( 'success' => 'New skill "' . $skill->getSkillName()
                            . ' [' . $skill->getSkillLevel() . ']' . '" added.' ) );*/
                }
            }
        }
        redirect( 'educationalqualifications' );
    }

    public function delete( $id )
    {
        $obj = $this->model->getEducationalQualification( $id );
        $idUser = $this->getIdUser();
        if ( ( !$obj instanceof EdQualification ) || ( $obj->getidUser() != $idUser ) ) {
            $this->session->set_flashdata( array( 'error' => 'Educational qualification not found.' ) );
        } else {
            $this->model->deleteQualification( $id );
            $this->session->set_flashdata( array( 'success' => 'Educational qualification '
                . $obj->getQualificationType()
                . ' ' . $obj->getCourseName() . ' deleted.' ) );
        }

        redirect( 'educationalqualifications' );
    }

    protected function setFormRules()
    {
        $this->form_validation->set_rules( 'qualificationType', 'Qualification Type', 'trim|required|xss_clean' );
        $this->form_validation->set_rules( 'courseName', 'Course Name', 'trim|required|xss_clean' );
    }

} 