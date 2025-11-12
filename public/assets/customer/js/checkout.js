document.getElementById("pay-button").addEventListener("click", function () {
    snap.pay("{{ $order->snap_token }}", {
        onSuccess: function (result) {
            Swal.fire({
                icon: "success",
                title: "Pembayaran Berhasil!",
                text: "Terima kasih atas pembayaran Anda",
                confirmButtonText: "OK",
                confirmButtonColor: "#28a745",
            }).then((result) => {
                window.location.href =
                    "/checkout/success/{{ $order->order_code }}";
            });
        },
        onPending: function (result) {
            Swal.fire({
                icon: "warning",
                title: "Menunggu Pembayaran",
                text: "Silakan selesaikan pembayaran Anda",
                confirmButtonText: "OK",
                confirmButtonColor: "#ffc107",
            });
        },
        onError: function (result) {
            Swal.fire({
                icon: "error",
                title: "Pembayaran Gagal",
                text: "Terjadi kesalahan saat memproses pembayaran. Silakan coba lagi.",
                confirmButtonText: "Coba Lagi",
                confirmButtonColor: "#dc3545",
            });
        },
    });
});
