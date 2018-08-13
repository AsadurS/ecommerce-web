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
}

           ?>
          <form class="form-horizontal" method="post" action="{{url('/inter')}}">
            {{csrf_field()}}
            <fieldset>

            <div class="control-group">
              <label class="control-label" for="date01">Brand Name</label>
              <div class="controls">
              <input type="hidden" class="input-xlarge datepicker"name="" id="date01" value="">
              <input type="text" name="brand_name" value="">
              </div>
            </div>

            <div class="control-group hidden-phone">
              <label class="control-label" for="textarea2">Brand Details</label>
              <div class="controls">
              <textarea class="cleditor"name="brand_details" id="textarea2" rows="3"></textarea>
              </div>
            </div>
            <div class="control-group hidden-phone">
              <label class="control-label" for="textarea2">publication Status</label>
              <div class="controls">
            <input type="checkbox" name="brand_status" value="1">
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
