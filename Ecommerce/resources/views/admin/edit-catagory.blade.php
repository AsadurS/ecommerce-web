@extends('layouts.admin')
@section('catagory')
<div class="row-fluid sortable">
      <div class="box span12">
        <div class="box-header" data-original-title>
          <h2><i class="halflings-icon edit"></i><span class="break"></span>Update Category</h2>
          <div class="box-icon">
            <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
            <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
            <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
          </div>
        </div>
        <div class="box-content">
  
          <form class="form-horizontal" method="post" action="{{url('/update',$update->category_id)}}">
            {{csrf_field()}}
            <fieldset>

            <div class="control-group">
              <label class="control-label" for="date01">Catagory Name</label>
              <div class="controls">
              <input type="hidden" class="input-xlarge datepicker"name="" id="date01"value="{{$update->category_id}}">
              <input type="text" name="cat_name" value="{{$update->category_name}}">
              </div>
            </div>

            <div class="control-group hidden-phone">
              <label class="control-label" for="textarea2">Catagory Details</label>
              <div class="controls">
              <textarea class="cleditor"name="cat_details" id="textarea2" rows="3"> {{$update->category_details}}</textarea>
              </div>
            </div>

            <div class="form-actions">
              <button type="submit" class="btn btn-primary">Update</button>

            </div>
            </fieldset>
          </form>

        </div>
      </div><!--/span-->

    </div><!--/row-->
@endsection
