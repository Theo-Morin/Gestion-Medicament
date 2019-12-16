$('#add_composant').click(function(){
    const index = +$('#widgets-counter').val();
    const tmpl = $('#medicament_lesComposers').data('prototype').replace(/__name__/g, index);
    $('#medicament_lesComposers').append(tmpl);
     $('#widgets-counter').val(index+1);
    handleDeletebutton();
    deleteLabel();
});

function handleDeletebutton() {
    $('button[data-action="delete"]').click(function(){
        const target = this.dataset.target;
        $(target).remove();
    });
}
function updateCounter()
{
    const count = $('#medicament_lesComposers div.form-group').Lenght;
    $('#widget_counter').val(count);
}

function deleteLabel()
{
    $(".col-form-label").css("display", "none");
}

updateCounter();
handleDeletebutton();
deleteLabel();