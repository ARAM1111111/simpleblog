@extends('layouts.dashboard')

@section('content')
	<h2 class="sub-header">ALL POSTS</h2>
	<div class="row">
		<div class="col-md-6 col-md-offset-3" >
			<a href="#" class="btn btn-primary btn-sm">ADD NEW POSTS</a>
		</div>
		<div class="col-md-3 " >
			{!! Form::open(['method'=>'GET','url'=>'admin/posts/','class'=>'navbar-form navbar-left','role'=>'search']) !!}
				<div class="input-group custom-search-form">
					<input type="text" name="search" class="form-control" placeholder="Search....">
					<span class="input-group-btn">
						<button type="submit" class="btn btn-default-sm">
							<i class="fa fa-search"></i>S
						</button>
					</span>
				</div>
			{!! Form::close() !!}
		</div>
	</div>
	
	<div class="table-responsive">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>#</th>
					<th>Title</th>
					<th>Description</th>
					<th>Post</th>
					<th>Urls</th>
					<th>Image</th>
					<th>Created</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php $no=1 ?>
				@foreach($posts as $post)
					<tr>
						<td>{{$no++}}</td>
						<td>{{$post->title}}</td>
						<td>{{$post->description}}</td>
						<td>
							{{str_limit($post->body,$limit=120,$end='......')}}
						</td>
						<td>
							{!! ('<a href='.url("/".$post->slug).'>'.$post->slug.'</a>') !!}
						</td>
						<td>
							<img src="{{url('img/'.$post->images)}}" id="showimages" style="max-width: 100px;max-height: 50px;float: left">
						</td>
						<td>{{$post->created_at}}</td>
						<td>
							<form class="" action="" method="post">
								{{method_field('delete')}}
								{{csrf_field()}}
								<a href="{{url('admin/posts/editpost/'.$post->slug)}}" class="btn btn-primary btn-xs ">
									<span class="glyphicon glyphicon-edit"></span>
								</a>

								<a href="{{url('admin/posts/deletepost/'.$post->id.'?_token='.csrf_token())}}" class="btn btn-danger btn-xs " onclick="return confirm('Are you sure delete this')">
									<span class="glyphicon glyphicon-trash"></span>
								</a>

							</form>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		{!! $posts->links()!!}
	</div>

@endsection