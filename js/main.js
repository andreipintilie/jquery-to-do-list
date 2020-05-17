const buttonAddReminder = $('#buttonAddReminder');
const reminderError = $('#reminderError');
const reminderInput = document.myForm.inputAddReminder;

let reminderID  = $('#rowsTotal').value + 1;
let themeStatus = 0;

// Prevent browser from refresh
$(document).ready(function () {
    $(buttonAddReminder).click(function (e) {
        e.preventDefault();
    });
});

reminderInput.focus(); //The 'reminderInput' is automatically focused after refresh !

const textCheck = function(){
    let charactersLeft = reminderInput.value.length;
    let charLeft = 5;

    for(let i; i < reminderInput.value.length; i++){
        charactersLeft++;
    }

    charLeft = charLeft - charactersLeft;
    
    if(!$(reminderInput).val().trim() ){
        $(reminderError).html(`<i class="fa fa-times pl-2 pr-2" aria-hidden="true"> </i>You cannot leave the input unfilled!`);
        $(reminderError).removeClass('text-info');
        $(reminderError).addClass('text-danger');
        $(reminderError).removeClass('text-success');
        return false;
    }
    else if(reminderInput.value.length < 5 && reminderInput.value.length > 0){
        $(reminderError).html(`<i class="fa fa-times pl-2 pr-2" aria-hidden="true"> </i>You need to type ${charLeft} more characters!`);
        $(reminderError).removeClass('text-info');
        $(reminderError).addClass('text-danger');
        $(reminderError).removeClass('text-success');
        return false;
    }
    else{
        reminderError.innerHTML = '';
        $(reminderError).removeClass('text-info');
        $(reminderError).removeClass('text-danger');
        $(reminderError).addClass('text-success');
        $(reminderError).html(`<i class="fa fa-check pl-2 pr-2" aria-hidden="true"> </i>Okay.`);
        return false;
    }
}

const addReminder = function(){
    if(!$(reminderInput).val().trim() ){
        $(reminderError).addClass('text-danger');
        $(reminderError).removeClass('text-info');
        $(reminderError).removeClass('text-success');
        $(reminderError).html('<i class="fa fa-times pl-2 pr-2" aria-hidden="true"></i> You did not type any character.</p>');
        return false;
    }
    else if(reminderInput.value.length < 5){
        return false;
    }
    else{
        const task = $(reminderInput).val();
        reminderID++;
        const customURL = `./functions/addReminder.php?id=${reminderID}&text=${task}`;
        return window.location = customURL;
    }
}

const removeReminder = function(idtask){
    $('#' + idtask).remove();
    window.location = './functions/removeReminder.php?id=' + idtask;
}

const removeAll = () => window.location = './functions/removeAll.php';

document.getElementById("buttonAddReminder").addEventListener("click", addReminder);