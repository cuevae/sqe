<?php
/**
 * Created by PhpStorm.
 * User: manei
 * Date: 19/03/14
 * Time: 20:55
 */

class Sector extends Base
{

    var $idSectors;
    var $sectorTitle;

    protected $requiredFields = array( 'sectorTitle' );

    public function getSectorTitle( $htmlSafe = true )
    {
        $result = $this->sectorTitle;
        if ( $htmlSafe ) {
            $result = $this->sanitizeForHtmlOutput( $result );
        }

        return $result;
    }

    public function getIdSectors()
    {
        return $this->idSectors;
    }

} 