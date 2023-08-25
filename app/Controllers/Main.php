<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\DataMagangModel;

class Main extends ResourceController
{
    protected $datamagangModel;
    public function __construct()
    {
        $this->datamagangModel = new DataMagangModel();
    }

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
   
    public function dashboard()
    {
        $datamagang = $this->datamagangModel->findAll();
        $jmlh_sts_akn_nib_selesai = $this->datamagangModel->where('status_akun_nib', 'Selesai')->countAllResults();
        $jmlh_sts_akn_nib_tdk_lnjt = $this->datamagangModel->where('status_akun_nib', 'Tidak Bisa Dilanjut')->countAllResults();
        $jmlh_sts_akn_nib_sdh_ada = $this->datamagangModel->where('status_akun_nib', 'NIB Sudah Ada')->countAllResults();
        $jmlh_pndftrn_offln = $this->datamagangModel->where('pendaftaran', 'Offline')->countAllResults();
        $jmlh_pndftrn_onln = $this->datamagangModel->where('pendaftaran', 'Online')->countAllResults();
        $jmlh_lokasi_jabodetabek = $this->datamagangModel->where('lokasi', 'Dalam Jabodetabek')->countAllResults();
        $jmlh_lokasi_luarjabodetabek = $this->datamagangModel->where('lokasi', 'Luar Jabodetabek')->countAllResults();

        $payload = [
            "tittle" => 'Dashboard',
            "datamagang" => $datamagang,
            "jmlh_sts_akn_nib_selesai" => $jmlh_sts_akn_nib_selesai,
            "jmlh_sts_akn_nib_tdk_lnjt" => $jmlh_sts_akn_nib_tdk_lnjt,
            "jmlh_sts_akn_nib_sdh_ada" => $jmlh_sts_akn_nib_sdh_ada,
            "jmlh_pndftrn_offln" => $jmlh_pndftrn_offln,
            "jmlh_pndftrn_onln" => $jmlh_pndftrn_onln,
            "jmlh_lokasi_jabodetabek" => $jmlh_lokasi_jabodetabek,
            "jmlh_lokasi_luarjabodetabek" => $jmlh_lokasi_luarjabodetabek,
        ];
        echo view('main/dashboard', $payload);
    }

    public function index()
    {
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $umkm = $this->datamagangModel->search($keyword);
        } else {
            $umkm = $this->datamagangModel->orderBy('id', 'DESC');}

        $payload = [
            "tittle" => 'Data Tables',
            "main" => $umkm->paginate(10,'datamagang'),
            "pager" => $this->datamagangModel->pager
        ];

      
       

    echo view('main/index', $payload);
        
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        echo view('main/new', ["tittle" => 'Tambah Data Tables',]);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $payload = [
            "nama_umkm" => $this->request->getPost('nama'),
            "kecamatan" => $this->request->getPost('kecamatan'),
            "lokasi" => $this->request->getPost('lokasi'),
            "status_akun_nib" => $this->request->getPost('status_akun_nib'),
            "alasan_tidak_lanjut" => $this->request->getPost('alasan_tidak_lanjut'),
            "pendaftaran" => $this->request->getPost('pendaftaran'),
            "waktu_pembuatan" => $this->request->getPost('waktu_pembuatan'),
            
        ];

        $this->datamagangModel->insert($payload);
        session()->setFlashdata('success', 'Data Berhasil diupload');
        return redirect()->to('/main');
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $datamagang = $this->datamagangModel->find($id);

        if (!$datamagang) {
            throw new \Exception("Data not found!");
        }
        $payload = [
            "data" => $datamagang,
            "tittle" => 'Edit Data Tables'
        ];

        echo view('main/edit', $payload);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $payload = [
            "nama_umkm" => $this->request->getPost('nama'),
            "kecamatan" => $this->request->getPost('kecamatan'),
            "lokasi" => $this->request->getPost('lokasi'),
            "status_akun_nib" => $this->request->getPost('status_akun_nib'),
            "alasan_tidak_lanjut" => $this->request->getPost('alasan_tidak_lanjut'),
            "pendaftaran" => $this->request->getPost('pendaftaran'),
            "waktu_pembuatan" => $this->request->getPost('waktu_pembuatan'),
            "nama_admin" => $this->request->getPost('nama_admin'),
        ];

        $this->datamagangModel->update($id, $payload);
        session()->setFlashdata('success', 'Data Berhasil diubah');
        return redirect()->to('/main');
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $this->datamagangModel->delete($id);
        return redirect()->to('/main');
    }

    public function exportcsv()
    {
        $datamagang = $this->datamagangModel->findAll();
        $namafile = 'datamagang' . '.csv';
        $file = fopen($namafile, 'w');
        fputcsv($file, array('Nama UMKM', 'Kecamatan', 'Lokasi', 'Status Akun NIB', 'Alasan Tidak Lanjut', 'Pendaftaran', 'Waktu Pembuatan'));

        foreach ($datamagang as $row) {
            fputcsv(
                $file,
                array(
                    $row['nama_umkm'], $row['kecamatan'], $row['lokasi'],  $row['status_akun_nib'], $row['alasan_tidak_lanjut'], $row['pendaftaran'], $row['waktu_pembuatan'],
                )
            );
        }
        fclose($file);
        return $this->response->download($namafile, null)->
            setFileName($namafile)->setContentType('application/csv')->setHeader('Expires', '0');
    }
}