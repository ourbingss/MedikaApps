<!DOCTYPE html>
<html>
<head>
    <title>Laporan Data Pasien - Medika App</title>
    <style>
        body { font-family: sans-serif; }
        .header { text-align: center; margin-bottom: 20px; border-bottom: 2px solid #000; padding-bottom: 10px; }
        .header h2 { margin: 0; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        table, th, td { border: 1px solid black; }
        th { background-color: #f2f2f2; padding: 10px; text-align: left; font-size: 11px; }
        td { padding: 8px; font-size: 10px; vertical-align: top; }
        
        /* CSS Footer agar benar-benar di ujung kanan */
        .footer { 
            margin-top: 30px; 
            width: 100%; 
            position: relative;
        }
        .tanda-tangan-wrapper { 
            float: right; 
            text-align: right; /* Menghilangkan spasi kosong di sisi kanan container */
            width: auto; 
            min-width: 200px;
        }
        .isi-tanda-tangan {
            display: inline-block;
            text-align: center; /* Menjaga teks 'Mengetahui' tetap di tengah terhadap garis */
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
        <p>Laporan Data Master Pasien</p>
    </div>

    <table>
        <thead>
            <tr>
                <th style="width: 5%">No</th>
                <th style="width: 15%">NIK</th> 
                <th style="width: 20%">Nama Pasien</th>
                <th style="width: 15%">Tgl Lahir</th>
                <th style="width: 15%">No. Telp</th>
                <th style="width: 30%">Alamat</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pasien as $p)
            <tr>
                <td style="text-align: center;">{{ $loop->iteration }}</td>
                <td>{{ $p->nik }}</td> 
                <td>{{ $p->nama_pasien }}</td> 
                <td>{{ $p->tgl_lahir }}</td>
                <td>{{ $p->no_telp }}</td>
                <td>{{ $p->alamat }}</td>
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