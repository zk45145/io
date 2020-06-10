<?php


class Model_Lekarz
{
    private $id;
    private $imie;
    private $nazwisko;
    private $specjalizacja;
    private $wolne_terminy;
    private $wizyty;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getImie()
    {
        return $this->imie;
    }

    public function setImie($imie)
    {
        $this->imie = $imie;
    }

    public function getNazwisko()
    {
        return $this->nazwisko;
    }

    public function setNazwisko($nazwisko)
    {
        $this->nazwisko = $nazwisko;
    }

    public function getSpecjalizacjaId()
    {
        return $this->specjalizacja;
    }

    public function setSpecjalizacjaId($specjalizacja)
    {
        $this->specjalizacja = $specjalizacja;
    }

    public function getWolneTerminy()
    {
        return $this->wolne_terminy;
    }

    public function setWolneTerminy($wolneTerminy)
    {
        $this->wolne_terminy = $wolneTerminy;
    }

    public function getWizyty()
    {
        return $this->wizyty;
    }

    public function setWizyty($wizyty)
    {
        $this->wizyty = $wizyty;
    }
}