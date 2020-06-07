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
}