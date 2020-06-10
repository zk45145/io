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
        print "<!DOCTYPE html>
               <html>
                    <head>
                        <title>Title of the document</title>
                        <script src='js/jQuery.js'></script>
                        <link rel=\"stylesheet\" href=\"css/bootstrap.min.css\">
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
        $menuToPrint = [];
        foreach ($this->menu as $position) {
            $menuToPrint[] = '<a href="' . $_SERVER['HTTP_HOST'] . '/io/' . $position['href'] . '">' . $position['name'] . '</a>';
        }
        print $this->form->list($menuToPrint);

        return $this;
    }
}