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
                            <button
                                class="btn btn-outline-dark  pull-right"
                                data-toggle="modal"
                                data-target="#Create"
                            >Add New Doctor Info</button>
                            <div class="form-group pull-left">
                                <h4><strong>Doctor List</strong></h4>
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
                                        <th class="text-center"> Sl</th>
                                        <th class="text-center"> Name</th>
                                        <th class="text-center"> Department</th>
                                        <th class="text-center"> Designation</th>
                                        <th class="text-center disabled-sorting">Actions</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @if(!empty($doctors))
                                        @foreach($doctors as $i => $doctor)
                                            <tr>
                                                <td class="text-center">{!! $i+1 !!}</td>
                                                <td class="text-center">{!! $doctor->name !!}</td>
                                                <td class="text-center">{!! $doctor->department->name !!}</td>
                                                <td class="text-center">{!! $doctor->designation !!}</td>

                                                <td class="text-center">
                                                    <a href="#" class="btn btn-simple btn-warning btn-icon edit"
                                                       data-toggle="modal" data-body="{{ "doctor" }}"
                                                       data-id="{{ $doctor->id }}" data-target="#Modal"><i
                                                            class="ti-pencil-alt"></i></a>
                                                    <a href=""
                                                       class="btn btn-simple btn-danger btn-icon del_brand remove"
                                                       data-id="{{ $doctor->id }}" data-body="{{ "doctor" }}"><i
                                                            class="ti-trash"></i></a>
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

    <div class="modal fade" id="Modal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit View</h4>
                </div>
                <form action="{{ url('doctors') }}" method="post" enctype="multipart/form-data">
                    @csrf()
                    <div class="modal-body">
                        <div class="row" style="padding: 10px">
                            <input type="hidden" id="id" name="id">
                            <label for="hosp_id">Select Hospital<star>*</star></label>
                            <div class="form-group">

{{--                                <select class="form-control" data-style="btn-dark  btn-block" data-size="7" onchange="get_department(this)" name="hospital_id" id="hosp_id" required >--}}
                                <select class="form-control" data-style="btn-dark  btn-block" data-size="7"  name="hospital_id" id="hosp_id" required >
                                    @if(!empty($hospitals))
                                        @foreach($hospitals as $content)
                                            <option value="{{ $content->id }}">{{ $content->name }}</option>
                                        @endforeach
                                    @endif
                                </select>

                            </div>
                            <label for="dept_id">Select Department<star>*</star></label>
                            <div class="form-group">
                                <select class="form-control sub_class generate_department"  name="department_id" id="dept_id" required="" tabindex="-98">
                                    @if(!empty($departments))
                                        @foreach($departments as $content)
                                            <option value="{{ $content->id }}">{{ $content->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="title">Name</label>
                                <input type="text"  name="name" id="name" class="form-control" required/>
                            </div>
                            <div class="form-group">
                                <label for="designation">Designation</label>
                                <input type="text"  name="designation" id="designation"  class="form-control"/>
                            </div>
                            <div class="form-group">
                                <label for="designation">Fee</label>
                                <input type="number"  name="fee" id="fee"  class="form-control"/>
                            </div>
                            <div class="form-group">
                                <label for="day">Day</label>
                                <input type="text"  name="day" id="day"  class="form-control"/>
                            </div>
                            <div class="form-group">
                                <label for="photo">Image</label>
                                <input type="file"  name="photo" class="form-control" multiple  id="photo"/>
                            </div>

                            <div class="form-group" >
                                <img src="" id="old_photo" width="100" height="50">
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-default">Update</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
    <div class="modal fade" id="Create" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add New Doctor Info</h4>
                </div>
                <form action="{{ url('doctors') }}" method="post" enctype="multipart/form-data">
                    @csrf()
                    <div class="modal-body">
                        <div class="row" style="padding: 10px">
                            <label for="hosp_id">Select Hospital<star>*</star></label>
                            <div class="form-group">

                                {{--                                <select class="form-control" data-style="btn-dark  btn-block" data-size="7" onchange="get_department(this)" name="hospital_id" id="hosp_id" required >--}}
                                <select class="form-control" data-style="btn-dark  btn-block" data-size="7"  name="hospital_id" id="hosp_id" required >
                                    @if(!empty($hospitals))
                                        @foreach($hospitals as $content)
                                            <option value="{{ $content->id }}">{{ $content->name }}</option>
                                        @endforeach
                                    @endif
                                </select>

                            </div>
                            <label for="dept_id">Select Department<star>*</star></label>
                            <div class="form-group">
                                <select class="form-control sub_class generate_department"  name="department_id" id="dept_id" required="" tabindex="-98">
                                    @if(!empty($departments))
                                        @foreach($departments as $content)
                                            <option value="{{ $content->id }}">{{ $content->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text"  name="name" id="name" class="form-control" required/>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email"  name="email" id="email" class="form-control" required/>
                            </div>
                            <div class="form-group">
                                <label for="mobile">Mobile</label>
                                <input type="number"  name="mobile" id="mobile" class="form-control" required/>
                            </div>
                            <div class="form-group">
                                <label for="email">Fee</label>
                                <input type="number"  name="fee" id="fee" class="form-control" required/>
                            </div>
                            <div class="form-group">
                                <label for="day">Day</label>
                                <input type="text"  name="day" id="day" placeholder="monday-friday(5.00 - 7.00 AM)" class="form-control" required/>
                            </div>
                            <input type="hidden" name="password" value="password">
                            <input type="hidden" name="role" value="doctor">
                            <div class="form-group">
                                <label for="designation">Designation</label>
                                <input type="text"  name="designation" id="designation"  class="form-control" required/>
                            </div>
                            <div class="form-group">
                                <label for="photo">Image</label>
                                <input type="file"  name="photo" class="form-control"  id="photo" />
                            </div>

                            <div class="form-group" >
                                <img src="" id="old_photo" width="100" height="50">
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-default">Submit</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

@endsection

@section('script')
    <script src="{{asset('Admin/paper_dashboard/assets/js/datatable_search_pagination.js') }}"></script>
@endsection


