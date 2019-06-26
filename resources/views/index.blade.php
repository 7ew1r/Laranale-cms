@extends('layouts.default')
@section('content')


{{-- フラッシュメッセージを表示 --}}
@if(Session::has('message'))
<div class="alert alert-success">
	<p><i class="fas fa-info-circle"></i> {{ Session::get('message') }}</p>
</div>
@endif

<div class="container">
	<div class="row my-5">
		<div class="col-lg-4 none">
			<div class="chart-container" style="position: relative; height:300px">
				<canvas id="myChart"></canvas>
			</div>
			@php
				$cat_ary = array();
				$cat_cnt = array();
			@endphp
			<ul class="cat_list">
			@foreach($categories as $category)
			@php
				$cat_ary[] = $category->name;
			@endphp
				@php
					$cnt = 0;
					foreach ($all_posts as $post) {
						if($post->category->id === $category->id){
							$cnt++;
						}
					}
					$cat_cnt[] = $cnt;
				@endphp
				<li>{{ link_to("categories/{$category->id}", $category->name) }} <small>{{ $cnt }}投稿</small></li>
				<hr />
				@endforeach
			</ul>
		</div>

		<div class="card col-lg-8">
			<div class="card-body">
				@foreach($posts as $post)
				<h2 class="h3">{{ link_to("posts/{$post->id}" ,$post->title, ['class' => 'text-dark'] ) }}</h2>
				<p>
					<span>by {{ link_to("users/{$post->user->id}" ,$post->user->name, ['class' => 'text-dark']) }}</span>
					<span class="mx-2"><i class="fas fa-comment-dots"></i> {{ $post->comment_count }}</span>
					<span>投稿日：{{ date("Y年 m月 d日",strtotime($post->created_at)) }}</span>
				</p>
				<hr />
				@endforeach
				{{ $posts->links() }}
			</div>
		</div>
	</div>
</div>

@section('script')
	<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0/dist/Chart.min.js"></script>
	<script type="text/javascript" src="https://github.com/nagix/chartjs-plugin-colorschemes/releases/download/v0.2.0/chartjs-plugin-colorschemes.min.js"></script>
	<script>
	var ctx = document.getElementById("myChart");
  var myPieChart = new Chart(ctx, {
    type: 'pie',
    data: {
      labels: <?php echo json_encode($cat_ary); ?>,
      datasets: [{
          data: <?php echo json_encode($cat_cnt); ?>
      }]
    },
    options: {
			maintainAspectRatio: false,
      title: {
        display: false,
        text: 'カテゴリー一覧'
      }
    }
  });
	</script>
@endsection

@stop