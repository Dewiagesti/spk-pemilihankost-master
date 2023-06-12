<div class="quixnav">
    <div class="quixnav-scroll">
        <ul class="metismenu" id="menu">
            @php
                (Auth::user()->role > 1) ? $link = '/mitra/' : $link = '/admin/'
            @endphp
            </li>
            <li><a class="" href="{{ $link }}dashboard" aria-expanded="false"><i
                        class="icon icon-single-04"></i><span class="nav-text"></span></a>
            <li>
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