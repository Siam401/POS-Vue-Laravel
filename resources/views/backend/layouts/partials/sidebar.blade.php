<!-- Page Sidebar -->
<div class="page-sidebar" style="position: fixed">
<a class="logo-box" href="#"><span>POS</span><i class="icon-radio_button_unchecked" id="fixed-sidebar-toggle-button"></i>
            <i class="icon-close" id="sidebar-toggle-button-close"></i></a>
        <div class="page-sidebar-inner">
            <div class="page-sidebar-menu">
                <ul class="accordion-menu">
                    <li class="active-page">
                    <a href="{{ route('admin.home') }}">
                            <i class="menu-icon icon-home4"></i><span>Dashboard</span>
                        </a>
                    </li>
                    {{-- <li>
                        <a href="email.html">
                            <i class="menu-icon icon-inbox"></i><span>Email</span>
                        </a>
                    </li> --}}
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-bars"></i><span>Category</span>
                            <i class="accordion-icon fa fa-angle-left"></i>
                        </a>
                        <ul class="sub-menu">
                            <li><a href="#">Create</a></li>
                            <li><a href="{{ route('admin.category') }}">Manage</a></li>      
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-building"></i><span>Company</span>
                            <i class="accordion-icon fa fa-angle-left"></i>
                        </a>
                        <ul class="sub-menu">
                            <li><a href="#">Create</a></li>
                            <li><a href="{{ route('admin.company') }}">Manage</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-cubes"></i><span>Stock</span>
                            <i class="accordion-icon fa fa-angle-left"></i>
                        </a>
                        <ul class="sub-menu">
                            <li><a href="#">Create</a></li>
                            <li><a href="{{ route('admin.stock') }}">Manage</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('admin.saleview') }}">
                            <i class="menu-icon fa fa-barcode"></i><span>Sale(POS)</span>
                        </a>
                    </li>
                    
                </ul>
            </div>
        </div>
    </div><!-- /Page Sidebar -->