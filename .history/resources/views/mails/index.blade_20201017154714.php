@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('mails.fetch') }}">
                    Load Mails ?
                </a>
            @endif
            <div class="card">
                <div class="card-header">Mails</div>

                <div class="card-body">
                <table id="datatable1" class="table table-striped table-bordered" style="width:100%">
                    <thead bgcolor="#34abeb">
                        <tr>
                            <th>ID</th>
                            <th>Content</th>
                            <th>Subject</th>
                            <th>From</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($mails as $key => $mail)   
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $mail->content }}</td>
                            <td>{{ $mail->subject }}</td>
                            <td>{{ $mail->from }}</td>
                            <td>{{ $mail->date }}</td>
                            <td class="morebtns">
                                <a class="list-icon" href="{{ route('mails.delete',$mail->id) }}">
                                    <i style="font-size:large;padding:5px;" class="fa fa-trash red"></i>
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
</div>

@endsection


@section('footer_scripts')
<script type="text/javascript">
$(document).ready(function() {
    $('#datatable1').DataTable();
});        
</script>
@endsection


