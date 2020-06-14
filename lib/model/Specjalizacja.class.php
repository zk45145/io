<?php


class Model_Specjalizacja
{
    private $id;
    private $nazwa;
    private $lekarze;

     public function getId()
     {
         return $this->id;
     }

    public function setId($id)
    {
        $this->id = $id;
    }
    public function getNazwa()
    {
        return $this->nazwa;
    }

    public function setNazwa($nazwa)
    {
        $this->nazwa = $nazwa;
    }

    public function getLekarze()
    {
        return $this->lekarze;
    }

    public function setLekarze($lekarze)
    {
        $this->lekarze = $lekarze;
    }
}