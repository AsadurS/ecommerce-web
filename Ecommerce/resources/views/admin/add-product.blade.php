@extends('layouts.admin')
@section('catagory')
<div class="row-fluid sortable">
      <div class="box span12">
        <div class="box-header" data-original-title>
          <h2><i class="halflings-icon edit"></i><span class="break"></span>Form Elements</h2>
          <div class="box-icon">
            <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
            <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
            <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
          </div>
        </div>
        <div class="box-content">
          <?php
$message=Session::get('message');
if ($message) {
  echo $message;
  Session::put('message',null);
}?>
@if(Session::has('success'))
<p>hoise vao </p>
@endif
@if(Session::has('success'))
echo "hoini";
@endif



          <form class="form-horizontal" method="post" enctype="multipart/form-data" action="{{url('/insert')}}">
            {{csrf_field()}}
            <fieldset>

            <div class="control-group">
              <label class="control-label" for="date01">Product Name</label>
              <div class="controls col-md-10">
              <input type="hidden" class="input-xlarge datepicker"name="" id="date01" value="">
              <input type="text" name="pro_name" value="">
              </div>
            </div>

            <div class="control-group">
								<label class="control-label" for="selectError3">Category type</label>
								<div class="controls col-md-10">
								  <select name="category_id" id="selectError3">
                    <?php $variable=DB::table('tbl_categories')->where('category_status',1)->get(); ?>
                    <?php foreach ($variable as  $value): ?>
									<option value="{{$value->category_id}}">{{$value->category_name}}</option>
                    <?php endforeach; ?>
								  </select>
								</div>
							  </div>
                <div class="control-group">
								<label class="control-label" for="selectError3">Brand Name</label>
								<div class="controls col-md-10">
                  <?php $var=DB::table('brands')->where('brand_status',1)->get(); ?>
								  <select name="id" id="selectError3">
                    <?php foreach ($var as  $valu): ?>
									<option value="{{$valu->id}}" > {{$valu->brand_name}}</option>
                    <?php endforeach; ?>
								  </select>
								</div>
							  </div>

            <div class="control-group hidden-phone">
              <label class="control-label" for="textarea2">Product Short Details</label>
              <div class="controls col-md-10">
              <textarea class=""name="pro_short_des" id="textarea2" rows="3"></textarea>
              </div>
            </div>
            <div class="control-group hidden-phone">
              <label class="control-label" for="textarea2">Product Long Details</label>
              <div class="controls col-md-10">
              <textarea class=""name="pro_long_des" id="textarea2" rows="3"></textarea>
              </div>
            </div>
            <div class="control-group hidden-phone">
              <label class="control-label" for="textarea2">Product Price</label>
              <div class="controls col-md-10">
            <input type="text" name="pro_price" value="">
              </div>
            </div>
            <div class="control-group hidden-phone">
              <label class="control-label" for="textarea2">Product Image</label>
              <div class="controls col-md-10">
            <input type="file" name="pro_image" value="">
              </div>
            </div>
            <div class="control-group hidden-phone">
              <label class="control-label" for="textarea2">Product Size</label>
              <div class="controls col-md-10">
            <input type="text" name="pro_size" value="">
              </div>
            </div>
            <div class="control-group hidden-phone">
              <label class="control-label" for="textarea2">product Color</label>
              <div class="controls col-md-10">
            <input type="text" name="pro_color" value="">
              </div>
            </div>
            <div class="control-group hidden-phone">
              <label class="control-label" for="textarea2">Product Status</label>
              <div class="controls col-md-10">
            <input type="checkbox" name="pro_status" value="1">
              </div>
            </div>
            <div class="form-actions">
              <button type="submit" class="btn btn-primary">Save changes</button>
              <button type="reset" class="btn">Cancel</button>
            </div>
            </fieldset>
          </form>

        </div>
      </div><!--/span-->

    </div><!--/row-->
@endsection
