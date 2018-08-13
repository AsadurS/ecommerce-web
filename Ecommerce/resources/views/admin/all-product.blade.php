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
					<?php if (Session::has('message')): ?>


					<div class="alert alert-success video-field-new">
	<strong>Success!</strong> Indicates a successful or positive action.
	</div>
			<?php endif; ?>
			<?php if (Session::has('err')): ?>


	<div class="alert alert-danger video-field-new">
	<strong>Cant!</strong> Not be done
	</div>
	<?php endif; ?>
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
								  <th>Product Name</th>
                  <th>Category Name</th>
                  <th>Brand Name</th>
                  <th>Product Short Details</th>
                  <th>Product Long Details</th>
                  <th>Product Price</th>
								  <th>Product Image</th>
								  <th>Product Size</th>
								  <th>Product Color</th>
								  <th>Product Status</th>
                    <th>Manage</th>
							  </tr>
						  </thead>

<?php foreach ($allProduct as  $value): ?>


							<tbody>
							<tr>
								<td class="center">{{$value->pro_name}}</td>
                <td class="center">{{$value->category_name}}</td>
                <td class="center">{{$value->brand_name}}</td>
                <td class="center">{{$value->pro_short_des}}</td>
                <td class="center">{{$value->pro_long_des}}</td>
                <td class="center">{{$value->pro_price}}</td>
                <td class="center"> <img src="{{asset('uplpads/'.$value->pro_image)}}" alt=""> </td>
<td class="center">{{$value->pro_size}}</td>
<td class="center">{{$value->pro_color}}</td>

								<td class="center">
@if($value->pro_status==1)
									<span class="label label-success">Active</span>
@else
									<span class="label label-danger">Unactive</span>
@endif
								</td>
								<td class="center">
									<a class="btn btn-success" href="#">
										<i class="halflings-icon white zoom-in"></i>
									</a>
@if($value->pro_status==1)
									<a class="btn btn-success" href="{{url('unactive-pro/'.$value->id)}}">
										<i class="halflings-icon white thumbs-down"></i>
									</a>
@else
									<a class="btn btn-success" href="{{url('active-pro/'.$value->id)}}">
										<i class="halflings-icon white thumbs-up"></i>
									</a>
@endif
									<a class="btn btn-info" href="{{url('/edit-product/'.$value->pro_id)}}">
										<i class="halflings-icon white edit"></i>
									</a>

									<a class="btn btn-danger" onclick="return confirm('Are you seure want to delete it')" href="{{
										url('/delete1/'.$value->id)}}">
										<i class="halflings-icon white trash"></i>
									</a>
								</td>
							</tr>
							</tbody>
<?php endforeach; ?>
									</table>
</div>
@endsection
