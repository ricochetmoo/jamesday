<x-app-layout>
	<x-slot name="header">
		<div class="inline-block grow">
			<h2 class="py-2 font-bold text-3xl">
				Jamesday 2022
			</h2>
		</div>
	</x-slot>

	<h1 class="text-5xl text-center font-bold mt-16">Enter your email address to log in</h1>
	
	<form action="" method="POST" class="max-w-xl mx-auto mt-12">
		@csrf
		<label class="block my-3">
			<input type="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="email" placeholder="" required autofocus>
		</label>
		<div class="mt-6 text-center">
			<button role="submit" class="bg-indigo-700 rounded px-4 py-2 font-bold text-white hover:bg-indigo-500 transition text-lg">Request Link</a>
		</div>
	</form>
</x-app-layout>