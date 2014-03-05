<?php
/**
 * Created by PhpStorm.
 * User: manei
 * Date: 05/03/14
 * Time: 13:00
 */

class Person_Object
{

    private $id;
    private $username;
    private $title;
    private $forename1;
    private $forename2;
    private $surname;

    public function __construct( array $data )
    {
        $this->id = $data['id'];
        $this->username = $data['username'];
        $this->title = $data['title'];
        $this->forename1 = $data['forename1'];
        $this->forename2 = $data['forename2'];
        $this->surname = $data['surname'];
    }

}