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

	<p class="text-xl text-center font-semibold mt-3">Total bookings: {{$users->where('booked_on', 1)->count()}}</p>
	<p class="text-lg text-center">(plus {{$users->where('booked_on', 0)->count()}} cancelled)</p>

	<div class="max-w mt-6 overflow-x-auto">
		<table class="table-auto mx-auto">
			<thead>
				<tr>
					<th class="px-4 py-2 text-black text-left border-b-4 border-indigo-700"></th>
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
				<tr class="@if ($user->booked_on) threeOfFour:bg-indigo-100 @else bg-red-200 @endif">
					<td class="px-4 py-2 text-black text-left cursor-grab detailsTrigger" data-target="#details-{{$user->id}}">&#9654;</td>
					<td class="px-4 py-2 text-black text-left">{{$user->first_name}}</td>
					<td class="px-4 py-2 text-black text-left">{{$user->last_name}}</td>
					<td class="px-4 py-2 text-black text-left">{{$user->email}}</td>
					<td class="px-4 py-2 text-black text-left">{{$user->coming_from}}</td>
					<td class="px-4 py-2 text-black text-left">@if($user->can_host) Yes ({{$user->can_host}}) @else No @endif</td>
					<td class="px-4 py-2 text-black text-left">{{$user->plus_ones->count()}}</td>
				</tr>
				<tr class="threeOfFour:bg-indigo-100 hidden" id="details-{{$user->id}}">
					<td colspan="7">
						@if ($user->can_host)
						<h2 class="text-lg font-bold mt-1">Hosting Notes</h2>
						<p class="mt-1">{{$user->hosting_details}}</p>
						@endif
						<h2 class="text-lg font-bold mt-1">Other Details</h2>
						<p class="mt-1">Needs accom? @if ($user->needs_accom) Yes @else No @endif &nbsp;&nbsp; Needs parking? @if ($user->needs_parking) Yes @else No @endif &nbsp;&nbsp; Spoons? @if ($user->spoons_interest) Yes @else No @endif &nbsp;&nbsp; Tour? @if ($user->tour_interest) Yes @else No @endif &nbsp;&nbsp; Escape Room? @if ($user->escape_room_interest) Yes @else No @endif
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>

	<script type="text/javascript">
		function toggle(e)
		{
			let element = e.target;
			let target = document.querySelector(element.getAttribute("data-target"));

			target.classList.toggle("hidden");
			
			if (element.innerHTML == "▶")
			{
				element.innerHTML = "&#9660;";
			}
			else
			{
				element.innerHTML = "&#9654;"
			}
		}

		window.onload = document.querySelectorAll(".detailsTrigger").forEach((element) => {element.addEventListener("click", (e) => {toggle(e);})});
	</script>

</x-app-layout>