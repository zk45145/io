<?php


class Mapper_WolnyTermin extends Abstract_Mapper
{
    protected $table = 'wolne_terminy';

    public function save($model)
    {
        parent::save($model);
    }

    protected function getFields()
    {
        return [
            'id',
            'lekarz_id',
            'data',
            'godzina'
        ];
    }
}