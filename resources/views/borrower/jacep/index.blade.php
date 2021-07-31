@extends('borrower.app',['jumbotron' => 'Pinjaman Cepat'])

@section('body')
    <p>
        Sebuah Pinjaman nasabah untuk keperluan apapun yang bisa di akses secara cepat mudah dan tanpa agunan
    </p>

    <div class="row">
        <div class="col-xl-6">
            <strong>Dengan ini :</strong>
                <table>
                <tr>
                    <td>Nama </td>
                    <td>: {{ $user }}</td>
                </tr>
                <tr>
                    <td>Jenis Pinjaman</td>
                    <td>: Pinjaman Cepat</td>
                </tr>
                <tr>
                    <td>Total Pinjaman</td>
                    <td>: {{ $limit_pinjaman }}</td>
                </tr>
                </table>
                <br>
                <label for="">Jangka waktu pengembalian :</label>
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <p class="">
                                    <strong>Pengembalian 1 Bulan</strong> <br>
                                    <small>Pelunasan selama 36 x 24jam</small>
                                </p>
                                <p class="">
                                
                                </p>
                                <p class="">
                                    <strong>Termin 1x</strong>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-2">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <p class="">
                                    <strong>Pengembalian 2 Bulan</strong> <br>
                                    <small>Pelunasan selama 30 x 24jam setelah pembayaran pertama</small>
                                </p>
                                <p class="">
                                
                                </p>
                                <p class="">
                                    <strong>Termin 2x</strong>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-2">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <p class="">
                                    <strong>Pengembalian 1 Bulan</strong> <br>
                                    <small>Pelunasan selama 36 x 24jam seteleah pembayaran kedua</small>
                                </p>
                                <p class="">
                                
                                </p>
                                <p class="">
                                    <strong>Termin 3x</strong>
                                </p>
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