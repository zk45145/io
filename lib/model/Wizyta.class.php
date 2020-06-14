<?php


class Model_Wizyta
{
    /**
     * @var
     */
    private $id;

    /**
     * @var
     */
    private $data;

    /**
     * @var
     */
    private $godzina;

    /**
     * @var
     */
    private $pacjent;

    /**
     * @var
     */
    private $lekarz;

    /**
     * @var
     */
    private $dane_rezerwacji;

    /**
     * @var
     */
    private $status;

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
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * @return mixed
     */
    public function getGodzina()
    {
        return $this->godzina;
    }

    /**
     * @param $godzina
     */
    public function setGodzina($godzina)
    {
        $this->godzina = $godzina;
    }

    /**
     * @return mixed
     */
    public function getPacjent()
    {
        return $this->pacjent;
    }

    /**
     * @param $pacjent
     */
    public function setPacjent($pacjent)
    {
        $this->pacjent = $pacjent;
    }

    /**
     * @return mixed
     */
    public function getLekarz()
    {
        return $this->lekarz;

    }

    /**
     * @param $lekarz
     */
    public function setLekarz($lekarz)
    {
        $this->lekarz = $lekarz;
    }

    /**
     * @return mixed
     */
    public function getDaneRezerwacji()
    {
        return $this->dane_rezerwacji;
    }

    /**
     * @param $daneRezerwacji
     */
    public function setDaneRezerwacji($daneRezerwacji)
    {
        $this->dane_rezerwacji = $daneRezerwacji;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return$this->status;
    }

    /**
     * @param $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }
}