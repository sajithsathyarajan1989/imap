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
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Patient Registration <small>Patient Registration</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li>
                                <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <!--<li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a class="dropdown-item" href="#">Settings 1</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">Settings 2</a>
                                    </li>
                                </ul>
                            </li>-->
                            <li>
                                <a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>

                    <!-- START CREATING ROLES -->
                    <div class="x_content">
                        <br />
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                                </ul>
                            </div>
                        @endif

                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif

                        {!! Form::open(array('route' => 'patients.store','method'=>'POST')) !!}

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">
                                    Patient ID <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    {!! Form::text('uuid', $locdata['patientNextId'], array( 'patientid','class' => 'form-control', 'required'=>'required', 'readonly'=>'readonly')) !!}
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">
                                    Serial Number <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    {!! Form::text('serialnumber', $locdata['nextId'], array( 'serialnumber','class' => 'form-control', 'required'=>'required', 'readonly'=>'readonly')) !!}
                                </div>
                            </div>
                            
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">
                                    Patient Name <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control', 'required'=>'required',
                                        'oninvalid'=>"this.setCustomValidity('Please fill the patient name')",
                                        'oninput'=>"this.setCustomValidity('')"
                                        )) !!}
                                </div>
                            </div>
                            
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">
                                    Address <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                {!! Form::textarea('address',null,['class'=>'form-control', 'rows' => 2, 'cols' => 40, 'required'=>'required',
                                    'placeholder'=>'Address',
                                    'oninvalid'=>"this.setCustomValidity('Please fill the address')",
                                    'oninput'=>"this.setCustomValidity('')"
                                    ]) !!}
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Gender</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <div id="gender" class="btn-group" data-toggle="buttons">
                                        <label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                            <input type="radio" name="gender" value="Male" class="join-btn" > &nbsp; Male &nbsp;
                                        </label>
                                        <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                            <input type="radio" name="gender" value="Female" class="join-btn" > Female
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">
                                    DOB 
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <div class="form-group">
                                        <div class='input-group date' id='myDatepicker2'>
                                            <input value="{{ old('dob') }}" name="dob" id="dob" placeholder="DD-MM-YYYY" type='text' class="form-control" />
                                            <span class="input-group-addon">
                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <!--<input name="dob" id="DOB" class="date-picker form-control" placeholder="DD/MM/YYYY" type="text" type="text" onfocus="this.type='date'" onclick="this.type='date'"  onmouseout="timeFunctionLong(this)">-->
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">
                                    Age <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    {!! Form::number('age', null, array( 'onkeydown'=>'return event.keyCode !== 69', 'id'=>'age','placeholder' => 'Age','class' => 'form-control', 'required'=>'required',
                                        'oninvalid'=>"this.setCustomValidity('Please fill the age')",
                                        'oninput'=>"this.setCustomValidity('')"
                                        )) !!}
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">
                                    Phone <span class="required">*</span>
                                </label>
                                <div class="col-md-2 col-sm-2">
                                    <input type="text" class="form-control" style="text-align:center;" name="phonecode" value="(+91)" readonly="" />
                                </div>
                                <div class="col-md-4 col-sm-4 ">
                                    {!! Form::number('phone', null, array('minlength'=>"10",'maxlength'=>'10','placeholder' => 'Phone','class' => 'form-control', 'required'=>'required',
                                        'oninvalid'=>"this.setCustomValidity('Please fill the phone number')",
                                        'oninput'=>"this.setCustomValidity('')"
                                        )) !!} 
                                </div>
                                    
                                    <!--<input data-inputmask="'mask' : '(999) 999-9999'" type="text" name='phone' placeholder='Phone' class='form-control' required='required' />-->
                                
                            </div>
                            
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">
                                    Referred By <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    {!! Form::text('reffered_by', null, array('placeholder' => 'Referred By','class' => 'form-control', 'required'=>'required',
                                        'oninvalid'=>"this.setCustomValidity('Please fill the referred by')",
                                        'oninput'=>"this.setCustomValidity('')"
                                        )) !!}
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">
                                    IP/OP Number <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    {!! Form::text('ip_op_number', null, array('placeholder' => 'IP/OP Number','class' => 'form-control', 'required'=>'required',
                                        'oninvalid'=>"this.setCustomValidity('Please fill the ip/op number')",
                                        'oninput'=>"this.setCustomValidity('')"
                                        )) !!}
                                </div>
                            </div>

                            <!-- 3 date fields should go here -->
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">
                                 Date of Sample Collection <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <div class="form-group">
                                        <div class='input-group date' id='myDatepicker3'>
                                            <input value="{{old('date_sample_collection')}}" name="date_sample_collection" id="date_sample_collection" placeholder="DD-MM-YYYY" type='text' class="form-control" required='required' 
                                             
                                            />
                                            <span class="input-group-addon">
                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <!--<input name="dob" id="DOB" class="date-picker form-control" placeholder="DD/MM/YYYY" type="text" type="text" onfocus="this.type='date'" onclick="this.type='date'"  onmouseout="timeFunctionLong(this)">-->
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">
                                Date and time of receipt of Sample Specimen <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <div class="form-group">
                                        <div class='input-group date' id='myDatepicker4'>
                                            <input value="{{old('date_sample_specimen')}}" name="date_sample_specimen" id="date_sample_specimen" placeholder="DD-MM-YYYY" type='text' class="form-control" required='required'
                                            
                                            />
                                            <span class="input-group-addon">
                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">
                                 Date of Testing <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <div class="form-group">
                                        <div class='input-group date' id='myDatepicker5'>
                                            <input value="{{old('date_testing')}}" name="date_testing" id="date_testing" placeholder="DD-MM-YYYY" type='text' class="form-control" required='required' 
                                            
                                            />
                                            <span class="input-group-addon">
                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="PCR result">
                                    PCR Result <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select name="pcr_result" id="pcr_result" class="form-control" required
                                    oninvalid="this.setCustomValidity('Please choose the pcr result')",
                                    oninput="this.setCustomValidity('')"
                                    >
                                        <option value="">--Select PCR Result--</option>
                                        <option value="Positive" {{ old('pcr_result')=='Positive' ? 'selected' : ''  }}>Positive </option>
                                        <option value="Negative" {{ old('pcr_result')=='Negative' ? 'selected' : ''  }}>Negative </option>
                                    </select>
                                </div>               
                            </div>
                            
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="PCR result">
                                    Sample Category <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select name="sample_category" id="sample_category" class="form-control" required
                                    oninvalid="this.setCustomValidity('Please choose the sample category')",
                                    oninput="this.setCustomValidity('')"
                                    >
                                        <option value="">--Select Sample Category--</option>
                                        <option value="Cat 1" {{ old('sample_category')=='Cat 1' ? 'selected' : ''  }}>Category 1 </option>
                                        <option value="Cat 2" {{ old('sample_category')=='Cat 2' ? 'selected' : ''  }}>Category 2 </option>
                                        <option value="Cat 3" {{ old('sample_category')=='Cat 3' ? 'selected' : ''  }}>Category 3 </option>
                                        <option value="Other" {{ old('sample_category')=='Other' ? 'selected' : ''  }}>Other </option>
                                    </select>
                                </div>               
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="PCR result">
                                    State <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select name="state_id" id="state_id" class="form-control" required
                                    oninvalid="this.setCustomValidity('Please choose the state')",
                                    oninput="this.setCustomValidity('')"
                                    >
                                        <option value="">--Select State--</option>
                                        @foreach ($allstates as $state)
                                            <option value="{{$state->id}}" {{ old('state_id')== $state->id ? 'selected' : ''  }}>{{$state->state_name}}</option>
                                        @endforeach
                                    </select>
                                </div>               
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="PCR result">
                                    District <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select name="district_id" id="district_id" class="form-control" required
                                    oninvalid="this.setCustomValidity('Please choose the district')",
                                    oninput="this.setCustomValidity('')"
                                    >
                                        <option value="">--Select District--</option>
                                        @foreach ($alldistricts as $dist)
                                            <option value="{{$dist->id}}" {{ old('district_id')== $dist->id ? 'selected' : ''  }}>{{$dist->district_name}}</option>
                                        @endforeach
                                    </select>
                                </div>               
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="PCR result">
                                    Hospital <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select name="hospital_id" id="hospital_id" class="form-control" required
                                    oninvalid="this.setCustomValidity('Please choose the hospital')",
                                    oninput="this.setCustomValidity('')"
                                    >
                                        <option value="">--Select Hospital--</option>
                                        @foreach ($allhospitals as $hospital)
                                            <option value="{{$hospital->id}}" {{ old('hospital_id')== $hospital->id ? 'selected' : ''  }}>{{$hospital->hospital_name}}</option>
                                        @endforeach
                                    </select>
                                </div>               
                            </div>
                            

                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <button type="submit" class="btn btn-success">Save</button>
                                    <button class="btn btn-primary" type="reset">Reset</button>

                                    <a href="{{route('home')}}" class="btn btn-primary" type="button">Cancel</a>
                                    <!--<button class="btn btn-primary" type="button">Cancel</button>-->

                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div>
                    <!-- ##end creating roles -->
                </div>
            </div>

            <!-- PATIENT LISTING -->
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
                                                <th>Actions</th>
                                                @hasanyrole('SuperAdmin|Administrator')
                                                <th class="no-sort"><input type="checkbox" name="select_all" value="1" id="example-select-all"></th>
                                                @endhasanyrole
                                            </tr>
                                        </thead>

                                        <tbody>

                                            @php
                                            $cntusers = count($patients);
                                            @endphp
                                            @foreach ($patients as $key => $patient)    

                                            <tr class="clsrow{{$patient->id}}">
                                               <td>{{ $key+1 }}</td>
                                                <td>{{ $patient->uuid }}</td>
                                                <td>{{ $patient->name }}</td>
                                                <td>{{ $patient->gender }}</td>
                                                <td>{{ $patient->phone }}</td>
                                                <td>{{ date('d-m-Y', strtotime($patient->created_at)) }}</td>
                                                <!--<td>{{ $patient->ip_op_number }}</td>
                                                <td>{{ $patient->date_sample_collection }}</td>
                                                <td>{{ $patient->date_testing }}</td>-->
                                                <td>{{ $patient->pcr_result }}</td>
                                                <td>@if ($patient->hospital)
                                                    {{ $patient->hospital->hospital_name }}
                                                    @endif
                                                </td>
                                                <td class="clsrowstatus{{$patient->id}}">
                                                    @if ($patient->status == 1)
                                                    Active
                                                    @else
                                                     Inactive
                                                    @endif

                                                </td>
                                                <td class="morebtns">
                                                    @if ($patient->status == 0)
                                                        <a class="list-icon ptedit{{$patient->id}}" href="{{ route('patients.edit',$patient->id) }}">
                                                                <i style="font-size:large ;padding:5px;" class="fa fa-edit green"></i>
                                                        </a>
                                                    @endif
                                                    <a attrid="{{$patient->id}}" href="#myModal" class="list-icon linkremoverole" data-toggle="modal" > 
                                                        <i style="font-size:large;padding:5px;" class="fa fa-trash red"></i>
                                                    </a>
                                                    @hasanyrole('SuperAdmin|Administrator')
                                                        @if ($patient->status == 0)
                                                            <a title="Approve Patient" attrid="{{$patient->id}}" href="#approveModal" class="list-icon linkapprove clsrowappr{{$patient->id}}" data-toggle="modal" > 
                                                                <i style="font-size:large;padding:5px;" class="fa fa-thumbs-o-up green" aria-hidden="true"></i>
                                                            </a>
                                                        @endif
                                                    @endhasanyrole
                                                </td>
                                                @hasanyrole('SuperAdmin|Administrator')
                                                <td>
                                                    @if ($patient->status == 0)
                                                        <input class="ptchk{{$patient->id}}" type="checkbox" name="id[]" value="{{ $patient->id }}">
                                                    @endif
                                                </td>
                                                @endhasanyrole
                                            </tr>
                                            @php
                                            $cntusers--;
                                            @endphp
                                            @endforeach
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


