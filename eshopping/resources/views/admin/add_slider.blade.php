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
                    <li>
                        <i class="icon-edit"></i>
                        <a href="#">Add Category</a>
                    </li>
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
                            <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Category</h2>

                        </div>
                        <div class="box-content">
                            <form class="form-horizontal" action ="{{url('save_slider')}}" method="post" enctype="multipart/form-data">
                                @csrf
                              <fieldset>

                                <div class="control-group">
                                    <label class="control-label">Slider Image</label>
                                    <div class="controls">
                                      <input type="file" class="input-file uniform-on" id="fileInput" name="slider_image" required="" >
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Publication Status</label>
                                    <div class="controls">
                                      <input type="checkbox" name="slider_status">
                                    </div>
                                  </div>

                                <div class="form-actions">
                                  <button type="submit" class="btn btn-primary">Add slider</button>
                                </div>

                              </fieldset>
                            </form>

                        </div>
                    </div><!--/span-->

                </div><!--/row-->

        </div><!--/.fluid-container-->


@endsection
