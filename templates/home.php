<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?= APP_NAME ?></title>
    <link rel="stylesheet" href="<?= BASE_URL . '/public/assets/css/style.css' ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <!-- partial:index.partial.html -->
    <div class="page">

        <div class="pageHeader d-flex justify-content-between align-items-center p-3 border-bottom">
            <div class="title fs-4">Dashboard</div>
            <div class="dropdown">
                <button class="btn dropdown-toggle d-flex align-items-center" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="me-2">John Doe</span>
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="#">Logout</a></li>
                </ul>
            </div>
        </div>

        <div class="mainn">
            <div class="navv">
                <div class="searchbox">
                    <div><i class="fa fa-search"></i>
                        <input type="search" placeholder="Search" />
                    </div>
                </div>
                <div class="menuu">
                    <div class="title">Folders</div>
                    <ul class="mt-3">
                        <li><span><i class="fa fa-folder"></i>All</span></li>
                        <?php // foreach here 
                        ?>
                        <li><span><i class="fa fa-folder"></i>Folder 1</span><a class="delicon float-end link">X</a></li>
                        <li class="active"><span><i class="fa fa-folder"></i>Folder 2</span><a class="delicon float-end link">X</a></li>
                        <li><span><i class="fa fa-folder"></i>Folder 3</span><a class="delicon float-end link">X</a></li>
                        <?php // end foreach 
                        ?>
                    </ul>
                </div>
                <div class="newfolderbox">
                    <input type="text" placeholder="Add New Folder" />
                    <button type="button" class="btn btn-light">
                        <i class="fa fa-plus"></i>
                    </button>
                </div>
            </div>
            <div class="view">
                <div class="viewHeader">
                    <input type="text" class="w-50" placeholder="Add new task">
                    <button type="button" class="btn btn-light float-end me-1">
                        <i class="fa fa-plus"></i>
                    </button>
                </div>
                <div class="content">
                    <div class="list">
                        <div class="title">Tasks</div>
                        <ul>
                            <?php // foreach here  
                            ?>
                            <li class=""><i class="fa fa-square-o"></i>
                                <span class="tasktitle">task 1</span><a class="delicon mx-2 float-end link">X</a>
                                <div class="info">
                                    <span class="taskdate me-2">date added: 25/04/2014</span>
                                </div>
                            </li>
                            <li class="checked"><i class="fa fa-check-square-o"></i>
                                <span class="tasktitle">task 2</span><a class="delicon mx-2 float-end link">X</a>
                                <div class="info">
                                    <span class="taskdate me-2">date added: 25/04/2014</span>
                                </div>
                            </li>
                            <?php // end foreach  
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- partial -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"></script>
    <script src="<?= BASE_URL . '/public/assets/js/script.js' ?>"></script>

</body>

</html>