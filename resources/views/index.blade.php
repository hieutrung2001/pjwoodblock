<!DOCTYPE html>
<html style="font-size: 16px;" lang="en">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
	<meta name="keywords" content="Mộc bảnDi sản số, Mộc bản Triều Nguyễn, When to Register, Full Day Kindergarten, 01, Starting School, Student Safety and Wellness Information for Parents and Students, Contact, INTUITIVE">
	<meta name="description" content="">
	<title>Home</title>
	<link rel="stylesheet" href="{{ asset('css/nicepage.css') }}" media="screen">
	<link rel="stylesheet" href="{{ asset('css/home.css') }}" media="screen">
	<script class="u-script" type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" defer=""></script>
	<script class="u-script" type="text/javascript" src="{{ asset('js/nicepage.js') }}" defer=""></script>
	<meta name="generator" content="Nicepage 4.20.1, nicepage.com">
	<link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
	<link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald:200,300,400,500,600,700">
	<script type="application/ld+json">
		{
			"@context": "http://schema.org",
			"@type": "Organization",
			"name": ""
		}
	</script>
	<meta name="theme-color" content="#478ac9">
	<meta property="og:title" content="Home">
	<meta property="og:type" content="website">
	<script src="https://cdn.tailwindcss.com"></script>
</head>

