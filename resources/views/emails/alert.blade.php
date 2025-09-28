<x-mail::message>
# 🚨 Peringatan Kasus Rabies

Berikut daftar kelurahan dengan **≥ 5 kasus** pada bulan ini:

<table border="1" cellpadding="6" cellspacing="0" style="border-collapse: collapse; width: 100%;">
    <thead>
        <tr>
            <th align="left">Kelurahan</th>
            <th align="left">Jumlah Kasus</th>
        </tr>
    </thead>
    <tbody>
        @foreach($cases as $case)
        <tr>
            <td>{{ $case->name }}</td>
            <td>{{ $case->total }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

Mohon ditindaklanjuti, RabiesCore
</x-mail::message>
