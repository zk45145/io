<?php


class Mapper_Wizyta extends Abstract_Mapper
{
    protected $table = 'wizyty';

    public function save($model)
    {
        parent::save($model);
    }

    protected function getFields()
    {
        return [
            'id',
            'data',
            'godzina',
            'pacjent_id',
            'lekarz_id',
            'status'
        ];
    }
}