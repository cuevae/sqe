<?php
/**
 * Created by PhpStorm.
 * User: manei
 * Date: 22/03/14
 * Time: 17:20
 */

class JobPreference extends Base
{

    protected $requiredFields = array( 'JobTitles_idJobTitles', 'person_idUser' );

    var $JobTitles_idJobTitles;
    var $person_idUser;

    /** @var  Jobtitle */
    protected $jobtitle;

    /**
     * @return mixed
     */
    public function getJobTitleId()
    {
        return $this->JobTitles_idJobTitles;
    }

    /**
     * @return mixed
     */
    public function getJobtitle()
    {
        return $this->jobtitle;
    }

    public function getJobtitleFullName( $htmlSafe = true )
    {
        $title = $this->jobtitle->getJobTitle( $htmlSafe );
        $sector = $this->jobtitle->getSector()->getSectorTitle();

        return $title . ' [S: ' . $sector . ']';
    }

    /**
     * @return mixed
     */
    public function getIdUser()
    {
        return $this->person_idUser;
    }


}