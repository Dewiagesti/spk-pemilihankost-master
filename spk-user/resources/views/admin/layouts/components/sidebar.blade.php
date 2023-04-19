<div class="quixnav">
    <div class="quixnav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label first">Main Menu</li>
            <!-- <li><a href="index.html"><i class="icon icon-single-04"></i><span class="nav-text">Dashboard</span></a>
            </li> -->
            <li><a class="" href="/admin/dashboard" aria-expanded="false"><i
                        class="icon icon-single-04"></i><span class="nav-text">Dashboard</span></a>
            </li>

            <li class="nav-label">Apps</li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                        class="icon icon-app-store"></i><span class="nav-text">Apps</span></a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('user.index') }}">Users</a></li>
                    <li><a href="{{ route('kost.index') }}">Kost</a></li>
                </ul>
            </li>   
        </ul>
    </div>
</div>