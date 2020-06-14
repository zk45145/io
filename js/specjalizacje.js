function add()
{
    topLayer("specjalizacje.php?action=add&ajax=true", 'Dodawanie specjalizacji', {})
}

function edit(id)
{
    topLayer("specjalizacje.php?action=edit&ajax=true", 'Edycja specjalizacji',{id: id})
}
