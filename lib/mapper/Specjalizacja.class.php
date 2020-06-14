<?php


class Mapper_Specjalizacja extends Abstract_Mapper
{
    /**
     * @var string
     */
    protected $table = 'specjalizacje';

    /**
     * @var string
     */
    protected $modelName = 'Model_Specjalizacja';

    /**
     * @param $model
     */
    public function save($model)
    {
        parent::save($model);
    }

    /**
     * @return array
     */
    public function fetchAll()
    {
        return parent::fetchAll();
    }

    /**
     * @return mixed|string[]
     */
    protected function getFields()
    {
        return [
            'id',
            'nazwa'
        ];
    }
}