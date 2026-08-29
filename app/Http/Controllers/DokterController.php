<?php

namespace App\Http\Controllers;
use App\Models\Dokter; 
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil data dokter, maksimal 6 per halaman
        $dokters = Dokter::paginate(6); 
        return view('dokter.index', compact('dokters'));

    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dokter.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_dokter' => 'required',
            'spesialis' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',

        ]);

        Dokter::create($request->all());

        return redirect()->route('dokter.index')->with('success', 'Data dokter berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Ambil data dokter berdasarkan ID, jika tidak ada tampilkan 404
        $dokter = Dokter::findOrFail($id);
        return view('dokter.edit', compact('dokter'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_dokter' => 'required',
            'spesialis' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
        ]);

        $dokter = Dokter::findOrFail($id);
        $dokter->update($request->all());

        return redirect()->route('dokter.index')->with('success', 'Data dokter berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dokter = Dokter::findOrFail($id);
        $dokter->delete();

        return redirect()->route('dokter.index')->with('success', 'Data dokter berhasil dihapus!');
    }

    // Fungsi Export PDF Dokter
    public function exportPdf()
    {
        $dokter = Dokter::all();
        $pdf = Pdf::loadView('dokter.pdf', compact('dokter'));
        return $pdf->download('laporan-dokter.pdf');
    }

    // Fungsi Export Word Dokter
    public function exportWord()
{
    $dokter = \App\Models\Dokter::all();
    $phpWord = new \PhpOffice\PhpWord\PhpWord();
    
    // Font Global
    $phpWord->setDefaultFontName('Arial');
    $phpWord->setDefaultFontSize(11);

    $section = $phpWord->addSection();

    // 1. HEADER 
    $center = ['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER];
    $section->addText('MEDIKA APP', ['bold' => true, 'size' => 16], $center);
    $section->addText('Laporan Data Master Dokter', ['italic' => true], $center);
    
    // Garis Header 
    $section->addLine([
        'width' => 450, 
        'height' => 0, 
        'borderSize' => 12, 
        'borderColor' => '000000'
    ]);
    $section->addTextBreak(1);

    // 2. TABEL DATA
    $tableStyle = ['borderSize' => 6, 'borderColor' => '000000', 'cellMargin' => 80];
    $table = $section->addTable($tableStyle);

    // Header Tabel 
    $table->addRow();
    $table->addCell(500, ['bgColor' => 'e9ecef'])->addText('No', ['bold' => true]);
    $table->addCell(2500, ['bgColor' => 'e9ecef'])->addText('Nama Dokter', ['bold' => true]);
    $table->addCell(2000, ['bgColor' => 'e9ecef'])->addText('Spesialis', ['bold' => true]);
    $table->addCell(2000, ['bgColor' => 'e9ecef'])->addText('No. Telp', ['bold' => true]);
    $table->addCell(3000, ['bgColor' => 'e9ecef'])->addText('Alamat', ['bold' => true]);

    foreach ($dokter as $index => $d) {
        $table->addRow();
        $table->addCell(500)->addText($index + 1);
        $table->addCell(2500)->addText($d->nama_dokter);
        $table->addCell(2000)->addText($d->spesialis);
        $table->addCell(2000)->addText($d->no_telp);
        $table->addCell(3000)->addText($d->alamat);
    }

    // 3. TANDA TANGAN 
    $section->addTextBreak(2);
    $rightAlign = ['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::RIGHT];
    
    $section->addText('Dicetak pada: ' . date('d/m/Y H:i') . '          ', null, $rightAlign);
    $section->addTextBreak(1); 
    
    $section->addText('Mengetahui,          ', null, $rightAlign);
    $section->addText('Admin Medika App          ', null, $rightAlign);
    $section->addTextBreak(3);
    $section->addText('( ________________ )          ', ['bold' => true], $rightAlign);

    // 4. PROSES DOWNLOAD
    $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
    $fileName = 'laporan-dokter.docx';
    $path = storage_path($fileName);
    $objWriter->save($path);

    return response()->download($path)->deleteFileAfterSend(true);
}
}
