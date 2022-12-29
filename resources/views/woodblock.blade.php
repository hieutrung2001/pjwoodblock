<!DOCTYPE html>
<html style="font-size: 16px;" lang="en">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta charset="utf-8">
	<meta name="keywords" content="">
	<meta name="description" content="">
	<title>List</title>
	<link rel="stylesheet" href="{{ asset('css/nicepage.css') }}" media="screen">
	<link rel="stylesheet" href="{{ asset('css/list.css') }}" media="screen">
	<script class="u-script" type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" defer=""></script>
	<script class="u-script" type="text/javascript" src="{{ asset('js/nicepage.js') }}" defer=""></script>
	<meta name="generator" content="Nicepage 4.20.1, nicepage.com">
	<link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
	<script src="https://cdn.tailwindcss.com"></script>
	<script type="application/ld+json">
		{
			"@context": "http://schema.org",
			"@type": "Organization",
			"name": ""
		}
	</script>
	<meta name="theme-color" content="#478ac9">
	<meta property="og:title" content="List">
	<meta property="og:type" content="website">
</head>

<body class="u-body u-xl-mode bg-[#403229]" data-lang="en">
	<div class="px-10 md:px-10 lg:px-20">
		<div class="flex flex-col gap-y-4">
			<a href="{{ route('woodblock.index') }}">
				<p class="text-[36px] leading-8 text-[#BBDA11] font-bold">Mộc Bản - Di Sản Số</p>
			</a>
			<form action="{{ route('woodblock.search') }}" method="get" class="u-border-1 u-border-grey-30 u-search u-search-left u-white u-search-1">
				<button class="u-search-button" type="submit">
					<span class="u-search-icon u-spacing-10">
						<svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 56.966 56.966">
							<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-ca0a"></use>
						</svg>
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="svg-ca0a" x="0px" y="0px" viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve" class="u-svg-content">
							<path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z"></path>
						</svg>
					</span>
				</button>
				<input class="u-search-input" type="search" name="search" value="" placeholder="Search">
			</form>
		</div>
		<!-- Danh sách môch bản -->
		<div class="bg-[#403229] pb-10 pt-10">
			<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-y-10 gap-x-8">
				@foreach ($data as $w)
				<div class=" w-full bg-[#675c54] text-white rounded-md ">
					<a href="{{ route('woodblock.detail', ['code' => $w['code']]) }}">
						<div class="w-full h-[185px] ">
							<img src="{{ $w['front_image'] }}" alt="" class="object-cover h-full rounded-md w-full">
						</div>
					</a>
					<div class="flex flex-col px-3 py-3">
						<h4 class="text-[24px]  text-[#BBDA11]">{{ $w['books_name'] }}</h4>
						<div class="mt-3 text-[16px] gap-y-1">
							<p class="">Mã: {{ $w['code'] }}</p>
							@if (!empty($w['front_notebook']))
							<p class="">Quyển: {{ $w['front_notebook'] }} - MK: {{ $w['front_engraved_face'] }}</p>
							@endif
							@if (!empty($w['back_notebook']))
							<p class="">Quyển: {{ $w['back_notebook'] }} - MK: {{ $w['back_engraved_face'] }}</p>
							@endif
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>

	<section class="u-section-3 om-lg:!mt-10" id="sec-9828" data-image-width="2874" data-image-height="706">
		<div class="u-clearfix u-sheet u-sheet-1">
			<p class="u-text u-text-body-alt-color u-text-1">Trung tâm phát triển công nghệ.....</p>
			<p class="u-align-center u-text u-text-body-alt-color u-text-2">&nbsp;Toà nhà E3, Đại học Công Nghệ đại học Quốc gia Hà Nội<br>144 Xuân Thuỷ, Cầu Giấy Hà Nội
			</p>
		</div>
	</section>

</body>
<script>
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
</script>

</html>