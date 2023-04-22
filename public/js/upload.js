function showFileName() {
    let file = $('#dropzone-file').val();
    $('#filename').html(file.split('\\')[2]);
}
function showLvl(){
    $('#lvl').html($('#difficulty_level').val());
}
