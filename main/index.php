<?php
include 'db.php'; // Include the database connection file

// Fetch student data if POST request is made
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $result = $conn->query("SELECT * FROM students");

  while ($row = $result->fetch_assoc()) {
    $total_sdam = $row["sdam_mse"] * 0.3 + $row["sdam_ese"] * 0.7;
    $total_daa = $row["daa_mse"] * 0.3 + $row["daa_ese"] * 0.7;
    $total_dbms = $row["dbms_mse"] * 0.3 + $row["dbms_ese"] * 0.7;
    $total_os = $row["os_mse"] * 0.3 + $row["os_ese"] * 0.7;
    echo "<tr>
            <td>{$row['name']}</td>
            <td>{$total_sdam}</td>
            <td>{$total_daa}</td>
            <td>{$total_dbms}</td>
            <td>{$total_os}</td>
            <td>
              <button class='btn btn-warning btn-sm' onclick='editResult({$row['id']}, \"{$row['name']}\", {$row['sdam_mse']}, {$row['sdam_ese']}, {$row['daa_mse']}, {$row['daa_ese']}, {$row['dbms_mse']}, {$row['dbms_ese']}, {$row['os_mse']}, {$row['os_ese']})'>Edit</button>
              <button class='btn btn-danger btn-sm' onclick='deleteResult({$row['id']})'>Delete</button>
            </td>
          </tr>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>VIT Student Results</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="container mt-4">
  <h2 class="mb-4">VIT Semester Result Portal</h2>

  <!-- Form to Add/Update Results -->
  <form id="resultForm">
    <div class="mb-2">
      <input type="hidden" id="studentId" />
      <input type="text" id="name" placeholder="Student Name" class="form-control" required />
    </div>

    <div class="row mb-2">
      <div class="col">SDAM MSE <input type="number" id="sdam_mse" class="form-control" /></div>
      <div class="col">SDAM ESE <input type="number" id="sdam_ese" class="form-control" /></div>
    </div>
    <div class="row mb-2">
      <div class="col">DAA MSE <input type="number" id="daa_mse" class="form-control" /></div>
      <div class="col">DAA ESE <input type="number" id="daa_ese" class="form-control" /></div>
    </div>
    <div class="row mb-2">
      <div class="col">DBMS MSE <input type="number" id="dbms_mse" class="form-control" /></div>
      <div class="col">DBMS ESE <input type="number" id="dbms_ese" class="form-control" /></div>
    </div>
    <div class="row mb-2">
      <div class="col">OS MSE <input type="number" id="os_mse" class="form-control" /></div>
      <div class="col">OS ESE <input type="number" id="os_ese" class="form-control" /></div>
    </div>

    <button type="submit" class="btn btn-success">Submit</button>
    <button type="reset" class="btn btn-secondary" id="cancelBtn">Cancel</button>
  </form>

  <button id="fetchBtn" class="btn btn-primary mt-4" action="fench">Fetch Results</button>

  <hr />

  <table class="table table-bordered mt-4">
    <thead>
      <tr>
        <th>Name</th>
        <th>SDAM</th>
        <th>DAA</th>
        <th>DBMS</th>
        <th>OS</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody id="resultTable"></tbody>
  </table>

  <script>
    // Function to fetch results from the database
    function loadResults() {
      $.post("index.php", function (data) {
        $("#resultTable").html(data);
      });
    }

    // Fetch the results when the "Fetch" button is clicked
    $("#fetchBtn").click(function() {
      loadResults();
    });

    // Submit form (add or update result)
    $("#resultForm").submit(function (e) {
      e.preventDefault();
      const id = $("#studentId").val();
      const url = id ? "update.php" : "insert.php";
      $.post(url, {
        id,
        name: $("#name").val(),
        sdam: [$("#sdam_mse").val(), $("#sdam_ese").val()],
        daa: [$("#daa_mse").val(), $("#daa_ese").val()],
        dbms: [$("#dbms_mse").val(), $("#dbms_ese").val()],
        os: [$("#os_mse").val(), $("#os_ese").val()]
      }, function () {
        loadResults();
        $("#resultForm")[0].reset();
        $("#studentId").val("");
      });
    });

    // Function to edit a result
    function editResult(id, name, m1, m2, p1, p2, d1, d2, o1, o2) {
      $("#studentId").val(id);
      $("#name").val(name);
      $("#sdam_mse").val(m1);
      $("#sdam_ese").val(m2);
      $("#daa_mse").val(p1);
      $("#daa_ese").val(p2);
      $("#dbms_mse").val(d1);
      $("#dbms_ese").val(d2);
      $("#os_mse").val(o1);
      $("#os_ese").val(o2);
    }

    // Function to delete a result
    function deleteResult(id) {
      if (confirm("Delete this student?")) {
        $.post("delete.php", { id }, function () {
          loadResults();
        });
      }
    }

    // Initially load results when the page is ready
    $(document).ready(function () {
      loadResults();
    });
  </script>
</body>
</html>