<!-- BULK Approve  HTML -->
<div id="bulkapproveModal" class="modal fade">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            
            <div class="modal-body">
                <p>Are you sure to approve all these patients in bulk ?</p>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-secondary modalclose" data-dismiss="modal">Cancel</button>
                <button attrid="" id="btnbulkapprove" type="button" class="btn btn-primary">Approve</button>
            </div>
        </div>
    </div>
</div>


<!-- Approve  HTML -->
<div id="approveModal" class="modal fade">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            
            <div class="modal-body">
                <p>Are you sure to approve this patient ?</p>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-secondary modalclose" data-dismiss="modal">Cancel</button>
                <button attrid="" id="btnapprove" type="button" class="btn btn-primary">Approve</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal HTML -->
<div id="myModal" class="modal fade">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header flex-column">
                <div class="icon-box">
                    <i class="material-icons">&#xE5CD;</i>
                </div>                      
                <h4 class="modal-title w-100">Are you sure?</h4>    
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <p>Do you really want to delete this patient? This process cannot be undone.</p>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-secondary modalclose" data-dismiss="modal">Cancel</button>
                <button attrid="" id="btnremoverole" type="button" class="btn btn-danger">Delete</button>
            </div>
        </div>
    </div>
</div>

<!-- bootstrap-daterangepicker -->
<link href="{{ asset('pms-template/vendors/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
<!-- bootstrap-datetimepicker -->
<link href="{{ asset('pms-template/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css') }}" rel="stylesheet">

