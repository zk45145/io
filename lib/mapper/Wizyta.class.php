<?php


class Mapper_Wizyta extends Abstract_Mapper
{
    /**
     * @var string
     */
    protected $table = 'wizyty';

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
            'data',
            'godzina',
            'pacjent_id',
            'lekarz_id',
            'status'
        ];
    }
}