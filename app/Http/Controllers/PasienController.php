<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf; 
use PhpOffice\PhpWord\PhpWord; 
use PhpOffice\PhpWord\IOFactory;

class PasienController extends Controller
{
    
    /**
     * Menampilkan daftar pasien
     */
    public function index()
    {
        // Mengambil data pasien, maksimal 6 per halaman
        $pasiens = Pasien::paginate(6); 
        return view('pasien.index', compact('pasiens'));
    
    }

    /**
     * Menampilkan form tambah pasien
     */
    public function create()
    {
        return view('pasien.create');
    }

    /**
     * Menyimpan data pasien baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|unique:pasiens,nik',
            'nama_pasien' => 'required',
            'tgl_lahir' => 'required|date',
            'no_telp' => 'required',
            'alamat' => 'required',
        ]);

        Pasien::create($request->all());

        return redirect()->route('pasien.index')->with('success', 'Data pasien berhasil ditambahkan!');
    }

    /**
     * Menampilkan form edit pasien
     */
    public function edit(Pasien $pasien)
    {
        return view('pasien.edit', compact('pasien'));
    }
    /**
     * memperbarui data pasien
     */
    public function update(Request $request, Pasien $pasien)
    {
        $request->validate([
            'nik' => 'required|unique:pasiens,nik,' . $pasien->id,
            'nama_pasien' => 'required',
            'tgl_lahir' => 'required|date',
            'no_telp' => 'required',
            'alamat' => 'required',
        ]);

        $pasien->update($request->all());

        return redirect()->route('pasien.index')->with('success', 'Data pasien berhasil diperbarui!');
    }

    /**
     * Menghapus data pasien
     */
    public function destroy(Pasien $pasien)
    {
        $pasien->delete();
        return redirect()->route('pasien.index')->with('success', 'Data pasien berhasil dihapus!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

   
    // Fungsi Export PDF Pasien
    public function exportPdf()
    {
        $pasien = Pasien::all();
        $pdf = Pdf::loadView('pasien.pdf', compact('pasien'));
        return $pdf->download('laporan-pasien.pdf');
    }

    // Fungsi Export Word Pasien
    public function exportWord()
    {
       $pasien = Pasien::all();
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        
        // Setting Font Global
        $phpWord->setDefaultFontName('Arial');
        $phpWord->setDefaultFontSize(11);

        $section = $phpWord->addSection();

        // 1. HEADER 
        $center = ['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER];
        $section->addText('MEDIKA APP', ['bold' => true, 'size' => 16], $center);
        $section->addText('Laporan Data Master Pasien', ['italic' => true], $center);
        
        // Garis Header
        $section->addLine(['width' => 450, 'height' => 0, 'borderSize' => 12, 'borderColor' => '000000']);
        $section->addTextBreak(1);

        // 2. TABEL DATA 
        $tableStyle = ['borderSize' => 6, 'borderColor' => '000000', 'cellMargin' => 80];
        $table = $section->addTable($tableStyle);

        $table->addRow();
        $table->addCell(500, ['bgColor' => 'f2f2f2'])->addText('No', ['bold' => true]);
        $table->addCell(2000, ['bgColor' => 'f2f2f2'])->addText('NIK', ['bold' => true]);
        $table->addCell(2500, ['bgColor' => 'f2f2f2'])->addText('Nama Pasien', ['bold' => true]);
        $table->addCell(1500, ['bgColor' => 'f2f2f2'])->addText('Tgl Lahir', ['bold' => true]);
        $table->addCell(1500, ['bgColor' => 'f2f2f2'])->addText('No. Telp', ['bold' => true]);
        $table->addCell(3000, ['bgColor' => 'f2f2f2'])->addText('Alamat', ['bold' => true]);

        foreach ($pasien as $index => $p) {
            $table->addRow();
            $table->addCell(500)->addText($index + 1);
            $table->addCell(2000)->addText($p->nik);
            $table->addCell(2500)->addText($p->nama_pasien); 
            $table->addCell(1500)->addText($p->tgl_lahir);
            $table->addCell(1500)->addText($p->no_telp);
            $table->addCell(3000)->addText($p->alamat);
        }

        // 3. TANDA TANGAN 
        $section->addTextBreak(2);
        $rightAlign = ['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::RIGHT];
        
        $section->addText('Dicetak pada: ' . date('d/m/Y H:i') . '          ', ['size' => 9], $rightAlign);
        $section->addTextBreak(1);
        $section->addText('Mengetahui,          ', null, $rightAlign);
        $section->addText('Admin Medika App          ', null, $rightAlign);
        $section->addTextBreak(3);
        $section->addText('( ________________ )          ', ['bold' => true], $rightAlign);

        // 4. PROSES DOWNLOAD
        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
        $fileName = 'laporan-pasien.docx';
        $path = storage_path($fileName);
        $objWriter->save($path);

        return response()->download($path)->deleteFileAfterSend(true);
    }

   
}
