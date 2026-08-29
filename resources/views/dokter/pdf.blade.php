<!DOCTYPE html>
<html>
<head>
    <title>Laporan Data Dokter - Medika App</title>
    <style>
        body { font-family: sans-serif; }
        .header { text-align: center; margin-bottom: 20px; border-bottom: 2px solid #000; padding-bottom: 10px; }
        .header h2 { margin: 0; }
        table { width: 100%; border-collapse: collapse; }
        table, th, td { border: 1px solid black; }
        th { background-color: #e9ecef; padding: 10px; text-align: left; font-size: 12px; }
        td { padding: 8px; font-size: 11px; vertical-align: top; }

        /* Tambahkan CSS ini agar tanda tangan mepet ke kanan */
        .footer { 
            margin-top: 30px; 
            width: 100%; 
        }
        .tanda-tangan-wrapper { 
            float: right; 
            text-align: right; /* Menghilangkan ruang kosong di sisi kanan */
            width: auto; 
            min-width: 200px;
        }
        .isi-tanda-tangan {
            display: inline-block;
            text-align: center; /* Teks 'Mengetahui' tetap rata tengah terhadap garis */
        }
        .nama-petugas { 
            margin-top: 60px; 
            font-weight: bold; 
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>MEDIKA APP</h2>
        <p>Laporan Data Master Dokter</p>
    </div>

    <table>
        <thead>
            <tr>
                <th style="width: 5%">No</th>
                <th style="width: 25%">Nama Dokter</th>
                <th style="width: 20%">Spesialis</th>
                <th style="width: 15%">No. Telp</th>
                <th style="width: 35%">Alamat</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dokter as $d)
            <tr>
                <td style="text-align: center;">{{ $loop->iteration }}</td>
                <td>{{ $d->nama_dokter }}</td>
                <td>{{ $d->spesialis }}</td>
                <td>{{ $d->no_telp }}</td>
                <td>{{ $d->alamat }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        <div class="tanda-tangan-wrapper">
            <p style="font-size: 11px; margin-bottom: 20px;">
                Dicetak pada: {{ date('d/m/Y H:i') }}
            </p>
            
            <div class="isi-tanda-tangan">
                <p style="margin-bottom: 0;">Mengetahui,</p>
                <p style="margin-top: 0;">Admin Medika App</p>
                
                <div class="nama-petugas">
                    ( ________________ )
                </div>
            </div>
        </div>
    </div>
</body>
</html>