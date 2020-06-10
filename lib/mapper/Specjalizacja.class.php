<?php


class Mapper_Specjalizacja extends Abstract_Mapper
{
    protected $table = 'specjalizacje';

    public function save($model)
    {
        parent::save($model);
    }

    protected function getFields()
    {
        return [
            'id',
            'nazwa'
        ];
    }
}