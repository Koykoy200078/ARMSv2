<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">Main</li>
                <li class="submenu">
                    <a href="{{ route('researcher.dashboard') }}"><span class="menu-side"><img src="assets/img/icons/menu-icon-01.svg" alt=""></span> <span> Dashboard </span> </a>
                    <!-- <ul style="display: none;">
                        <li><a class="active" href="index.html">Admin Dashboard</a></li>
                        <li><a href="doctor-dashboard.html">Doctor Dashboard</a></li>
                        <li><a href="patient-dashboard.html">Patient Dashboard</a></li>
                    </ul> -->
                </li>
                <li>
                    <a href="{{ route('projects.index') }}"><span class="menu-side"><img src="assets/img/icons/menu-icon-14.svg" alt=""></span> <span>Research Project</span></a>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fa fa-flag"></i> <span> Reports </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="expense-reports.html"> Expense Report </a></li>
                        <li><a href="invoice-reports.html"> Invoice Report </a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><span class="menu-side"><img src="assets/img/icons/menu-icon-15.svg" alt=""></span> <span> Invoice </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="invoices-list.html"> Invoices List </a></li>
                        <li><a href="invoices-grid.html"> Invoices Grid</a></li>
                        <li><a href="add-invoice.html"> Add Invoices</a></li>
                        <li><a href="edit-invoices.html"> Edit Invoices</a></li>
                        <li><a href="view-invoice.html"> Invoices Details</a></li>
                        <li><a href="invoices-settings.html"> Invoices Settings</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>