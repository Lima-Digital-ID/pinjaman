@extends('borrower.app', ['jumbotron' => 'Pinjaman Dana Umroh'])

@section('body')
    <p>
        Fitur Pinjaman dana talangan umroh dan haji bagi UMKM.
    </p>
    <div class="row">
        <div class="col-xl-6">
            <strong>Dengan ini :</strong>
                <table>
                <tr>
                    <td>Nama </td>
                    <td>: Nama user pengguna</td>
                </tr>
                <tr>
                    <td>Jenis Pinjaman</td>
                    <td>: Dana Haji/Umroh</td>
                </tr>
                <tr>
                    <td>Total Pinjaman</td>
                    <td>: Harga total pinjaman</td>
                </tr>
                </table>
                <br>
                <div class="card">
                    <div class="card-body">
                            <label for="">Jangka waktu pengembalian :</label>
                            <div class="form-group">
                                <label for="">3 Tahun (36 bulan)</label> <br>
                                <label for="">Ajukan Nomimal Pinjaman (Rp.)</label>
                                <input type="number" placeholder="Rp." class="form-control">
                            </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                <button class="btn btn-danger mt-2 ">Selanjutnya</button>
                </div>
        </div>
        <div class="col-xl-6"></div>
    </div>

@endsection