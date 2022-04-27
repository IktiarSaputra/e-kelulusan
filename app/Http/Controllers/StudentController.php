<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\StudentImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Student;
use Carbon\Carbon;
use PDF;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = Student::orderBy('created_at', 'DESC')->get();
        return view('student.index', compact('siswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::find($id);
        return view('student.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $student = Student::find($id);
        $student->update($request->all());
        return redirect(route('student.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();
        return redirect()->back()->with('delete', 'Sukses');
    }

    public function import(Request $request) 
    {
        $request->validate([
            'file' => 'required|max:10000|mimes:xlsx,xls',
        ]);

        Excel::import(new StudentImport,request()->file('file'));
             
        return redirect()->back()->with('success', 'Data Siswa Berhasil DiUpload');
    }

    public function search(Request $request)
    {
        $student = Student::where('nisn', $request->nisn)->get()->count();
        $data = $student;
        if ($data > 0) {
            $siswa = Student::where('nisn', $request->nisn)->get()->first();
            return view('search', compact('siswa'));
            
        }
        return redirect()->back()->with('not-found', 'Data Siswa Tidak Ditemukan');
        
    }

    public function cetak($nisn)
    {
    	$siswa = Student::where('nisn', $nisn)->get()->first();
        $tanggal = Carbon::now()->isoFormat('D MMMM Y');
    	$pdf = PDF::loadview('surat-skl', compact('siswa', 'tanggal'));
    	return $pdf->download('surat-skl-'.$siswa->name.'.pdf');
    }

    public function download()
    {
    	$filePath = public_path("format-import-siswa.xlsx");
    	$headers = ['Content-Type: application/xlsx'];
    	$fileName = 'format-import-siswa.xlsx';

    	return response()->download($filePath, $fileName, $headers);
    }

}
