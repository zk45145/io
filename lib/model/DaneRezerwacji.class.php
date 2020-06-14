<?php


class Model_DaneRezerwacji
{
    /**
     * @var
     */
    private $opis;

    /**
     * @var
     */
    private $wizyta;

    /**
     * @return mixed
     */
    public function getOpis()
    {
        return $this->opis;
    }

    /**
     * @param $opis
     */
    public function setOpis($opis)
    {
        $this->opis = $opis;
    }

    /**
     * @return mixed
     */
    public function getWizyta()
    {
        return $this->wizyta;
    }

    /**
     * @param $wizyta
     */
    public function setWizyta($wizyta)
    {
        $this->wizyta = $wizyta;
    }
}