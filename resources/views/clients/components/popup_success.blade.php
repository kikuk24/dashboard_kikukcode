<div id="alertSuccess" class="fixed z-10 inset-0 overflow-y-auto">
  <div class="flex items-center justify-center min-h-screen">
    <div class="bg-white w-full md:w-1/2 w-[70%] p-6 rounded shadow-md">
      <div class="flex justify-end">
        <!-- Close Button -->
        <button id="closeContactForm" class="text-gray-700 hover:text-red-500">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
          </svg>
        </button>
      </div>
      <div class="flex items-center justify-center flex-col">
        <img src="{{asset('storage/img/success.png')}}" alt="succes" class="aspect-square" width="200px">
        <h4 class="text-3xl my-5">{{ session('success') }}</h4>
      </div>
    </div>
  </div>
</div>