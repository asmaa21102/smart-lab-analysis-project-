<?php
require_once 'db.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$currentUserId = $_SESSION['user_id'];

$stmt = $pdo->prepare("SELECT * FROM analyses WHERE user_id = ? ORDER BY uploaded_at DESC");
$stmt->execute([$currentUserId]);
$analyses = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>History</title>

  <link rel="stylesheet" href="history.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>
<body>
  <div class="menu">
    <ul>
      <li class="profile">
        <div class="img-box">
          <img src="images/logo2.jpg" alt="profile" />
        </div>
        <h2>ATL</h2>
      </li>

      <li>
        <a href="dashboard.php">
          <i class="fas fa-cloud-upload-alt"></i>
          <p class="C">Upload</p>
        </a>
      </li>

      <li>
        <a class="active" href="history.php">
          <i class="fas fa-copy"></i>
          <p class="C">History</p>
        </a>
      </li>

      

      <li class="log-out">
        <a href="login.php">
          <i class="fas fa-sign-out-alt"></i>
          <p class="C">Log out</p>
        </a>
      </li>
    </ul>
  </div>

  <div class="content">
    <div class="title-info">
      <p>ATL Smart Lab Analysis</p>
      <i class="fas fa-brain"></i>
    </div>

    <div class="history-page">
      <div class="history-hero">
        <div class="history-hero-text">
          <span class="history-badge">Patient Report Archive</span>
          <h1>Your Analysis History</h1>
          <p>
            Here you can review all your previous laboratory reports, track your
            health indicators over time, and quickly access your saved analysis results
            in one elegant dashboard.
          </p>

          <div class="history-hero-icons">
            <span><i class="fas fa-file-medical"></i> Saved Reports</span>
            <span><i class="fas fa-clock-rotate-left"></i> Timeline View</span>
            <span><i class="fas fa-chart-line"></i> Result Tracking</span>
          </div>
        </div>

        <div class="history-hero-image">
          <img src="images/donor.png" alt="History Illustration" />
        </div>
      </div>

      <div class="history-main-box">
        <div class="history-header">
          <div class="history-header-text">
            <h2>Saved Analysis Files</h2>
            <p>All uploaded laboratory reports are stored here with date and status.</p>
          </div>

          <div class="history-actions">
            <div class="search-box-history">
              <i class="fas fa-search"></i>
              <input type="text" placeholder="Search by file name or date..." />
            </div>
          </div>
        </div>

        <div class="files-table-box">
          <table class="files-table">
            <thead>
              <tr>
                <th>File Name</th>
                <th>Upload Date</th>
                <th>Status</th>
                <th>Actions</th>
              </tr>
            </thead>

            <tbody>
              <?php if (count($analyses) > 0): ?>
                <?php foreach ($analyses as $row): ?>
                  <?php
                    $statusClass = 'status-normal';
                    $statusText = 'Normal';

                    if ($row['result_status'] === 'warning') {
                      $statusClass = 'status-warning';
                      $statusText = 'Warning';
                    } elseif ($row['result_status'] === 'critical') {
                      $statusClass = 'status-critical';
                      $statusText = 'Critical';
                    }
                  ?>
                  <tr>
                    <td>
                      <div class="file-info">
                        <i class="fas fa-file-pdf file-icon"></i>
                        <div>
                          <h4><?= htmlspecialchars($row['file_name']) ?></h4>
                          <p>PDF Report</p>
                        </div>
                      </div>
                    </td>

                    <td><?= htmlspecialchars($row['uploaded_at']) ?></td>

                    <td>
                      <span class="status-badge <?= $statusClass ?>">
                        <?= $statusText ?>
                      </span>
                    </td>

                    <td>
                      <div class="table-actions">
                        <a class="action-btn download-btn" href="uploads/<?= urlencode($row['file_name']) ?>" target="_blank">View</a>
                        <a class="action-btn download-btn" href="uploads/<?= urlencode($row['file_name']) ?>" download>Download</a>
                      </div>
                    </td>
                  </tr>
                <?php endforeach; ?>
              <?php else: ?>
                <tr>
                  <td colspan="4" style="text-align:center; padding: 30px;">
                    No saved analyses yet.
                  </td>
                </tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>
      
    </div>
  </div>
</body>
</html>