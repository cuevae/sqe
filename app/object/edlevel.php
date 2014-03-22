<?php
/**
 * Created by PhpStorm.
 * User: manei
 * Date: 20/03/14
 * Time: 20:12
 */

class Edlevel extends Base
{

    protected $requiredFields = array( 'educationLevel' );

    protected $idEducationLevel;
    var $educationLevel;

    /**
     * @param bool $htmlSafe
     * @return mixed
     */
    public function getEducationLevel( $htmlSafe = true )
    {
        $result = $this->educationLevel;
        if ( $htmlSafe ) {
            $result = $this->sanitizeForHtmlOutput( $result );
        }

        return $result;
    }

    /**
     * @return mixed
     */
    public function getIdEducationLevel()
    {
        return $this->idEducationLevel;
    }


}