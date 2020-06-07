<?php


class Specjalizacja
{
    private $nazwa;
    private $lekarze;

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