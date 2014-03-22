<?php
/**
 * Created by PhpStorm.
 * User: manei
 * Date: 20/03/14
 * Time: 00:12
 */

class EmploymentLevel extends Base
{

    protected $requiredFields = array( 'employmentLevel' );

    var $idLevelsOfEmployment;
    var $employmentLevel;

    public function getEmploymentLevel( $htmlSafe = true )
    {
        $result = $this->employmentLevel;
        if ( $htmlSafe ) {
            $result = $this->sanitizeForHtmlOutput( $result );
        }

        return $result;
    }

    public function getId()
    {
        return $this->idLevelsOfEmployment;
    }

} 