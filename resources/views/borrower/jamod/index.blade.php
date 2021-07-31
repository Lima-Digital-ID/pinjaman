@extends('borrower.app', ['jumbotron' => 'Pinjaman Modal'])


@section('body')
    <p>
        Fitur Pinjaman memakai agunan untuk pengembangan modal usaha dari 5 juta - 5 milyar dengan jangka waktu 1 tahun sampai dengan 5 tahun.
    </p>

    <div class="row">
        <div class="col-xl-6">
            <form action="{{ route('api.pinjaman.modal')}}" method="POST" autocomplete="off">
                @csrf
            <strong>Dengan ini :</strong>
                <table>
                <tr>
                    <td>Nama </td>
                    <td>: {{ $user }}</td>
                </tr>
                <tr>
                    <td>Jenis Pinjaman</td>
                    <td>: Pinjaman Modal</td>
                </tr>
                </table>
                <br>
                <div class="card">
                    <div class="card-body">
                            <label for="">Jangka waktu pengembalian :</label>
                            <div class="form-group">
                                <label for="">3 Tahun (36 bulan)</label> <br>
                                <label for="">Ajukan Nomimal Pinjaman (Rp.)</label>
                                <input type="number" placeholder="Rp." class="form-control" name="nominal">
                            </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                <button class="btn btn-danger mt-2 ">Selanjutnya</button>
                </div>
            </form>
        </div>
    </div>
@endsection