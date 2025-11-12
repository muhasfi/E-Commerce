function confirmDelete(id, type) {
    Swal.fire({
        title: "Apakah Anda yakin?",
        text: "Item ini akan dihapus dari keranjang!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Ya, hapus!",
        cancelButtonText: "Batal",
    }).then((result) => {
        if (result.isConfirmed) {
            removeItemFromCart(id, type);
        }
    });
}

document.addEventListener("DOMContentLoaded", function () {
    const clearCartBtn = document.getElementById("clear-cart-btn");

    if (clearCartBtn) {
        clearCartBtn.addEventListener("click", function (e) {
            e.preventDefault();

            Swal.fire({
                title: "Konfirmasi",
                text: "Apakah Anda yakin ingin mengosongkan keranjang?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Ya, kosongkan!",
                cancelButtonText: "Batal",
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = this.dataset.url;
                }
            });
        });
    }
});
