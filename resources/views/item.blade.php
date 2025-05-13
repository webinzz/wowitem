
@if (session('succes'))
<x-admincom.alert class="bg-green-400">{{ session('succes') }}</x-admincom.alert>
@endif

<x-layout.sidelay>

    <main class="w-full min-h-[85vh] mb-5 m-0 flex flex-col shadow-lg p-2 bg-white" >
        <div class=" w-full relative  p-5 min-h-72 sm:flex gap-8" style="background-image: url('{{ asset("assets/bgitem.png") }}'); background-position: center">
            
            <figure class="group min-w-52 sm:w-60 w-full  h-60 bg-background border overflow-hidden" >
                <img src="{{ asset("storage/". $barang->image) }}" class="object-contain h-full w-full group-hover:scale-110 transition-all object-center"  alt="">
            </figure>

            <div class="flex flex-col  gap-1 text-white text-md">
                    <h2 class="text-2xl font-semibold text-white ">{{ $barang["name"] }}</h2>
                            <p>name : {{ $barang["name"] }}</p>
                            <p>merk : honda</p>
                            <p>stock : <span id="stock" >{{ $barang["stock"] }}</span></p>
                             
                            <p> description : {{ $barang["description"] }}</p>
                            <form action="{{ url('chart') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id_item" value="{{ $barang['id_item'] }}">
                                <input type="hidden" name="id_user" value="{{ Auth()->user()->id  }}">

                                <button type="submit" class="bg-white mt-2 p-2 text-text rounded-lg">add to chat</button>
                            </form>
                 
                    
            </div>
        </div>

    

        <div class="w-full sm:flex mt-4 p-3 pb-5  gap-6  items-start">
            <div class="text-text sm:w-2/3 w-full mx-2 flex flex-col gap-3" style="font-size: 15px;">
                <h2 class="font-bold mb-1">Borrowing Rules :</h2>
                <p>1. Borrowing Period. Items can be borrowed for up to 7 days. Late returns will incur a penalty based on the type of item.</p>
                <p>2. Returning Items in Good Condition. Borrowed items must be returned in the same condition. Users are responsible for any damage or loss.</p>
                <p>3. High-Value Items. A deposit may be required for high-value items and will be refunded upon the items safe return.</p>
                <p>4. Late Return Penalty. If the item is not returned on time, The penalty amount will be calculated based on the number of days late</p>
                <p>5. Borrowing Limit Users are only allowed to borrow a limited number of items per transaction, ensuring the availability of items for other users.</p>
                
            </div>

  
 
  

            <div class="bg-background shadow rounded-lg min-w-60 sm:w-1/3 mt-5 sm:mt-0 w-full p-5 text-text">
                <form method="POST" class="">
                    @csrf
                    <input type="hidden" name="id_item" value="{{ $barang['id_item'] }}">
                    <input type="hidden" name="id_user" value="{{ Auth()->user()->id  }}">
                    
                    <label for="quantity-input" class="block mb-2 text-sm font-medium ">Choose quantity:</label>
                    <div class="relative flex items-center max-w-[8rem]">
                        <button type="button" id="decrement-button"  class="bg-white  hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-11 focus:ring-gray-100  focus:ring-2 focus:outline-none">
                            -
                        </button>
                        <div class="w-16 h-full absolute top-0 left-8">.</div>
                        <input name="jumlah"  type="text" id="quantity-input" class="bg-gray-50 border-x-0 border-gray-300 h-11 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5" value="1" required />
                        <button type="button" id="increment-button"  class="bg-white  hover:bg-gray-100 border border-gray-300 rounded-e-lg p-3 h-11 focus:ring-gray-100 focus:ring-2 focus:outline-none">
                            +
                        </button>
                    </div>

                    <label for="" class="my-0 text-sm ">Return date :</label>
                    <input id="start-datetime"  type="date" name="tgl_kembali" placeholder="masukan tgl_kembali" required class="w-full py-2 px-3 my-2 border rounded border-text focus:border-blue-800 focus:outline-none">
                    <label for="" class="my-0 text-sm ">Return time :</label>
                    <input type="time" min="06:00" max="17:00" name="jam_kembali" placeholder="masukan jam_kembali" required class="w-full py-2 px-3 my-2 border rounded border-text focus:border-blue-800 focus:outline-none">
                    <button type="submit" class="w-full bg-blue-400 p-2 text-white my-4">Borrow</button>
                </form>
            </div>
            
           
        </div>
        
    </main>
        <script >
            
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
        </script>
    <script src="{{ asset("js/itemtunggal.js") }}"></script>

</x-layout.sidelay>





