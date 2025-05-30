 <!-- ========== Left Sidebar Start ========== -->
 <div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!-- User details -->
        {{-- <div class="user-profile text-center mt-3">
            <div class="">
                <img src="{{asset('backend/assets/images/users/avatar-1.jpg')}}" alt="" class="avatar-md rounded-circle">
            </div>
            <div class="mt-3">
                <h4 class="font-size-16 mb-1">Julia Hudda</h4>
                <span class="text-muted"><i
                        class="ri-record-circle-line align-middle font-size-14 text-success"></i> Online</span>
            </div>
        </div> --}}

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{route('dashboard')}}" class="waves-effect">
                        <i class="ri-dashboard-line"></i><span
                            class="badge rounded-pill bg-success float-end">3</span>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('backend.seo.index')}}">
                        <i class="ri-layout-3-line"></i>
                    <span>SEO</span>
                </a></li>
                <li>
                    <a href="{{route('backend.translation.index')}}">
                        <i class="ri-layout-3-line"></i>
                    <span>Tərcümələr</span>
                </a></li>
                <li>
                    <a href="{{route('backend.hero.index')}}">
                        <i class="ri-layout-3-line"></i>
                    <span>Hero</span>
                </a></li>
                <li>
                    <a href="{{route('backend.about.index')}}">
                        <i class="ri-layout-3-line"></i>
                    <span>Haqqımızda</span>
                </a></li>
                <li>
                    <a href="{{route('backend.partner.index')}}">
                        <i class="ri-layout-3-line"></i>
                    <span>Partnyorlar</span>
                </a></li>
                <li>
                    <a href="{{route('backend.service.index')}}">
                        <i class="ri-layout-3-line"></i>
                    <span>Xidmətlərimiz</span>
                </a></li>
                <li>
                    <a href="{{route('backend.mission.index')}}">
                        <i class="ri-layout-3-line"></i>
                    <span>Missiyamız</span>
                </a></li>
                <li>
                    <a href="{{route('backend.worth.index')}}">
                        <i class="ri-layout-3-line"></i>
                    <span>Dəyərlərimiz</span>
                </a></li>
                <li>
                    <a href="{{route('backend.contact.index')}}">
                        <i class="ri-layout-3-line"></i>
                    <span>Əlaqə</span>
                </a></li>
                <li>
                    <a href="{{route('backend.certificate.index')}}">
                        <i class="ri-layout-3-line"></i>
                    <span>Sertifikatlar</span>
                </a></li>
                <li>
                    <a href="{{route('backend.footer-logo.index')}}">
                        <i class="ri-layout-3-line"></i>
                    <span>Footer Logo</span>
                </a></li>
                <li>
                    <a href="{{route('backend.header.index')}}">
                        <i class="ri-layout-3-line"></i>
                    <span>Header</span>
                </a></li>
                <li>
                    <a href="{{route('backend.footer-social.index')}}">
                        <i class="ri-layout-3-line"></i>
                    <span>Footer Social</span>
                </a></li>
                <li>
                    <a href="{{route('backend.contact-apply.index')}}">
                        <i class="ri-layout-3-line"></i>
                    <span>Müraciətlər</span>
                </a></li>
                {{-- <li>
                    <a href="{{route('backend.header-social.index')}}">
                        <i class="ri-layout-3-line"></i>
                    <span>Header Social</span>
                </a></li> --}}

        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
