

@if (Session::has('success'))
<div class="notifications">
    <div class="notify gr">
      <div class="circle">
       <i class="fa-solid fa-circle-check icon-noti"></i>
      </div>
      <div class="info">
        <span style="    padding-top: 16px;">  {{ session('success') }}</span>
      </div>
    </div>

  </div>
@elseif(Session::has('failed'))
<div class="notifications">
    <div class="notify gr">
      <div class="circle">
       <i class="fa-solid fa-circle-check icon-noti"></i>
      </div>
      <div class="info">
        <span style="   padding-top: 16px; font-size: 1rem;"> {{ session('failed') }}</span>
      </div>
    </div>

  </div>
@endif


