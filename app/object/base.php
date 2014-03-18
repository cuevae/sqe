<?php
/**
 * Created by PhpStorm.
 * User: manei
 * Date: 15/03/14
 * Time: 21:49
 */

class Base
{

    protected $requiredFields = array();

    public function __construct( array $data )
    {
        if ( !$this->validateData( $data ) ) {
            throw new Exception( 'Not enough data to create a the object.' );
        }

        foreach ( $data as $key => $value ) {
            if ( property_exists( $this, $key ) ) {
                $this->$key = $value;
            }
        }
    }

    /**
     * @param array $data
     * @return bool
     */
    public function validateData( array $data )
    {
        if ( empty( $this->requiredFields ) ) {
            return true;
        }

        $givenKeys = array_keys( $data );
        $match = array_intersect( $this->requiredFields, $givenKeys );

        return is_array( $match ) && ( count( $match ) == count( $this->requiredFields ) );
    }

    protected function sanitizeForHtmlOutput( $text )
    {
        return nl2br( htmlentities( htmlspecialchars( $text, ENT_COMPAT, 'UTF-8' ), ENT_NOQUOTES ) );
    }

} 