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

	<h1 class="text-5xl text-center font-bold mt-16">Hey, {{Auth::user()->first_name}}!</h1>

	<div class="max-w-xl mx-auto">
		<h3 class="text-3xl text-center font-bold mt-16">The Details</h3>
		<p class="mt-3">The Jamesday Celebrations 2022 will be taking place at <span class="font-medium">Subrosa Liverpool</span> in the evening of <span class="font-medium">Saturday 11/06/2022</span>. For those travelling to the event, a variety of accommodation will be available ranging from space on someone's floor (free) to nearby hotels.</p>
		<p class="mt-2">The venue is conveniently located for both public transport and driving, with parking available minutes away from the venue. Further details about transport logistics will be made avaialable in the coming fortnight.</p>

		<h3 class="mt-16 text-3xl text-center font-bold">Your Plus ones</h3>

		@if (Auth::user()->plus_ones->first())
		<div class="max-w mt-6 overflow-x-auto">
			<table class="table-auto mx-auto">
				<thead>
					<tr>
						<th class="px-4 py-2 text-black text-left border-b-4 border-indigo-700">First Name</th>
						<th class="px-4 py-2 text-black text-left border-b-4 border-indigo-700">Last Name</th>
						<th class="px-4 py-2 text-black text-left border-b-4 border-indigo-700">Status</th>
					</tr>
				</thead>
				<tbody>
					@foreach(Auth::user()->plus_ones as $plusOne)
					<tr class="even:bg-indigo-100">
						<td class="px-4 py-2 text-black text-left">{{$plusOne->first_name}}</td>
						<td class="px-4 py-2 text-black text-left">{{$plusOne->last_name}}</td>
						<td class="px-4 py-2 text-black text-left capitalize">{{$plusOne->status}}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		@else
		<p class="mt-3">You currently don't have any plus ones.</p>
		@endif

		<div class="block mt-6 text-center">
			<a href="{{url('/plusone')}}" class="bg-indigo-700 rounded px-4 py-3 font-bold text-white hover:bg-indigo-500 transition">Request a plus one</a>
		</div>

		<h3 class="mt-16 text-3xl text-center font-bold">Your Registration</h3>
	</div>

	<div class="max-w-xl mx-auto rounded-md bg-gray-100 shadow-indigo-300 shadow-lg p-6 mt-6">
		<p>
			<span class="text-gray-700 font-bold">Name</span><br>
			{{Auth::user()->first_name}} {{Auth::user()->last_name}}
		</p>
		<p class="mt-2">
			<span class="text-gray-700 font-bold">Email address</span><br>
			{{Auth::user()->email}}
		</p>
		<p class="mt-2">
			<span class="text-gray-700 font-bold">Travelling from</span><br>
			{{Auth::user()->coming_from}}
		</p>
		<p class="mt-2">
			<span class="text-gray-700 font-bold">Can host?</span><br>
			@if(Auth::user()->can_host) Yes ({{Auth::user()->can_host}}) @else No @endif
		</p>
	</div>

	<div class="max-w-xl mx-auto">
		<p class="mt-9">Please get in touch with James (<a href="mailto:james@jamesbarber.tech" class="text-indigo-700 hover:underline decoration-dashed">james@jamesbarber.tech</a>) to update your registration.</p>
	</div>
</x-app-layout>