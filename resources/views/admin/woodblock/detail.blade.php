<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Chi tiết mộc bản</title>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
	<link rel="stylesheet" href="{{ asset('css/tailwind.output.css') }}" />
	<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
	<script src="{{ asset('js/init-alpine.js') }}"></script>
	<script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
	<div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen}">
		<!-- Desktop sidebar -->
		<aside class="z-20 hidden w-64 overflow-y-auto bg-white dark:bg-gray-800 md:block flex-shrink-0">
			<div class="py-4 text-gray-500 dark:text-gray-400">
				<div class="py-4 text-gray-500 dark:text-gray-400">
					<a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="{{ route('admin.woodblocks.index') }}">
						Mộc bản
					</a>
					<div class="px-6 my-6">
						<a href="{{ route('admin.woodblocks.index') }}"><button class="flex items-center justify-between w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
								Danh sách mộc bản
							</button></a>
					</div>
					<div class="px-6 my-6">
						<a href="{{ route('woodblocks.create') }}"><button class="flex items-center justify-between w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
								Thêm mộc bản
								<span class="ml-2" aria-hidden="true">+</span>
							</button></a>
					</div>
					<div class="px-6 my-6">
						<a href="{{ route('admin.books.list') }}"><button class="flex items-center justify-between w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
								Danh sách bộ sách
							</button></a>
					</div>
					<div class="px-6 my-6">
					<a href="{{ route('admin.home.display.index') }}"><button class="flex items-center justify-between w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
							Quản lý hiển thị
						</button></a>
				</div>
				</div>
			</div>
		</aside>
		<!-- Mobile sidebar -->
		<!-- Backdrop -->
		<div x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"></div>
		<aside class="fixed inset-y-0 z-20 flex-shrink-0 w-64 mt-16 overflow-y-auto bg-white dark:bg-gray-800 md:hidden" x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150" x-transition:enter-start="opacity-0 transform -translate-x-20" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0 transform -translate-x-20" @click.away="closeSideMenu" @keydown.escape="closeSideMenu">
		</aside>
		<div class="flex flex-col flex-1">
			<header class="z-10 py-4 bg-white shadow-md dark:bg-gray-800">
				<div class="container flex items-center justify-between h-full px-6 mx-auto text-purple-600 dark:text-purple-300">
					<!-- Mobile hamburger -->
					<button class="p-1 -ml-1 mr-5 rounded-md md:hidden focus:outline-none focus:shadow-outline-purple" @click="toggleSideMenu" aria-label="Menu">
						<svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
							<path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
						</svg>
					</button>
					<!-- Search input -->
					<div class="flex justify-center flex-1 lg:mr-32">
					</div>
					<ul class="flex items-center flex-shrink-0 space-x-6">
						<!-- Theme toggler -->
						<li class="flex">
							<button class="rounded-md focus:outline-none focus:shadow-outline-purple" @click="toggleTheme" aria-label="Toggle color mode">
								<template x-if="!dark">
									<svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
										<path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
									</svg>
								</template>
								<template x-if="dark">
									<svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
										<path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" clip-rule="evenodd"></path>
									</svg>
								</template>
							</button>
						</li>
						<!-- Notifications menu -->
						<!-- Profile menu -->
						<li class="relative">
							<button class="align-middle rounded-full focus:shadow-outline-purple focus:outline-none" @click="toggleProfileMenu" @keydown.escape="closeProfileMenu" aria-label="Account" aria-haspopup="true">
								<img class="object-cover w-8 h-8 rounded-full" src="https://images.unsplash.com/photo-1502378735452-bc7d86632805?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&s=aa3a807e1bbdfd4364d1f449eaa96d82" alt="" aria-hidden="true" />
							</button>
							<template x-if="isProfileMenuOpen">
								<ul x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @click.away="closeProfileMenu" @keydown.escape="closeProfileMenu" class="absolute right-0 w-56 p-2 mt-2 space-y-2 text-gray-600 bg-white border border-gray-100 rounded-md shadow-md dark:border-gray-700 dark:text-gray-300 dark:bg-gray-700" aria-label="submenu">
									<li class="flex">
										<a class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200" href="{{ route('admin.user.change-password.index') }}">
											<svg class="w-4 h-4 mr-3" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
												<path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
											</svg>
											<span>Profile</span>
										</a>
									</li>
									<li class="flex">
										<a class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200" href="#">
											<svg class="w-4 h-4 mr-3" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
												<path d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
												</path>
												<path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
											</svg>
											<span>Settings</span>
										</a>
									</li>
									<li class="flex">
										<a class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200" href="{{ route('admin.logout') }}">
											<svg class="w-4 h-4 mr-3" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
												<path d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1">
												</path>
											</svg>
											<span>Log out</span>
										</a>
									</li>
								</ul>
							</template>
						</li>
					</ul>
				</div>
			</header>
			<main class="h-full pb-16 overflow-y-auto">
				<div class="container px-6 mx-auto grid">
					<h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
						Chi tiết mộc bản
					</h2>
					<!-- General elements -->
					<div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
						<label class="block text-sm">
							<span class="text-gray-700 dark:text-gray-400">Mã</span>
							<p class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Vui lòng nhập mã mộc bản !">{{ $woodblock['code'] }}</p>
						</label>
						<!-- <label class="block text-sm mt-8">
              <span class="text-gray-700 dark:text-gray-400">Tên mộc bản</span>
              <P
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                ĐẠI VIỆT SỬ KÝ TOÀN THƯ</P>
            </label> -->
						<label class="block mt-4 text-sm mt-8">
							<span class="text-gray-700 dark:text-gray-400">
								Bộ sách
							</span>
							<P class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
								{{ $woodblock['books_name'] }}
							</P>
						</label>
						<label class="block mt-8 text-sm">
							<span class="text-gray-700 dark:text-gray-400">Thông tin về bộ sách</span>
							<textarea readonly class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" rows="5" placeholder="">{{ $woodblock['books_description'] }}</textarea>
						</label>
						<div class="flex justify-between mt-8">
							<label class="block mt-4 text-sm">
								<span class="text-gray-700 dark:text-gray-400">
									Triều đại
								</span>
								<P class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
									{{ $woodblock['dynasty_name'] }}
								</P>
							</label>
							<!-- <label class="block mt-4 text-sm">
								<span class="text-gray-700 dark:text-gray-400">
									Quyển
								</span>
								<P class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input px-10">
									{{ $woodblock['front_notebook'] }}
								</P>
							</label>
							<label class="block mt-4 text-sm">
								<span class="text-gray-700 dark:text-gray-400">
									Mặt khắc
								</span>
								<P class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input px-10">
									{{ $woodblock['front_engraved_face'] }}
								</P>
							</label> -->
						</div>
						<div>
							<label class="block my-2 text-sm text-gray-900 dark:text-white" for="">Ảnh mặt trước</label>
							<img src="{{ asset($woodblock['front_image']) }}" width="400" alt="Ảnh mặt trước" />
							<label class="block mt-4 text-sm">
								<span class="text-gray-700 dark:text-gray-400">
									Quyển
								</span>
								<P class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input px-10">
									{{ $woodblock['front_notebook'] }}
								</P>
							</label>
							<label class="block mt-4 text-sm">
								<span class="text-gray-700 dark:text-gray-400">
									Mặt khắc
								</span>
								<P class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input px-10">
									{{ $woodblock['front_engraved_face'] }}
								</P>
							</label>
						</div>
						<div class="my-10"></div>
						<div>
							<label class="block my-2 text-sm text-gray-900 dark:text-white" for="">Ảnh mặt sau</label>
							<img src="{{ asset($woodblock['back_image']) }}" width="400" alt="Ảnh mặt sau" />
							<label class="block mt-4 text-sm">
								<span class="text-gray-700 dark:text-gray-400">
									Quyển
								</span>
								<P class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input px-10">
									@if (!empty($woodblock['back_notebook']))
									{{ $woodblock['back_notebook'] }}
									@endif
								</P>
							</label>
							<label class="block mt-4 text-sm">
								<span class="text-gray-700 dark:text-gray-400">
									Mặt khắc
								</span>
								<P class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input px-10">
									@if (!empty($woodblock['back_engraved_face']))
									{{ $woodblock['back_engraved_face'] }}
									@endif
								</P>
							</label>
						</div>
						<label class="block mt-8 text-sm">
							<span class="text-gray-700 dark:text-gray-400">Mô tả về mộc bản</span>
							<textarea readonly class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" rows="5" placeholder="">{{ $woodblock['description'] }}</textarea>
						</label>
						<label class="block text-sm mt-8">
							<span class="text-gray-700 dark:text-gray-400">Link mộc bản 3D</span>
							<a href="{{ $woodblock['link'] }}">
								<P class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
									{{ $woodblock['link'] }}
								</P>
							</a>
						</label>
						<label class="block my-2 text-sm text-gray-900 dark:text-white" for="">Một số hình ảnh thực tế</label>
						@if (!empty($woodblock['detail_images']))
						<div style="display: flex; flex-wrap: wrap;">
							@foreach ($woodblock['detail_images'] as $img)
							<img style="margin: 5px; " src="{{ asset($img) }}" width="400" alt="" />
							@endforeach
						</div>
						@endif
						<a href="{{ route('woodblocks.edit', ['woodblock' => $woodblock['code']]) }}">
							<button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
								Chỉnh sửa

								<svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
									<path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
									</path>
								</svg>
							</button>
						</a>
					</div>
				</div>
			</main>
		</div>
	</div>
</body>
<script>
	// delete woodblock
	let btnDeleteAll = document.querySelectorAll('.btn-delete');
	// console.log(btnDeleteAll);
	for (let i = 0; i < btnDeleteAll.length; ++i) {
		btnDeleteAll[i].addEventListener('click', function(e) {
			let code = btnDeleteAll[i].id;
			let obj = {};
			obj.code = code;
			// console.log(obj);
			// console.log(code);
			
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
			$.ajax({
				type: 'DELETE',
				url: "woodblocks/" + code,
				data: obj,
				success: function() {
					// console.log(response);
					alert('Xoá thành công!');
					btnDeleteAll[i].parentNode.parentNode.parentNode.style.display = 'None';
					let totalWoodblocks = parseInt(document.getElementById('total-woodblocks').innerText);
					document.getElementById('total-woodblocks').innerHTML = totalWoodblocks - 1;
				}
			});

		});
	}
</script>

</html>