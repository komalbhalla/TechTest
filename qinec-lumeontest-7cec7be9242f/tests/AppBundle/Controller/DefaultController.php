<?php
use AppBundle\Entity\Doctor;
use AppBundle\Entity\Patient;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    private $doctorName;
    
    private $patientName;
    
    private $patientDob;
    
    private $patientGender;
    
    private $patientHospital;
             
    public function createPatientAction()
    {        
        if (!isset($this->doctorName) || !ctype_alpha($this->doctorName)){
            /* code for log and time */
            return new \Symfony\Component\HttpFoundation\JsonResponse(array(
			'msg' => 'Please enter valid doctor name'
		));           
        }        
        
        $doctor = new Doctor();
        $doctor->setName($this->doctorName);
        
        if (!isset($this->patientName) || !ctype_alpha($this->patientName)){
            /* code for log and time */
            return new \Symfony\Component\HttpFoundation\JsonResponse(array(
			'msg' => 'Please enter valid patient name'
		));           
        }  
        $genderArray = array (1,2,3);
        if(!in_array($this->patientGender,$genderArray)){
            return new \Symfony\Component\HttpFoundation\JsonResponse(array(
			'msg' => 'Error while entering Gender field'
		)); 
        }
        
        $patient = new Patient();
        // Check validations for name,dob,Gender,Hospital
        $patient->setName($this->patientName);
        $patient->setDob($this->patientDob);
        $patient->setGender($this->patientGender);
        $patient->setHospital($this->patientHospital);

        // relate this patient to the doctor
        $patient->setDoctor($doctor);

        $em = $this->getDoctrine()->getManager();
        $em->persist($doctor);
        $em->persist($patient);
        $em->flush();
        
        $patients = $this->get('doctrine')->getRepository('AppBundle:Patients')->selectByDoctor(['doctor' => $doctor->getId()]);

        /* code for log and time */
        return new \Symfony\Component\HttpFoundation\JsonResponse(array(
		'patients' => $patients,
		'doctor' => $doctor->getId(),
		'msg' => 'saved and retrieved all patients for a doctor'
	));
    }
}
?>