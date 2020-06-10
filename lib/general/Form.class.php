 <?php


class General_Form
{
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
        return '<table>';
    }

    public function tableEnd()
    {
        return '</table>';
    }

    public function getTable(array $titles, array $rows)
    {
        $ret = '';
        $ret .= $this->tableBegin();

        $ret .= '<tr>';
        foreach ($titles as $title) {
            $ret .= $this->getTag('th', $title);
        }
        $ret .= '</tr>';
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
}