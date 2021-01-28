<div class="sidebar" data-background-color="brown" data-active-color="info">
    <div class="logo">
        <a href="{{ url('/') }}" class="simple-text logo-mini">
            <i class="ti-pulse"></i>
        </a>

        <a href="{{ url('/') }}" class="simple-text logo-normal">
            @if(!empty(\Illuminate\Support\Facades\Auth::user()))
                {{ \Illuminate\Support\Facades\Auth::user()->role }}
            @else
                ADMIN
            @endif
        </a>
    </div>
    <div class="sidebar-wrapper">
        <div class="user">
            <div class="info">
                <div class="photo">
                    @if(!empty(\Illuminate\Support\Facades\Auth::user()))
                        <img src="{{ \Illuminate\Support\Facades\Auth::user()->image }}"/>
                    @else
                        <img src="{{asset('Admin/paper_dashboard/assets/img/faces/img03.png') }}"/>
                    @endif

                </div>
                <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                    <span style="font-variant-caps: all-petite-caps">
                        @if(!empty(\Illuminate\Support\Facades\Auth::user()))
                            {{ Auth::user()->name }}
                        @endif

                        <b class="caret"></b>
                    </span>
                </a>
                <div class="clearfix"></div>
                <div class="collapse" id="collapseExample">
                    <ul class="nav">
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <span class="sidebar-mini"><i class="ti-lock"></i></span>
                                <span class="sidebar-normal">
                                    {{ __('Logout') }}
                                </span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <ul class="nav">
            {{--            @if(\Illuminate\Support\Facades\Auth::user()->role == 'admin')--}}
            @can('admin')
                <li>
                    <a data-toggle="collapse" href="#Coupons">
                        <p>Hospitals
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse" id="Coupons">
                        <ul class="nav">
                            <li>
                                <a href="{{ url('/hospitals') }}">
                                    <span class="sidebar-mini"><i class="ti-home"></i></span>
                                    <span class="sidebar-normal">Hospitals</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a data-toggle="collapse" href="#department">
                        <p>Department
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse" id="department">
                        <ul class="nav">
                            <li>
                                <a href="{{ url('/departments') }}">
                                    <span class="sidebar-mini"><i class="ti-layers"></i></span>
                                    <span class="sidebar-normal">Department</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a data-toggle="collapse" href="#doctors">
                        <p>Doctors
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse" id="doctors">
                        <ul class="nav">
                            <li>
                                <a href="{{ url('/doctors') }}">
                                    <span class="sidebar-mini"><i class="ti-user"></i></span>
                                    <span class="sidebar-normal">Doctors</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a data-toggle="collapse" href="#ambulance">
                        <p>Ambulance
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse" id="ambulance">
                        <ul class="nav">
                            <li>
                                <a href="{{ url('/ambulances') }}">
                                    <span class="sidebar-mini"><i class="ti-car"></i></span>
                                    <span class="sidebar-normal">Ambulance</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a data-toggle="collapse" href="#donors">
                        <p>Donors
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse" id="donors">
                        <ul class="nav">
                            <li>
                                <a href="{{ url('/donors') }}">
                                    <span class="sidebar-mini"><i class="ti-drupal"></i></span>
                                    <span class="sidebar-normal">Donors</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a data-toggle="collapse" href="#sliders">
                        <p>Slider
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse" id="sliders">
                        <ul class="nav">
                            <li>
                                <a href="{{ url('/sliders') }}">
                                    <span class="sidebar-mini"><i class="ti-drupal"></i></span>
                                    <span class="sidebar-normal">Slider</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            @endcan
            @can('doctor')

            @endcan
        </ul>
    </div>
</div>
