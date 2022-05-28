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

    if (remaining <= 0) {
        $(element).val(text.substr(0, limit));
        $(`#count-${id}`).text(`0/${limit}`);
    } else {
        $(`#count-${id}`).text(remaining + `/${limit}`);
    }
}

/**
 * Growing textarea.
 */
 $("textarea").each(function () {
    this.setAttribute("style", "height:" + (this.scrollHeight) + "px;overflow-y:hidden;");
  }).on("change", function () {
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
