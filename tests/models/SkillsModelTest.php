<?php
/**
 * Created by PhpStorm.
 * User: manei
 * Date: 18/03/14
 * Time: 19:52
 */

class SkillsModelTest extends CIUnit_TestCase
{

    protected $model;
    protected $availableSkillLevels = array( 'Basic', 'Good', 'Excellent' );

    public function setUp()
    {
        $this->CI->load->model( 'skills' );
        $this->model = $this->CI->skills;
    }

    public function testAddSkill()
    {
        /*$res = $this->model->addSkill( 1, 'Java', 'Excellent' );
        $this->assertNotEmpty( $res );
        $this->assertTrue( $res > 0 );*/
    }

} 