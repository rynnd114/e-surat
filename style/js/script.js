// Ambil elemen-elemen yang diperlukan
var modal = document.getElementById("image-modal");
var modalImage = document.getElementById("modal-image");
var closeModal = document.getElementsByClassName("close-modal")[0];
var openModalLinks = document.querySelectorAll(".open-modal");

// Tambahkan event listener ke setiap tautan "lihat lebih besar"
openModalLinks.forEach(function(link) {
    link.addEventListener("click", function(event) {
        event.preventDefault();
        var imageUrl = link.getAttribute("data-image");
        modalImage.src = imageUrl;
        modal.style.display = "block";
    });
});

// Tambahkan event listener untuk menutup modal saat tombol "tutup" diklik
closeModal.addEventListener("click", function() {
    modal.style.display = "none";
});
