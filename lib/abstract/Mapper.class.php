<?php


abstract class Abstract_Mapper
{
    /**
     * @var
     */
    protected $table;

    /**
     * @var
     */
    protected $modelName;

    /**
     * @param $Model
     */
    public function save($Model)
    {
        if (!empty($Model->getId())) {
            $query = 'UPDATE %s SET %s WHERE id = [int:id]';
            $update = true;
        } else {
            $query = 'INSERT INTO %s (%s) VALUES (%s)';
            $update = false;
        }
        $valuesName = [];
        $fieldsName = [];
        $updateValues = [];
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
                    $updateValues[] = $field . ' = ' . '[int:' . $field . ']';
                    break;
                case 'string':
                    $fieldsName[] = $field;
                    $valuesName[] = '[str:' . $field . ']';
                    $updateValues[] = $field . ' = ' . '[str:' . $field . ']';
                    break;
                default:
                    continue 2;
            }
            $params[$field] = $value;
        }
        if ($update) {
            $params['id'] = $Model->getId();
        }
        if ($update) {
            $query = sprintf(
                $query,
                $this->table,
                implode(', ', $updateValues)
            );
        } else {
            $query = sprintf(
                $query,
                $this->table,
                implode(', ', $fieldsName),
                implode(', ', $valuesName)
            );
        }

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
     * @param $id
     * @return mixed
     * @throws Exception
     */
    public function getByIds($id)
    {
        $models = $this->fetchAll();
        foreach ($models as $model) {
            if ($model->getId() == $id) {
                return $model;
            }
        }

        throw new Exception('Brak obiektu');
    }

    /**
     * @param $id
     */
    public function deleteById($id)
    {
        $query = 'DELETE FROM %s WHERE id = [int:id]';
        $db = new General_DB();
        $db->query(sprintf($query, $this->table), ['id' => $id]);
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