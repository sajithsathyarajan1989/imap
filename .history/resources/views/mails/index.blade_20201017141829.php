@extends('layouts.app')


@section('content')

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Patient Registration</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <!-- Mails LISTING -->
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Patient Management <small> Details</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li>
                            @hasanyrole('SuperAdmin|Administrator')
                                <a title="Approve Patient" href="#bulkapproveModal" class="btn-bulk-approve btn btn-success paneltoolboxbtn hide" data-toggle="modal" > 
                                    Bulk Approve Selected Patients<i style="font-size:large;padding:5px;" class="fa fa-thumbs-o-up white" aria-hidden="true"></i>
                                </a>
                            @endhasanyrole
                            </li>
                            <li>
                                <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li>
                                <a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
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
                    </div>
                </div>
            </div>
            <!-- #PATIENT LISTING -->
            
        </div>

    </div>
</div>


@endsection

@section('footer_scripts')

@endsection


