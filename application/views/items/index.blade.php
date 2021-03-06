@php
$CI =& get_instance();
@endphp
@section('head')
@endsection

@extends('layouts.master', ['title' => $title . " - " . $settings['title']])

@section('foot')
<!-- Datatables -->
<script src="{{ base_url('assets/gentelella/vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ base_url('assets/gentelella/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ base_url('assets/gentelella/vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ base_url('assets/gentelella/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}"></script>
<script src="{{ base_url('assets/gentelella/vendors/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
<script src="{{ base_url('assets/gentelella/vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ base_url('assets/gentelella/vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ base_url('assets/gentelella/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}"></script>
<script src="{{ base_url('assets/gentelella/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
<script src="{{ base_url('assets/gentelella/vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ base_url('assets/gentelella/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}"></script>
<script src="{{ base_url('assets/gentelella/vendors/datatables.net-scroller/js/dataTables.scroller.min.js') }}"></script>
<script src="{{ base_url('assets/gentelella/vendors/jszip/dist/jszip.min.js') }}"></script>
<script src="{{ base_url('assets/gentelella/vendors/pdfmake/build/pdfmake.min.js') }}"></script>
<script src="{{ base_url('assets/gentelella/vendors/pdfmake/build/vfs_fonts.js') }}"></script>
@endsection

@section('content')
<div class="">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>{{ $title }}</h2>
            <ul class="nav navbar-right panel_toolbox">
                <a href="{{ base_url($CI->uri->segment(1).'/add') }}"><button type="button" class="btn btn-primary">Add Data</button></a>
            </ul>
            <div class="clearfix"></div>
          </div>
          {!! $CI->session->flashdata('alert_action'); !!}
          <div class="x_content">
            <table id="datatable" class="table table-striped table-bordered">
              <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Subcategory</th>
                    <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($dataset as $data)
                <tr>
                    <td>{{ $no }}</td>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->category }}</td>
                    <td>
                        <a href="{{ base_url($CI->uri->segment(1).'/'.$data->id.'/edit') }}"><button type="button" class="btn btn-success">Edit</button></a>
                        
                    </td>
                </tr>
                @php
                    $no++;
                @endphp
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection