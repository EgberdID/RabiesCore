<x-mail::message>
# Peringatan Kasus Rabies

Kelurahan: {{ $case->name }}
Jumlah kasus: {{ $case->total }}

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
