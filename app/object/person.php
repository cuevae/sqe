<?php
/**
 * Created by PhpStorm.
 * User: manei
 * Date: 05/03/14
 * Time: 13:00
 */

class Person
{

    public $idUser;
    public $username;
    public $title;
    public $forename1;
    public $forename2;
    public $surname;

    protected $requiredFields = array( 'username', 'forename1', 'surname' );

    public function __construct( array $data )
    {
        if ( !$this->validateData( $data ) ) {
            throw new Exception( 'Not enough data to create a Person_Object' );
        }

        foreach ( $data as $key => $value ) {
            if ( property_exists( $this, $key ) ) {
                $this->$key = $value;
            }
        }
    }

    /**
     * @param mixed $forename1
     */
    public function setForename1( $forename1 )
    {
        $this->forename1 = $forename1;
    }


    public function getForename1( $htmlSafe = true )
    {
        $result = $this->forename1;
        if ( $htmlSafe ) {
            $result = $this->sanitizeForHtmlOutput( $result );
        }

        return $result;
    }

    /**
     * @param mixed $forename2
     */
    public function setForename2( $forename2 )
    {
        $this->forename2 = $forename2;
    }


    public function getForename2( $htmlSafe = true )
    {
        $result = $this->forename2;
        if ( $htmlSafe ) {
            $result = $this->sanitizeForHtmlOutput( $result );
        }

        return $result;
    }

    /**
     * @param $idUser
     */
    public function setId( $idUser )
    {
        $this->idUser = $idUser;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->idUser;
    }

    /**
     * @param mixed $surname
     */
    public function setSurname( $surname )
    {
        $this->surname = $surname;
    }


    public function getSurname( $htmlSafe = true )
    {
        $result = $this->surname;
        if ( $htmlSafe ) {
            $result = $this->sanitizeForHtmlOutput( $result );
        }

        return $result;
    }

    /**
     * @param mixed $title
     */
    public function setTitle( $title )
    {
        $this->title = $title;
    }


    public function getTitle( $htmlSafe = true )
    {
        $result = $this->title;
        if ( $htmlSafe ) {
            $result = $this->sanitizeForHtmlOutput( $result );
        }

        return $result;
    }

    /**
     * @param mixed $username
     */
    public function setUsername( $username )
    {
        $this->username = $username;
    }


    public function getUsername( $htmlSafe = true )
    {
        $result = $this->forename1;
        if ( $htmlSafe ) {
            $result = $this->sanitizeForHtmlOutput( $result );
        }

        return $result;
    }

    public function getFullName( $htmlSafe = true )
    {
        $result = '';
        if ( !empty( $this->title ) ) {
            $result .= ucfirst( strtolower( $this->title ) ) . ', ';
        }
        $result .= ucfirst( strtolower( $this->forename1 ) );
        if ( !empty( $this->forename2 ) ) {
            $result .= ' ' . ucfirst( $this->forename2[0] ) . '. ';
        }
        $result .= ' ' . ucfirst( strtolower( $this->surname ) );

        if ( $htmlSafe ) {
            $result = $this->sanitizeForHtmlOutput( $result );
        }

        return $result;
    }

    /**
     * @param array $data
     * @return bool
     */
    public function validateData( array $data )
    {
        $givenKeys = array_keys( $data );
        $match = array_intersect( $this->requiredFields, $givenKeys );

        return is_array( $match ) && ( count( $match ) == count( $this->requiredFields ) );
    }

    protected function sanitizeForHtmlOutput( $text )
    {
        return nl2br( htmlentities( htmlspecialchars( $text, ENT_COMPAT, 'UTF-8' ), ENT_NOQUOTES ) );
    }


}