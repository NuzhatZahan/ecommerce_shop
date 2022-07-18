@extends('admin.admin_layouts.main')
@section('admin-main-content')
<!-- start: Content -->
<div id="content" class="span10">


    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="{{url('/dashboard')}}">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="#">Tables</a></li>
    </ul>

    <div class="row fluid sortable" >
        <p class= "alert-success box span12">
            <?php
                $message = session()->get('message');
                    if($message)
                    {
                        echo "$message";
                        session()->put('message', null);
                    }
            ?>
        </p>
    </div>

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon user"></i><span class="break"></span>Members</h2>
            </div>


            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable">
                  <thead>
                      <tr>
                          <th>Slider Id</th>
                          <th>SLider Image</th>
                          <th>Slider Status</th>
                          <th>Actions</th>
                      </tr>
                  </thead>
                  @foreach (  $all_slider_info as $slider )
                  <tbody>
                    <tr>
                        <td>{{$slider->slider_id}}</td>
                        <td> <img src="{{url($slider->slider_image)}}" style="height:80px; width:120px;"></td>
                        <td class="center">{{$slider->slider_status}}</td>

                        <td class="center">
                            @if($slider->slider_status == 'on')
                                <span class="label label-success">Active</span>
                            @else
                                <span class="label label-danger">Inactive</span>
                            @endif
                        </td>
                        <td class="center">
                            @if($slider->slider_status == 'on')
                                <a class="btn btn-danger" href="{{url('/inactive_slider', $slider->slider_id)}}">
                                    <i class="halflings-icon white thumbs-down"></i>
                                </a>
                            @else
                            <a class="btn btn-success" href="{{url('/active_slider', $slider->slider_id)}}">
                                <i class="halflings-icon white thumbs-up"></i>
                            </a>
                            @endif

                            <a class="btn btn-danger" id = "delete" href="{{url('/delete_slider', $slider->slider_id)}}">
                                <i class="halflings-icon white trash"></i>
                            </a>
                        </td>
                    </tr>

                  </tbody>

                  @endforeach

              </table>
            </div>
        </div><!--/span-->
        <div class="row">
            {{ $all_slider_info->links() }}
        </div>
    </div><!--/row-->

</div><!--/.fluid-container-->

    <!-- end: Content -->

@endsection
