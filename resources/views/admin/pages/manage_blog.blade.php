@extends('admin.admin_master')
@section('admin_content')


<section class="wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-table"></i> Manage Blog</h3>
            <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
                <li><i class="fa fa-table"></i>Blogs</li>
                <li><i class="fa fa-th-list"></i>Manage Blogs</li>
            </ol>
        </div>
    </div>
    <!-- page start-->

    <div class="row">
        <div class="col-lg-12">
            <section class="panel">              
                <table class="table table-striped table-advance table-hover">
                    <tbody>
                        <tr>
                            <th class="text-center"><i class="icon_profile"></i> Blog ID</th>
                            <th class="text-center"><i class="icon_profile"></i> Blog Image</th>
                            <th class="text-center"><i class="icon_profile"></i> Blog Category</th>
                            <th class="text-center"><i class="icon_calendar"></i> Blog Title</th>
                            <th class="text-center"><i class="icon_mail_alt"></i> Status</th>
                            <th class="text-center"><i class="icon_cogs"></i> Action</th>
                        </tr>
                        <?php
                        foreach ($blog_info as $v_blog) {
                            ?>
                            <tr>
                                <td class="text-center"><?php echo $v_blog->blog_id ?></td>
                                <td class="text-center"><img src="<?php echo $v_blog->blog_image ?>" width="50" height="50"></td>
                                <td class="text-center"><?php echo $v_blog->category_name ?></td> 
                                <td class="text-center"><?php echo $v_blog->blog_title ?></td> 
                                
                                
                                <td class="text-center">
                                    <?php
                                    if ($v_blog->publication_status == 1) {
                                        ?>   
                                        <span class="label label-success">Published</span>
                                        <?php
                                    } else {
                                        ?>
                                        <span class="label label-danger">Unpublished</span>
                                    <?php }
                                    ?>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <?php
                                        if ($v_blog->publication_status == 1) {
                                            ?>
                                            <a class="btn btn-danger" href="{{URL::to('/unpublished-blog/'.$v_blog->blog_id)}}">
                                                <i class="fa fa-thumbs-down"></i>
                                            </a>
                                            <?php
                                        } else {
                                            ?>
                                            <a class="btn btn-primary" href="{{URL::to('/published-blog/'.$v_blog->blog_id)}}">
                                                <i class="fa fa-thumbs-up"></i>
                                            </a>
                                        <?php } ?>
                                        <a class="btn btn-success" href="{{URL::to('/edit-blog/'.$v_blog->blog_id)}}"><i class="fa fa-pencil-square-o"></i></a>
                                        <a class="btn btn-danger" href="{{URL::to('/delete-blog/'.$v_blog->blog_id)}}" onclick="return checkDelete();"><i class="fa fa-trash-o"></i></a>
                                    </div>
                                </td>
                            </tr>  
                        <?php } ?>
                    </tbody>
                </table>
            </section>
        </div>
    </div>
    <!-- page end-->
</section>

@endsection
