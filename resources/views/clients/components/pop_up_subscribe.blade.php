<div id="contactFormModal" class="fixed z-10 inset-0 overflow-y-auto hidden">
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
      <h2 class="text-2xl font-bold mb-4">Subscibe Newsletter</h2>

      <form action="{{ route('subscribe.store') }}" method="post">
        @csrf

        <div class="mb-4">
          <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
          <input type="text" id="name" name="name"
            class="w-full p-2 border rounded-md focus:outline-none focus:border-blue-500">
        </div>
        <div class="mb-4">
          <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
          <input type="email" id="email" name="email"
            class="w-full p-2 border rounded-md focus:outline-none focus:border-blue-500">
        </div>
        <button type="submit" class="bg-[#9727eb] text-white font-bold py-2 px-4 rounded hover:bg-blue-700">
          Subscribe
        </button>
      </form>
    </div>
  </div>
</div>