<body data-home-page="Home.html" data-home-page-title="Home" class="u-body u-xl-mode" data-lang="en">
	<section class="u-clearfix u-image u-shading u-section-1" id="carousel_591a" data-image-width="2880" data-image-height="1394">
		<div class="u-clearfix u-sheet u-sheet-1">
			<div class="u-container-style u-group u-group-1">
				<div class="u-container-layout u-container-layout-1">
					<h1 class="u-align-left u-custom-font u-font-oswald u-text u-text-palette-3-base u-title u-text-1">Mộc bản - Di sản số</h1>
					<h4 class="u-text u-text-2">Giữ gìn, Lan truyền và bảo về văn hoá dân tộc</h4>
					<p class="u-text u-text-3"> Mộc bản Triều Nguyễn là loại hình tài liệu đặc biệt về hình thức, nội dung và phương thức chế tác; là bản gốc của các bộ chính văn, chính sử nổi tiếng của Việt Nam được biên soạn, khắc in chủ yếu dưới Triều Nguyễn. Mộc bản được hình thành chủ yếu bằng kỹ thuật khắc ngược ký tự Hán Nôm trên gỗ để in ra sách được sử dụng phổ biến trong thời kỳ phong kiến và còn lưu giữ được đến ngày nay.</p>
				</div>
			</div>

		</div>
	</section>
	<section class="u-clearfix u-custom-color-1 u-section-3" id="carousel_aecf">
		<div class="px-8 md:px-10 lg:px-20 pt-20">
			<h2 class="u-custom-font u-font-oswald u-hidden-xs u-text u-text-palette-3-light-1 u-text-3">Trình diễn - tương tác với mộc bản 3D triều Nguyễn</h2>
			<div class="u-border-3 u-border-white u-line u-line-horizontal u-line-2"></div>
			<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-10 gap-y-10 pt-10">
				
				@foreach ($data as $w)
				<div class=" w-full bg-[#675c54] text-white rounded-md ">
					<a class="w-full" href="{{ route('woodblock.detail', ['code' => $w['code']]) }}">
						<img class="object-cover h-[185px] rounded-md w-full" src="{{ asset($w['front_image']) }}" data-image-width="2180" data-image-height="1522">
					</a>
					<div class="flex flex-col px-2 pt-5">
						<h4 class="text-[24px]  text-[#BBDA11]">{{ $w['books_name'] }}</h4>
						<div class="text-[16px]">
							<p class="">Mã: {{ $w['code'] }}</p>
							@if(!empty($w['front_notebook']))
								<p class="">Quyển: {{ $w['front_notebook'] }} - MK: {{ $w['front_engraved_face'] }}</p>
							@endif
							@if(!empty($w['back_notebook']))
								<p class="">Quyển: {{ $w['back_notebook'] }} - MK: {{ $w['back_engraved_face'] }}</p>
							@endif
						</div>
					</div>
				</div>
				@endforeach
				
			</div>
			<a href="{{ route('woodblock.search') }}" class="u-border-2 u-border-palette-3-dark-1 u-btn u-button-style u-hover-palette-3-light-1 u-palette-3-light-2 u-text-palette-3-dark-2 u-btn-2">Xem tất cả<span class="u-icon u-text-palette-1-dark-2"><svg class="u-svg-content" viewBox="0 0 512 512" x="0px" y="0px" style="width: 1em; height: 1em;">
						<path d="M441.156,322.876l-48.666-47.386c-3.319-3.243-8.619-3.234-11.93,0.017l-81.894,80.299V8.533 c0-4.71-3.823-8.533-8.533-8.533h-68.267c-4.71,0-8.533,3.823-8.533,8.533v347.273l-81.894-80.299    c-3.311-3.243-8.602-3.251-11.921-0.017l-48.666,47.386c-1.655,1.604-2.586,3.806-2.586,6.11c0,2.304,0.939,4.506,2.586,6.11 l179.2,174.481c1.655,1.613,3.806,2.423,5.948,2.423c2.15,0,4.292-0.811,5.956-2.423l179.2-174.481 c1.647-1.604,2.577-3.806,2.577-6.11C443.733,326.682,442.803,324.48,441.156,322.876z"></path>
					</svg><img></span>
			</a>
		</div>
	</section>
	<section class="u-clearfix u-custom-color-1 u-section-4" id="sec-f800">
		<div class="px-8 md:px-10 lg:px-20">
			<h2 class="u-custom-font u-font-oswald u-text u-text-palette-3-light-1 u-text-1">Đôi nét về quá trình lưu giữ và bảo tồn mộc bản</h2>
			<div class="u-clearfix u-expanded-width u-gutter-10 u-layout-wrap u-layout-wrap-1">
				<div class="u-gutter-0 u-layout">
					<div class="u-layout-row">
						<div class="u-size-30 u-size-60-md">
							<div class="u-layout-col">
								<div class="u-container-style u-image u-layout-cell u-left-cell u-size-40 u-image-1" src="" data-image-width="1012" data-image-height="668">
									<div class="u-container-layout u-valign-middle u-container-layout-1"></div>
								</div>
								<div class="u-container-style u-image u-layout-cell u-left-cell u-size-20 u-image-2" src="" data-image-width="1652" data-image-height="854">
									<div class="u-container-layout u-valign-middle u-container-layout-2"></div>
								</div>
							</div>
						</div>
						<div class="u-size-30 u-size-60-md">
							<div class="u-layout-col">
								<div class="u-container-style u-image u-layout-cell u-right-cell u-size-20 u-image-3" src="" data-image-width="1198" data-image-height="642">
									<div class="u-container-layout u-valign-middle u-container-layout-3"></div>
								</div>
								<div class="u-align-left u-container-style u-layout-cell u-right-cell u-size-40 u-layout-cell-4" src="">
									<div class="u-container-layout u-container-layout-4">
										<p class="u-text u-text-default-lg u-text-default-md u-text-default-sm u-text-default-xl u-text-2"> Trung tâm Lưu trữ quốc gia IV là đơn vị sự nghiệp công lập, có chức năng trực tiếp quản lý tài liệu lưu trữ và thực hiện hoạt động lưu trữ thuộc phạm vi nhiệm vụ và quyền hạn được giao. Trung tâm Lưu trữ quốc gia IV có tư cách pháp nhân, con dấu, tài khoản và trụ sở làm việc đặt tại thành phố Đà Lạt, tỉnh Lâm Đồng.<br>
											<br>Trung tâm Lưu trữ quốc gia IV là một trong bốn Trung tâm Lưu trữ quốc gia của Việt Nam, trực thuộc Cục Văn thư và Lưu trữ nhà nước, Bộ Nội vụ, được thành lập vào ngày 25 tháng 8 năm 2006 theo Quyết định số 1176/QĐ-BNV của Bộ trưởng Bộ Nội vụ. Trụ sở Trung tâm đóng tại số 02 Yết Kiêu, phường 5, thành phố Đà Lạt, tỉnh Lâm Đồng.<br>
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="u-clearfix u-image u-section-5" id="carousel_f648" data-image-width="2874" data-image-height="706">
		<div class="u-clearfix u-sheet u-sheet-1">
			<p class="u-text u-text-body-alt-color u-text-1">Trung tâm phát triển công nghệ.....</p>
			<p class="u-align-center u-text u-text-body-alt-color u-text-2">&nbsp;Toà nhà E3, Đại học Công Nghệ đại học Quốc gia Hà Nội<br>144 Xuân Thuỷ, Cầu Giấy Hà Nội
			</p>
		</div>
	</section>
</body>

</html>