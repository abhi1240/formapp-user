<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ab-datepicker@latest/css/datepicker.css" type="text/css" />
@extends('user.dashboard.layouts.master')
@section('content')
	<style media="screen">
		.breadcrumb-item a{
			text-decoration: none;
		}
		.mr-1{
			margin-right:5px;
		}
		.invisible{
			display:none;
		}
	</style>
<div class="container-fluid px-4">
	<h1 class="mt-4">Explorer</h1>
	<ol class="breadcrumb mb-4">
	    <li class="breadcrumb-item active"><a href="{{route('dashboard')}}"><i class="fas fa-tachometer-alt mr-1"></i>Dashboard</a></li>
			<li class="breadcrumb-item active">Explorer</a></li>
	</ol>

	<div class="row">
    <div class="col-xl-12 col-md-12 col-lg-12">
        <div class="card mb-4 border-0 shadow-sm">
            <div class="card-header">
                <i class="fas fa-filter me-1"></i>
                Filter Form
            </div>
            <div class="card-body">
							<form class="" action="" method="post">
								<div class="row">
									<div class="col-md-4 col-lg-4">
										<div class="form-group">
											<input class="date form-control" id="date1" type="text" placeholder="d/M/y" title="format: dd/MM/y"/>
										</div>
									</div>
									<div class="col-md-2 col-lg-2">
										<a href="#" class="btn btn-danger btn-block" name="button">clear</a>
									</div>
									<div class="col-md-2 col-lg-2">
										<button type="submit" class="btn btn-primary btn-block" name="button">clear</button>
									</div>
								</div>
							</form>
						</div>

        </div>
    </div>
</div>

</div>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/ab-datepicker@latest"></script>
<script type="text/javascript">
$(document).ready(function() {
    	$('.date').datepicker();
    });
</script>
@endsection
