const BASE_URL = "http://localhost/newstart;)/to-do-app";

function showErrorModal(error_title, error_description) {
  // clean params
  error_title = $("<div>").text(error_title).html();
  error_description = $("<div>").text(error_description).html();
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
