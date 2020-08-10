<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="{{ asset('/img/Login-image.png') }}" class="logo" alt="Test">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
