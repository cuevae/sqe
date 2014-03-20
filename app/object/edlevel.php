<?php
/**
 * Created by PhpStorm.
 * User: manei
 * Date: 20/03/14
 * Time: 20:12
 */

class Edlevel extends Base
{

    protected $requiredFields = array( 'educationLevel ' );

    protected $idEducationLevel;
    var $educationLevel;

    /**
     * @return mixed
     */
    public function getEducationLevel()
    {
        return $this->educationLevel;
    }

    /**
     * @return mixed
     */
    public function getIdEducationLevel()
    {
        return $this->idEducationLevel;
    }



}