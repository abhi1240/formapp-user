@extends('home-layouts.app')

@section('content')
<style media="screen">
.justify-content-center {
    -ms-flex-pack: center!important;
    justify-content: center!important;
    height: 72vh;
}
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" style="margin-top:5rem;">
            <div class="card">
                <div class="card-header">{{ __('Welcome To Form Filling') }}</div>

                <div class="card-body">
                  <h5 >Hi {{Session::get('users')['name']}},</h5><br>
                  <p > Before proceeding, please check your email for a verification link.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
