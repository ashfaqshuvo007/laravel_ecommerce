@extends('admin.admin_master')
@section('admin_content')


<section class="wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-table"></i> Manage Categories</h3>
            <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
                <li><i class="fa fa-table"></i>Categories</li>
                <li><i class="fa fa-th-list"></i>Manage Categories</li>
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
                            <th class="text-center"><i class="icon_profile"></i> Category ID</th>
                            <th class="text-center"><i class="icon_calendar"></i> Category Name</th>
                            <th class="text-center"><i class="icon_calendar"></i> Parent ID</th>
                            <th class="text-center"><i class="icon_mail_alt"></i> Status</th>
                            <th class="text-center"><i class="icon_cogs"></i> Action</th>
                        </tr>

                        @foreach ($all_category_info as $v_category)

                        <tr>
                            <td class="text-center"><?php echo $v_category->category_id ?></td>
                            <td class="text-center"><?php echo $v_category->category_name ?></td>
                            <td class="text-center"><?php echo $v_category->parent_id ?></td>
                            <td class="text-center">
                               @if ($v_category->publication_status == 1)
                                <span class="label label-success">Published</span>
                                @else
                                <span class="label label-danger">Unpublished</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <div class="btn-group">

                                    @if ($v_category->publication_status == 1)
                                    <a class="btn btn-danger" href="{{URL::to('/unpublished-category/'.$v_category->category_id)}}">
                                        <i class="fa fa-thumbs-down"></i>
                                    </a>
                                    @else
                                    <a class="btn btn-primary" href="{{URL::to('/published-category/'.$v_category->category_id)}}">
                                        <i class="fa fa-thumbs-up"></i>
                                    </a>
                                    @endif
                                    <a class="btn btn-success" href="{{URL::to('/edit-category/'.$v_category->category_id)}}"><i class="fa fa-pencil-square-o"></i></a>
                                    <a class="btn btn-danger" href="{{URL::to('/delete-category/'.$v_category->category_id)}}" onclick="return checkDelete();"><i class="fa fa-trash-o"></i></a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </section>
        </div>
    </div>
    <!-- page end-->
</section>

@endsection