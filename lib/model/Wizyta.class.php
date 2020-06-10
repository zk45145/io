<?php


class Model_Wizyta
{
    private $id;
    private $data;
    private $godzina;
    private $pacjent;
    private $lekarz;
    private $dane_rezerwacji;
    private $status;

    public function getId()
    {
        return $this->id;

    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getData()
    {
        return $this->data;

    }

    public function setData($data)
    {
        $this->data = $data;
    }
    public function getGodzina()
    {
        return $this->godzina;

    }

    public function setGodzina($godzina)
    {
        $this->godzina = $godzina;
    }

    public function getPacjent()
    {
        return $this->pacjent;

    }

    public function setPacjent($pacjent)
    {
        $this->pacjent = $pacjent;
    }

    public function getLekarz()
    {
        return $this->lekarz;

    }

    public function setLekarz($lekarz)
    {
        $this->lekarz = $lekarz;
    }

    public function getDaneRezerwacji()
    {
        return $this->dane_rezerwacji;

    }

    public function setDaneRezerwacji($daneRezerwacji)
    {
        $this->dane_rezerwacji = $daneRezerwacji;
    }

    public function getStatus()
    {
        return$this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }
}