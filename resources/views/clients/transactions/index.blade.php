<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Products</title>
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- Jquery --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl mx-auto px-4">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-lg lg:text-2xl font-bold text-gray-900">Konfirmasi Pembelian</h2>
            </div>
            <div class="mb-6">
                <div class="">
                    <p class="font-bold text-gray-900">Nama Product : {{ $product->name }}</p>
                    <p class="font-bold text-gray-900">Harga : Rp
                        {{ number_format($product->price - $product->price * ($product->discount / 100)) }}</p>
                </div>
            </div>
            <form action="{{ route('transaction.buy') }}" method="POST" class="mb-6" id="payment-form">
                @csrf
                <div class="py-2 mb-4 rounded-lg rounded-t-lg border border-gray-200">
                    <input type="hidden" name="product_id" value="{{ $product->id }}" id="product">
                    <input type="hidden" name="price"
                        value="{{ $product->price - $product->price * ($product->discount / 100) }}"
                        id="price">
                    <input type="hidden" name="total"
                        value="{{ $product->price - $product->price * ($product->discount / 100) }}"
                        id="total">
                    <input type="hidden" name="name" value="{{ $product->name }}" id="name">
                    <input type="hidden" name="quantity" value="1" id="quantity">
                    <label for="name" class="sr-only">Name</label>
                    <input type="text"
                        class="w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none px-2"
                        name="name" placeholder="Your name" id="name" required>
                </div>
                <div class="py-2 mb-4 rounded-lg rounded-t-lg border border-gray-200">
                    <label for="email" class="sr-only">Email</label>
                    <input type="email"
                        class="w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none px-2"
                        name="email" placeholder="Your email" id="email" required>
                </div>
                <div class="py-2 mb-4 rounded-lg rounded-t-lg border border-gray-200">
                    <label for="phone" class="sr-only">Phone</label>
                    <input type="number"
                        class="w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none px-2"
                        name="phone" id="phone" placeholder="Your number phone" required>
                </div>
                <div class="py-2 mb-4 rounded-lg rounded-t-lg border border-gray-200">
                    <label for="message" class="sr-only">Message (optional)</label>
                    <textarea id="message" name="message" rows="6"
                        class="w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none resize-none px-2"
                        placeholder="Message optional"></textarea>
                </div>
                <button
                    class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200"
                    type="submit" type="submit">Kirim</button>
            </form>
    </main>

    {{-- <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/v1/transactions"
    data-client-key="{{ config('services.midtrans.client_key') }}"></script>
  <script>
    $('#payment-form').submit(function(e) {
      e.preventDefault();
      $.post('{{ route('transaction.buy') }}', {
        _token: '{{ csrf_token() }}',
        _method: 'POST',
        name:$('#name').val(),
        email:$('#email').val(),
        phone:$('#phone').val(),
        message:$('#message').val(),
        post_id:$('#post_id').val(),
        price:$('#price').val(),
        total:$('#total').val(),
        quantity:$('#quantity').val(),
      }, function(data, status) {
        snap.pay(data.snap_token, {
          onSuccess: function(result) {
            console.log(result);
            location.reload();
          },
          onPending: function(result) {
            console.log(result);
            location.reload();
            },
          onError: function(result) {
            console.log(result);
            location.reload();
            },
        })
        
      })
    });
  </script> --}}
</body>

</html>
