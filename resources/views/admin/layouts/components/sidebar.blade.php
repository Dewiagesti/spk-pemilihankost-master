<div class="quixnav">
    <div class="quixnav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label first">Main Menu</li>
            @php
                (Auth::user()->role > 1) ? $link = '/mitra/' : $link = '/admin/'
            @endphp
            <li><a class="" href="{{ $link }}dashboard" aria-expanded="false"><i
                        class="icon icon-single-04"></i><span class="nav-text">Dashboard</span></a>
            </li>

            <li class="nav-label">Apps</li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                        class="icon icon-app-store"></i><span class="nav-text">Apps</span></a>
                <ul aria-expanded="false">
            @if(Auth::user()->role == 1)
                    <li><a href="{{ route('user.index') }}">Users</a></li>
                    <li><a href="{{ route('mitra.index') }}">Mitra</a></li>
                    <li><a href="{{ route('admin.kost') }}">Kost</a></li>
                </ul>
            </li>   
            @else
                    <li><a href="{{ route('mitra.kost.index') }}">Kost</a></li>
                    <li><a href="{{ route('mitra.normalization.index') }}">Normalisasi</a></li>
                </ul>
            </li> 
            @endif
        </ul>
    </div>
</div>