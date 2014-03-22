<?php
/**
 * Created by PhpStorm.
 * User: manei
 * Date: 19/03/14
 * Time: 22:28
 */

class Jobtitle extends Base
{

    protected $idJobTitles;
    var $jobTitle;
    var $Sectors_idSectors;
    protected $sector;

    protected $requiredFields = array( 'jobTitle', 'Sectors_idSectors' );

    public function getJobTitle( $htmlSafe = true )
    {
        $result = $this->jobTitle;
        if ( $htmlSafe ) {
            $result = $this->sanitizeForHtmlOutput( $result );
        }

        return $result;
    }

    public function getSectorId()
    {
        return $this->Sectors_idSectors;
    }

    public function getId()
    {
        return $this->idJobTitles;
    }

    public function getSector()
    {
        return $this->sector;
    }

} 