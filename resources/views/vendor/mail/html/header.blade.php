@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
{{-- <img src="/public/shop.png" class="logo" alt="Sayur Shop"> --}}
<h1 style="color: green; text-transform: uppercase">Sayur Shop</h1>
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
