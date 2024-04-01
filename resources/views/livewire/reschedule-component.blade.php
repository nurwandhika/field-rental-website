<!-- <div>
    <div class="card">
        <div class="card-body">
            <form action="{{route('user::reschedule',[$transaction])}}">
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
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @if($items)
        <div class="card">
            <div class="card-header">
                Reschedule
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <dt>Harga @Jam</dt>
                                <dd>{{$total / count($items)}}</dd>
                                <dt>Lama Sewa</dt>
                                <dd>{{count($items)}} jam</dd>
                                <dt>Sub Total</dt>
                                <dd>{{$total}}</dd>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <span class="mr-5 font-weight-bold">Rp. {{$total}}</span><button type="button" class="btn btn-primary" wire:click="reschedule" onclick="confirm('Apakah kamu yakin jadwal yang dipesan sudah sesuai ?')|| event.stopImmediatePropagation()">Reschedule</button>
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
                                @endif</td>
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
</div> -->