@endsection

@section('footer_scripts')
<!-- bootstrap-datetimepicker -->   
<script src="{{ asset('pms-template/vendors/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('pms-template/vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script> 
<script src="{{ asset('pms-template/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}"></script>
<script type="text/javascript">

    function getChosenCheckboxValues () {
        var favorite = [];
        
        var oTable = $('#datatable1').DataTable();
        var rowcollection =  oTable.$("input[name='id[]']:checked", {"page": "all"});
        rowcollection.each(function(index,elem){
            var checkbox_value = $(elem).val();
            favorite.push(checkbox_value);
            console.log('vall==>', checkbox_value);
        });

        return favorite;
    }

    //enable bulk approve button only if atlest one patient selected
    $("input[name='id[]'], #example-select-all").on('click', function () {
        console.log('click - select all or individual');
        setTimeout(() => {
            var patients = getChosenCheckboxValues();
            if (patients.length > 0) {
                $('.btn-bulk-approve').removeClass('hide').addClass('show');
            }else {
                $('.btn-bulk-approve').removeClass('show').addClass('hide');
            }
        }, 1000);
        
    });

    // Bulk approve patients
    $('#btnbulkapprove').on('click', function () {
        
        var patients = getChosenCheckboxValues();
        //alert("My favourite sports are: " + patients.join(", "));
        
        if (patients.length > 0 ) {
            var patientId = patients.join(",")
            $.ajax({
                url: "<?php echo url('/patients/approve'); ?>",
                dataType: "JSON",
                data: {"_token":"{{ csrf_token() }}", "id":patientId, "bulk":true},
                method: "POST",
                success: function (data) {
                    console.log('return success', data);
                    $('.modalclose').click();
                    location.reload();
                    $.each(patients, function (key, ptid) {
                        $(`.clsrowstatus${ptid}`).html('Active');
                        $(`.clsrowappr${ptid}`).hide();
                        
                        //hide edit button once patient is active.
                        $(`.ptedit${ptid}`).hide();
                        
                        //hide the checkbox
                        $(`.ptchk${ptid}`).hide();
                    })
                },
                error: function () {
                    $('.modalclose').click();
                }
            })
        }

        
    })                                 

    //validates DOB
    function validateDate(day, month, year, ref='') {
        console.log(`day= ${day}, month= ${month} yer= ${year}`);
        
        var flag = false;
        if (!isNaN(day) || !isNaN(month) || !isNaN(year) ) {
            flag = true;
        }

        if (day.length > 2 || month.length > 2 || year.length > 4) {
            flag = true
        }

        if (flag === true) {
            alert('Please enter proper date');
            return false;
        }

    }

    $('#dob').on('blur', function() {
        
        var dobstr= $(this).val();
        if (dobstr) {
            console.log('dobstr', dobstr);
            var spltarr = dobstr.split('-');
            var dob = spltarr[2]+'-'+spltarr[1]+'-'+spltarr[0];

            //validateDate(spltarr[0], spltarr[1], spltarr[2]);

            dob = new Date(dob);
            var today = new Date();
            var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));

            if (age > 0) {
                $('#age').val(age);
            }
            console.log('age', age);
        }
        
    })

    $(function () {
        $('#myDatepicker2,#myDatepicker3,#myDatepicker5').datetimepicker({
            format: 'DD-MM-YYYY'
        });

        $('#myDatepicker4').datetimepicker({
            //format: 'DD-MM-YYYY h:mm A'
            format: 'DD-MM-YYYY HH:mm A'
        });
        
    });
    function timeFunctionLong(input) {
        setTimeout(function () {
            input.type = 'text';
        }, 60000);
    }

    $('.linkremoverole').on('click', function () {
        var roleid = $(this).attr('attrid');
        $('#btnremoverole').attr('attrid', roleid)
    })

    $('#btnremoverole').on('click', function () {
        var roleid = $(this).attr('attrid');
        $.ajax({
            url: "<?php echo url('/patients/makeinactive'); ?>",
            dataType: "JSON",
            data: {"_token":"{{ csrf_token() }}", "id":roleid},
            method: "POST",
            success: function (data) {
                console.log('return success', data);
                $('.clsrow'+roleid).remove();
                $('.modalclose').click();
            },
            error: function () {
                $('.modalclose').click();
            }
        })
    })

    $('.linkapprove').on('click', function () {
        var ptid = $(this).attr('attrid');
        $('#btnapprove').attr('attrid', ptid)
    })
    //approve patient
    $('#btnapprove').on('click', function () {
        var patientId = $(this).attr('attrid');
        $.ajax({
            url: "<?php echo url('/patients/approve'); ?>",
            dataType: "JSON",
            data: {"_token":"{{ csrf_token() }}", "id":patientId},
            method: "POST",
            success: function (data) {
                console.log('return success', data);
                $('.modalclose').click();
                $(`.clsrowstatus${patientId}`).html('Active');
                $(`.clsrowappr${patientId}`).hide();
                
                //hide edit button once patient is active.
                $(`.ptedit${patientId}`).hide();

                //hide the checkbox
                $(`.ptchk${patientId}`).hide();
                
            },
            error: function () {
                $('.modalclose').click();
            }
        })
    })

    $(document).ready(function() {
        $('#datatable1').DataTable( {
            "order": [[ 0, "asc" ]]
        });

        /* FOR select all check box */
         // Handle click on "Select all" control
        $('#example-select-all').on('click', function(){
            // Get all rows with search applied
            var rows = $('#datatable1').DataTable().rows({ 'search': 'applied' }).nodes();
            // Check/uncheck checkboxes for all rows in the table
            $('input[type="checkbox"]', rows).prop('checked', this.checked);
        });

        // Handle click on checkbox to set state of "Select all" control
        $('#datatable1 tbody').on('change', 'input[type="checkbox"]', function(){
            // If checkbox is not checked
            if(!this.checked){
                var el = $('#example-select-all').get(0);
                // If "Select all" control is checked and has 'indeterminate' property
                if(el && el.checked && ('indeterminate' in el)){
                    // Set visual state of "Select all" control
                    // as 'indeterminate'
                    el.indeterminate = true;
                }
            }
        });


        /* #end select all checkbox */
    } );

</script>
@endsection


