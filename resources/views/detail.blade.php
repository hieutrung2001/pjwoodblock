<!DOCTYPE html>
<html style="font-size: 16px;" lang="en">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
	<meta name="keywords" content="">
	<meta name="description" content="">
	<title>Chi tiết mộc bản</title>
	<link rel="stylesheet" href="{{ asset('css/nicepage.css') }}" media="screen">
	<link rel="stylesheet" href="{{ asset('css/detail.css') }}" media="screen">
	<script class="u-script" type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" defer=""></script>
	<script class="u-script" type="text/javascript" src="{{ asset('js/nicepage.js') }}" defer=""></script>
	<meta name="generator" content="Nicepage 4.20.1, nicepage.com">
	<link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
	<script src="https://cdn.tailwindcss.com"></script>
	<meta name="theme-color" content="#478ac9">
	<meta property="og:title" content="Detail">
	<meta property="og:type" content="website">
</head>

<body class="u-body u-xl-mode" data-lang="en">
	<header class="u-custom-color-1 u-header flex item-center px-5 lg:px-20" id="sec-f682">
		<a href="{{ route('woodblock.index') }}">
			<p class="text-[#f1c50e] font-bold lg:text-[48px] text-[32px]">Mộc Bản - Di Sản Số</p>
		</a>
	</header>
	<section class="u-clearfix u-custom-color-2 u-section-1 pt-2 lg:pt-20" id="sec-b48c">
		<div class="px-5 lg:px-20">
			<div class="u-clearfix u-expanded-width u-gutter-10 u-layout-wrap u-layout-wrap-1">
				<div class="u-layout">
					<div class="lg:grid-cols-2 grid gap-x-10">
						<div class="">
							@if (!empty($woodblock['detail_images']))

							<img src="{{ asset($woodblock['detail_images'][0]) }}" alt="">
							@endif 
						</div>
						
						<div class="flex flex-col gap-y-5 mt-5 lg:mt-0">
							<div class="">
								<!-- Tên Bộ sách -->
								<p class="font-semibold text-[24px] lg:text-[32px] leading-[40px] text-[#ffffff] !my-0">{{ $woodblock['books_name'] }}</p>
							</div>
							<!-- Mô tả bộ sacsh -->
							<div class="">
								{{ $woodblock['books_description'] }}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="u-custom-color-2 pt-2 pb-20 lg:px-20 px-5" id="sec-ca14">
		<!-- Link mộc bản 3D nếu có (Không có thì ẩn) -->
		<div class="flex flex-col lg:pb-10 gap-y-2">
			<div class="text-[#f1c50e] font-bold text-[32px]">Mộc bản</div>
			<div>
				@if (!empty($woodblock['link']))
				<button class="bg-[#17A2CC] px-2 py-2 rounded">
					<a class="!text-[#fff]" href="{{ $woodblock['link'] }}">Trình diễn mộc bản 3D</a>
				</button>
				@endif
			</div>
		</div>
		<div class="mt-10 lg:mt-0">
			<div class="grid lg:grid-cols-2 lg:gap-x-10">
				<div class="flex flex-col gap-x-0">
					@if(!empty($woodblock['front_image'])) 
						<div class="w-full">
							<!-- ẢNh mặt trước + thông tin -->
							<img class="w-full" src="{{ asset($woodblock['front_image']) }}">
						</div>
						<div class="flex justify-center mt-[-10px] lg:mt-0">
							<p class="my-0 text-[#f1c50e]">Quyển: {{ $woodblock['front_notebook'] }} - MK : {{ $woodblock['front_engraved_face'] }} (Ảnh mặt trước)</p>
						</div>
					@endif 
				</div>
				<div class="flex flex-col gap-x-0">
					@if(!empty($woodblock['back_image'])) 
						<!-- ẢNh mặt sau + thông tin -->
						<div class="w-full">
							<img class="w-full" src="{{ asset($woodblock['back_image']) }}">
						</div>
						<div class="flex justify-center mt-[-10px] lg:mt-0">
							<p class="my-0 text-[#f1c50e]">Quyển: {{ $woodblock['back_notebook'] }} - MK : {{ $woodblock['back_engraved_face'] }} (Ảnh mặt sau)</p>
						</div>
					@endif 
				</div>
			</div>
			<!-- Mô tả mộc bản -->
			<div>
				{{ $woodblock['description'] }}
			</div>

		</div>
		Một số ảnh khác
		<div class="mt-10 lg:mt-0">
			<div class="grid lg:grid-cols-1 lg:gap-x-10">
				<div class="flex flex-row gap-x-0">
					@if (!empty($woodblock['detail_images'])) 
						@foreach ($woodblock['detail_images'] as $img)
						<div class="w-full mt-5 ml-3">
							<!-- ẢNh mặt trước + thông tin -->
							<img class="w-full" src="{{ asset($img) }}">
						</div>
						@endforeach
					@endif 
				</div>
			</div>
			
		</div>
	</section>
	<section class="u-clearfix u-image u-section-3" id="sec-5f85" data-image-width="2874" data-image-height="706">
		<div class="u-clearfix u-sheet u-sheet-1">
			<p class="u-text u-text-body-alt-color u-text-1">Trung tâm phát triển công nghệ.....</p>
			<p class="u-align-center u-text u-text-body-alt-color u-text-2">&nbsp;Toà nhà E3, Đại học Công Nghệ đại học Quốc
				gia Hà Nội<br>144 Xuân Thuỷ, Cầu Giấy Hà Nội
			</p>
		</div>
	</section>
</body>

</html>