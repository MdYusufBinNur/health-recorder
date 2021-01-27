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
                                        <th class="text-center"> Blood</th>
                                        <th class="text-center"> District</th>
                                        <th class="text-center"> Area</th>
                                        <th class="text-center"> Mobile</th>
                                        <th class="text-center disabled-sorting">Actions</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @if(!empty($donors))
                                        @foreach($donors as $i => $donor)
                                            <tr>
                                                <td class="text-center">{!! $i+1 !!}</td>
                                                <td class="text-center">{!! $donor->name !!}</td>
                                                <td class="text-center">{!! $donor->blood_group !!}</td>
                                                <td class="text-center">{!! $donor->district !!}</td>
                                                <td class="text-center">{!! $donor->area !!}</td>
                                                <td class="text-center">{!! $donor->mobile !!}</td>

                                                <td class="text-center">
                                                    <a href="#" class="btn btn-simple btn-warning btn-icon edit"
                                                       data-toggle="modal" data-body="{{ "donor" }}"
                                                       data-id="{{ $donor->id }}" data-target="#Modal"><i
                                                            class="ti-pencil-alt"></i></a>
                                                    <a href=""
                                                       class="btn btn-simple btn-danger btn-icon del_brand remove"
                                                       data-id="{{ $donor->id }}" data-body="{{ "donor" }}"><i
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
                <form action="{{ url('donors') }}" method="post" enctype="multipart/form-data">
                    @csrf()
                    <div class="modal-body">
                        <div class="row" style="padding: 10px">
                            <input type="hidden" id="id" name="id">

                            <div class="form-group">

                                <select class="form-control" data-style="btn-dark  btn-block" data-size="7"  name="blood_group" id="blood_group" required >
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                </select>

                            </div>
                            <label for="">Gender<star>*</star></label>
                            <div class="form-group">

                                <select class="form-control" data-style="btn-dark  btn-block" data-size="3"  name="gender" id="gender" required >
                                    <option value="Male" selected>Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="title">Name</label>
                                <input type="text"  name="name" id="name" class="form-control" required/>
                            </div>
                            <div class="form-group">
                                <label for="mobile">Mobile</label>
                                <input type="text"  name="mobile" id="mobile"  class="form-control"/>
                            </div>
                            <div class="form-group">
                                <label for="area">Area</label>
                                <input type="text" name="area" class="form-control" required id="area"/>
                            </div>
                            <div class="form-group">
                                <label for="district">District</label>
                                <input type="text" name="district" class="form-control" required id="district"/>
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
                <form action="{{ url('donors') }}" method="post" enctype="multipart/form-data">
                    @csrf()
                    <div class="modal-body">
                        <div class="row" style="padding: 10px">
                            <div class="form-group">

                                <select class="form-control" data-style="btn-dark  btn-block" data-size="7"  name="blood_group" id="blood_group" required >
                                    <option value="A+" selected>A+</option>
                                    <option value="A-">A-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                </select>

                            </div>
                            <label for="">Gender<star>*</star></label>
                            <div class="form-group">

                                <select class="form-control" data-style="btn-dark  btn-block" data-size="3"  name="gender" id="gender" required >
                                    <option value="Male" selected>Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="title">Name</label>
                                <input type="text"  name="name" id="name" class="form-control" required/>
                            </div>
                            <div class="form-group">
                                <label for="mobile">Mobile</label>
                                <input type="text"  name="mobile" id="mobile"  class="form-control"/>
                            </div>
                            <div class="form-group">
                                <label for="area">Area</label>
                                <input type="text" name="area" class="form-control" required id="area"/>
                            </div>
                            <div class="form-group">
                                <label for="district">District</label>
                                <input type="text" name="district" class="form-control" required id="district"/>
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


