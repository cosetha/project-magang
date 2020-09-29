<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="{{ asset('/img/Login-image.png') }}" width="15%" class="logo" alt="{{config('app.name')}}">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
