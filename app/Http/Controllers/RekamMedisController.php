<?php

namespace App\Http\Controllers;

use App\Models\RekamMedis;
use App\Models\Pasien;
use App\Models\Dokter;
use Barryvdh\DomPDF\Facade\Pdf;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\SimpleType\Jc; 
use Illuminate\Http\Request;

class RekamMedisController extends Controller
{
    public function index()
    {
        // Mengambil data rekam medis dengan relasi pasien dan dokter, pagination 6
        $rekams = RekamMedis::with(['pasien', 'dokter'])->paginate(6); 
        return view('rekam_medis.index', compact('rekams'));
    }

    public function create()
    {
        $pasiens = Pasien::all();
        $dokters = Dokter::all();
        return view('rekam_medis.create', compact('pasiens', 'dokters'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pasien_id' => 'required',
            'dokter_id' => 'required',
            'tgl_periksa' => 'required|date',
            'keluhan' => 'required',
            'diagnosa' => 'required',
        ]);

        RekamMedis::create($request->all());

        return redirect()->route('rekam-medis.index')->with('success', 'Rekam medis berhasil disimpan!');
    }

    public function exportPdf()
    {
        $rekams = RekamMedis::with(['pasien', 'dokter'])->get();
        $pdf = Pdf::loadView('rekam_medis.pdf', compact('rekams'));
        return $pdf->download('Laporan-Rekam-Medis.pdf');
    }

    public function exportWord()
    {
        $rekams = RekamMedis::with(['pasien', 'dokter'])->get();
        $phpWord = new PhpWord();
        $section = $phpWord->addSection();

    
        $section->addText("KLINIK MEDIKA SEHAT", ['bold' => true, 'size' => 16], ['alignment' => Jc::CENTER]);
        $section->addText("Jl. Pendidikan No. 123, Kota Kamu | Telp: (021) 123456", ['size' => 10], ['alignment' => Jc::CENTER]);
    
        $section->addText("______________________________________________________________________________", [], ['alignment' => Jc::CENTER]);
        $section->addTextBreak(1);

        
        $section->addText("LAPORAN DATA REKAM MEDIS", ['bold' => true, 'size' => 12], ['alignment' => Jc::CENTER]);
        $section->addTextBreak(1);

    
        $styleTable = [
            'borderSize' => 6, 
            'borderColor' => '333333', 
            'cellMargin' => 80
        ];
        $styleFirstRow = ['bgColor' => 'F2F2F2', 'bold' => true]; 
        $phpWord->addTableStyle('MedikaTable', $styleTable, $styleFirstRow);
        
        $table = $section->addTable('MedikaTable');

        // Header Tabel 
        $table->addRow();
        $table->addCell(500)->addText("No", ['bold' => true]);
        $table->addCell(1800)->addText("Tanggal", ['bold' => true]);
        $table->addCell(2200)->addText("Nama Pasien", ['bold' => true]);
        $table->addCell(2200)->addText("Dokter", ['bold' => true]);
        $table->addCell(2500)->addText("Keluhan", ['bold' => true]);
        $table->addCell(2500)->addText("Diagnosa", ['bold' => true]);

        // Isi Tabel
        $no = 1;
        foreach ($rekams as $r) {
            $table->addRow();
            $table->addCell(500)->addText($no++);
            $table->addCell(1800)->addText(\Carbon\Carbon::parse($r->tgl_periksa)->format('d-m-Y'));
            $table->addCell(2200)->addText($r->pasien->nama_pasien);
            $table->addCell(2200)->addText($r->dokter->nama_dokter);
            $table->addCell(2500)->addText($r->keluhan);
            $table->addCell(2500)->addText($r->diagnosa);
        }

        // --- 3. FOOTER 
        $section->addTextBreak(2);
        $section->addText("Dicetak pada: " . date('d F Y'), [], ['alignment' => Jc::RIGHT]);
        $section->addTextBreak(1);
        $section->addText("Kepala Administrasi Klinik,", ['bold' => true], ['alignment' => Jc::RIGHT]);
        $section->addTextBreak(3);
        $section->addText("( __________________________ )", ['bold' => true], ['alignment' => Jc::RIGHT]);

        // Proses Save & Download
        $fileName = 'Laporan-Rekam-Medis.docx';
        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
        
        
        return response()->streamDownload(function() use ($objWriter) {
            $objWriter->save('php://output');
        }, $fileName);
    }

    public function edit(string $id)
    {
        $rekam = RekamMedis::findOrFail($id);
        $pasiens = Pasien::all();
        $dokters = Dokter::all();
        return view('rekam_medis.edit', compact('rekam', 'pasiens', 'dokters'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'pasien_id' => 'required',
            'dokter_id' => 'required',
            'tgl_periksa' => 'required|date',
            'keluhan' => 'required',
            'diagnosa' => 'required',
        ]);

        $rekam = RekamMedis::findOrFail($id);
        $rekam->update($request->all());

        return redirect()->route('rekam-medis.index')->with('success', 'Rekam medis berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        $rekam = RekamMedis::findOrFail($id);
        $rekam->delete();
        return redirect()->route('rekam-medis.index')->with('success', 'Rekam medis berhasil dihapus!');
    }
}