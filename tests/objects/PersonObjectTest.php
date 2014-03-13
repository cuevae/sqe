<?php
/**
 * Created by PhpStorm.
 * User: manei
 * Date: 05/03/14
 * Time: 15:46
 */

require_once( '../../app/object/person.php' );

class PersonObjectTest extends CIUnit_TestCase
{

    public function testCreatePersonWithTheRequiredData()
    {
        $data = array(
            'forename1' => 'Enmanuel',
            'surname' => 'Cueva',
            'username' => 'cuevaec@gmail.com',
        );

        $personObject = new Person( $data );
        $this->assertInstanceOf( 'Person', $personObject );
    }

    public function testCreatePersonWithNotEnoughData()
    {
        //No data at all
        $data = array();
        $personObject = null;
        try {
            $personObject = new Person( $data );
        } catch ( Exception $e ) {
            $this->assertNull( $personObject );
        }

        //Some data still not enough
        $data = array( 'forename1' => 'Enmanuel' );
        $personObject = null;
        try {
            $personObject = new Person( $data );
        } catch ( Exception $e ) {
            $this->assertNull( $personObject );
        }

        //Some more data.. still not enough
        $data = array( 'forename1' => 'Enmanuel' );
        $personObject = null;
        try {
            $personObject = new Person( $data );
        } catch ( Exception $e ) {
            $this->assertNull( $personObject );
        }
    }

}