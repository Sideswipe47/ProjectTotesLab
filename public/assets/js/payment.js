const url = window.location.href;
const fixed_url = url.substring(0, url.indexOf("?"));

function getSelectValue(selectObject) {
    var value = selectObject.value;
    window.location = fixed_url + "?delivery=" + value;
}
