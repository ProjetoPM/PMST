/**
 * Function responsible to limit characters input
 * from text-fields and text-areas based on limit
 * pass by parameter.
 * 
 * @param {this} element you must pass 'this'
 * @param {int} limit the number to limit
 * @param {string} id the id to set to get the remaining
 */
function limitText(element, limit, id) {
    "use strict"
    var text = $(element).val();
    var remaining = limit - text.length;
    var limitStyled = stylingLimitText(id);

    if (remaining === limit) {
        limitStyled.style.display = "none";
        grow(element);
        return;
    }

    var fifty = limit * 0.5;
    var twentyFive = limit * 0.25;

    limitStyled.style.display = "inline";

    if (twentyFive >= remaining) {
        limitStyled.style.backgroundColor = "#971414";
        limitStyled.style.color = "white";
    } else if (fifty >= remaining) {
        limitStyled.style.backgroundColor = "#f0c000";
        limitStyled.style.color = "black";
    }

    if (remaining <= 0) {
        $(element).val(text.substr(0, limit));
        $(`#count-${id}`).text(`0/${limit}`);
    } else {
        $(`#count-${id}`).text(remaining + `/${limit}`);
    }
    grow(element);
}

function stylingLimitText(id) {
    var element = document.getElementById(`count-${id}`);

    element.style.fontSize = "12px";
    element.style.padding = "3px";
    element.style.margin = "3px 0";
    element.style.borderRadius = "3px";
    element.style.backgroundColor = "#469714";
    element.style.color = "white";

    return element;
}

/**
 * Growing textarea vinculated with limitText function.
 */
function grow(textarea) {
    let maxSizeInPixels = 380;

    if (textarea.scrollHeight < maxSizeInPixels) {
        textarea.style.height = "auto";
        textarea.style.height = Math.min(textarea.scrollHeight, maxSizeInPixels) + "px";
        textarea.style.overflow = "hidden";
    } else {
        textarea.style.height = maxSizeInPixels + "px";
        textarea.style.overflow = "visible";
    }
};

/**
 * Going to another URL.
 */
function goTo(uri) {
    window.location.href = `${uri}`;
}

/**
 * This will style all tables with id "#table_report_list"
 * on it. This will be the pattern in the next version.
 */
$(document).ready(function () {
    $('#table_report_list').DataTable({
        "bInfo": false,
        "responsive": true,
        "paging": true,
        "pageLength": 5,
        "lengthMenu": [5, 10, 25, 50, 100],
        "order": [[0, "desc"]]
    });
});

/**
 * WeeklyReport trigger input file.
 */
function openFileButton(element, button, textLabel) {
    "use strict"
    const hiddenInput = button.parentElement.querySelector(`.file-upload__input-${element}`);
    const fileUploadClass = button.parentElement;
    const formGroupFileUploadClass = fileUploadClass.parentElement;
    const lastElementToSwitch = formGroupFileUploadClass.parentElement;
    const label = lastElementToSwitch.querySelector(`.file-upload__label-${element}`);
    const defaultLabelText = `${textLabel}`;

    label.textContent = defaultLabelText;
    label.title = defaultLabelText;

    hiddenInput.click();

    hiddenInput.addEventListener('change', function () {
        const filenameList = Array.prototype.map.call(hiddenInput.files, function (file) {
            return file.name;
        });

        label.textContent = filenameList.join(', ') || defaultLabelText;
        label.title = label.textContent;
    });
}

function getProcessesName(processNumber, editPage = false, update = false, newPage = true) {
    const PATH = editPage 
        ? '../../weekly-report/process-name-ajax' 
        : '../weekly-report/process-name-ajax';

    /**
     * Weekly Report
     * Getting the process name based on process group
     * selected, using ajax calls. This will catch all
     * selected processes returned by database.
     */
    let valueProcessGroup;
    let selectProcessName;

    console.log(newPage);

    if (!newPage) {
        if (update) {
            valueProcessGroup = document.getElementById(`update[${processNumber}][process_group]`).value;
            selectProcessName = document.getElementById(`update[${processNumber}][process_name]`);
        } else {
            valueProcessGroup = document.getElementById(`add[${processNumber}][process_group]`).value;
            selectProcessName = document.getElementById(`add[${processNumber}][process_name]`);
        }
    } else {
        valueProcessGroup = document.getElementById(`add[${processNumber}][process_group]`).value;
        selectProcessName = document.getElementById(`add[${processNumber}][process_name]`);
    }

    /**
     * Ajax call.
     */
    $.get(PATH, function(data, status) {
        $(selectProcessName).empty();
        const dataToManipulate = JSON.parse(data);

        for (let i = 0; i < dataToManipulate.length; i++) {
            if (valueProcessGroup === dataToManipulate[i].pmbok_group_id) {
                $(selectProcessName).append($('<option>', {
                    value: dataToManipulate[i].pmbok_process_id,
                    text: dataToManipulate[i].name
                }));
            }
        }
        $(selectProcessName).value = 1;
    });
}
