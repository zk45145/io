<?php


class Mapper_Lekarz extends Abstract_Mapper
{
    protected $table = 'lekarze';
    protected $modelName = 'Model_Lekarz';

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
            'specjalizacja_id'
        ];
    }
}