@extends('layouts.mail.main')

@push('title')
{{-- <tr>
    <td align="center" style="font-size:0px;padding:10px 25px;padding-bottom:40px;word-break:break-word;">
        <div style="font-family:'Helvetica Neue',Arial,sans-serif;font-size:28px;font-weight:bold;line-height:1;text-align:center;color:#555;">
            {{ $title }}
        </div>
    </td>
</tr> --}}
@endpush

@section('content')
<tr>
    <td align="left" style="font-size:0px; padding:20px 25px; word-break:break-word;">
        <div style="font-family:'Helvetica Neue',Arial,sans-serif;font-size:16px;line-height:22px;text-align:left;color:#555;">
            Halo, {{ $name }}
            <br>
            <br>
            Terima kasih telah mendownload ebook ‘{{ $title }}’.
            <br>
            <br>

            Buka file yang terlampir untuk membaca ebook-nya sekarang juga.
            <br>
            <br>

        </div>
    </td>
</tr>
@endsection