<?php


class DaneRezerwacji
{
    private $opis;
    private $wizyta;

    public function getOpis()
    {
        return $this->opis;
    }

    public function setOpis($opis)
    {
        $this->opis = $opis;
    }

    public function getWizyta()
    {
        return $this->wizyta;
    }

    public function setWizyta($wizyta)
    {
        $this->wizyta = $wizyta;
    }
}