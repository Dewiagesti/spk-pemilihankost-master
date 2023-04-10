<div class="quixnav">
    <div class="quixnav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label first">Admin</li>
                    @if(Auth::user()->role == 'admin')
                     <li class="nav-label"><a href="{{ route('admin.index') }}">Admin</a></li>
                     <li class="nav-label"><a href="{{ route('mitra.index')}}">User</a></li>
                     <li class="nav-label"><a href="{{ route('mitra.index')}}">Mitra</a></li>
                     <li class="nav-label"><a href="{{ route('kos.index')}}">Kos</a></li>
                    @endif
                    @if(Auth::user()->role == 'mitra')
                    <li class="nav-label"><a href="{{ route('mitra.index')}}">Mitra</a></li>
                    <li class="nav-label"><a href="{{ route('kos.index')}}">Kos</a></li>

                    @endif
                    
                   
                </ul>
            </li>
                </ul>
            </li>
        </ul>
    </div>


</div>
