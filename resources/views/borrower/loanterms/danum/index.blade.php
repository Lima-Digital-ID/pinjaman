@extends('borrower.app', ['jumbotron' => 'Syarat Dana Umroh'])

@section('body')
    <div class="form-group row">
        <label for="" class="col-md-2">File Suket Travel/KBIH</label>
        <input type="file" class="form-control col-md-4">
    </div>
    <div class="form-group row">
        <label for="" class="col-md-2">File Selfie Usaha</label>
        <input type="file" class="form-control col-md-4">
    </div>
    <div class="form-group row">
        <label for="" class="col-md-2">File SIUP</label>
        <input type="file" class="form-control col-md-4">
    </div>
    <div class="form-group row">
        <label for="" class="col-md-2">FILE NIB</label>
        <input type="file" class="form-control col-md-4">
    </div>
    <div class="form-group row">
        <label for="" class="col-md-2">File Scan Jaminan</label>
        <input type="file" class="form-control col-md-4">
    </div>
    <div class="form-group row">
        <div class="col-md-2"></div>
        <div class="col-md-4 d-flex justify-content-end">
            <button class="btn btn-primary">
                Submit
            </button>
        </div>
    </div>


@endsection