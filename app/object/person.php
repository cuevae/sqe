<?php
/**
 * Created by PhpStorm.
 * User: manei
 * Date: 05/03/14
 * Time: 13:00
 */

class Person_Object
{

    protected $id;
    protected $username;
    protected $title;
    protected $forename1;
    protected $forename2;
    protected $surname;

    protected $requiredFields = array( 'username', 'forename1', 'surname' );

    public function __construct( array $data )
    {
        if ( !$this->validateData( $data ) ) {
            throw new Exception( 'Not enough data to create a Person_Object' );
        }

        $this->id = $data['id'];
        $this->username = $data['username'];
        $this->title = $data['title'];
        $this->forename1 = $data['forename1'];
        $this->forename2 = $data['forename2'];
        $this->surname = $data['surname'];
    }

    /**
     * @param mixed $forename1
     */
    public function setForename1( $forename1 )
    {
        $this->forename1 = $forename1;
    }

    /**
     * @return mixed
     */
    public function getForename1()
    {
        return $this->forename1;
    }

    /**
     * @param mixed $forename2
     */
    public function setForename2( $forename2 )
    {
        $this->forename2 = $forename2;
    }

    /**
     * @return mixed
     */
    public function getForename2()
    {
        return $this->forename2;
    }

    /**
     * @param mixed $id
     */
    public function setId( $id )
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $surname
     */
    public function setSurname( $surname )
    {
        $this->surname = $surname;
    }

    /**
     * @return mixed
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @param mixed $title
     */
    public function setTitle( $title )
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $username
     */
    public function setUsername( $username )
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
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


}