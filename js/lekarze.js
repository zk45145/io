function add()
{
    topLayer("lekarze.php?action=add&ajax=true", 'Dodawanie lekarza', {})
}

function edit(id)
{
    topLayer("lekarze.php?action=edit&ajax=true", 'Edycja lekarza', {id: id})
}

function del(id)
{
    topLayer("lekarze.php?action=delete&ajax=true", 'Usuwanie lekarza', {id: id})
}
