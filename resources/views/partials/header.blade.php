<!-- ***** Header Area Start ***** -->
<header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="/" class="logo">
                        <img src="{{ asset('assets/images/logo (1).png') }}" alt="Chain App Dev">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li>
                            <a href="/" class="{{ Request::is('') ? 'active' : '' }}">
                                Beranda
                            </a>
                        </li>
                        <li>
                            <a href="/workshop" class="{{ Request::is('workshop') ? 'active' : '' }}">
                                Tabel Wokrshop
                            </a>
                        </li>
                        <li>
                            <a href="/workshop/create" class="{{ Request::is('workshop/create') ? 'active' : '' }}">
                                Buat Workshop
                            </a>
                        </li>
                        @if (!Auth::user())
                            <li>
                                <div class="border-button">
                                    <a href="/login">
                                        <i class="fa fa-sign-in-alt"></i>
                                        Login dengan SSO
                                    </a>
                                </div>
                            </li>
                        @else
                            <li>
                                <ul id="dropdown">
                                    <li>
                                        <div class="dropbtn">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="12" cy="10" r="3" stroke="white"
                                                    stroke-width="2" stroke-linecap="round" />
                                                <circle cx="12" cy="12" r="9" stroke="white"
                                                    stroke-width="2" />
                                                <path
                                                    d="M17.7805 18.8264C17.9076 18.7566 17.9678 18.6055 17.914 18.4708C17.5284 17.5045 16.7856 16.6534 15.7814 16.0332C14.6966 15.3632 13.3674 15 12 15C10.6326 15 9.30341 15.3632 8.21858 16.0332C7.21444 16.6534 6.4716 17.5045 6.08598 18.4708C6.03223 18.6055 6.09236 18.7566 6.21948 18.8264C9.81971 20.803 14.1803 20.803 17.7805 18.8264Z"
                                                    fill="white" />
                                            </svg>
                                            Hi, {{ Auth::user()->fullname }}
                                            <svg width="14" height="11" viewBox="0 0 14 11" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M7.00002 11L0.0718145 0.5L13.9282 0.500001L7.00002 11Z"
                                                    fill="white" />
                                            </svg>
                                        </div>
                                        <ul>
                                            <li>
                                                <a href="/workshop/evaluation/speaker">
                                                    <span>Laporan sebagai Pembicara</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="/workshop/evaluation/audience">
                                                    <span>Laporan sebagai Peserta</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="/logout">
                                                    <span>Logout</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- ***** Header Area End ***** -->
