<?php

namespace App\Http\Controllers;

class PagesController extends Controller {

    public function getDashboard(){
        return view('admin.dashboard');
    }

    public function getCalendar(){
        return view('admin.calendar');
    }

    public function getPembayaran(){
        return view('admin.pembayaran');
    }

    public function getTherapistHistory(){
        return view('admin.therapist.history');
    }

    public function getTherapistKomisi(){
        return view('admin.therapist.komisi');
    }

    public function getTherapistRating(){
        return view('admin.therapist.rating');
    }

    public function getTherapistWorkshift(){
        return view('admin.therapist.workshift');
    }

    public function getManagementTherapist(){
        return view('admin.management.therapist');
    }

    public function getManagementVoucher(){
        return view('admin.management.voucher');
    }

    public function getManagementAdmin(){
        return view('admin.management.admin');
    }

    public function getLaporanPelanggan(){
        return view('admin.laporan.pelanggan');
    }

    public function getLaporanTransaksi(){
        return view('admin.laporan.transaksi');
    }
}