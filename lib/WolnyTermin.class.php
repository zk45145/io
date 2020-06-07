<?php


class WolnyTermin
{
    private $id;
    private $lekarz;
    private $data;
    private $godzina;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getLekarz()
    {
        return $this->lekarz;
    }

    public function setLekarz($lekarz)
    {
        $this->lekarz = $lekarz;
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
}