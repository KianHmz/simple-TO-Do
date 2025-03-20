$(document).ready(function () {
  /* variables */
  var newFolderBtn = $("#newfolderbtn");
  var newFolderInp = $("#newfolderinp");
  var delFolderBtn = $(".delfolderbtn");

  /* events */

  $(newFolderBtn).on("click", function (e) {
    e.preventDefault();
    createFolder($(this).val());
  });
  $(newFolderInp).on("keydown", function (e) {
    if (e.key === "Enter") {
      createFolder($(this).val());
    }
  });

  $(delFolderBtn).on("click", function (e) {
    e.preventDefault();
    if (confirm("Are you sure you want to delete this folder?")) {
      deleteFolder($(this).attr("data-dfid"));
    }
  });

  /* folders functions */

  function createFolder(folder_name) {
    $.ajax({
      type: "post",
      url: BASE_URL + "/public/index.php",
      data: {
        action: "createFolder",
        folderName: folder_name,
      },
      success: function (r) {
        try {
          let response = JSON.parse(r);
          if (response.success) {
            location.reload();
          } else {
            showErrorModal("Error creating folder", response.result);
            newFolderInp.val("");
          }
        } catch (e) {
          showErrorModal("Invalid JSON", response);
        }
      },
    });
  }

  function deleteFolder(folder_id) {
    $.ajax({
      type: "post",
      url: BASE_URL + "/public/index.php",
      data: {
        action: "deleteFolder",
        folderId: folder_id,
      },
      success: function (r) {
        try {
          let response = JSON.parse(r);
          if (response.success) {
            location.reload();
          } else {
            showErrorModal("Error deleting folder", response.result);
          }
        } catch (e) {
          showErrorModal("Invalid JSON", response);
        }
      },
    });
  }

  /* tasks functions */
  function showTasks() {}
  function createTask() {}
  function deleteTask() {}
});
