<?php
class Mapper_Pacjent extends Abstract_Mapper
{
    /**
     * @var string
     */
    protected $table = 'pacjenci';

    /**
     * @var string
     */
    protected $modelName = 'Model_Pacjent';

    /**
     * @param $model
     */
    public function save($model)
    {
        parent::save($model);
    }

    /**
     * @return array
     */
    public function fetchAll()
    {
        return parent::fetchAll();
    }

    /**
     * @return mixed|string[]
     */
    protected function getFields()
    {
        return [
            'id',
            'imie',
            'nazwisko',
            'numer_telefonu',
            'ulica',
            'miasto',
            'adres_email',
            'data_urodzenia'
        ];
    }
}