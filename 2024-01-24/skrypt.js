let element = document.createElement("p")
document.getElementById('promoSection').appendChild((element))

function CalculatePrice() {
    let radio1 = document.getElementById('1');
    let radio2 = document.getElementById('2');
    let radio3 = document.getElementById('3');
    let radio4 = document.getElementById('4');

    let selectedValue = radio1.checked ? 1 : radio2.checked ? 2 : radio3.checked ? 3 : radio4.checked ? 4 : 0;
    let price = 0;

    switch (selectedValue) {
        case 1:
            price = 15
            break
        case 2:
            price = 20
            break
        case 3:
            price = 30
            break
        case 4:
            price = 40
            break
    }

    if (price != 0) {
        element.innerText = "cena promocyjna: " + price;
    }
}