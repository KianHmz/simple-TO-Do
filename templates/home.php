<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?= APP_NAME ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= BASE_URL . '/public/assets/css/style.css' ?>">
</head>

<body>

    <!-- partial:index.partial.html -->
    <div class="page">

        <div class="pageHeader d-flex justify-content-between align-items-center p-3 border-bottom">
            <div class="title fs-4">Dashboard</a></div>
            <div class="dropdown">
                <button class="btn dropdown-toggle d-flex align-items-center" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="me-2"><?= isset($user['name']) ? htmlspecialchars($user['name']) : '{USER-NAME}' ?></span>
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="?action=logout">Logout</a></li>
                </ul>
            </div>
        </div>

        <div class="mainn">
            <div class="navv">
                <!-- <div class="searchbox">
                    <div><i class="fa fa-search"></i>
                        <input type="search" placeholder="Search" />
                    </div>
                </div> -->
                <div class="menuu">
                    <div class="title">Folders</div>
                    <ul class="mt-3">
                        <li class="<?= $_GET['fid'] == 'all' ? 'active' : '' ?>">
                            <a class="link" href="?fid=all"><i class="fa fa-folder"></i>All</a>
                        </li>
                        <?php foreach ($folders as $folder): ?>
                            <li class="<?= $_GET['fid'] == $folder['id'] ? 'active' : '' ?>">
                                <a class="link" href="?fid=<?= $folder['id'] ?>"><i class="fa fa-folder"></i><?= $folder['name'] ?></a>
                                <a class="delfolderbtn delicon float-end link" data-delfolder="<?= $folder['id'] ?>">X</a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="newfolderbox">
                    <input id="newfolderinp" type="text" placeholder="Add New Folder" />
                    <button id="newfolderbtn" type="button" class="btn btn-light">
                        <i class="fa fa-plus"></i>
                    </button>
                </div>
            </div>
            <div class="view">
                <div class="viewHeader">
                    <input id="newtaskinp" type="text" class="w-50" placeholder="Add new task">
                    <button id="newtaskbtn" type="button" class="btn btn-light float-end me-1">
                        <i class="fa fa-plus"></i>
                    </button>
                </div>
                <div class="content">
                    <div class="list">
                        <div class="title">Tasks</div>
                        <ul>
                            <?php foreach ($tasks as $task):  ?>
                                <li class="<?= $task['is_done'] ? 'checked' : '' ?> link">
                                    <i class="donetaskbtn fa <?= $task['is_done'] ? 'fa-check-square-o' : 'fa-square-o' ?>" data-donetask="<?= $task['id'] ?>"></i>
                                    <span class="tasktitle"><?= $task['title'] ?></span>
                                    <a class="deltaskbtn delicon mx-2 float-end link" data-deltask="<?= $task['id'] ?>">X</a>
                                    <div class="info">
                                        <span class="taskdate me-2">date added: <?= $task['created_at'] ?></span>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <a class="author link" target="_blank" href="https://github.com/KianHmz">Built with passion by KianHmz ;))</a>
    </div>
    <!-- partial -->

    <!-- <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script> -->
    <script src="<?= BASE_URL . '/public/assets/js/jquery.min.js' ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= BASE_URL . '/public/assets/js/helpers.js' ?>"></script>
    <script src="<?= BASE_URL . '/public/assets/js/ajax_handler.js' ?>"></script>

</body>

</html>