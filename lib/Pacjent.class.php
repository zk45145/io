<?php
class Pacjent
{
    private $id;
    private $imie;
    private $nazwisko;
    private $numerTelefonu;
    private $ulica;
    private $miasto;
    private $adresEMail;
    private $dataUrodzenia;
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

    public function getNumerTelefonu()
    {
        return $this->numerTelefonu;
    }

    public function setNumerTelefonu($numerTelefonu)
    {
        $this->numerTelefonu = $numerTelefonu;
    }

    public function getAdres()
    {
        return $this->ulica . ' ' . $this->miasto;
    }

    public function setAdres($ulica, $miasto)
    {
        $this->ulica = $ulica;
        $this->miasto = $miasto;
    }

    public function getEMail()
    {
        return $this->adresEMail;
    }

    public function setEMail($eMail)
    {
        $this->adresEMail = $eMail;
    }

    public function getDataUrodzenia()
    {
        return $this->dataUrodzenia;
    }

    public function setDataUrodzenia($dataUrodzenia)
    {
        $this->dataUrodzenia = $dataUrodzenia;
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