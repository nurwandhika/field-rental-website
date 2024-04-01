<div>
    @if(!$showPayment)
    <div class="card">
        <div class="card-body">
            <form action="{{route('schedule')}}">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="date" class="form-control" min="{{now()->format('Y-m-d')}}" value="{{ $date ?? now()->format('Y-m-d')}}" name="date">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <select name="field" id="field" class="form-control">
                                @foreach($fields as $field)
                                <option value="{{$field->id}}" {{$field_selected == $field->id ? 'selected' : ''}}>{{$field->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3 ml-auto">
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @if(!auth()->user())
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="mr-auto ml-auto">Anda belum login, silahkan login untuk melakukan pemesanan </div>
            </div>
        </div>
    </div>
    @endif
    @if($items)
    <div class="card">
        <div class="card-header">
            Informasi Pemesanan
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <dt>Harga @Jam</dt>
                            <dd>{{$field_total / count($items)}}</dd>
                            <dt>Lama Sewa</dt>
                            <dd>{{count($items)}} jam</dd>
                            <dt>Sub Total</dt>
                            <dd>{{$field_total}}</dd>
                        </div>
                        @if($equip_items)
                        <div class="col-md-6">
                            <dt>Peralatan yang disewa</dt>
                            <dd>
                                <ol>
                                    @foreach($equip_orders as $equip)
                                    <li>{{$equip['name']}} - {{$equip['price']}}</li>
                                    @endforeach
                                </ol>
                            </dd>
                            <dt>Sub Total</dt>
                            <dd>{{$equip_total}}</dd>
                        </div>
                        @endif
                    </div>
                    <!-- Equipment -->
                <!-- </div>
                <div class="col-md-6">
                    @if($showForm)
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th>Nama</th>
                                <th>Keterangan</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </tr>
                            @foreach ($equipments as $equipment)
                            <tr>
                                <td>{{ $equipment->name }}</td>
                                <td>{{ $equipment->desc }}</td>
                                <td>{{ $equipment->price }}</td>
                                <td><input type="checkbox" value="{{$equipment->id}}" wire:model="equip_items" wire:click="sumTotal"></td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                    @endif
                </div> -->
            </div>
        </div>
        <div class="card-footer">
            <span class="mr-5 font-weight-bold">Rp. {{$total}}</span><button type="button" class="btn btn-primary" wire:click="createOrder" onclick="confirm('Apakah kamu yakin jadwal yang dipesan sudah sesuai ?')|| event.stopImmediatePropagation()">Pembayaran</button>
        </div>
    </div>
    @endif
    <div class="card">
        <div class="card-header">
            Jadwal
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th>Lapangan</th>
                        <th>Jadwal</th>
                        <th>Status</th>
                        <th>Pesan</th>
                    </tr>
                    @foreach ($schedules as $schedule)
                    <tr>
                        <td>{{ $schedule->field->name }}</td>
                        <td>{{ $schedule->datetime }}</td>
                        <td>@if($schedule->status == 'pending')
                            <span class="badge badge-warning">Pending</span>
                            @elseif($schedule->status == 'booked')
                            <span class="badge badge-danger">Booked</span>
                            @else
                            <span class="badge badge-success">Available</span>
                            @endif
                        </td>
                        @if(auth()->user())
                        @if($schedule->status == 'available')
                        <td><input type="checkbox" value="{{$schedule->id}}" wire:model="items" wire:click="sumTotal"></td>
                        @else
                        <td></td>
                        @endif
                        @endif
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    @else
    <div class="col-md-8 offset-2">
        <div class="card">
            <div class="card-header">
                Pembayaran ID Transaksi <strong> #{{$transactionId ?? 0}}</strong>
            </div>
            <div class="card-body">
                <p>
                    Halo! Kami ingin memberikan informasi penting mengenai pembayaran pesanan Anda.
                    Untuk memudahkan proses pembayaran, kami akan memberikan langkah-langkah untuk melakukan pembayaran
                    Berikut adalah langkah-langkah untuk melakukan pembayaran:
                <ol>
                    <li>
                        Setelah melakukan pemesanan lakukan pembayaran dengan cara transfer ke rekening BRI berikut <b>0086-7759-834-066 a.n Tata Kharisma Mahardhika.</b>
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
                <a target="_blank" href="https://wa.me/08194888819?text=Hehehe" class="btn btn-success">Chat WhatsApp kami</a>
            </div>
        </div>
    </div>
    @endif
</div>