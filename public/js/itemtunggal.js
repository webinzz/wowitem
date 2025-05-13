
const input = document.getElementById('quantity-input');
const tambah = document.getElementById('increment-button')
    
// Misalnya, ini adalah stok yang tersedia
const maxStock = parseInt(document.getElementById("stock").innerHTML);
// Tambahkan event listener pada tombol increment
tambah.addEventListener('click', () => {
    let currentValue = parseInt(input.value);
    if (currentValue < maxStock) {

        input.value = currentValue + 1; // Increment value
    } else {
        input.value = 1
    }
});

// Tambahkan event listener pada tombol decrement
document.getElementById('decrement-button').addEventListener('click', () => {
    let currentValue = parseInt(input.value);
    if (currentValue > 1) { // Cek agar tidak negatif
        input.value = currentValue - 1; // Decrement value
    } else {
        input.value = maxStock
    }
});

//input tanggal
const today = new Date();
const year = today.getFullYear();
const month = (today.getMonth() + 1).toString().padStart(2, '0'); // Bulan harus dalam 2 digit
const day = today.getDate().toString().padStart(2, '0');

const minDate = `${year}-${month}-${day}`;
document.getElementById("start-datetime").min = minDate;

const maxDate = new Date(today);
maxDate.setDate(maxDate.getDate() + 7); // Tambahkan 7 hari
const maxYear = maxDate.getFullYear();
const maxMonth = (maxDate.getMonth() + 1).toString().padStart(2, '0');
const maxDay = maxDate.getDate().toString().padStart(2, '0');


const maxDateTime = `${maxYear}-${maxMonth}-${maxDay}`;
document.getElementById("start-datetime").max = maxDateTime;

function closemassage(){
    let massage = document.getElementById('massage');
    massage.classList.add("hidden"); 
}
