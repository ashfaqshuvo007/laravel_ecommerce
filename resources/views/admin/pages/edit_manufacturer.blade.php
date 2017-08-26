@extends('admin.admin_master')
@section('admin_content')

<section class="wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-file-text-o"></i> Edit Manufacturer</h3>
            <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
                <li><i class="icon_document_alt"></i>Forms</li>
                <li><i class="fa fa-file-text-o"></i>Edit</li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <h3 style="color:green;">
                <?php
$message = Session::get('message');
if ($message) {
	echo $message;
	Session::put('message', null);
}

?>
            </h3>
            <section class="panel">
                <header class="panel-heading">
                    Edit Manufacturers
                </header>
                <div class="panel-body">


                    <form action="{{ URL::to('/update-manufacturer')}}" method="POST">

                    {{csrf_field()}}
                        <div class="form-group">
                            <label for="name">Manufacturer Name</label>
                            <input type="text" class="form-control" name="manufacturer_name"  value="{{ $manu_info->manufacturer_name }}">
                            <input type="hidden" class="form-control" name="manufacturer_id"  value="{{$manu_info->manufacturer_id }}">
                        </div>
                        <div class="form-group">
                            <label for="">Manufacturer description </label>
                            <textarea class="form-control ckeditor" name="manufacturer_description" rows="6">{{$manu_info->manufacturer_description}}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="status">Publication Status</label>
                            <select class="form-control" name="publication_status">
                                <option>Select Status</option>
                                <option value="1">Published</option>
                                <option value="0">Unpublished</option>
                            </select>

                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary ">Update</button>
                            <!-- <button type="reset" class="btn btn-danger ">Cancel</button> -->
                        </div>

                   </form>

                </div>
            </section>
        </div>
    </div>
</section>


@endsection