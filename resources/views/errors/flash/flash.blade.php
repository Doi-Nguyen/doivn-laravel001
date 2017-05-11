@if(session()->has('flash'))
    <div class="alert alert-success text-center">{{session('flash')}}</div>
@endif