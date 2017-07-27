/**
 *
 * @param json
 */
function updateList(json) {
    $('#fileList').html('');
    json.forEach(function (file) {
        var $li = $('#liModel').clone();
        $li.find('a').attr('href', 'download.php?file=' + file).text(file);
        $li.removeAttr('id').removeClass('hidden');

        $('#fileList').append($li);
    });
}

/**
 *
 */
function performAJAX() {
        $.ajax({
            type: 'POST',
            url: '../loadFileList.php'
        })
         .done(function (data) {
            var json = JSON.parse(data);
            updateList(json);
        })
        .fail(function(){});
}
$(document).ready(function () {
    setInterval(performAJAX, 1000*3);
});
