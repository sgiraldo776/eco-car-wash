var myDate = $('#fecha');
var today = new Date();
var dd = today.getDate();
var mm = today.getMonth() + 1;
var yyyy = today.getFullYear();
if (dd < 10)
    dd = '0' + dd;

if (mm < 10)
    mm = '0' + mm;

today = yyyy + '-' + mm + '-' + dd;
myDate.attr("min", today);

function myFunction() {
    var date = myDate.val();
    if (Date.parse(date) < Date.parse(today)) {
            alert('La fecha no puede ser menor a la actual');
            myDate.val("");
    }
}