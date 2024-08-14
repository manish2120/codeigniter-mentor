// // ------- IMAGE CROPPER STARTS ----------
// // handled file selection
// const avatar = document.getElementById("profile-img");
// const image = document.getElementById("uploadedAvatar");
// const input = document.getElementById("file-input");
// const cropBtn = document.getElementById("crop");
// const removeBtn = document.querySelector(".remove-img-btn");
// const overlay = document.querySelector(".overlay");
// const updateBtn = document.querySelector(".custom-file-upload");
// const closeImgCropper = document.querySelector(
//   ".js-close-img-cropping-container"
// );

// const $modal = $("#cropAvatarmodal");
// avatar.src = "assets/icons/user.svg";
// avatar.style.width = "50%";
// let cropper;

// $('[data-toggle="tooltip"]').tooltip();

// function updateButtonText(hasImage) {
//   if (hasImage) {
//     updateBtn.querySelector("input").nextSibling.textContent = "Update Photo";
//   } else {
//     updateBtn.querySelector("input").nextSibling.textContent = "Upload Photo";
//   }
// }

// input.addEventListener("change", function (e) {
//   overlay.classList.remove("overlay-hidden");
//   const files = e.target.files;
//   const done = function (url) {
//     image.src = url;
//     $modal.modal("show");
//   };

//   if (files && files.length > 0) {
//     let file = files[0];
//     const reader = new FileReader();
//     reader.onload = function () {
//       done(reader.result);
//     };
//     reader.readAsDataURL(file);
//   }
// });

// $modal
//   .on("shown.bs.modal", function () {
//     cropper = new Cropper(image, {
//       aspectRatio: 1,
//       viewMode: 1,
//       movable: true,
//       zoomable: true,
//       rotatable: false,
//       scalable: true,
//       cropBoxMovable: true,
//       cropBoxResizable: true,
//       ready: function () {
//         cropper.setDragMode("move");
//       },
//     });
//   })
//   .on("hidden.bs.modal", function () {
//     cropper.destroy();
//     cropper = null;
//     input.value = "";
//   });

// cropBtn.addEventListener("click", function () {
//   let canvas;
//   $modal.modal("hide");

//   if (cropper) {
//     canvas = cropper.getCroppedCanvas({
//       width: 160,
//       height: 160,
//     });
//     avatar.style.width = "100%";
//     avatar.src = canvas.toDataURL();
//     removeBtn.style.display = "block"; // Show remove button
//     updateButtonText(true); // Change button text to 'Update Photo'
//   }
//   overlay.classList.add("overlay-hidden");
// });

// closeImgCropper.addEventListener("click", () => {
//   overlay.classList.add("overlay-hidden");
// });

// removeBtn.addEventListener("click", function () {
//   removeBtn.classList.toggle("btn-active");
//   avatar.src = "assets/icons/user.svg"; // Reset to default or empty image
//   avatar.style.width = "50%";
//   removeBtn.style.display = "none"; // Hide remove button
//   updateButtonText(false); // Change button text back to 'Upload Photo'
// });

// // ------- IMAGE CROPPER ENDS ----------
