function copyToClipboard(path) {
    let tempInput = $('<input>');
    $('body').append(tempInput);
    tempInput.val(path).select();
    document.execCommand('copy');
    tempInput.remove();
    alert('Megosztási hivatkozás vágólapra másolva.');
}
