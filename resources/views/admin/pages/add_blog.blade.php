@extends('admin.admin_master')
@section('admin_content')

<section class="wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-file-text-o"></i> Add Blog</h3>
            <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
                <li><i class="icon_document_alt"></i>Forms</li>
                <li><i class="fa fa-file-text-o"></i>Form elements</li>
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
                    Add Blog
                </header>
                <div class="panel-body">
                    {!! Form::open(['url' => '/save-blog', 'method'=>'post', 'role'=>'form', 'enctype' => 'multipart/form-data']) !!}
                        <div class="form-group">
                            <label for="name">Blog Title</label>
                            <input type="text" class="form-control" name="blog_title"  placeholder="Enter blog title..">
                        </div>

                        <div class="form-group">
                            <label for="status">Category</label>
                            <select class="form-control" name="category_id">
                                <option>Select Category</option>
                                @foreach($category_info as $c_info)
                                <option value="{{$c_info->category_id}}">{{$c_info->category_name}}</option>
                                @endforeach
                            </select>

                        </div>

                        <div class="form-group">
                            <label for="name">Short Description</label>
                            <input type="text" class="form-control" name="blog_short_description"  placeholder="Write brief description..">
                        </div>

                        <div class="form-group">
                            <label for="">Long Description </label>
                            <textarea class="form-control ckeditor" name="blog_long_description" rows="6"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="name">Blog image</label>
                            <input type="file" class="form-control" name="blog_image"  placeholder="Enter blog title..">
                        </div>

                        <div class="form-group">
                            <label for="status">Publication Status</label>
                            <select class="form-control" name="publication_status">
                                <option>Select Status</option>
                                <option value="1">Published</option>
                                <option value="0">Unpublished</option>
                            </select>

                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary ">Save Changes</button>
                            <button type="submit" class="btn btn-danger ">Cancel</button>
                        </div>

                    {!! Form::close() !!}

                </div>
            </section>
        </div>
    </div>
</section>


@endsection