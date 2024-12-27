@extends('layouts.app')

@section('content')
<body>
    <div>
        <form method="POST" action="/submit" class="">
            @csrf
            <div>
                <label for="">Masukkan Tanggal : </label>
                <input type="date" name="tanggal" id="tanggal" placeholder="input tanggal" required>
            </div>
            <div>
                <label for="">Jam Masuk : </label>
                <input type="time" name="jam_masuk" id="jam_masuk" placeholder="input tanggal" required>
            </div>
            <div>
                <label for="">Jam Keluar : </label>
                <input type="time" name="jam_keluar" id="jam_keluar" placeholder="input tanggal" required>
            </div>
            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
            <div>
                <button type="submit">Submit</button>
            </div>
        </form>
    </div>

</body>
@endsection
