const BASE_URL = "http://localhost/to-do-app";

function showErrorModal(error_title, error_description) {
  // add modal
  $("body").append(`
          <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-md">
                  <div class="modal-content">
                      <div class="modal-header bg-danger text-white">
                          <h5 class="modal-title" id="errorModalLabel"></h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body" id="errorModalBody"></div>
                  </div>
              </div>
          </div>
      `);
  $("#errorModalLabel").text(error_title);
  $("#errorModalBody").text(error_description);
  $("#errorModal").modal("show");
}

function getFromUrl(what_to_get) {
  const params = new URLSearchParams(window.location.search);
  return params.get(what_to_get);
}