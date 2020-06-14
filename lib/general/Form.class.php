 <?php


class General_Form
{
    //TODO Można powiększyć zestaw typów przycisków o typy z https://getbootstrap.com/docs/4.0/components/buttons/
    const BUTTONPRIMARY = 'btn-primary';
    const BUTTONDANGER = 'btn-danger';
    /**
     * Zwraca wskazany tag z zawartoscia
     *
     * @param string $tag
     * @param string $text
     * @return string
     */
    public function getTag(string $tag, string $text): string
    {
        return '<' . $tag . '>' . $text . '</' . $tag . '>';
    }

    /**
     * @param $name
     * @param $onclick
     * @param string $class
     * @return string
     */
    public function button($name, $onclick, $class = self::BUTTONPRIMARY)
    {
        return '<button class="btn ' . $class . '" onclick="' . $onclick . '">' . $name . '</button>';
    }

    /**
     * zwraca naglowek
     *
     * @param string $text
     * @return string
     */
    public function header(string $text): string
    {
        return '<h2>' . $text . '</h2>';
    }

    /**
     * zwraca listę
     *
     * @param $elements
     * @return string
     */
    public function list($elements) {
        $ret = '<ul>';
        foreach ($elements as $element) {
            $ret .= '<li>' . $element . '</li>';
        }
        $ret .= '</ul>';

        return $ret;
    }

    /**
     * @return string
     */
    public function tableBegin()
    {
        return '<table class="table">';
    }

    /**
     * @return string
     */
    public function tableEnd()
    {
        return '</table>';
    }

    /**
     * @param array $titles
     * @param array $rows
     * @return string
     */
    public function getTable(array $titles, array $rows)
    {
        $ret = '';
        $ret .= $this->tableBegin();

        $ret .= '<thead>';
        foreach ($titles as $title) {
            $ret .= $this->getTag('th', $title);
        }
        $ret .= '</thead>';
        foreach ($rows as $row)
        {
            $ret .= $this->row($row);
        }

        $ret .= $this->tableEnd();

        return $ret;
    }

    /**
     * @param $data
     * @return string
     */
    public function row($data)
    {
        $ret = '';
        $ret .= '<tr>';
        foreach ($data as $position) {
            $ret .= $this->getTag('td', $position);
        }
        $ret .= '</tr>';

        return $ret;
    }

    /**
     * @param $name
     * @param $value
     * @param string $type
     * @return string
     */
    public function input($name, $value, $type = 'text')
    {
        return '<input name="' . $name . '" value="' . $value . '" type="' . $type . '" class="form-control"/>';
        
    }

    /**
     * @param $action
     * @param string $method
     * @return string
     */
    public function formBegin($action, $method = 'POST')
    {

        return '<form action="' . $action . '" method="' . $method . '">';
    }

    /**
     * @return string
     */
    public function formEnd()
    {
        return '</form>';
    }

    /**
     * @return string
     */
    public function submit()
    {
        return '<p><input class ="btn btn-primary btn-lg" type="submit" value="Zapisz"/></p>';
    }

    /**
     * @param $name
     * @param $options
     * @param null $selectValue
     * @return string
     */
    public function select($name, $options, $selectValue = null)
    {
        $ret = '';
        $ret .= '<select name="' . $name . '" class="form-control">';
        foreach ($options as $option) {
            $ret .= '<option value="' . $option['value'] . '" '. ($option['value'] == $selectValue ? 'selected' : '') .'>' . $option['name'] . '</option>';
        }
        $ret .= '</select>';

        return $ret;
    }
}