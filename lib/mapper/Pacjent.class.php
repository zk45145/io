<?php
class Mapper_Pacjent extends Abstract_Mapper
{
    protected $table = 'pacjenci';

    public function save($model)
    {
        parent::save($model);
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