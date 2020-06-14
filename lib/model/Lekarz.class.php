<?php


class Model_Lekarz
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
    private $specjalizacja;

    /**
     * @var
     */
    private $wolne_terminy;

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
     * @throws Exception
     */
    public function getSpecjalizacja()
    {
        $mapperSpecjalziacja = new Mapper_Specjalizacja();

        return $mapperSpecjalziacja->getByIds($this->getSpecjalizacjaId());
    }

    /**
     * @return mixed
     */
    public function getSpecjalizacjaId()
    {
        return $this->specjalizacja;
    }

    /**
     * @param $specjalizacja
     */
    public function setSpecjalizacjaId($specjalizacja)
    {
        $this->specjalizacja = $specjalizacja;
    }

    /**
     * @return mixed
     */
    public function getWolneTerminy()
    {
        return $this->wolne_terminy;
    }

    /**
     * @param $wolneTerminy
     */
    public function setWolneTerminy($wolneTerminy)
    {
        $this->wolne_terminy = $wolneTerminy;
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