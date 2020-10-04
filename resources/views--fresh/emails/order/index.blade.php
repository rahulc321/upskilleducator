@component('mail::message')
# Hi {{ $user->fullname }}

Your webinar has been successfully confirmed. here is the order number : <b>{{ $order->order_number }}</b>.

Here are the webinar's List :

@foreach($order->order_items as $product)
<p>Title : <strong>{{ $product->product->title }}</strong></p>.
<p>Quantity : <strong>{{ $product->quantity }}</strong></p>
<p>Price : <strong>{{ $product->product->price * $product->quantity }}</strong></p>.
@endforeach

@component('mail::button', ['url' => url('my-account')])
Check Orders
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
