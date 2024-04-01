@extends('layout.blank')
@section('title')
    Smashfit
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>@yield('title')</h1>
            <div class="section-header-breadcrumb">
                <a href="{{route('schedule') }}" class="btn btn-link mr-2">Home</a>
                <a href="{{route('gallery') }}" class="btn btn-link mr-2">Gallery</a>
                <a href="{{route('about') }}" class="btn btn-link mr-2">About</a>
                <a href="{{auth()->user() ? route('user::transaction') : route('auth::user-login') }}" class="btn btn-primary mr-2">{{auth()->user() ? 'History' : 'Login' }}</a>
            </div>
        </div>
        <div class="section-body">
          <div class="row">
              <div class="col-md-8">
                  <div class="card">
                      <div class="card-header">
                          Tata Cara Pembayaran
                      </div>
                      <div class="card-body">
                          <p>
                              Halo! Kami ingin memberikan informasi penting mengenai pembayaran pesanan Anda. 
                              Untuk memudahkan proses pembayaran, kami akan memberikan langkah-langkah untuk melakukan pembayaran
                              Berikut adalah langkah-langkah untuk melakukan pembayaran:
                          <ol>
                              <li>
                                  Setelah melakukan pemesanan lakukan pembayaran dengan cara transfer ke rekening BCA berikut <b>0086-7759-834-066 a.n A.A Muhammad Itqany Rachman.</b>
                              </li>
                              <li>
                                  Setelah itu buka menu 'History', Kemudian klik pada menu 'Transaksi'.
                              </li>
                              <li>
                                  Cari pesanan anda berdasarkan ID pesanan, setelah itu klik menu detail pesanan
                              </li>
                              <li>
                                  pada menu detail pesanann klik tombol 'Upload Bukti Pembayan'
                              </li>
                              <li>
                                  Pilih foto/screenshot bukti pembayaran yang telah anda simpan
                              </li>
                              <li>
                                  setelah melakukan upload bukti pembayaran, silahkan tunggu hingga status pemesanan berubah menjadi 'Sukses'
                              </li>
                              <li>
                                  Kami akan memverifikasi pembayaran Anda dan mengonfirmasi penerimaannya.
                              </li>
                              <li>
                                  Setelah pembayaran Anda terkonfirmasi, pesanan Anda akan diproses dan dikirimkan sesuai dengan ketentuan yang berlaku.
                              </li>
                          </ol>
                          Jika Anda memiliki pertanyaan lebih lanjut atau memerlukan bantuan selama proses pembayaran, jangan ragu untuk menghubungi kami melalui WhatsApp di nomor 082157805799. Terima kasih atas kerjasama Anda!</p>
                      </div>
                      <div class="card-footer d-flex justify-content-center">
                          <a href="{{route('schedule')}}" class="btn btn-link">Kembali ke halaman utama</a>
                          <a target="_blank" href="https://wa.me/6281390225242" class="btn btn-success">Chat WhatsApp kami</a>
                      </div>
                  </div>
              </div>
              <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Informasi Status</div>
                    <div class="card-body">
                        <dt>Available <span class="badge badge-sm badge-success">Available</span></dt>
                        <dd>Lapangan tersedia untuk disewa</dd>
                        <dt>Pending <span class="badge badge-sm badge-warning">Pending</span></dt>
                        <dd>Lapangan sedang dalam proses pemesanan orang lain. Lapangan dapat disewa apabila pesanan dibatalkan / belum terbayar.</dd>
                        <dt>Booked <span class="badge badge-sm badge-danger">Booked</span></dt>
                        <dd>Lapangan telah disewa</dd>
                    </div>
                </div>

              </div>
          </div>
        </div>
    </section>
@endsection
