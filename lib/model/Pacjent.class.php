<?php
class Model_Pacjent
{
    /**
     * @var
     */
    private $id;

    /**
     * @var
     */
    private $imie;

    /**
     * @var
     */
    private $nazwisko;

    /**
     * @var
     */
    private $numerTelefonu;

    /**
     * @var
     */
    private $ulica;

    /**
     * @var
     */
    private $miasto;

    /**
     * @var
     */
    private $adresEMail;

    /**
     * @var
     */
    private $dataUrodzenia;

    /**
     * @var
     */
    private $wizyty;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getImie()
    {
        return $this->imie;
    }

    /**
     * @param $imie
     */
    public function setImie($imie)
    {
        $this->imie = $imie;
    }

    /**
     * @return mixed
     */
    public function getNazwisko()
    {
        return $this->nazwisko;
    }

    /**
     * @param $nazwisko
     */
    public function setNazwisko($nazwisko)
    {
        $this->nazwisko = $nazwisko;
    }

    /**
     * @return mixed
     */
    public function getNumerTelefonu()
    {
        return $this->numerTelefonu;
    }

    /**
     * @param $numerTelefonu
     */
    public function setNumerTelefonu($numerTelefonu)
    {
        $this->numerTelefonu = $numerTelefonu;
    }

    /**
     * @return string
     */
    public function getAdres()
    {
        return $this->ulica . ' ' . $this->miasto;
    }

    /**
     * @return mixed
     */
    public function getUlica()
    {
        return $this->ulica;
    }

    /**
     * @return mixed
     */
    public function getMiasto()
    {
        return $this->miasto;
    }

    /**
     * @param $ulica
     * @param $miasto
     */
    public function setAdres($ulica, $miasto)
    {
        $this->ulica = $ulica;
        $this->miasto = $miasto;
    }

    /**
     * @param $ulica
     */
    public function setUlica($ulica)
    {
        $this->ulica = $ulica;
    }

    /**
     * @param $miasto
     */
    public function setMiasto($miasto)
    {
        $this->miasto = $miasto;
    }

    /**
     * @return mixed
     */
    public function getEMail()
    {
        return $this->adresEMail;
    }

    /**
     * @return mixed
     */
    public function getAdresEmail()
    {
        return $this->adresEMail;
    }

    /**
     * @param $eMail
     */
    public function setEMail($eMail)
    {
        $this->adresEMail = $eMail;
    }

    /**
     * @param $eMail
     */
    public function setAdresEMail($eMail)
    {
        $this->adresEMail = $eMail;
    }

    /**
     * @return mixed
     */
    public function getDataUrodzenia()
    {
        return $this->dataUrodzenia;
    }

    /**
     * @param $dataUrodzenia
     */
    public function setDataUrodzenia($dataUrodzenia)
    {
        $this->dataUrodzenia = $dataUrodzenia;
    }

    /**
     * @return mixed
     */
    public function getWizyty()
    {
        return $this->wizyty;
    }

    /**
     * @param $wizyty
     */
    public function setWizyty($wizyty)
    {
        $this->wizyty = $wizyty;
    }
}