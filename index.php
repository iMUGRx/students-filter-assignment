<?php require_once "students_filter.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>All Students</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      font-family: Arial;
      background: #f4f6fb;
      padding: 20px
    }

    .box {
      background: #fff;
      padding: 15px;
      border-radius: 10px;
      box-shadow: 0 4px 14px rgba(0, 0, 0, .08)
    }

    h2 {
      margin-top: 0
    }

    .filters {
      display: flex;
      gap: 10px;
      flex-wrap: wrap;
      align-items: center;
      margin-bottom: 10px
    }

    select,
    input {
      padding: 8px;
      border-radius: 6px;
      border: 1px solid #ccc
    }

    button {
      padding: 8px 12px;
      border-radius: 6px;
      border: 0;
      cursor: pointer;
      background: #1d332f;
      color: #fff
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 10px
    }

    th,
    td {
      padding: 8px;
      border: 1px solid #ccc;
      text-align: left
    }

    th {
      background: #eee
    }

    .count {
      margin-top: 8px;
      font-weight: bold
    }

    .cards {
      display: flex;
      gap: 10px;
      flex-wrap: wrap;
      margin: 10px 0
    }

    .card {
      background: #fafafa;
      border: 1px solid #e6e6e6;
      padding: 10px;
      border-radius: 8px;
      min-width: 180px
    }

    .muted {
      color: #666;
      font-size: 13px
    }
  </style>
</head>

<body>

  <div class="box">
    <h2>All Students</h2>

    <form method="GET" class="filters">
      <label class="muted">Department:</label>
      <select name="department">
        <option value="">All Departments</option>
        <?php foreach ($departments as $dep): ?>
          <option value="<?= htmlspecialchars($dep) ?>" <?= ($dep === $selectedDepartment) ? "selected" : "" ?>>
            <?= htmlspecialchars($dep) ?>
          </option>
        <?php endforeach; ?>
      </select>

      <label class="muted">Search:</label>
      <input type="text" name="q" value="<?= htmlspecialchars($q) ?>" placeholder="Search by name or student number">

      <button type="submit">Apply</button>

      <a href="index.php" style="text-decoration:none;">
        <button type="button" onclick="window.location='index.php'">Reset</button>
      </a>

    </form>

    <div class="cards">
      <div class="card">
        <div class="muted">Total (All)</div>
        <div style="font-size:18px;font-weight:bold;"><?= (int)$allTotal ?></div>
      </div>

      <?php foreach ($deptCounts as $d): ?>
        <div class="card">
          <div class="muted"><?= htmlspecialchars($d["department"]) ?></div>
          <div style="font-size:18px;font-weight:bold;"><?= (int)$d["total"] ?></div>
        </div>
      <?php endforeach; ?>
    </div>
    <form method="POST" onsubmit="return confirm('Are you sure you want to delete all records?');">
      <button type="submit" name="delete_all" style="background:red;color:white;padding:8px 14px;border:none;border-radius:6px;">
        Delete All Records
      </button>
    </form>

    <table>
      <thead>
        <tr>
          <th>Student Number</th>
          <th>Full Name</th>
          <th>Email</th>
          <th>Department</th>
        </tr>
      </thead>
      <tbody>
        <?php if ($totalStudents): foreach ($students as $s): ?>
            <tr>
              <td><?= htmlspecialchars($s["student_number"]) ?></td>
              <td><?= htmlspecialchars($s["full_name"]) ?></td>
              <td><?= htmlspecialchars($s["email"]) ?></td>
              <td><?= htmlspecialchars($s["department"]) ?></td>
            </tr>
          <?php endforeach;
        else: ?>
          <tr>
            <td colspan="4">No students found</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>

    <div class="count">
      Showing: <?= (int)$totalStudents ?> student(s)
      <?php if ($selectedDepartment !== ""): ?>
        | Department: <?= htmlspecialchars($selectedDepartment) ?>
      <?php endif; ?>
      <?php if ($q !== ""): ?>
        | Search: "<?= htmlspecialchars($q) ?>"
      <?php endif; ?>
    </div>
  </div>

</body>

</html>

<?php $conn->close(); ?>