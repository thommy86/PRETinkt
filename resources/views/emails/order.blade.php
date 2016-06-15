{{ trans('checkout.ordermeailcontent') }}<br>
{{ trans('checkout.name') }}: {{ $name }}<br>
{{ trans('checkout.sendmethod') }}: {{ $sentMethod }}<br>
<a href="{{ $baseUrl }}/{{ $paylink }}">{{ trans('checkout.pay') }}</a>
<table>
	<thead>
		<tr>
			<td>
				{{ trans('checkout.product') }}
			</td>
			<td>
				5 {{ trans('checkout.stars') }}
			</td>
			<td>
				4 {{ trans('checkout.stars') }}
			</td>
			<td>
				3 {{ trans('checkout.stars') }}
			</td>
			<td>
				2 {{ trans('checkout.stars') }}
			</td>
			<td>
				1 {{ trans('checkout.star') }}
			</td>
		</tr>
	</thead>
	<tbody>
		@foreach ($products as $product)
			<tr>
				<td>
					{{ $product->naam }}
				</td>
				<td>
					<a href="{{ $baseUrl }}/product/{{ $product->id }}/rate/5">5 {{ trans('checkout.stars') }}</a>
				</td>
				<td>
					<a href="{{ $baseUrl }}/product/{{ $product->id }}/rate/4">4 {{ trans('checkout.stars') }}</a>
				</td>
				<td>
					<a href="{{ $baseUrl }}/product/{{ $product->id }}/rate/3">3 {{ trans('checkout.stars') }}</a>
				</td>
				<td>
					<a href="{{ $baseUrl }}/product/{{ $product->id }}/rate/2">2 {{ trans('checkout.stars') }}</a>
				</td>
				<td>
					<a href="{{ $baseUrl }}/product/{{ $product->id }}/rate/1">1 {{ trans('checkout.star') }}</a>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>