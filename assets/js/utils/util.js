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
    });
});
