<?php


class Mapper_Specjalizacja extends Abstract_Mapper
{
    protected $table = 'specjalizacje';
    protected $modelName = 'Model_Specjalizacja';

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
            'nazwa'
        ];
    }
}