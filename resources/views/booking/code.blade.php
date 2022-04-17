<x-app-layout>
	<x-slot name="header">
		<div class="inline-block grow">
			<h2 class="py-2 font-bold text-3xl">
				Jamesday 2022
			</h2>
		</div>
	</x-slot>

	<h1 class="text-5xl text-center font-bold mt-16">Enter your invite code</h1>
	
	<form id="tokenForm">
		<div class="grid grid-cols-6 gap-3 max-w-sm mx-auto mt-10">
			<input id="num1" type="text" class="numInput mt-1 block w-full h-20 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-5xl text-center" placeholder="" autofocus>
			<input id="num2" type="text" class="numInput mt-1 block w-full h-20 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-5xl text-center" placeholder="">
			<input id="num3" type="text" class="numInput mt-1 block w-full h-20 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-5xl text-center" placeholder="">
			<input id="num4" type="text" class="numInput mt-1 block w-full h-20 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-5xl text-center" placeholder="">
			<input id="num5" type="text" class="numInput mt-1 block w-full h-20 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-5xl text-center" placeholder="">
			<input id="num6" type="text" class="numInput mt-1 block w-full h-20 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-5xl text-center" placeholder="">
		</div>

		<div class="mt-12 text-center">
			<button role="submit" class="bg-indigo-700 rounded px-4 py-2 font-bold text-white hover:bg-indigo-500 transition text-lg">Submit</a>
		</div>
	</form>

	<script type="text/javascript">
		function moveToNext(event)
		{
			let id = parseInt(event.target.id.split("")[3]) + 1;
			document.querySelector("#num" + id).focus();
		}

		function getFullToken()
		{
			let token = "";

			document.querySelectorAll(".numInput").forEach((element) =>
			{
				token += element.value;
			});

			return token;
		}

		document.querySelectorAll(".numInput").forEach((element) =>
		{
			element.oninput = function(event){moveToNext(event)};
		});

		document.querySelector("#tokenForm").onsubmit = function(event){event.preventDefault();window.location.href = "/invite/" + getFullToken()};
	</script>
</x-app-layout>