<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Tables - SB Admin Pro</title>
        <link href="css/styles.css" rel="stylesheet" />
        <!-- <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" /> -->
        <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.min.css">
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />
        <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.24.1/feather.min.js" crossorigin="anonymous"></script>

<!-- New Imports -->

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <script src="custom.js"></script>

    </head>

    <style>
        .page-header {
            background: #0a420e;
            background: linear-gradient(90deg, rgba(10, 66, 14, 1) 0%, rgba(65, 97, 19, 1) 100%);
        }
        .card {
            display:flex;
            margin:auto;
            width: 50%;
            border-radius: 40px;
            border: 2px dashed rgba(0, 0, 0, 0.2);
        }
    </style>

    <body class="nav-fixed">
        <?php
            require_once("components/header.php");
        ?>
        
        <div id="layoutSidenav">
        <?php
            require_once("components/sidenav.php");
        ?>
            
            <div id="layoutSidenav_content">
                <main>
                        <div class="page-header page-header-dark">
                            <div class="container-fluid">
                                <div class="page-header-content py-5">
                                    <h1 class="page-header-title">
                                        <span>Imports</span>
                                    </h1>
                                    <div class="page-header-subtitle">"To doubt everything, or to believe everything, are two equally convenient solutions; both dispense with the necessity of reflection."</div>
                                </div>
                            </div>
                        </div>
                        <div class="container-fluid mt-4">
                            <div id="dropArea">
                                <p>Drag and drop Excel or CSV file here</p>
                                <input type="file" id="fileInput" accept=".csv,.xlsx" style="display:none;">
                                <button onclick="document.getElementById('fileInput').click()">Or select file</button>
                            </div>
                                <div id="progress"></div>
                                <button id="cancelBtn">Cancel Upload</button>
                        </div>
                </main>
                <?php
                    require_once("components/footer.php");
                ?>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/2.2.2/js/dataTables.min.js"></script>

        <script>
            const dropArea = document.getElementById('dropArea');
  const fileInput = document.getElementById('fileInput');
  const progress = document.getElementById('progress');
  const cancelBtn = document.getElementById('cancelBtn');
  let xhr = null;

  dropArea.addEventListener('dragover', (e) => {
    e.preventDefault();
    dropArea.classList.add('hover');
  });

  dropArea.addEventListener('dragleave', () => {
    dropArea.classList.remove('hover');
  });

  dropArea.addEventListener('drop', (e) => {
    e.preventDefault();
    dropArea.classList.remove('hover');
    const file = e.dataTransfer.files[0];
    handleFileUpload(file);
  });

  fileInput.addEventListener('change', () => {
    const file = fileInput.files[0];
    handleFileUpload(file);
  });

  cancelBtn.addEventListener('click', () => {
    if (xhr) {
      xhr.abort();
      progress.textContent = 'Upload canceled';
      cancelBtn.style.display = 'none';
    }
  });

  function handleFileUpload(file) {
    if (!file.name.match(/\.(csv|xlsx)$/)) {
      alert('Only .csv and .xlsx files are allowed.');
      return;
    }

    const formData = new FormData();
    formData.append('file', file);

    xhr = new XMLHttpRequest();
    xhr.open('POST', 'upload.php', true);

    xhr.upload.onprogress = (e) => {
      if (e.lengthComputable) {
        const percent = (e.loaded / e.total) * 100;
        progress.textContent = `Uploading: ${Math.round(percent)}%`;
      }
    };

    xhr.onload = () => {
      if (xhr.status === 200) {
        progress.textContent = 'Upload complete!';
      } else {
        progress.textContent = 'Upload failed.';
      }
      cancelBtn.style.display = 'block';
    };

    xhr.onerror = () => {
      progress.textContent = 'Upload error.';
      cancelBtn.style.display = 'block';
    };

    xhr.send(formData);
    cancelBtn.style.display = 'inline-block';
    progress.textContent = 'Starting upload...';
  }
        </script>

    </body>
</html>
