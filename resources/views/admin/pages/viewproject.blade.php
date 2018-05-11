@extends('admin.layout')

@section('dashboard')
<section class="content-header">
	    <h1>
	        View News
      </h1>
        
	    <ol class="breadcrumb">
	    	<li><i class="fa fa-dashboard"></i> Home</a></li>
	        <li>View Project</a></li>
	    </ol>
      
	</section>
@stop

@section('see_single_project')
 <form>
              <input type="hidden" name="_token" value="{{csrf_token()}}">
              
            <div class="col-md-12">
              <div class="form-message" style="display: none;">
                <!-- Success and error messages form ajax goes here -->
              </div>
            <div class="form-group">
                 <label for="exampleInputEmail1">Project Title in English</label>
                 <input type="text" class="form-control" id="engtitle" placeholder="Enter title of news in ENGLISH" name="eng_title" value="{{$r->english_title}}">
                 
            </div>

            <div class="form-group">
                 <label for="exampleInputEmail1">Project Title in Nepali</label>
                 <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter title of news in NEPALI" name="nep_title" value="{{$r->nepali_title}}">
            </div>

              

               <div class="form-group">
                  <label for="exampleInputFile">Image</label>
                      <img src="{{url($r->project_image)}}" width="400" height="400">
                 


                  <p class="help-block">Example block-level help text here.</p>
                </div>



          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title"> Full News in English
                <small>CK EDITOR</small>
              </h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fa fa-minus"></i></button>
               
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body pad"> 
                <textarea class="ckeditor" name="eng_editor" rows="10" cols="80">
                           {{$r->english_description}}                 
                </textarea>
                   
              
            </div>

          </div>


           <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title"> Full News in Nepali
                <small>CK EDITOR</small>
              </h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fa fa-minus"></i></button>
               
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
             
                    <textarea class="ckeditor" name="nep_editor" rows="10" cols="80">
                    {{$r->nepali_description}}

                        
                    </textarea>
                    
              
            </div>
          </div>
       




           

         
          </div>
          
          </form>
@stop