@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="form-group pull-left">
                                <h4><strong>Appointments List</strong></h4>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="toolbar">
                                <!--Here you can write extra buttons/actions for the toolbar-->
                            </div>
                            <div class="fresh-datatables">
                                <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                       cellspacing="0" width="100%" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th class="text-center"> Appointment No</th>
                                        <th class="text-center"> Status</th>
                                        <th class="text-center"> Patient</th>
                                        <th class="text-center"> Age</th>
                                        <th class="text-center"> Date</th>
                                        <th class="text-center"> Hospital</th>
                                        <th class="text-center"> Payment</th>
                                        <th class="text-center disabled-sorting">Actions</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @if(!empty($appointments))
                                        @foreach($appointments as $i => $appointment)
                                            <tr>
                                                <td class="text-center">{!! $appointment->id !!}</td>
                                                <td class="text-center">
                                                    @if($appointment->status === 'pending')
                                                        <button class="btn btn-danger btn-fill btn-sm btn-block">
                                                            {!! $appointment->status !!}
                                                        </button>
                                                        @else
                                                        <button class="btn btn-success btn-fill btn-sm btn-block">
                                                            {!! $appointment->status !!}
                                                        </button>
                                                    @endif
                                                </td>
                                                <td class="text-center">{!! $appointment->patient_name !!}</td>
                                                <td class="text-center">{!! $appointment->patient_age !!}</td>
                                                <td class="text-center">{!! $appointment->date !!}</td>
                                                <td class="text-center">{!! $appointment->hospital->name !!}</td>
                                                <td class="text-center">

                                                    @if($appointment->payment === 1)

                                                        <button class="btn btn-info btn-fill btn-sm btn-block">
                                                            Paid
                                                        </button>

                                                        @else
                                                        <button class="btn btn-warning btn-fill btn-sm btn-block">
                                                            Unpaid
                                                        </button>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @if($appointment->status === 'pending')
                                                        <a href="#?"
                                                           class="btn btn-simple btn-info btn-icon change_state"
                                                           data-id="{{ $appointment->id }}" data-body="appointment"><i
                                                                class="ti-check-box"></i>
                                                        </a>
                                                    @endif

                                                </td>
                                            </tr>

                                        @endforeach
                                    @endif

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div><!--  end card  -->
                </div> <!-- end col-md-12 -->
            </div> <!-- end row -->
        </div>
    </div>
@endsection

@section('script')
    <script src="{{asset('Admin/paper_dashboard/assets/js/datatable_search_pagination.js') }}"></script>
@endsection


