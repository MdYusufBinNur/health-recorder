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
                                data-target="#create"
                            >Add new Hospital</button>
                            <div class="form-group pull-left">
                                <h4><strong>Hospital Section</strong></h4>
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
                                        <th class="text-center"> Hospital</th>
                                        <th class="text-center"> Address</th>
                                        <th class="text-center"> Image</th>
                                        <th class="text-center"> Lat</th>
                                        <th class="text-center"> Lang</th>
                                        <th class="text-center disabled-sorting">Actions</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @if(!empty($hospitals))
                                        @foreach($hospitals as $hospital)
                                            <tr>
                                                <td class="text-center">{!! $hospital->name !!}</td>
                                                <td class="text-center">{!! $hospital->address !!}</td>
                                                <td class="text-center"><img src="{{ asset($hospital->image) }}" width="100" height="50"></td>
                                                <td class="text-center">{!! $hospital->latitude !!}</td>
                                                <td class="text-center">{!! $hospital->longitude !!}</td>
                                                <td class="text-center">
                                                    <a href="#" class="btn btn-simple btn-warning btn-icon edit"
                                                       data-toggle="modal" data-body="{{ "hospital" }}"
                                                       data-id="{{ $hospital->id }}" data-target="#Modal"><i
                                                            class="ti-pencil-alt"></i></a>
                                                    <a href=""
                                                       class="btn btn-simple btn-danger btn-icon del_brand remove"
                                                       data-id="{{ $hospital->id }}" data-body="{{ "hospital" }}"><i
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
                <form action="{{ url('hospitals') }}" method="post" enctype="multipart/form-data">
                    @csrf()
                    <div class="modal-body">
                        <div class="row" style="padding: 10px">

                            <input type="hidden" id="id" name="id">

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text"  name="name" class="form-control" required id="name" />
                            </div>
                            <div class="form-group">
                                <label for="details">Description</label>
                                <textarea rows="3" name="details" class="form-control" required id="details"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="contact">Colors</label>
                                <input type="text" name="contact" class="form-control" required id="contact"/>
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" name="address" class="form-control" required id="address"/>
                            </div>
                            <div class="form-group">
                                <label for="latitude">Latitude</label>
                                <input type="text" name="latitude" class="form-control" required id="latitude"/>
                            </div>
                            <div class="form-group">
                                <label for="longitude">Latitude</label>
                                <input type="text" name="longitude" class="form-control" required id="longitude"/>
                            </div>
                            <div class="form-group">
                                <label for="photo">Image</label>
                                <input type="file"  name="photo" class="form-control" multiple  id="photo"/>
                            </div>

                            <div class="form-group" id="old_photo">

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
    <div class="modal fade" id="create" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add New Hospital Info</h4>
                </div>
                <form action="{{ url('hospitals') }}" method="post" enctype="multipart/form-data">
                    @csrf()
                    <div class="modal-body">
                        <div class="row" style="padding: 10px">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text"  name="name" class="form-control" required id="name" />
                            </div>
                            <div class="form-group">
                                <label for="details">Description</label>
                                <textarea rows="3" name="details" class="form-control" required id="details"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="contact">Contact</label>
                                <input type="text" name="contact" class="form-control" required id="contact"/>
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" name="address" class="form-control" required id="address"/>
                            </div>
                            <div class="form-group">
                                <label for="latitude">Latitude</label>
                                <input type="text" name="latitude" class="form-control" required id="latitude"/>
                            </div>
                            <div class="form-group">
                                <label for="longitude">Latitude</label>
                                <input type="text" name="longitude" class="form-control" required id="longitude"/>
                            </div>
                            <div class="form-group">
                                <label for="photo">Image</label>
                                <input type="file"  name="photo" class="form-control" multiple  id="photo"/>
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

    {{--<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js">datatable_search_pagination.js</script>--}}


@endsection


