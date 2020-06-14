<?php


class View_Pacjenci
{
    private $content;
    private $form;
    public function __construct()
    {
        $this->content .= '<script src="js/pacjenci.js"></script>';
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
        $mapperPacjent = new Mapper_Pacjent();
        $pacjent = new Model_Pacjent();
        if (isset($_POST['action']) && $_POST['action'] == 'create') {
            $pacjent->setImie($_POST['imie']);
            $pacjent->setNazwisko($_POST['nazwisko']);
            $pacjent->setNumerTelefonu($_POST['numer_telefonu']);
            $pacjent->setUlica($_POST['ulica']);
            $pacjent->setMiasto($_POST['miasto']);
            $pacjent->setEMail($_POST['adres_email']);
            $pacjent->setDataUrodzenia($_POST['data_urodzenia']);
            $mapperPacjent->save($pacjent);
            header('Location: pacjenci.php');
        }
        
        

        $this->content .= $this->form->formBegin('pacjenci.php?action=add');
        $this->content .= $this->form->tableBegin();
        $this->content .= $this->form->row(['Imię', $this->form->input('imie', '')]);
        $this->content .= $this->form->row(['Nazwisko', $this->form->input('nazwisko', '')]);
        $this->content .= $this->form->row(['Numer telefonu', $this->form->input('numer_telefonu', '')]);
        $this->content .= $this->form->row(['Ulica', $this->form->input('ulica', '')]);
        $this->content .= $this->form->row(['Miasto', $this->form->input('miasto', '')]);
        $this->content .= $this->form->row(['Adres e-mail', $this->form->input('adres_email', '')]);
        $this->content .= $this->form->row(['Data urodzenia', $this->form->input('data_urodzenia', '')]);
        $this->content .= $this->form->tableEnd();
        $this->content .= $this->form->input('action', 'create', 'hidden');
        $this->content .= $this->form->submit();
        $this->content .= $this->form->formEnd();
    }

    private function editAction()
    {
        $mapperPacjent = new Mapper_Pacjent();
        $pacjent = $mapperPacjent->getByIds($_POST['id']);
        if (isset($_POST['action']) && $_POST['action'] == 'update') {
            $pacjent->setImie($_POST['imie']);
            $pacjent->setNazwisko($_POST['nazwisko']);
            $pacjent->setNumerTelefonu($_POST['numer_telefonu']);
            $pacjent->setAdres($_POST['ulica'], $_POST['miasto']);
            $pacjent->setEMail($_POST['adres_email']);
            $pacjent->setDataUrodzenia($_POST['data_urodzenia']);
            $mapperPacjent->save($pacjent);
            header('Location: pacjenci.php');
        }

        

        $this->content .= $this->form->formBegin('pacjenci.php?action=edit');
        $this->content .= $this->form->tableBegin();
        $this->content .= $this->form->row(['ID', $pacjent->getId()]);
        $this->content .= $this->form->row(['Imię', $this->form->input('imie',$pacjent->getImie())]);
        $this->content .= $this->form->row(['Nazwisko', $this->form->input('nazwisko', $pacjent->getNazwisko())]);
        $this->content .= $this->form->row(['Numer telefonu', $this->form->input('numer_telefonu', $pacjent->getNumerTelefonu())]);
        $this->content .= $this->form->row(['Ulica', $this->form->input('ulica', $pacjent->getUlica())]);
        $this->content .= $this->form->row(['Miasto', $this->form->input('miasto', $pacjent->getMiasto())]);
        $this->content .= $this->form->row(['E-mail', $this->form->input('adres_email', $pacjent->getEMail())]);
        $this->content .= $this->form->row(['Data urodzenia', $this->form->input('data_urodzenia', $pacjent->getDataUrodzenia())]);
        $this->content .= $this->form->tableEnd();
        $this->content .= $this->form->input('action', 'update', 'hidden');
        $this->content .= $this->form->input('id', $pacjent->getId(), 'hidden');
        $this->content .= $this->form->submit();
        $this->content .= $this->form->formEnd();
    }

    private function listAction()
    {
        $this->content .= $this->form->header('<p>Lista pacjentów');
        $this->content .= $this->form->button('Dodaj', 'add()', "btn btn-primary btn-lg btn-block");
        $title = [
            'ID',
            'Imię',
            'Nazwisko',
            'Numer telefonu',
            'Ulica',
            'Miasto',
            'Adres e-mail',
            'Data urodzenia',
            'Operacje'
        ];
        $mapperPacjent = new Mapper_Pacjent();
        $pacjenci = $mapperPacjent->fetchAll();
        $data = [];
        foreach ($pacjenci as $pacjent) {
            $data[] = [
                $pacjent->getId(),
                $pacjent->getImie(),
                $pacjent->getNazwisko(),
                $pacjent->getNumerTelefonu(),
                $pacjent->getUlica(),
                $pacjent->getMiasto(),
                $pacjent->getEMail(),
                $pacjent->getDataUrodzenia(),
                $this->form->button('Edytuj', 'edit(' . $pacjent->getId() . ')') . ' ' .
                $this->form->button('Usuń', 'del(' . $pacjent->getId() . ')', General_Form::BUTTONDANGER)
            ];
        }
        $this->content .= $this->form->getTable($title, $data);
    }

    private function deleteAction()
    {
        if (isset($_POST['action']) && $_POST['action'] == 'delete') {
            $mapperPacjent = new Mapper_Pacjent();
            $mapperPacjent->deleteById($_POST['id']);
            header('Location: pacjenci.php');
        }
        $this->content .= $this->form->formBegin('pacjenci.php?action=delete');
        $this->content .= $this->form->tableBegin();
        $this->content .= $this->form->row(['Zostanie usuniety pacjent']);
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