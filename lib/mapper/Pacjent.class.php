<?php
class Mapper_Pacjent extends Abstract_Mapper
{
    protected $table = 'pacjenci';
    protected $modelName = 'Model_Pacjent';


    public function save($model)
    {
        parent::save($model);
    }

    public function fetchAll()
    {
        return parent::fetchAll();
    }

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