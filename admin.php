<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard - Future Vault</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <!-- Font Awesome -->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
      rel="stylesheet"
    />
    <style>
      body {
        background: url('./download\ \(1\).jpg') no-repeat center center/cover; 
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        min-height: 100vh;
        color: #333;
      }

      .header {
        background-color:rgb(255, 255, 255);
        padding: 10px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        color:rgb(55, 54, 54);
      }

      .header img {
        height: 50px;
      }

      .dashboard-container {
        margin: 20px auto;
        max-width: 90%;
        display: flex;
        flex-direction: column;
        gap: 20px;
      }

      .dashboard-title-box {
        background-color: rgba(255, 255, 255, 0.9);
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        text-align: center;
        font-size: 1.8rem;
        font-weight: bold;
        color: #032d5a;
        margin-bottom: 20px;
      }

      .dashboard-card {
        background: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        display: flex;
        align-items: center;
        justify-content: space-between;
        cursor: pointer;
        transition: transform 0.3s, box-shadow 0.3s;
      }

      .dashboard-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
      }

      .card-icon {
        font-size: 2rem;
        color: #032d5a;
      }

      .card-details {
        flex-grow: 1;
        margin-left: 20px;
      }

      .card-title {
        font-size: 1.2rem;
        font-weight: bold;
        color: #333;
      }

      .card-description {
        font-size: 0.9rem;
        color: #666;
      }

      .view-btn {
        background-color: #032d5a;
        color: white;
        border: none;
        padding: 5px 10px;
        border-radius: 5px;
        font-size: 0.9rem;
        cursor: pointer;
      }

      .view-btn:hover {
        background-color: #054080;
      }
    </style>
  </head>
  <body>
    <!-- Header -->
    <div class="header">
      <div class="d-flex align-items-center">
        <img alt="Future Vault logo" src="./wb.png" width="100" />
      </div>
      <div class="d-flex align-items-center">
        <span>Admin Dashboard</span>
        <div class="dropdown ms-3">
          <i
            class="fas fa-user-circle text-white dropdown-toggle"
            data-bs-toggle="dropdown"
            aria-expanded="false"
            style="cursor: pointer; font-size: 24px"
          ></i>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><hr class="dropdown-divider" /></li>
            <li><a class="dropdown-item" href="#">Logout</a></li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Dashboard -->
    <div class="dashboard-container">
      <div class="dashboard-title-box">Welcome, Admin!</div>
     
      <div class="dashboard-card">
        <i class="fas fa-gift card-icon"></i>
        <div class="card-details">
          <div class="card-title">Seller Management</div>
          <div class="card-description">
            View and manage gift options linked to sellers for memory gifts.
          </div>
        </div>
        <a href="sellermanagement.php"><button class="view-btn">View</button></a>
      </div>
     
      <div class="dashboard-card">
        <i class="fas fa-users card-icon"></i>
        <div class="card-details">
          <div class="card-title">User Management</div>
          <div class="card-description">
            View and manage user activity and subscriptions.
          </div>
        </div>
        <a href="usermanagement.php"><button class="view-btn">View</button></a>
      </div>
      <div class="dashboard-card">
        <i class="fas fa-chart-line card-icon"></i>
        <div class="card-details">
          <div class="card-title">Reports</div>
          <div class="card-description">
            Generate and view performance reports for your platform.
          </div>
        </div>
        <a href="reports.php"><button class="view-btn">View</button></a>
        
      </div>
    </div>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
