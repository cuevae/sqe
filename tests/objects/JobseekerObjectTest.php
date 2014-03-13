<?php
/**
 * Created by PhpStorm.
 * User: manei
 * Date: 06/03/14
 * Time: 13:36
 */

require_once( '../../app/object/person.php' );
require_once( '../../app/object/jobseeker.php' );

class JobseekerObjectTest extends CIUnit_TestCase
{

    public function testCreateJobseekerObjectWithTheRequiredData()
    {
        $data = array(
            'forename1' => 'Enmanuel',
            'surname' => 'Cueva',
            'username' => 'cuevaec@gmail.com',
        );
        $jobseeker = new Jobseeker( $data );
        $this->assertInstanceOf( 'Jobseeker', $jobseeker );
    }

    public function testCreateJobseekerWithNotEnoughData()
    {
        //No data at all
        $data = array();
        $jobseekerObject = null;
        try {
            $jobseekerObject = new Jobseeker( $data );
        } catch ( Exception $e ) {
            $this->assertNull( $jobseekerObject );
        }

        //Some data still not enough
        $data = array( 'forename1' => 'Enmanuel' );
        $jobseekerObject = null;
        try {
            $jobseekerObject = new Jobseeker( $data );
        } catch ( Exception $e ) {
            $this->assertNull( $jobseekerObject );
        }

        //Some more data.. still not enough
        $data = array( 'forename1' => 'Enmanuel' );
        $jobseekerObject = null;
        try {
            $jobseekerObject = new Jobseeker( $data );
        } catch ( Exception $e ) {
            $this->assertNull( $jobseekerObject );
        }
    }

} 