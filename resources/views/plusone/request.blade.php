<x-app-layout>
	<x-slot name="header">
		<div class="inline-block grow">
			<h2 class="py-2 font-bold text-3xl">
				Jamesday 2022
			</h2>
		</div>
		<div class="inline-block">
			<a class="font-medium" href="{{url('/logout')}}">Log out</a>
		</div>
	</x-slot>

	<h1 class="text-5xl text-center font-bold mt-16">Request a Plus one</h1>

	<div class="max-w-xl mx-auto mt-9">
		<h3 class="text-3xl text-center font-bold mt-16">Their Details</h3>
		<form action="" method="POST">
			@csrf
			<div class="grid md:grid-cols-2 gap-6 my-3">
				<label class="block">
					<span class="text-gray-700 font-medium">First Name</span>
					<input type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="first_name" placeholder="" required>
				</label>
				<label class="block">
					<span class="text-gray-700 font-medium">Last Name</span>
					<input type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="last_name" placeholder="" required>
				</label>
			</div>
			<label class="block my-3">
				<span class="text-gray-700 font-medium">Email address</span>
				<input type="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="email" placeholder="" required>
			</label>

			<div class="mt-12 text-center">
				<button role="submit" class="bg-indigo-700 rounded px-4 py-2 font-bold text-white hover:bg-indigo-500 transition text-lg">Request</a>
			</div>
		</form>
	</div>
</x-app-layout>