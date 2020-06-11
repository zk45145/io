<?php


class View_Specjalizacje
{
    private $content;
    private $form;
    public function __construct()
    {
        $this->content .= '<script src="js/specjalizacje.js"></script>';
        $this->form = new General_Form();
        if (isset($_GET['action'])) {
            switch ($_GET['action']) {
                case 'add':
                    $this->addAction();
                    break;
                case 'edit':
                    $this->editAction();
                    break;
                default:
                    $this->listAction();
                    break;
            }
        } else {
            $this->listAction();
        }
    }

    private function addAction()
    {
        $mapperSpecjalizacja = new Mapper_Specjalizacja();
        $specjalziacja = new Model_Specjalizacja();
        if (isset($_POST['action']) && $_POST['action'] == 'create') {
            $specjalziacja->setNazwa($_POST['nazwa']);
            $mapperSpecjalizacja->save($specjalziacja);
        }
        $this->content .= $this->form->formBegin('specjalizacje.php?action=add');
        $this->content .= $this->form->tableBegin();
        $this->content .= $this->form->row(['nazwa specjalizacji', $this->form->input('nazwa', '')]);
        $this->content .= $this->form->tableEnd();
        $this->content .= $this->form->input('action', 'create', 'hidden');
        $this->content .= $this->form->submit();
        $this->content .= $this->form->formEnd();
    }

    private function editAction()
    {
        $mapperSpecjalizacja = new Mapper_Specjalizacja();
        $specjalizacja = $mapperSpecjalizacja->getByIds($_POST['id']);
        if (isset($_POST['action']) && $_POST['action'] == 'update') {
            $specjalizacja->setNazwa($_POST['nazwa']);
            $mapperSpecjalizacja->save($specjalizacja);
        }

        $this->content .= $this->form->formBegin('specjalizacje.php?action=edit');
        $this->content .= $this->form->tableBegin();
        $this->content .= $this->form->row(['id', $specjalizacja->getId()]);
        $this->content .= $this->form->row(['nazwa specjalizacji', $this->form->input('nazwa', $specjalizacja->getNazwa())]);
        $this->content .= $this->form->tableEnd();
        $this->content .= $this->form->input('action', 'update', 'hidden');
        $this->content .= $this->form->input('id', $specjalizacja->getId(), 'hidden');
        $this->content .= $this->form->submit();
        $this->content .= $this->form->formEnd();
    }

    private function listAction()
    {
        $this->content .= $this->form->header('Lista specjalziacji');
        $this->content .= $this->form->button('Dodaj', 'add()');
        $title = [
            'id',
            'Nazwa',
            'Operacje'
        ];
        $mapperSpecjalizacja = new Mapper_Specjalizacja();
        $specjalizacje = $mapperSpecjalizacja->fetchAll();
        $data = [];
        foreach ($specjalizacje as $specjalizacja) {
            $data[] = [
                $specjalizacja->getId(),
                $specjalizacja->getNazwa(),
                $this->form->button('Edytuj', 'edit(' . $specjalizacja->getId() . ')')
            ];
        }
        $this->content .= $this->form->getTable($title, $data);
    }

    public function getContent()
    {
        return $this->content;
    }
}