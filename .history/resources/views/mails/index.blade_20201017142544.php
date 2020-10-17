@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    Load Mails ?
                </a>
            @endif
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                <table id="datatable1" class="table table-striped table-bordered" style="width:100%">
                <thead bgcolor="#34abeb">
                    <tr>
                        <th>ID</th>
                        <th>Patient ID</th>
                        <th>Patient Name</th>
                        <th>Gender</th>
                        <th>Phone</th>
                        <th width="12%" >Date</th>
                        <th>PCR Result</th>
                        <th>Hospital Name</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>
                </tbody>
            </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('footer_scripts')

@endsection


