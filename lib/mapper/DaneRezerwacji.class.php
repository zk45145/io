<?php


class Mapper_DaneRezerwacji extends Abstract_Mapper
{
    protected $table = 'dane_rezerwacji';

    public function save($model)
    {
        parent::save($model);
    }

    protected function getFields()
    {
        return [
            'wizyta_id',
            'opis'
        ];
    }
}