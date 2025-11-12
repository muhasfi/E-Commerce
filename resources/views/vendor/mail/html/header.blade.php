@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="{{ asset('No_image_available.webp') }}" class="logo" alt="Paham Pajak">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
