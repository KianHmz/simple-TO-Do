
function showErrorModal(message) {
  document.getElementById("errorModalBody").innerText = message;
  var errorModal = new bootstrap.Modal(document.getElementById("errorModal"));
  errorModal.show();
}
