<x-app-layout>
	<x-slot name="header">
		<div class="inline-block grow">
			<h2 class="py-2 font-bold text-3xl">
				Jamesday 2022
			</h2>
		</div>
		<div class="inline-block mx-3">
			<a class="font-medium" href="{{url('/')}}">Home</a>
		</div>
		<div class="inline-block ml-3">
			<a class="font-medium" href="{{url('/logout')}}">Log out</a>
		</div>
	</x-slot>

	<h1 class="text-5xl text-center font-bold mt-6">Bookings</h1>

	<p class="text-xl text-center font-semibold mt-3">Total bookings: {{$users->count()}}

	<div class="max-w mt-6 overflow-x-auto">
		<table class="table-auto mx-auto">
			<thead>
				<tr>
					<th class="px-4 py-2 text-black text-left border-b-4 border-indigo-700">First Name</th>
					<th class="px-4 py-2 text-black text-left border-b-4 border-indigo-700">Last Name</th>
					<th class="px-4 py-2 text-black text-left border-b-4 border-indigo-700">Email</th>
					<th class="px-4 py-2 text-black text-left border-b-4 border-indigo-700">Travelling from</th>
					<th class="px-4 py-2 text-black text-left border-b-4 border-indigo-700">Can host?</th>
					<th class="px-4 py-2 text-black text-left border-b-4 border-indigo-700">Plus-ones</th>
				</tr>
			</thead>
			<tbody>
				@foreach($users as $user)
				<tr class="even:bg-indigo-100">
					<td class="px-4 py-2 text-black text-left">{{$user->first_name}}</td>
					<td class="px-4 py-2 text-black text-left">{{$user->last_name}}</td>
					<td class="px-4 py-2 text-black text-left">{{$user->email}}</td>
					<td class="px-4 py-2 text-black text-left">{{$user->coming_from}}</td>
					<td class="px-4 py-2 text-black text-left">@if($user->can_host) Yes ({{$user->can_host}}) @else No @endif</td>
					<td class="px-4 py-2 text-black text-left">{{$user->plus_ones->count()}}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>

</x-app-layout>