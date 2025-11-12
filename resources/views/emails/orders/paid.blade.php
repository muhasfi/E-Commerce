@component('mail::message')
# Halo, {{ $order->fullname }}

Pesanan Anda dengan kode **{{ $order->order_code }}** telah **berhasil dibayar 🎉**  
Berikut detail akses item yang Anda beli:

---

@foreach($order->orderItems as $orderItem)
@php
    $type = strtolower(class_basename($orderItem->product_type));
    $filePath = $orderItem->product->detail->file_path ?? null;
    $isLink = $filePath && Str::startsWith($filePath, ['http://', 'https://']);
    $eventDate = $orderItem->product->detail->event_date ?? null;
    $duration = $orderItem->product->detail->duration_days ?? null;
@endphp

## 🎓 {{ $orderItem->product->name ?? $orderItem->product->judul ?? 'Produk Tanpa Nama' }}

{{-- Pesan khusus per jenis produk --}}
@switch($type)
    @case('itemwebinar')
        🎥 Anda telah terdaftar di **Webinar** kami.  
        Link Zoom atau akses akan dikirim menjelang acara dimulai.
        @break

    @case('itemseminar')
        🏛️ Terima kasih telah mendaftar **Seminar** kami.  
        Detail lokasi dan jadwal akan kami kirimkan H-1 sebelum acara.
        @break

    @case('itemtraining')
        💼 Selamat bergabung di **Training Program** kami!  
        Pastikan Anda membaca panduan peserta sebelum memulai.
        @break

    @case('itembimbel')
        📘 Anda resmi terdaftar di **Bimbingan Belajar Online**.  
        Akses materi dan jadwal akan tersedia di halaman akun Anda.
        @break

    @case('itempajak')
        💡 Berikut materi atau dokumen terkait layanan **Pajak** Anda.
        @break

    @default
        🛒 Terima kasih telah membeli produk kami!
@endswitch

{{-- Tombol akses file atau link --}}
@if($filePath)
    @if($isLink)
        @component('mail::button', ['url' => $filePath])
        📥 Unduh File / Akses Materi / Link
        @endcomponent
    @else
        @component('mail::button', ['url' => asset('storage/'.$filePath)])
        📂 Lihat File
        @endcomponent
    @endif
@endif

{{-- Info tambahan --}}
@if($eventDate)
📅 **Tanggal:** {{ \Carbon\Carbon::parse($eventDate)->translatedFormat('d F Y H:i') }}
@endif

@if($duration)
⏳ **Durasi:** {{ $duration }} hari
@endif

---

@endforeach

Terima kasih telah berbelanja di **Paham Pajak**  
Jika Anda memiliki pertanyaan, cukup balas email ini — kami siap membantu 💬  

Salam hangat,  
**Tim Paham Pajak**
@endcomponent
