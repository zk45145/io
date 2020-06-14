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

    public function tableBegin()
    {
        return '<table class="table">';
    }

    public function tableEnd()
    {
        return '</table>';
    }

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

    public function input($name, $value, $type = 'text')
    {
        return '<input name="' . $name . '" value="' . $value . '" type="' . $type . '" class="form-control"/>';
        
    }

    public function formBegin($action, $method = 'POST')
    {

        return '<form action="' . $action . '" method="' . $method . '">';
    }

    public function formEnd()
    {
        return '</form>';
    }

    public function submit()
    {
        return '<p><input class ="btn btn-primary btn-lg" type="submit" value="Zapisz"/></p>';
    }

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