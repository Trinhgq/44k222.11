<nav id="sidebar">
        <div class="sidebar-header">
            <h3>Trang quản trị</h3>
        </div>
		<!-- # -->

        <ul class="list-unstyled components">
            <li>
                <a href="<?php echo base_url(); ?>">Trang chủ</a>
            </li>
            <li class="active">
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Trang quản lý</a>
                <ul class="collapse list-unstyled" id="homeSubmenu">
                    <li>
                        <a href="<?php echo base_url(); ?>admin">Quản lý hóa đơn</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>admin/quan-ly-san">Quản lý sân</a>
                    </li>
                    
                </ul>
            </li>
            <!-- <li>
                <a href="#">Danh mục khiếu nại</a>
            </li> -->
            <li>
                <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Liên hệ</a>
                <ul class="collapse list-unstyled" id="pageSubmenu">
                    <li>
                        <a href="#">Số điện thoại: 035.68.68.468</a>
                    </li>
                    <li>
                        <a href="#">Facebook</a>
                    </li>
                    <li>
                        <a href="#">Gmail</a>
                    </li>
                </ul>
            </li>
            
        </ul>

    </nav>
