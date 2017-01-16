<?php
//tests/AppBundle/Controller/DefaultControllerTest.php
namespace tests\AppBundle\Controller;

use AppBundle\Controller\DefaultController;

class DefaultControllerTest extends \PHPUnit_Framework_TestCase
{         
    /* Positive tests */
    public function testNoDoctor()
    {
        $save = new DefaultController();
        $save->doctorname = "";
        $result = $save->createPatient();        
        $this->assertEquals("Please enter valid doctor name", $result->msg);
    }
    public function testNoPatient(){
        $save = new DefaultController();
        $save->doctorname = "";
        $result = $save->createPatient();
        $this->assertEquals("Please enter valid patient name", $result->msg);
    }  
    public function testAdd(){        
        $save = new DefaultController();
        $save->doctorname = "ABC";
        $save->patientName = "YXZ";
        $save->patientDob = "18/10/1982";
        $save->patientGender = 2;
        $save->patientHospital = "PQR";
        
        $result = $save->createPatient();
        $this->assertEquals("saved and retrieved all patients for a doctor", $result->msg);
    }  
    
    /*
     * Negative Tests
     */
    public function testDoctorNameSpecialChars(){
        $save = new DefaultController();
        $save->doctorname = "@!#!@#@!#!@#   #@$#$2321321";
        $result = $save->createPatient();        
        $this->assertEquals("Please enter valid doctor name", $result->msg);
    }
    
    public function testDoctorPatientSpecialChars(){
        $save = new DefaultController();
        $save->doctorname = "@!#!@#@!#!@#   #@$#$2321321";
        $result = $save->createPatient();        
        $this->assertEquals("Please enter valid patient name", $result->msg);
    }
    
    public function testGender(){
        $save = new DefaultController();
        $save = new DefaultController();
        $save->doctorname = "ABC";
        $save->patientName = "YXZ";
        $save->patientDob = "18/10/1982";        
        $save->patientHospital = "PQR";
        $save->patientGender = 4;
        $result = $save->createPatient();        
        $this->assertEquals("Error while entering Gender field", $result->msg);
    }
    
}
?>