@extends('admin.layouts.master')
@section('title', 'Detail User')

@section('content')
<div class="page-title mb-3">
    <h3>Detail Pengguna</h3>
    <p class="text-muted">Informasi lengkap pengguna dan riwayat transaksi</p>
</div>

<div class="card mb-4">
    <div class="card-header text-white">
        <strong>Profil Pengguna</strong>
    </div>
    <div class="card-body">
        <table class="table table-borderless">
            <tr>
                <th>Nama Lengkap</th>
                <td>{{ $user->name }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $user->email }}</td>
            </tr>
            <tr>
                <th>Nomor HP</th>
                <td>{{ $user->phone ?? '-' }}</td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td>{{ $user->address ?? '-' }}</td>
            </tr>
        </table>
        <div class="d-flex justify-content-end mt-4">
            <a href="{{ route('admin.users.index') }}" class="btn btn-light-secondary me-1 mb-1">Kembali</a>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header text-white">
        <strong>Riwayat Transaksi</strong>
    </div>
    <div class="card-body">
        @if($user->orders->isEmpty())
            <p class="text-muted">Belum ada transaksi.</p>
        @else
            @foreach($user->orders as $order)
                <div class="border rounded p-3 mb-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5>Kode Pesanan: {{ $order->order_code }}</h5>
                        <span class="badge bg-info">{{ ucfirst($order->status) }}</span>
                    </div>
                    <p class="mb-1"><strong>Tanggal:</strong> {{ $order->created_at->format('d M Y H:i') }}</p>
                    <p class="mb-1"><strong>Metode Pembayaran:</strong> {{ $order->payment_method ?? '-' }}</p>
                    <p class="mb-1"><strong>Catatan:</strong> {{ $order->note ?? '-' }}</p>

                    <table class="table mt-3">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Produk</th>
                                <th>Qty</th>
                                <th>Harga</th>
                                <th>Pajak</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->orderItems as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->product_type ?? 'Produk' }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>Rp{{ number_format($item->price, 0, ',', '.') }}</td>
                                    <td>Rp{{ number_format($item->tax, 0, ',', '.') }}</td>
                                    <td>Rp{{ number_format($item->total_price, 0, ',', '.') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="text-end">
                        <strong>Subtotal:</strong> Rp{{ number_format($order->subtotal, 0, ',', '.') }} <br>
                        <strong>PPN:</strong> Rp{{ number_format($order->tax, 0, ',', '.') }} <br>
                        <strong>Total Bayar:</strong> Rp{{ number_format($order->grand_total, 0, ',', '.') }}
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
@endsection
