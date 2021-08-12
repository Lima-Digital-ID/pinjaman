@extends('borrower.app', ['jumbotron' => ''])

@push('stylsheet')
<link href="borrower/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
@endpush

@section('body')
<div class="col-xl-10">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detail Riwayat</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="riwayatTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">{{__('riwayat.type-loan')}}</th>
                            <th class="text-center">{{__('riwayat.nominal')}}</th>
                            <th class="text-center">{{__('riwayat.term')}}</th>
                            <th class="text-center">{{__('riwayat.date-of-filling')}}</th>
                            <th class="text-center">{{__('riwayat.loan-status')}}</th>
                            <th class="text-center"> {{__('riwayat.action')}} </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($riwayat['data'] as $key => $item)
                        
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ ucwords($item['id_jenis_pinjaman']) }}</td>
                            <td class="text-right">{{ 'Rp.'.number_format($item['nominal'], 2, '.', ',') }}</td>
                            <td class="text-center">{{ $item['jangka_waktu'] }} bulan</td>
                            <td class="text-center">{{ $item['tanggal_pengajuan'] }}</td>
                            <td class="text-center">{{ ucwords($item['status']) }}</td>
                            <td class="text-center">
                                <a href="{{ route('api.riwayat.detail', $item['id']) }}" class="btn btn-info mr-2" title="Detail" data-toggle="tooltip">
                                    <span class="fa fa-eye"></span>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
  <script src="borrower/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="borrower/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <script>
    $(document).ready(function() {
        $('#riwayatTable').DataTable();
    });
  </script>
@endpush