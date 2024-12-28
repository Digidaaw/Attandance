@extends('layouts.app')

@section('content')
<body>
    <div class="flex flex-col justify-center items-center mt-10">
        <h1 class="font-bold text-2xl">
            View Data Lembur Karyawan 
        </h1>    
        <div class="flex flex-col justify-center items-start mt-10 gap-5">
            {{-- <button class="flex justify-start items-start text-white text-start px-4 hover:bg-white duration-300 hover:text-blue-600 rounded py-1 
            hover:border-2 hover:border-blue-600 border-2 border-white bg-blue-500">
                <a href="{{ route('presensi.create') }}">Buat Presensi</a>
            </button> --}}
            <table class="min-w-full text-sm text-left text-gray-800">
                <thead class="text-xs text-white uppercase bg-blue-500">
                  <tr>
                    <th class="px-6 py-4">No</th>
                    <th class="px-6 py-4">User</th>
                    <th class="px-6 py-4">Tanggal</th>
                    <th class="px-6 py-4">Jam Masuk</th>
                    <th class="px-6 py-4">Jam Keluar</th>
                    <th class="px-6 py-4">Keterangan</th>
                    <th class="px-6 py-4">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($lembur as $lembur)
                  <tr class="bg-white border-b hover:bg-gray-50">
                    <td class="px-6 py-4">{{ $lembur->id }}</td>
                    <td class="px-6 py-4">{{ $lembur->user_id }}</td>
                    <td class="px-6 py-4">{{ $lembur->tanggal }}</td>
                    <td class="px-6 py-4">{{ $lembur->jam_masuk }}</td>
                    <td class="px-6 py-4">{{ $lembur->jam_keluar }}</td>
                    <td class="px-6 py-4">{{ $lembur->keterangan }}</td>
                    <td class="px-6 py-4 flex gap-2">
                      {{-- <a href="{{ route('presensi.edit', $presensi->id) }}" 
                         class="px-4 py-2 bg-blue-500 text-white  hover:bg-white duration-300 hover:text-blue-600 rounded 
                            hover:border-2 hover:border-blue-600 border-2 border-white bg-blue-500>
                        ">Edit
                      </a> --}}
                      <form action="{{ route('lembur.destroy', $lembur->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                         <button type="submit" id="delete" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-white duration-300 hover:text-red-500 
                            hover:border-2 hover:border-red-500 border-2 border-white ">
                          Delete
                        </button>
                      </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        document.getElementById('delete').addEventListener('click', (e) => {
        if (!window.confirm("Are you sure you want to delete this?")) {
            e.preventDefault();
        }})
    </script>
</body>
@endsection
