<?php


class Model_WolnyTermin
{

    /**
     * @var
     */
    private $id;

    /**
     * @var
     */
    private $lekarz;

    /**
     * @var
     */
    private $data;

    /**
     * @var
     */
    private $godzina;

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
}