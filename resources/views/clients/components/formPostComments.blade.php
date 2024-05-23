<form action="{{ route('comments.store')}}" method="post" class="mb-6">
  @csrf
  <div class="py-2 mb-4 rounded-lg rounded-t-lg border border-gray-200">
    <input type="hidden" name="post_id" value="{{ $post->id }}">
    <label for="name" class="sr-only">Name</label>
    <input type="text" class="w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none px-2" name="name"
      placeholder="Your name">
  </div>
  <div class="py-2 mb-4 rounded-lg rounded-t-lg border border-gray-200">
    <label for="email" class="sr-only">Email</label>
    <input type="email" class="w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none px-2" name="email"
      placeholder="Your email">
  </div>
  <div class="py-2 mb-4 rounded-lg rounded-t-lg border border-gray-200">
    <label for="comment" class="sr-only">Your comment</label>
    <textarea id="comment" name="comment" rows="6"
      class="w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none resize-none px-2"
      placeholder="Write a comment..."></textarea>
  </div>
  <button
    class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200"
    type="submit" type="submit">Kirim</button>
</form>