<?php


class View_Lekarze
{
    private $content;
    private $form;
    public function __construct()
    {
        $this->content .= '<script src="js/lekarze.js"></script>';
        $this->form = new General_Form();
        if (isset($_GET['action'])) {
            switch ($_GET['action']) {
                case 'add':
                    $this->addAction();
                    break;
                case 'edit':
                    $this->editAction();
                    break;

                case 'delete':
                    $this->deleteAction();
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
        $mapperLekarz = new Mapper_Lekarz();
        $lekarz = new Model_Lekarz();
        if (isset($_POST['action']) && $_POST['action'] == 'create') {
            $lekarz->setImie($_POST['imie']);
            $lekarz->setNazwisko($_POST['nazwisko']);
            $lekarz->setSpecjalizacjaId($_POST['specjalizacja']);
            $mapperLekarz->save($lekarz);
            header('Location: lekarze.php');
        }
        $mapperSpecjalizacja = new Mapper_Specjalizacja();
        $specjalizacje = $mapperSpecjalizacja->fetchAll();
        $selectSpecjalziacje = [];
        foreach ($specjalizacje as $specjalizacja) {
            $selectSpecjalziacje[] = [
                'value' => $specjalizacja->getId(),
                'name' => $specjalizacja->getNazwa()
            ];
        }

        $this->content .= $this->form->formBegin('lekarze.php?action=add');
        $this->content .= $this->form->tableBegin();
        $this->content .= $this->form->row(['imie', $this->form->input('imie', '')]);
        $this->content .= $this->form->row(['nazwisko', $this->form->input('nazwisko', '')]);
        $this->content .= $this->form->row(['specjalizacja', $this->form->select('specjalizacja', $selectSpecjalziacje)]);
        $this->content .= $this->form->tableEnd();
        $this->content .= $this->form->input('action', 'create', 'hidden');
        $this->content .= $this->form->submit();
        $this->content .= $this->form->formEnd();
    }

    private function editAction()
    {
        $mapperLekarz = new Mapper_Lekarz();
        $lekarz = $mapperLekarz->getByIds($_POST['id']);
        if (isset($_POST['action']) && $_POST['action'] == 'update') {
            $lekarz->setImie($_POST['imie']);
            $lekarz->setNazwisko($_POST['nazwisko']);
            $lekarz->setSpecjalizacjaId($_POST['specjalizacja']);
            $mapperLekarz->save($lekarz);
            header('Location: lekarze.php');
        }
        $mapperSpecjalizacja = new Mapper_Specjalizacja();
        $specjalizacje = $mapperSpecjalizacja->fetchAll();
        $selectSpecjalziacje = [];
        foreach ($specjalizacje as $specjalizacja) {
            $selectSpecjalziacje[] = [
                'value' => $specjalizacja->getId(),
                'name' => $specjalizacja->getNazwa()
            ];
        }

        $this->content .= $this->form->formBegin('lekarze.php?action=edit');
        $this->content .= $this->form->tableBegin();
        $this->content .= $this->form->row(['id', $lekarz->getId()]);
        $this->content .= $this->form->row(['imie', $this->form->input('imie',$lekarz->getImie())]);
        $this->content .= $this->form->row(['nazwisko', $this->form->input('nazwisko', $lekarz->getNazwisko())]);
        $this->content .= $this->form->row(['specjalizacja', $this->form->select('specjalizacja', $selectSpecjalziacje, $lekarz->getSpecjalizacjaId())]);
        $this->content .= $this->form->tableEnd();
        $this->content .= $this->form->input('action', 'update', 'hidden');
        $this->content .= $this->form->input('id', $lekarz->getId(), 'hidden');
        $this->content .= $this->form->submit();
        $this->content .= $this->form->formEnd();
    }

    private function listAction()
    {
        $this->content .= $this->form->header('Lista lekarzy');
        $this->content .= $this->form->button('Dodaj', 'add()');
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
                $lekarz->getSpecjalizacja()->getNazwa(),
                $this->form->button('Edytuj', 'edit(' . $lekarz->getId() . ')') . ' ' .
                $this->form->button('Usuń', 'del(' . $lekarz->getId() . ')', General_Form::BUTTONDANGER)
            ];
        }
        $this->content .= $this->form->getTable($title, $data);
    }

    private function deleteAction()
    {
        if (isset($_POST['action']) && $_POST['action'] == 'delete') {
            $mapperLekarz = new Mapper_Lekarz();
            $mapperLekarz->deleteById($_POST['id']);
            header('Location: lekarze.php');
        }
        $this->content .= $this->form->formBegin('lekarze.php?action=delete');
        $this->content .= $this->form->tableBegin();
        $this->content .= $this->form->row(['Zostanie usuniety lekarz']);
        $this->content .= $this->form->tableEnd();
        $this->content .= $this->form->input('action', 'delete', 'hidden');
        $this->content .= $this->form->input('id', $_POST['id'], 'hidden');
        $this->content .= $this->form->submit();
        $this->content .= $this->form->formEnd();
    }

    public function getContent()
    {
        return $this->content;
    }
}