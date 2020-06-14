<?php


class Model_Specjalizacja
{
    /**
     * @var
     */
    private $id;

    /**
     * @var
     */
    private $nazwa;

    /**
     * @var
     */
    private $lekarze;

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
    public function getNazwa()
    {
        return $this->nazwa;
    }

    /**
     * @param $nazwa
     */
    public function setNazwa($nazwa)
    {
        $this->nazwa = $nazwa;
    }

    /**
     * @return mixed
     */
    public function getLekarze()
    {
        return $this->lekarze;
    }

    /**
     * @param $lekarze
     */
    public function setLekarze($lekarze)
    {
        $this->lekarze = $lekarze;
    }
}