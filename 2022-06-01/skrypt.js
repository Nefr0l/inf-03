function Zamow() {
    let n = document.getElementById('num').value;

    let str = "Twoje zamówienie to cukierek ";
    str += (n == 1) ? "cytryna" : (n == 2) ? "liść" : (n == 3) ? "banan" : "inny";

    document.getElementById("zam").innerText = str;

    let r = document.getElementById('r').value;
    let g = document.getElementById('g').value;
    let b = document.getElementById('b').value;

    str = "rgb(" + r + "," + g + "," + b + ")";
    document.getElementById('col').style.backgroundColor = str;
    console.log(str);
}