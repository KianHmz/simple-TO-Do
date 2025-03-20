$(document).ready(function () {
  /* variables */
  var newFolderBtn = $("#newfolderbtn");
  var newFolderInp = $("#newfolderinp");
  var delFolderBtn = $(".delfolderbtn");
  var newTaskBtn = $("#newtaskbtn");
  var newTaskInp = $("#newtaskinp");
  var delTaskBtn = $(".deltaskbtn");
  var doneTaskbtn = $(".donetaskbtn");

  /* events */

  $(newFolderBtn).on("click", function (e) {
    e.preventDefault();
    createFolder($(newFolderInp).val());
  });
  $(newFolderInp).on("keydown", function (e) {
    if (e.key === "Enter") {
      e.preventDefault();
      createFolder($(newFolderInp).val());
    }
  });

  $(delFolderBtn).on("click", function (e) {
    e.preventDefault();
    if (confirm("Are you sure you want to delete this folder?")) {
      deleteFolder($(this).attr("data-delfolder"));
    }
  });

  $(newTaskBtn).on("click", function (e) {
    e.preventDefault();
    var folderId = getFromUrl("fid");
    createTask($(newTaskInp).val(), folderId);
  });
  $(newTaskInp).on("keydown", function (e) {
    if (e.key === "Enter") {
      e.preventDefault();
      var folderId = getFromUrl("fid");
      createTask($(newTaskInp).val(), folderId);
    }
  });

  $(delTaskBtn).on("click", function (e) {
    e.preventDefault();
    if (confirm("Are you sure you want to delete this task?")) {
      deleteTask($(this).attr("data-deltask"));
    }
  });

  $(doneTaskbtn).on("click", function (e) {
    e.preventDefault();
    doneTask($(this).attr("data-donetask"));
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
          showErrorModal("Invalid JSON", r);
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
          showErrorModal("Invalid JSON", r);
        }
      },
    });
  }

  /* tasks functions */
  function createTask(task_title, folder_id) {
    $.ajax({
      type: "post",
      url: BASE_URL + "/public/index.php",
      data: {
        action: "createTask",
        taskTitle: task_title,
        folderId: folder_id,
      },
      success: function (r) {
        try {
          let response = JSON.parse(r);
          if (response.success) {
            location.reload();
          } else {
            showErrorModal("Error creating task", response.result);
            newTaskInp.val("");
          }
        } catch (e) {
          showErrorModal("Invalid JSON", r);
        }
      },
    });
  }

  function deleteTask(task_id) {
    $.ajax({
      type: "post",
      url: BASE_URL + "/public/index.php",
      data: {
        action: "deleteTask",
        taskId: task_id,
      },
      success: function (r) {
        try {
          let response = JSON.parse(r);
          if (response.success) {
            location.reload();
          } else {
            showErrorModal("Error deleting task", response.result);
          }
        } catch (e) {
          showErrorModal("Invalid JSON", r);
        }
      },
    });
  }

  function doneTask(task_id) {
    $.ajax({
      type: "post",
      url: BASE_URL + "/public/index.php",
      data: {
        action: "doneTask",
        taskId: task_id,
      },
      success: function (r) {
        try {
          let response = JSON.parse(r);
          if (response.success) {
            location.reload();
          } else {
            showErrorModal("Error updating task", response.result);
          }
        } catch (e) {
          showErrorModal("Invalid JSON", r);
        }
      },
    });
  }
});
