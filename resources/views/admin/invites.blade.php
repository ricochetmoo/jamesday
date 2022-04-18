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

	<h1 class="text-5xl text-center font-bold mt-6">Invites</h1>

	<div class="max-w mt-6 overflow-x-auto">
		<table class="table-auto mx-auto">
			<thead>
				<tr>
					<th class="px-4 py-2 text-black text-left border-b-4 border-indigo-700">Token</th>
					<th class="px-4 py-2 text-black text-left border-b-4 border-indigo-700">First Name</th>
					<th class="px-4 py-2 text-black text-left border-b-4 border-indigo-700">Last Name</th>
					<th class="px-4 py-2 text-black text-left border-b-4 border-indigo-700">Email</th>
					<th class="px-4 py-2 text-black text-left border-b-4 border-indigo-700">Used?</th>
					<th class="px-4 py-2 text-black text-left border-b-4 border-indigo-700"></th>
				</tr>
			</thead>
			<tbody>
				@foreach($invites as $invite)
				<tr class="even:bg-indigo-100">
					<td class="px-4 py-2 text-black text-left font-mono">{{$invite->token}}</td>
					<td class="px-4 py-2 text-black text-left">{{$invite->first_name}}</td>
					<td class="px-4 py-2 text-black text-left">{{$invite->last_name}}</td>
					<td class="px-4 py-2 text-black text-left">{{$invite->email}}</td>
					<td class="px-4 py-2 text-black text-left">@if($invite->used) Yes @else No @endif</td>
					<td class="px-4 py-2 text-black text-left"><button class="bg-indigo-700 rounded px-4 py-2 font-bold text-white hover:bg-indigo-500 transition copyButton" data-token="{{$invite->token}}">Copy Invite</button></td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>

</x-app-layout>
<script type="text/javascript">
	function copyInviteText(event)
	{
		event.preventDefault();
		let token = event.target.dataset.token;
		
		let text = "Hey! You're invited to the 2022 Jamesday Celebrations in Liverpool on 11/06/2022. Find out more and register at {{url('/')}}/invite/" + token + " (don't share this link with anyone else, as it only work for you! You can add a plus one on the system)";

		navigator.clipboard.writeText(text);
	}

	document.querySelectorAll(".copyButton").forEach((element) =>
	{
		element.onclick = function(event){copyInviteText(event);};
	});

</script>