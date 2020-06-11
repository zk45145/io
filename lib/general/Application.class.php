<?php


class General_Application
{
    /**
     * @var General_Form
     */
    private $form;

    /**
     * Tablica z pozycjami menu
     *
     * @var string[][]
     */
    private $menu = [
        [
            'name' => 'Strona Główna',
            'href' => 'index.php'
        ],
        [
            'name' => 'Kontakt',
            'href' => 'contact.php'
        ],
        [
            'name' => 'Specjalizacje',
            'href' => 'specjalizacje.php'
        ],
        [
            'name' => 'Lekarze',
            'href' => 'lekarze.php'
        ]
    ];

    /**
     * General_Application constructor.
     */
    public function __construct()
    {
        $this->form = new General_Form();
    }

    /**
     * drukuje naglowek pliku html
     *
     * @return $this
     */
    public function printHeader()
    {
        if (isset($_GET['ajax']) && $_GET['ajax']) {
            return $this;
        }
        print "<!DOCTYPE html>
               <html>
                    <head>
                        <title>Title of the document</title>
                        <script src='js/jQuery.js'></script>
                        <script src='js/main.js'></script>
                        <link rel=\"stylesheet\" href=\"css/bootstrap.min.css\">
                        <link rel=\"stylesheet\" href=\"css/style.css\">
                    </head>
                    <body>";

        return $this;
    }

    /**
     * drukuje stopke pliku html
     *
     * @return $this
     */
    public function printFooter()
    {
        if (isset($_GET['ajax']) && $_GET['ajax']) {
            return $this;
        }
        print "    </body>
               </html>";

        return $this;
    }

    /**
     * drukuje naglowek strony
     *
     * @param string $headerText
     *
     * @return $this
     */
    public function printHeaderText(string $headerText)
    {
        if (isset($_GET['ajax']) && $_GET['ajax']) {
            return $this;
        }
        print $this->form->getTag('h1', $headerText);

        return $this;
    }

    /**
     * drukuje menu
     *
     * @return $this
     */
    public function printMenu()
    {
        if (isset($_GET['ajax']) && $_GET['ajax']) {
            return $this;
        }
        $menuToPrint = [];
        foreach ($this->menu as $position) {
            $menuToPrint[] = '<a class="nav-link" href="' . $position['href'] . '">' . $position['name'] . '</a>';
        }

        $ret = '<div class="navbar navbar-expand-sm bg-light">';
        $ret .= '<ul class="navbar-nav">';
        foreach ($menuToPrint as $element) {
            $ret .= '<li class="nav-item">' . $element . '</li>';
        }
        $ret .= '</ul>';
        $ret .= '</div>';
        print $ret;

        return $this;
    }
}