<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>User Management - Future Vault</title>
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
        color: #333;
      }

      .header {
        background-color:rgb(255, 255, 255);
        padding: 10px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        color:rgb(36, 35, 35);
      }

      .header img {
        height: 50px;
      }

      .container {
        margin: 20px auto;
        max-width: 90%;
        background: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      }

      table {
        width: 100%;
        border-collapse: collapse;
        background:#fff;
      }

      th, td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd;
      }

      th {
        background-color:rgb(136, 180, 198);
        color: white;
      }

      .status-active {
        color: green;
        font-weight: bold;
      }

      .status-inactive {
        color: red;
        font-weight: bold;
      }

      .toggle-btn {
        background-color: #032d5a;
        color: white;
        border: none;
        padding: 5px 10px;
        border-radius: 5px;
        cursor: pointer;
        font-size: 0.9rem;
      }

      .toggle-btn:hover {
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
        <span>User Management</span>
      </div>
    </div>

    <!-- User Table -->
    <div class="container">
      <h2 class="mb-4">Manage Users</h2>
      <table>
        <thead>
          <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Total Memories</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>JohnDoe123</td>
            <td>johndoe@example.com</td>
            <td>15</td>
            <td class="status-active">Active</td>
            <td>
              <button class="toggle-btn" onclick="toggleStatus(this)">Deactivate</button>
            </td>
          </tr>
          <tr>
            <td>JaneSmith456</td>
            <td>janesmith@example.com</td>
            <td>8</td>
            <td class="status-inactive">Inactive</td>
            <td>
              <button class="toggle-btn" onclick="toggleStatus(this)">Activate</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <!-- JavaScript to toggle user status -->
    <script>
      function toggleStatus(button) {
        let row = button.parentElement.parentElement;
        let statusCell = row.children[3];

        if (statusCell.classList.contains("status-active")) {
          statusCell.classList.remove("status-active");
          statusCell.classList.add("status-inactive");
          statusCell.textContent = "Inactive";
          button.textContent = "Activate";
        } else {
          statusCell.classList.remove("status-inactive");
          statusCell.classList.add("status-active");
          statusCell.textContent = "Active";
          button.textContent = "Deactivate";
        }
      }
    </script>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
