@extends('layouts.admin')
@section('catagory')
<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Members</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					@if(Session::has('success'))
					<div class="alert alert-success video-field-new">
	<strong>Success!</strong> Indicates a successful or positive action.
	</div>
	@endif
	@if(Session::has('error'))
	<div class="alert alert-danger video-field-new">
	<strong>Cant!</strong> Not be done
	</div>
	@endif
	<?php
$message=Session::get('message');
if ($message) {
	echo $message;
	Session::put('message',null);
}
	 ?>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Name</th>
								  <th>Email</th>
								  <th>Message</th>

								  <th>Actions</th>
							  </tr>
						  </thead>
							<?php foreach ($all_message as $value): ?>

							<tbody>
							<tr>
								<td>{{$value->message_name}}</td>
								<td class="center">{{$value->message_email}}</td>
								<td class="center">{{$value->message_text}}</td>
								<td class="center">
									@if($value->category_status==1)
									<span class="label label-success">Active</span>
									@else
									<span class="label label-danger">Unactive</span>
									@endif
								</td>
								<td class="center">
									<a class="btn btn-success" href="#">
										<i class="halflings-icon white zoom-in"></i>
									</a>
										@if($value->category_status==1)
									<a class="btn btn-success" href="{{url('/unative-catagory/')}}">
										<i class="halflings-icon white thumbs-down"></i>
									</a>
									@else
									<a class="btn btn-success" href="{{url('/ative-catagory/')}}">
										<i class="halflings-icon white thumbs-up"></i>
									</a>
											@endif
									<a class="btn btn-info" href="{{url('/edit-catagory/')}}">
										<i class="halflings-icon white edit"></i>
									</a>

									<a class="btn btn-danger" onclick="return confirm('Are you seure want to delete it')" href="{{url('/delete/')}}"">
										<i class="halflings-icon white trash"></i>
									</a>
								</td>
							</tr>
							</tbody>
							<?php endforeach; ?>
									</table>
</div>
@endsection
