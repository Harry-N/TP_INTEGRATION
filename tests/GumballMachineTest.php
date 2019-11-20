<?php

require 'GumballMachine.php';

class GumballMachineTest extends PHPUnit_Framework_TestCase
{
    public $gumballMachineInstance;
    //prof
    private $nom="x_test_tp"; // a changer
    private $prenom="y_test_tp"; // a changer
    private $date_naissance="0000-00-00"; // a changer
    private $lieu_naissance="XY"; // a changer
    // cours
    private $intitule="***"; //a remplir
    private $duree="***";    //a remplir
    
        
    public function setUp()
    {
        $this->gumballMachineInstance = new GumballMachine();
    }
    
    public function testAffichageProfAVI()
    {
        $this->assertEquals(true,$this->gumballMachineInstance->AffichageProf("Before Insertion of Professors"));
    }
    public function testInsertP()
    {
        $max__id1=$this->gumballMachineInstance->GetLastIDP();

        $this->assertEquals(true,$this->gumballMachineInstance->InsertP($this->gumballMachineInstance->getDB(),$this->nom,$this->prenom,$this->date_naissance,$this->lieu_naissance));
        $this->assertEquals(true,$this->gumballMachineInstance->InsertP($this->gumballMachineInstance->getDB(),"XXX1","YYY1","29-09-1980","ZZZ1"));
        $this->assertEquals(true,$this->gumballMachineInstance->InsertP($this->gumballMachineInstance->getDB(),"XXX2","YYY2","30-10-1981","ZZZ2"));
        $this->assertEquals(true,$this->gumballMachineInstance->InsertP($this->gumballMachineInstance->getDB(),"XXX3","YYY3","31-12-1982","ZZZ3"));

        $max__id2=$this->gumballMachineInstance->GetLastIDP();
        $this->assertEquals($max__id1+4,$max__id2);
    }
    public function testAffichageProfAPI()
    {
        /*� completer*/


    }
     
    
    public function testAffichageCoursAVI()
    {
        /*� completer*/
    }
    public function testInsertC()
    {
       
        /*� completer*/
        $max__id1=$this->gumballMachineInstance->GetLastIDC();
        $this->assertEquals("good job",$this->gumballMachineInstance->InsertC($this->gumballMachineInstance->getDB(),"IOT","10",$this-> GetIDP("XXX2", "YYY2")));
        $this->assertEquals("good job",$this->gumballMachineInstance->InsertC($this->gumballMachineInstance->getDB(),"IA","12",$this->GetIDP("XXX1", "YYY1")));
        $this->assertEquals("good job",$this->gumballMachineInstance->InsertC($this->gumballMachineInstance->getDB(),"C++","18",$this->GetIDP("XXX3", "YYY3")));
        $this->assertEquals("good job",$this->gumballMachineInstance->InsertC($this->gumballMachineInstance->getDB(),"EDL","30",$this->GetIDP("XXX3", "YYY3") ));

        $max__id2=$this->gumballMachineInstance->GetLastIDC();
        $this->assertEquals($max__id1+4,$max__id2);
    }
    public function testAffichageCoursAPI()
    {
        /*� completer*/
    }

   
}
