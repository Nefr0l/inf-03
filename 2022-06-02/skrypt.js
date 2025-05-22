let text = document.createElement('p');
document.getElementById('main_container').appendChild(text);

function Calculate() {
    let fuelType = document.getElementById('fuel_name').value;
    let fuelCost = fuelType == 1 ? 4 : fuelType == 2 ? 3.5 : 0;
    let fuelCount = document.getElementById('fuel_count').value;
    let fuelPrice = fuelCost * fuelCount;

    text.innerText = "koszt paliwa: " + fuelPrice + " zł";
}