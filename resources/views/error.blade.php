<x-app-layout>
	<x-slot name="header">
		<div class="inline-block grow">
			<h2 class="py-2 font-bold text-3xl">
				Jamesday 2022
			</h2>
		</div>
	</x-slot>

	<h1 class="text-5xl text-center font-bold mt-16 text-red-700">Error</h1>

	<div class="max-w-xl mx-auto">
		<h3 class="text-3xl text-center mt-16">{{$message}}</h3>
	</div>
</x-app-layout>