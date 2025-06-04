SelectEmpty()
var orderId = 0;

function SelectEmpty() {
    let tds = document.getElementsByClassName('count')

    for (let i = 0; i < tds.length; i++) {
        let td = tds[i];

        console.log(tds[i].innerHTML)
        
        if (td.innerHTML == 0) {
            td.style.backgroundColor = 'red';
        }
        else if (td.innerHTML <= 5 && td.innerHTML >= 1) {
            td.style.backgroundColor = 'yellow';
        }
        else {
            td.style.backgroundColor = 'honeydew';
        }
    }
}

function Update(index) {
    let newValue = prompt("Podaj nową ilość:")
    let elementId = "value" + index;
    let element = document.getElementById(elementId);
    element.innerHTML = newValue;
    SelectEmpty();
}

function Order(index) {
    orderId++;

    let elementId = "product" + index;
    let element = document.getElementById(elementId);

    let message = "Zamówienie nr: " + orderId + " Produkt: " + element.innerHTML

    alert(message);
}