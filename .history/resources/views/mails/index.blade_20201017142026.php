@extends('layouts.app')


@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="card-box table-responsive">

            <table id="datatable1" class="table table-striped table-bordered" style="width:100%">
                <thead bgcolor="#34abeb">
                    <tr>
                        <th>ID</th>
                        <th>Patient ID</th>
                        <th>Patient Name</th>
                        <th>Gender</th>
                        <th>Phone</th>
                        <th width="12%" >Date</th>
                        <!--<th>IP/OP Number</th>
                        <th>Date of Sample Collection</th>
                        <th>Date of Testing</th>-->
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


@endsection

@section('footer_scripts')

@endsection


