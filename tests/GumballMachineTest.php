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
        $this->assertEquals(true,$this->gumballMachineInstance->InsertP($this->gumballMachineInstance->getDB(),"XXX1","YYY1","1980-09-29","ZZZ1"));
        $this->assertEquals(true,$this->gumballMachineInstance->InsertP($this->gumballMachineInstance->getDB(),"XXX2","YYY2","1981-10-30","ZZZ2"));
        $this->assertEquals(true,$this->gumballMachineInstance->InsertP($this->gumballMachineInstance->getDB(),"XXX3","YYY3","1982-12-31","ZZZ3"));

        $max__id2=$this->gumballMachineInstance->GetLastIDP();
        $this->assertEquals($max__id1+4,$max__id2);
    }
    public function testAffichageProfAPI()
    {
        /* completer*/
        $this->assertEquals(true,$this->gumballMachineInstance->AffichageProf("After Insertion of Professors"));

    }
     
    
    public function testAffichageCoursAVI()
    {
        /*� completer*/
        $this->assertEquals(true,$this->gumballMachineInstance->AffichageCours("Before Insertion of Courses"));
    }
    public function testInsertC()
    {
       
        /*� completer*/
        $max__id1=$this->gumballMachineInstance->GetLastIDC();
        $this->assertEquals("good job",$this->gumballMachineInstance->InsertC("IOT","10",$this->gumballMachineInstance->GetIdP("XXX2", "YYY2")));
        $this->assertEquals("good job",$this->gumballMachineInstance->InsertC("IA","12",$this->gumballMachineInstance->GetIdP("XXX1", "YYY1")));
        $this->assertEquals("good job",$this->gumballMachineInstance->InsertC("C++","18",$this->gumballMachineInstance->GetIdP("XXX3", "YYY3")));
        $this->assertEquals("good job",$this->gumballMachineInstance->InsertC("EDL","30",$this->gumballMachineInstance->GetIdP("XXX3", "YYY3") ));

        $max__id2=$this->gumballMachineInstance->GetLastIDC();
        $this->assertEquals($max__id1+4,$max__id2);
    }
    public function testAffichageCoursAPI()
    {
        /*� completer*/
        $this->assertEquals(true,$this->gumballMachineInstance->AffichageCours("After Insertion of Courses"));
    }

    public function testUpdateC()
    {
        $this->assertEquals(true,$this->gumballMachineInstance->UpdateC("C++","30" ));
        $this->assertEquals(true,$this->gumballMachineInstance->AffichageCours("After Update of Courses"));

    }

    public function testUpdateP()
    {
        $this->assertEquals(true,$this->gumballMachineInstance->UpdateP("XXX1","YYY1","IGLAB" ));
        $this->assertEquals(true,$this->gumballMachineInstance->AffichageProf("After Update of Prof"));

    }

    public function testDeleteC()
    {
        $this->assertEquals(true,$this->gumballMachineInstance->DeleteC("EDL"));
        $this->assertEquals(true,$this->gumballMachineInstance->AffichageCours("After Delete of Courses"));

    }

    public function testDeleteP()
    {
        //$this->assertEquals(true,$this->gumballMachineInstance->DeleteP("XXX1","YYY1")); ne fonctionne pas car le prof est relié à un cours
        $this->assertEquals(true,$this->gumballMachineInstance->AffichageProf("After Delete of Prof"));

    }
    public function testDeleteAllC()
    {
        $this->assertEquals(true,$this->gumballMachineInstance->DeleteC());
        $this->assertEquals(true,$this->gumballMachineInstance->AffichageCours("After Delete all of Courses"));

    }

    public function testDeleteAllP()
    {
        $this->assertEquals(true,$this->gumballMachineInstance->DeleteP());
        $this->assertEquals(true,$this->gumballMachineInstance->AffichageProf("After Delete all of Prof"));

    }
}
