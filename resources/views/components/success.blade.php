<div>
    <div>
        @if(session()->has('success'))
         <div class="alert alert-primary mt-4" >{{session('success')}}</div>
         @endif
    </div>
</div>