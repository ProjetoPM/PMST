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
}

function stylingLimitText(id) {
    var element = document.getElementById(`count-${id}`);

    element.style.padding = "3px";
    element.style.margin = "1px";
    element.style.borderRadius = "3px";
    element.style.backgroundColor = "#469714";
    element.style.color = "white";

    return element;
}

/**
 * Growing textarea.
 */
 $("textarea").each(function () {
    this.setAttribute("style", "height:" + (this.scrollHeight) + "px;overflow-y:hidden;");
  }).on("input", function () {
    if (this.scrollHeight < 380) {
        this.style.height = "auto";
        this.style.height = (this.scrollHeight) + "px";
        this.style.overflow = "hidden";
    } else {
        this.style.height = "380px";
        this.style.overflow = "auto";
    }
});

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
$(document).ready(function() {
    $('#table_report_list').DataTable({
        "bInfo": true,
        "responsive": true,
        "paging": true,
        "pageLength": 5,
        "lengthMenu": [5, 10, 25, 50, 100],
        "language": {
            "info": "Mostrando _PAGE_ de _PAGES_ dados.",
            "search": "Pesquise:"
        }
    });
});
