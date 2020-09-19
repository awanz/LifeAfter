@php
$CI =& get_instance();
@endphp
@section('head')
<!-- Select2 -->
<link href="{{ base_url('assets/gentelella/vendors/select2/dist/css/select2.min.css') }}" rel="stylesheet">
@endsection

@extends('layouts.master', ['title' => $title . " - " . $settings['title']])

@section('foot')
<!-- Select2 -->
<script src="{{ base_url('assets/gentelella/vendors/select2/dist/js/select2.full.min.js') }}"></script>
<script>  
  $(document).ready(function() {
    $('.select-items').select2();

    $("#category_id").change(function(){
      var category_id = this.value;
      // $.get("get-subcategories/"+category_id, function(data, status){
      //   subcategories = JSON.parse(data);
      //   // console.log(subcategories);
      //   $('#subcategory_id').val(null).trigger('change');
      //   $("#subcategory_id").select2('data', subcategories);    
      // });
      $('#subcategory_id').select2({
        ajax: {
          url: 'get-subcategories/'+category_id,
          dataType: 'json'
        }
      });
    });
  });
</script>
@endsection

@section('content')
<div class="">
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Add {{ $title }}</h2>
          <ul class="nav navbar-right panel_toolbox">
            <a href="{{ base_url($CI->uri->segment(1)) }}"><button type="button" class="btn btn-primary">List Data</button></a>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <br />
            {!! form_open($CI->uri->segment(1).'/add', array('class' => 'form-horizontal form-label-left')) !!}
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Name<span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input autocomplete="off" type="text" id="name" name="name" required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Category
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <select class="select-items col-md-6" id="category_id" name="category_id">
                  <option value="">-- Select --</option>
                  @foreach ($categories as $category)
                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">SubCategory<span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <select class="select-items col-md-6" id="subcategory_id" name="subcategory_id">
                  <option value="">-- Select --</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="wiki_id">Wiki ID
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input autocomplete="off" type="text" id="wiki_id" name="wiki_id" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <div class="ln_solid"></div>
            <div class="form-group">
              <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <a href="{{ base_url($CI->uri->segment(1)) }}"><button class="btn btn-default" type="button">Cancel</button></a>
                <button class="btn btn-success" type="reset">Reset</button>
                <button type="submit" class="btn btn-primary">Add</button>
              </div>
            </div>
            {!! form_close() !!}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection