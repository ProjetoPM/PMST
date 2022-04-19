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

function goTo(uri) {
    window.location.href=`${uri}`;
}