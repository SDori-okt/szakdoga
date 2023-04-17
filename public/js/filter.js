function institutionList() {
    document.getElementById("institutionList").classList.toggle("show");
}

function filterFunction() {
    let input, filter, a, i;
    input = document.getElementById("input");
    filter = input.value.toUpperCase();
    let div = document.getElementById("institutionList");
    a = div.getElementsByTagName("div");
    for (i = 0; i < a.length; i++) {
        let txtValue = a[i].innerHTML;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            a[i].style.display = "";
        } else {
            a[i].style.display = "none";
        }
    }
}

function selectInstitution(name, code) {
    document.getElementById("institute").innerHTML = name;
    document.getElementById("institution").value = code;
}
