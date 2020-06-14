function add()
{
    topLayer("pacjenci.php?action=add&ajax=true", 'Dodawanie pacjenta', {})
}

function edit(id)
{
    topLayer("pacjenci.php?action=edit&ajax=true", 'Edycja pacjenta', {id: id})
}

function del(id)
{
    topLayer("pacjenci.php?action=delete&ajax=true", 'Usuwanie pacjenta', {id: id})
}
