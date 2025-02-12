<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Seller Management</title>
    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <style>
       * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      flex-direction:column;
    }
      body {
        background: url('./download\ \(1\).jpg') no-repeat center center/cover;
        color: #333;
        font-family: Arial, sans-serif;
      }
      .container-box {
        background-color: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        margin-top: 30px;
      }
      .btn-custom {
        background-color: #032d5a;
        color: white;
        border: none;
        padding: 8px 15px;
        border-radius: 5px;
        font-size: 0.9rem;
        cursor: pointer;
      }
      .btn-custom:hover {
        background-color: #054080;
      }
      .product-link {
        color: #032d5a;
        cursor: pointer;
        text-decoration: underline;
      }
      .product-link:hover {
        color: #054080;
      }
      .status-active {
        color: green;
        font-weight: bold;
      }
      .status-inactive {
        color: red;
        font-weight: bold;
      }
      /* Modal Styles */
      .modal-body {
        max-height: 400px;
        overflow-y: auto;
      }
    </style>
  </head>
  <body>
    <div class="container mt-3">
      <div class="container-box">
        <h2 class="text-center">Seller Management</h2>

        <!-- Button for CSV Export -->
        <button class="btn-custom mb-2" onclick="exportCSV()">Export CSV</button>

        <!-- Table -->
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead class="table-dark">
              <tr>
                <th>S.NO</th>
                <th>Seller Name</th>
                <th>Email</th>
                <th>Total Products</th>
                <th>Shop Link</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <!-- Row 1 -->
              <tr>
                <td>1</td>
                <td>ShopWithMe</td>
                <td>shopwithme@example.com</td>
                <td><span class="product-link" onclick="showProducts('ShopWithMe')">35</span></td>
                <td><a href="https://shopwithme.com" target="_blank">Visit</a></td>
                <td class="status-active">Active</td>
                <td><button class="btn btn-danger btn-sm" onclick="toggleStatus(this)">Deactivate</button></td>
              </tr>
              <!-- Row 2 -->
              <tr>
                <td>2</td>
                <td>GiftsWorld</td>
                <td>giftsworld@example.com</td>
                <td><span class="product-link" onclick="showProducts('GiftsWorld')">20</span></td>
                <td><a href="https://giftsworld.com" target="_blank">Visit</a></td>
                <td class="status-inactive">Inactive</td>
                <td><button class="btn btn-success btn-sm" onclick="toggleStatus(this)">Activate</button></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- Modal for showing product list -->
    <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="productModalLabel">Products of <span id="sellerName"></span></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <ul id="productList" class="list-group">
              <!-- Product items will be dynamically added here -->
            </ul>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
      const productsData = {
        'ShopWithMe': [
          'Product 1 - Description',
          'Product 2 - Description',
          'Product 3 - Description',
          'Product 4 - Description',
          'Product 5 - Description',
        ],
        'GiftsWorld': [
          'Gift 1 - Description',
          'Gift 2 - Description',
          'Gift 3 - Description',
          'Gift 4 - Description',
        ],
      };

      // Function to show products when clicking on product link
      function showProducts(seller) {
        const productList = productsData[seller];
        const productListElement = document.getElementById('productList');
        const sellerName = document.getElementById('sellerName');
        
        sellerName.textContent = seller;
        productListElement.innerHTML = '';

        if (productList && productList.length > 0) {
          productList.forEach(product => {
            const listItem = document.createElement('li');
            listItem.classList.add('list-group-item');
            listItem.textContent = product;
            productListElement.appendChild(listItem);
          });
        } else {
          const listItem = document.createElement('li');
          listItem.classList.add('list-group-item');
          listItem.textContent = 'No products available.';
          productListElement.appendChild(listItem);
        }

        // Show modal
        const productModal = new bootstrap.Modal(document.getElementById('productModal'));
        productModal.show();
      }

      // Function to toggle seller status (activate/deactivate)
      function toggleStatus(button) {
        const statusCell = button.closest('tr').querySelector('td:nth-child(6)');
        if (statusCell.classList.contains('status-active')) {
          statusCell.classList.remove('status-active');
          statusCell.classList.add('status-inactive');
          statusCell.textContent = 'Inactive';
          button.textContent = 'Activate';
        } else {
          statusCell.classList.remove('status-inactive');
          statusCell.classList.add('status-active');
          statusCell.textContent = 'Active';
          button.textContent = 'Deactivate';
        }
      }

      // Export CSV function (placeholder)
      function exportCSV() {
        alert('Exporting CSV...');
      }
    </script>
  </body>
</html>
