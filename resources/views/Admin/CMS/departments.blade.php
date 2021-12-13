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
                            >Add New Department
                            </button>
                            <div class="form-group pull-left">
                                <h4><strong>Department List</strong></h4>
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
                                        <th class="text-center disabled-sorting">Actions</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @if(!empty($departments))
                                        @foreach($departments as $i => $department)
                                            <tr>
                                                <td class="text-center">{!! $i+1 !!}</td>
                                                <td class="text-center">{!! $department->name !!}</td>
                                                <td class="text-center">
                                                    <a href="#" class="btn btn-simple btn-warning btn-icon edit"
                                                       data-toggle="modal" data-body="{{ "department" }}"
                                                       data-id="{{ $department->id }}" data-target="#Modal"><i
                                                            class="ti-pencil-alt"></i></a>
                                                    <a href=""
                                                       class="btn btn-simple btn-danger btn-icon del_brand remove"
                                                       data-id="{{ $department->id }}" data-body="{{ "department" }}"><i
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
                <form action="{{ url('departments') }}" method="post" enctype="multipart/form-data">
                    @csrf()
                    <div class="modal-body">
                        <div class="row" style="padding: 10px">
                            <input type="hidden" id="id" name="id">

                            <div class="form-group">
                                <label for="title">Name</label>
                                <input type="text" name="name" id="name" class="form-control" required/>
                            </div>
                            <div class="form-group">
                                <label for="photo">Image</label>
                                <input type="file" name="photo" class="form-control"  id="photo"/>
                            </div>

                            <div class="form-group">
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
                    <h4 class="modal-title">Add New Department</h4>
                </div>
                <form action="{{ url('departments') }}" method="post" enctype="multipart/form-data">
                    @csrf()
                    <div class="modal-body">
                        <div class="row" style="padding: 10px">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" required/>
                            </div>
                            <div class="form-group">
                                <label for="photo">Image</label>
                                <input type="file" name="photo" class="form-control"  id="photo" />
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


