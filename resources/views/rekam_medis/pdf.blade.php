<!DOCTYPE html>
<html>
<head>
    <title>Laporan Rekam Medis</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        .header { text-align: center; margin-bottom: 20px; border-bottom: 2px solid #000; padding-bottom: 10px; }
        .header h1 { margin: 0; text-transform: uppercase; }
        .header p { margin: 5px 0 0; }
        
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table, th, td { border: 1px solid #333; }
        th { background-color: #f2f2f2; padding: 10px; text-align: center; }
        td { padding: 8px; vertical-align: top; }
        
        .footer { margin-top: 30px; text-align: right; }
        .signature { margin-top: 60px; font-weight: bold; }
    </style>
</head>
<body>

    <div class="header">
        <h1>KLINIK MEDIKA SEHAT</h1>
        <p>Jl. Pendidikan No. 123, Kota Kamu | Telp: (021) 123456</p>
    </div>

    <h3 style="text-align: center;">LAPORAN DATA REKAM MEDIS</h3>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Nama Pasien</th>
                <th>Dokter Pemeriksa</th>
                <th>Keluhan</th>
                <th>Diagnosa</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach($rekams as $r)
            <tr>
                <td style="text-align: center;">{{ $no++ }}</td>
                <td>{{ \Carbon\Carbon::parse($r->tgl_periksa)->format('d-m-Y') }}</td>
                <td>{{ $r->pasien->nama_pasien }}</td>
                <td>{{ $r->dokter->nama_dokter }}</td>
                <td>{{ $r->keluhan }}</td>
                <td>{{ $r->diagnosa }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        <p>Dicetak pada: {{ date('d F Y') }}</p>
        <div class="signature">
            <p>Kepala Administrasi Klinik,</p>
            <br><br><br>
            <p>( __________________________ )</p>
        </div>
    </div>

</body>
</html>