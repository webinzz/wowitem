<x-admincom.layout>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css"  rel="stylesheet" />
    {{-- main --}}
    <div class="grid grid-cols-6 w-full gap-3">
      <div class="col-span-4 grid grid-cols-4 w-full gap-3">
        <x-admincom.count href="{{ url('admin/items') }}">
          <x-slot:total>{{ count($item) }}</x-slot:total>
          <x-slot:name>total item</x-slot:name>
          <x-slot:icon>shopping_bag</x-slot:icon>
        </x-admincom.count>

        <x-admincom.count href="{{ url('admin/items') }}">
          <x-slot:total>{{ count($user) }}</x-slot:total>
          <x-slot:name>total user</x-slot:name>
          <x-slot:icon>person</x-slot:icon>
        </x-admincom.count>
        
        <x-admincom.count href="{{ url('admin/items') }}">
          <x-slot:total>{{ count($category) }}</x-slot:total>
          <x-slot:name>total category</x-slot:name>
          <x-slot:icon>category</x-slot:icon>
        </x-admincom.count>

        <x-admincom.count href="{{ url('admin/items') }}">
          <x-slot:total>{{ count($admin) }}</x-slot:total>
          <x-slot:name>total admin</x-slot:name>
          <x-slot:icon>person</x-slot:icon>
        </x-admincom.count>
      </div>

      <div class="col-span-2 bg-white shadow rounded ">
        <canvas id="userchart"></canvas> 
        
      </div>
      
      <div class="col-span-4 h-96 bg-white shadow rounded ">
        <canvas id="peminjamanChart"></canvas> 
      </div>
      
      <div class="col-span-2 grid grid-cols-2 gap-3 shadow rounded ">
        <div class="col-span-1 bg-white shadow  relative h-52 -z-20 overflow-hidden p-4   gap-4">
                <div class="min-w-60 -z-10 bg-blue-100 absolute min-h-60 left-0 bottom-0 translate-y-28  -translate-x-20"></div>
                <p class=" text-blue-400 text-6xl">
                  {{ count($pending) }}
                </p>
                <p class="text-xl pt-5 absolute bottom-5 left-5 w-1/2 text-text text-left ">
                    Waiting acces</p>
        </div>
        <div class="col-span-1 bg-white shadow  relative h-52 -z-20 overflow-hidden p-4   gap-4">
                <div class="min-w-60  -z-10 bg-blue-100 absolute min-h-60 left-0 bottom-0 translate-y-28  translate-x-18"></div>
                <p class=" text-blue-400 text-6xl text-right">
                  {{ count($returned) }}
                </p>
                <p class="text-xl pt-5 absolute bottom-5 right-5 w-1/2 text-text text-right ">
                    succes borrowed</p>
        </div>
        <div class="col-span-2 bg-white -z-20 shadow h-40 relative overflow-hidden p-4">
          <div class="min-w-60  -z-10 bg-blue-100 absolute min-h-60 left-0 bottom-0 translate-x-[53px]">.</div>
          <p class=" text-blue-400 text-6xl text-center">
            {{ count($borrowing) }}
          </p>
          <p class="text-xl pt-5 text-center w-full text-text ">
              on borrowed</p>
        </div>
      </div>

        

    </div>

    <script>
      // Ambil elemen dengan id 'peminjamanChart'
      var ctx = document.getElementById('peminjamanChart').getContext('2d');
      var ctxuser = document.getElementById('userchart').getContext('2d');

      // Membuat grafik dengan data yang dikirim dari controller
      var peminjamanChart = new Chart(ctx, {
          type: 'bar', // Jenis grafik batang
          data: {
              labels: {!! json_encode($day) !!}, // Bulan sebagai label
              datasets: [{
                  label: 'Jumlah Peminjaman',
                  data: {!! json_encode($counts) !!}, // Jumlah peminjaman tiap bulan
                  backgroundColor: 'rgba(54, 162, 235, 0.6)', // Warna batang
                  borderColor: 'rgba(54, 162, 235, 1)', // Warna border
                  borderWidth: 1
              }]
          },
          options: {
              responsive: true,
              scales: {
                  y: {
                      beginAtZero: true // Memulai dari 0 di sumbu y
                  }
              }
          }
      });
      
      var userchart = new Chart(ctxuser, {
          type: 'bar', // Jenis grafik batang
          data: {
              labels: {!! json_encode($daycreate) !!}, // Bulan sebagai label
              datasets: [{
                  label: 'Jumlah user',
                  data: {!! json_encode($countuser) !!}, // Jumlah peminjaman tiap bulan
                  backgroundColor: 'rgba(54, 162, 235, 0.6)', // Warna batang
                  borderColor: 'rgba(54, 162, 235, 1)', // Warna border
                  borderWidth: 1
              }]
          },
          options: {
              responsive: true,
              scales: {
                  y: {
                      beginAtZero: true // Memulai dari 0 di sumbu y
                  }
              }
          }
      });
  </script>
  <script src="{{ asset('js/cruditem.js') }}"></script>

</x-admincom.layout>
