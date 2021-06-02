<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    public function insert()
    {
        $result = DB::insert('insert into mahasiswas (npm,nama_mahasiswa,tempat_lahir,tanggal_lahir,alamat,created_at) values (?,?,?,?,?,?)',['1822240038','David Sebastian','Palembang','2000-01-01','Jl Rajawali',now()]);
        dump($result);
    }

    public function update()
    {
        $result = DB::update('update mahasiswas set nama_mahasiswa = "David", updated_at = now() where npm = ?',['1822240038']);
        dump($result);
    }

    public function delete()
    {
        $result = DB::delete("delete from mahasiswas where npm = ?",['1822240038']);
        dump($result);
    }

    public function select()
    {
        $kampus = "Universitas Multi Data Palembang";
        $result = DB::select('select * from mahasiswas');
        return view('mahasiswa.index',['allmahasiswa'=>$result,'kampus'=>$kampus]);
    }

    public function insertQb()
    {
        $result = DB::table('mahasiswas')->insert([
            'npm' => '1923250001',
            'nama_mahasiswa' => 'Umar',
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => '2001-01-01',
            'alamat' => 'Jl Sudirman',
            'created_at' => now(),
        ]);
        dump($result);
    }

    public function updateQb()
    {
        $result = DB::table('mahasiswas')
        ->where('npm','1923250001')
        ->update([
            'nama_mahasiswa' => 'usman',
            'updated_at' => now(),
        ]);
        dump($result);
    }

    public function deleteQb()
    {
        $result = DB::table('mahasiswas')
        ->where('npm','=','1923250001')
        ->delete();
        dump($result);
    }
    public function selectQb()
    {
        $kampus = "Universitas Multi Data Palembang";
        $result = DB::table('mahasiswas')->get();
        return view('mahasiswa.index',['allmahasiswa'=>$result,'kampus'=>$kampus]);
    }

    public function insertElq()
    {
        $mahasiswa = new Mahasiswa;
        $mahasiswa->npm = '1923240001';
        $mahasiswa->nama_mahasiswa = 'Zainab';
        $mahasiswa->tempat_lahir = 'Bandung';
        $mahasiswa->tanggal_lahir = '2002-01-01';
        $mahasiswa->alamat = 'Jl Bambang Utoyo';
        $mahasiswa->save();
        dump($mahasiswa);
    }

    public function updateElq()
    {
        $mahasiswa = Mahasiswa::where('npm','1923240001')->first();
        $mahasiswa->nama_mahasiswa = "Khadijah";
        $mahasiswa->save();
        dump($mahasiswa);
    }

    public function deleteElq()
    {
        $mahasiswa = Mahasiswa::where('npm','1923240001')->first();
        $mahasiswa->delete();
        dump($mahasiswa);
    }

    public function selectElq()
    {
        $kampus = "Universitas Multi Data Palembang";
        $result = Mahasiswa::all();
        return view('mahasiswa.index',['allmahasiswa'=>$result,'kampus'=>$kampus]);
    }
}
