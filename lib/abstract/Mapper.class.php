<?php


abstract class Abstract_Mapper
{
    protected $table;
    protected $modelName;

    /**
     * @param $Model
     */
    public function save($Model)
    {
        $query = 'INSERT INTO %s (%s) VALUES (%s)';
        $valuesName = [];
        $fieldsName = [];
        $params = [];
        foreach ($this->getFields() as $field) {
            if ($field == 'id') {
                continue;
            }
            $method = 'get' . $this->getMethodNameFromField($field);
            $value = $Model->$method();

            switch (gettype($value)) {
                case 'integer':
                    $fieldsName[] = $field;
                    $valuesName[] = '[int:' . $field . ']';
                    break;
                case 'string':
                    $fieldsName[] = $field;
                    $valuesName[] = '[str:' . $field . ']';
                    break;
                default:
                    continue 2;
            }
            $params[$field] = $value;

        }
        $query = sprintf(
            $query,
            $this->table,
            implode(', ', $fieldsName),
            implode(', ', $valuesName)
        );

        print $query;
        $db = new General_DB();
        $db->query($query, $params);
    }

    /**
     * @return array
     */
    public function fetchAll()
    {
        $query = 'SELECT * FROM %s';

        $db = new General_DB();
        $rows = $db->query(sprintf($query, $this->table));
        $models = [];
        foreach ($rows as $row) {
            $model = new $this->modelName();
            foreach ($row as $fieldName => $value) {
                $method = 'set' . $this->getMethodNameFromField($fieldName);
                 $model->$method($value);

            }
            $models[] = $model;
        }

        return $models;
    }

    /**
     * @return mixed
     */
    abstract protected function getFields();

    /**
     * @param $fieldName
     * @return string
     */
    protected function getMethodNameFromField($fieldName)
    {
        $fieldNameParts = explode('_', $fieldName);
        foreach ($fieldNameParts as &$fieldNamePart) {
            $fieldNamePart = ucfirst($fieldNamePart);
        }

        return implode('', $fieldNameParts);
    }
}