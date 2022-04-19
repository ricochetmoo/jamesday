<x-app-layout>
	<x-slot name="header">
		<div class="inline-block grow">
			<h2 class="py-2 font-bold text-3xl">
				Jamesday 2022
			</h2>
		</div>
	</x-slot>

	<h1 class="text-5xl text-center font-bold mt-16">Register for Jamesday 2022</h1>

	<div class="max-w-xl mx-auto">
		<h3 class="text-3xl text-center font-bold mt-16">The Details</h3>
		<p class="mt-3">The Jamesday Celebrations 2022 will be taking place at <span class="font-medium">Subrosa Liverpool</span> in the evening of <span class="font-medium">Saturday 11/06/2022</span>. For those travelling to the event, a variety of accommodation will be available ranging from space on someone's floor (free) to nearby hotels.</p>
		<p class="mt-2">The venue is conveniently located for both public transport and driving, with parking available minutes away from the venue. Further details about transport logistics will be made avaialable in the coming fortnight.</p>
	</div>

	<div class="max-w-xl mx-auto mt-9">
		<h3 class="text-3xl text-center font-bold mt-16">Your Details</h3>
		<form action="/auth/register" method="POST">
			@csrf
			<label class="block my-3">
				<span class="text-gray-700 font-medium">Invite token</span>
				<input type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm bg-gray-100 cursor-not-allowed" name="invite_token" placeholder="" value="{{$invite->token}}" readonly>
			</label>
			<div class="grid md:grid-cols-2 gap-6 my-3">
				<label class="block">
					<span class="text-gray-700 font-medium">First Name</span>
					<input type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="first_name" placeholder="" value="{{$invite->first_name}}" required>
				</label>
				<label class="block">
					<span class="text-gray-700 font-medium">Last Name</span>
					<input type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="last_name" placeholder="" value="{{$invite->last_name}}" required>
				</label>
			</div>
			<label class="block my-3">
				<span class="text-gray-700 font-medium">Email address</span>
				<input type="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="email" placeholder="" value="{{$invite->email}}" required>
			</label>
			<label class="block my-3">
				<span class="text-gray-700 font-medium">Where will you be travelling from?</span><br>
				<span class="text-gray-500">More information on accommodation (including free options) will be available soon.</span>
				<input type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="coming_from" placeholder="" required>
			</label>
			<label class="block my-3">
				<span class="text-gray-700 font-medium">Can you host people in Liverpool overnight?</span><br>
				<span class="text-gray-500">We're not asking for a firm commitment at this stage, but please let us know if it's a possiblity. You'll get a free drink for each person you host!</span>
				<div class="grid md:grid-cols-2 gap-6 my-3">
					<label class="inline-flex items-center">
						<input type="radio" class="border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-offset-0 focus:ring-indigo-200 focus:ring-opacity-50" id="hostYes" name="host" value="yes">
						<span class="ml-2">Yes</span>
					</label>
					<label class="inline-flex items-center">
						<input type="radio" class="border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-offset-0 focus:ring-indigo-200 focus:ring-opacity-50" id="hostNo" name="host" value="no" checked>
						<span class="ml-2">No</span>
					</label>
				</div>
			</label>
			<div id="hostDetails" class="hidden">
				<label class="block my-3">
					<span class="text-gray-700 font-medium">How many people can you host?</span><br>
					<input type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="can_host" placeholder="">
				</label>
				<label class="block my-3">
					<span class="text-gray-700 font-medium">Any other information about how you can host</span>
					<textarea class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" rows="3" name="hosting_details"></textarea>
				</label>
			</div>

			<h3 class="text-3xl text-center font-bold mt-9">More Information</h3>
			<p class="mt-3">We'll need some more information from you closer to the time, but we'll be in touch via the email address you provide to let you know how to get this to us.</p>

			<div class="mt-12 text-center">
				<button role="submit" class="bg-indigo-700 rounded px-4 py-2 font-bold text-white hover:bg-indigo-500 transition text-lg">Register</a>
			</div>
		</form>
	</div>

	<script>
		let hostDetails = document.querySelector("#hostDetails");
		
		document.querySelector("#hostYes").onchange = function(){if (document.querySelector("#hostYes").checked){hostDetails.classList.remove("hidden");}else{hostDetails.classList.add("hidden");}}
		document.querySelector("#hostNo").onchange = function(){if (document.querySelector("#hostYes").checked){hostDetails.classList.remove("hidden");}else{hostDetails.classList.add("hidden");}}
	</script>
</x-app-layout>