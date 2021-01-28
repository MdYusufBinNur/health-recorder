@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="container-fluid">
            @can('admin')
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="card-content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-warning text-center">

                                            <i class="ti-server"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>
                                                <a href="{{ url('/hospitals') }}"
                                                   class="text-decoration-none font-weight-bold text-black-50 small">Hospitals</a>
                                            </p>
                                            @if(!empty($hospitals))
                                                {{ $hospitals }}
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <hr>
                                <div class="stats">
                                    <div class="pull-right" style="position:relative; display:inline-block;"><i
                                            class="fa fa-question-circle" data-toggle="tooltip" data-placement="top"
                                            rel="tooltip" title=""
                                            data-original-title="adasdasdasdasdasd adasdasdasdasdShows the total price of orders minus cost for ads."></i>
                                    </div>
                                    <i class="ti-clipboard"></i>
                                    <div class="my-inline-block" id="campaign-name4"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="card-content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-success text-center">
                                            <i class="ti-wallet"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>
                                                <a href="{{ url('/doctors') }}"
                                                   class="text-decoration-none font-weight-bold text-black-50 small">Doctors</a>
                                            </p>
                                            @if(!empty($doctors))
                                                {{ $doctors }}
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <hr>
                                <div class="stats">
                                    <i class="ti-calendar"></i> Last day
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="card-content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-danger text-center">
                                            <i class="ti-pulse"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>
                                                <a href="{{ url('/donors') }}"
                                                   class="text-decoration-none font-weight-bold text-black-50 small">Donors</a>
                                            </p>
                                            @if(!empty($donors))
                                                {{ $donors }}
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <hr>
                                <div class="stats">
                                    <i class="ti-timer"></i> In the last hour
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="card-content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-success text-center">
                                            <i class="ti-wallet"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>
                                                <a href="{{ url('/ambulances') }}"
                                                   class="text-decoration-none font-weight-bold text-black-50 small">Ambulance</a>
                                            </p>
                                            @if(!empty($ambulances))
                                                {{ $ambulances }}
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <hr>
                                <div class="stats">
                                    <i class="ti-reload"></i> Updated now
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endcan
            @can('doctor')
                {{ redirect('/appointments') }}
            @endcan
        </div>
    </div>
@endsection
