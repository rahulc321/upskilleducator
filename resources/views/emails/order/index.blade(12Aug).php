@component('mail::message')
# Hi {{ $user->fullname }}

Your webinar has been successfully confirmed. here is the order number : <b>{{ $order->order_number }}</b>.

Here are the webinar's List :

		<table class="table table-striped" style="border: 1px solid">
			<thead >
			<tr >
			<th style="border: 1px solid">Title</th>
			<th style="border: 1px solid">Qty</th>
			<th style="border: 1px solid">Total</th>
			</tr>
			</thead>
		<tbody>
			

		 	<?php
		 	$total =array();
		 	 ?>
			@foreach($order->order_items as $items)
				<?php
				$pName=  \App\Models\Program::where('id',$items->program_id)->first();

				 

				?>

				 
				<tr>
				<td style="border: 1px solid">{{ $items->product->title }} ({{$pName['program_name']}})</td>
				<td style="border: 1px solid">{{$items['quantity']}}</td>
				<td style="border: 1px solid">${{$pName['price']*$items['quantity']}}</td>
			</tr>
			@php
                                        $total[] = str_replace(',', '', round($pName['price'], 0, PHP_ROUND_HALF_DOWN)) * $items['quantity'];
                                    @endphp
			@endforeach

				<tr>
				<td style="border: 1px solid"><b>Grand Total</b></td>
				<td style="border: 1px solid"></td>
				<td style="border: 1px solid"><b>${{  number_format(array_sum($total)) }}</b></td>
			</tr>


			 
			 
		</tbody>
		</table>
		  


{{--
@component('mail::button', ['url' => url('my-account')])
Check Orders
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent --}}
