function masukanNilai(param) {
    document.querySelector("#layar").value = param;
    var currencyInput = document.querySelector('input[type="currency"]')
    currencyInput.focus()
    currencyInput.blur()
}
function toPersen(value,target) {
    console.log(value * target/100);
    return value * target/100
}