<?php
require_once "db.php";

$departments = [];
$depResult = $conn->query("
  SELECT DISTINCT department
  FROM students
  WHERE department IS NOT NULL AND department <> ''
  ORDER BY department
");
if ($depResult) {
  while ($row = $depResult->fetch_assoc()) {
    $departments[] = $row["department"];
  }
}

$deptCounts = [];
$countResult = $conn->query("
  SELECT department, COUNT(*) AS total
  FROM students
  WHERE department IS NOT NULL AND department <> ''
  GROUP BY department
  ORDER BY department
");
if ($countResult) {
  while ($row = $countResult->fetch_assoc()) {
    $deptCounts[] = $row; 
  }
}

$selectedDepartment = trim($_GET["department"] ?? "");
$q = trim($_GET["q"] ?? ""); 

$students = [];

$sql = "
  SELECT id, student_number, full_name, email, department
  FROM students
  WHERE 1=1
";
$params = [];
$types  = "";

if ($selectedDepartment !== "") {
  $sql .= " AND department = ? ";
  $params[] = $selectedDepartment;
  $types .= "s";
}

if ($q !== "") {
  $sql .= " AND (full_name LIKE ? OR student_number LIKE ?) ";
  $like = "%" . $q . "%";
  $params[] = $like;
  $params[] = $like;
  $types .= "ss";
}

$sql .= " ORDER BY full_name ";

if (!empty($params)) {
  $stmt = $conn->prepare($sql);
  $stmt->bind_param($types, ...$params);
  $stmt->execute();
  $result = $stmt->get_result();
} else {
  $result = $conn->query($sql);
}

if ($result) {
  while ($row = $result->fetch_assoc()) {
    $students[] = $row;
  }
}

$totalStudents = count($students);

$allTotal = 0;
$allTotalRes = $conn->query("SELECT COUNT(*) AS total FROM students");
if ($allTotalRes) {
  $allTotal = (int)($allTotalRes->fetch_assoc()["total"] ?? 0);
}
