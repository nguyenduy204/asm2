<h3 class="text-light layer bg-primary py-4">
    <span>Shoppe</span>
</h3>


<div class="dropdown position-absolute" style="top: 18px;right:18px; cursor: pointer;">
    <img class="dropdown-toggle rounded-circle" style="width: 50px" src="{{asset('assets/image/avatar.jpg')}}" 
    alt="" id="dropdownMenuButton1" data-bs-toggle="dropdown">
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
        <li><a class="dropdown-item" href="#">My profile</a></li>
        <li><a class="dropdown-item" href="#">Language</a></li>
        <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
    </ul>
</div>
