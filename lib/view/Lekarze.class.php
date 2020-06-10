<?php


class View_Lekarze
{
    private $content;
    private $form;
    public function __construct()
    {
        $this->form = new General_Form();
        if (isset($_GET['action'])) {
            switch ($_GET['action']) {
                default:
                    $this->listAction();
                    break;
            }
        } else {
            $this->listAction();
        }
    }

    private function listAction()
    {
        $this->content = $this->form->header('Lista lekarzy');
        $title = [
            'id',
            'Imie',
            'Nazwisko',
            'Specjalizacja',
            'Operacje'
        ];
        $mapperLekarz = new Mapper_Lekarz();
        $lekarze = $mapperLekarz->fetchAll();
        $data = [];
        foreach ($lekarze as $lekarz) {
            $data[] = [
                $lekarz->getId(),
                $lekarz->getImie(),
                $lekarz->getNazwisko(),
                $lekarz->getSpecjalizacjaId(),
                $this->form->getTag('button', 'edytuj')
            ];
        }
        $this->content =  $this->form->getTable($title, $data);
    }

    public function getContent()
    {
        return $this->content;
    }
}