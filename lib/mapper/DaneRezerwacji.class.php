<?php


class Mapper_DaneRezerwacji extends Abstract_Mapper
{
    /**
     * @var string
     */
    protected $table = 'dane_rezerwacji';

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
            'wizyta_id',
            'opis'
        ];
    }
}