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
          <form class="form-horizontal" method="post" enctype="multipart/form-data" action="{{url('/ins/slider')}}">
            {{csrf_field()}}
            <fieldset>
              <div class="control-group hidden-phone">
                <label class="control-label" for="textarea2">Slider Image</label>
                <div class="controls col-md-10">
              <input type="file" name="slider_image" value="">
                </div>
              </div>


            <div class="control-group hidden-phone">
              <label class="control-label" for="textarea2">Slider Details </label>
              <div class="controls col-md-10">
              <textarea class=""name="slider_head" id="textarea2" rows="3"></textarea>
              </div>
            </div>
            <div class="control-group hidden-phone">
              <label class="control-label" for="textarea2">Slider Sub Details</label>
              <div class="controls col-md-10">
              <textarea class=""name="slider_subHead" id="textarea2" rows="3"></textarea>
              </div>
            <div class="control-group hidden-phone">
              <label class="control-label" for="textarea2">Slider  Details</label>
              <div class="controls col-md-10">
              <textarea class=""name="slider_details" id="textarea2" rows="3"></textarea>
              </div>
            </div>
            <div class="control-group hidden-phone">
              <label class="control-label" for="textarea2">slider Link</label>
              <div class="controls col-md-10">
            <input type="text" name="slider_link" value="">
              </div>
            </div>
            <div class="control-group hidden-phone">
              <label class="control-label" for="textarea2">Slider Status</label>
              <div class="controls col-md-10">
            <input type="checkbox" name="slider_status" value="1">
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
