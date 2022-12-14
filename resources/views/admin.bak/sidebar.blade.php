@php use Illuminate\Support\Facades\Auth; @endphp
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin" class="brand-link">
        <img src="/template/admin/dist/img/minhhn.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">{{ Auth::user()->name }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/template/admin/dist/img/minhhn2.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">

            <!-- News -->
            <div id="accordion">
                <div class="">
                    <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                            <div class="py-2 px-3 text-white" data-toggle="collapse" data-target="#collapseOne"
                                 aria-expanded="true" aria-controls="collapseOne">
                                <i class="mr-2 fa fa-newspaper"></i>
                                News
                            </div>
                        </h5>
                    </div>

                    <div id="collapseOne" class="collapse show ml-3" aria-labelledby="headingOne"
                         data-parent="#accordion">
                        <div class="card-body">
                            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                                data-accordion="false">
                                <li class="nav-item">
                                    <a href="/admin/menus/list" class="nav-link">
                                        <i class="mr-2 fa fa-newspaper"></i>
                                        <p>
                                            Danh m???c
                                        </p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="/admin/product/list" class="nav-link">
                                        <i class="mr-2 fas fa-poll-h"></i>
                                        <p>
                                            B??i vi???t
                                        </p>
                                    </a>
                                </li>

                                {{--                                <li class="nav-item">--}}
                                {{--                                    <a href="/admin/slider/list" class="nav-link">--}}
                                {{--                                        <i class="mr-2 fas fa-images"></i>--}}
                                {{--                                        <p>--}}
                                {{--                                            Slider--}}
                                {{--                                        </p>--}}
                                {{--                                    </a>--}}
                                {{--                                </li>--}}

                                <li class="nav-item">
                                    <a href="/admin/tag/list" class="nav-link">
                                        <i class="mr-2 fa fa-tag"></i>
                                        <p>
                                            Tags
                                        </p>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- News -->

            <!-- Authentication -->
            <div id="accordionTwo">
                <div class="">
                    <div class="card-header" id="headingTwo">
                        <h5 class="mb-0">
                            <div class="py-2 px-3 text-white" data-toggle="collapse" data-target="#collapseTwo"
                                 aria-expanded="true" aria-controls="collapseTwo">
                                <i class="fa fa-user-group mr-2"></i>
                                Authentication
                            </div>
                        </h5>
                    </div>

                    <div id="collapseTwo" class="collapse ml-3" aria-labelledby="headingOne"
                         data-parent="#accordionTwo">
                        <div class="card-body">
                            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                                data-accordion="false">
                                <li class="nav-item">
                                    <a href="/admin/users/list" class="nav-link">
                                        <i class="fa-solid fa-user mr-2"></i>
                                        <p>
                                            User
                                        </p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="/admin/role/list" class="nav-link">
                                        <i class="fa fa-people-group mr-2"></i>
                                        <p>
                                            Roles
                                        </p>
                                    </a>
                                </li>

{{--                                <li class="nav-item">--}}
{{--                                    <a href="/admin/permission/list" class="nav-link">--}}
{{--                                        <i class="fa fa-key mr-2"></i>--}}
{{--                                        <p>--}}
{{--                                            Permissions--}}
{{--                                        </p>--}}
{{--                                    </a>--}}
{{--                                </li>--}}

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Authentication -->


            <!-- Advanced -->
            <div id="accordionThree">
                <div class="">
                    <div class="card-header" id="headingThree">
                        <h5 class="mb-0">
                            <div class="py-2 px-3 text-white" data-toggle="collapse" data-target="#collapseThree"
                                 aria-expanded="true" aria-controls="collapseThree">
                                <i class="fa-brands fa-adn mr-2"></i>
                                Advanced
                            </div>
                        </h5>
                    </div>

                    <div id="collapseThree" class="collapse ml-3" aria-labelledby="headingOne"
                         data-parent="#accordionThree">
                        <div class="card-body">
                            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                                data-accordion="false">
                                <li class="nav-item">
                                    <a href="/admin/logs/list" class="nav-link">
                                        <i class="fa fa-file mr-2"></i>
                                        <p>
                                            Logs
                                        </p>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Advanced -->

            <!-- Chuy???n h?????ng admin->trang ch??? -->
            <div id="" class="mt-3">
                <div class="card-body">
                    <ul class="nav nav-pills nav-sidebar flex-column">
                        <li class="nav-item">
                            <a href="/" class="nav-link">
                                <i class="fa-solid fa-arrow-right"></i>
                                <p class="ml-2" style="font-size: 22px;">
                                    ?????n trang ch???
                                </p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Chuy???n h?????ng admin->trang ch??? -->


        </nav>
        <!-- /.sidebar-menu -->


    </div>
    <!-- /.sidebar -->
</aside>
