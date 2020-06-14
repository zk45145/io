<?php


class Mapper_WolnyTermin extends Abstract_Mapper
{
    /**
     * @var string
     */
    protected $table = 'wolne_terminy';

    /**
     * @param $model
     */
    public function save($model)
    {
        parent::save($model);
    }

    /**
     * @return mixed|string[]
     */
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