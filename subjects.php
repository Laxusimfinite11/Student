<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Subjects Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="subjects.css">
</head>
<body style="background-color: #024059;">

    <div class="container mt-5">
        <h2 class="text-center text-light">Student Subjects Dashboard</h2>
        <div class="card mt-4">
            <div class="card-body">
                <h4>Student Name: <span id="studentName">Lexical Analysis Taladro</span></h4>
                <h5>Student ID: <span id="studentID">1</span></h5>
                <h4 class="mt-4">Subjects</h4>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Subject Name</th>
                            <th>Subject Code</th>
                            <th>Instructor</th>
                            <th>Grading</th>
                        </tr>
                    </thead>
                    <tbody id="subjectsTable">
                        <tr>
                            <td>Advance Database</td>
                            <td>CS 9/L</td>
                            <td>Eric Rivera</td>
                            <td>
                                <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#addGradeModal">Add Grades</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <button class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#addSubjectModal">Add Subject</button>
            </div>
        </div>
    </div>

    <!-- add student modal dito -->
    <div class="modal fade" id="addSubjectModal" tabindex="-1" aria-labelledby="addSubjectModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addSubjectModalLabel">Add Subject</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addSubjectForm">
                        <div class="mb-3">
                            <label for="subjectName" class="form-label">Subject Name</label>
                            <input type="text" class="form-control" id="subjectName" required>
                        </div>
                        <div class="mb-3">
                            <label for="subjectCode" class="form-label">Subject Code</label>
                            <input type="text" class="form-control" id="subjectCode" required>
                        </div>
                        <div class="text-end">
                            <button type="button" class="btn btn-success" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#cautionSubjectModal">
                                Add Subject
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="cautionSubjectModal" tabindex="-1" aria-labelledby="cautionSubjectModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cautionSubjectModalLabel">Add Subject</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Enroll on this subject?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Confirm Enrollment</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!-- modal ng add grade -->
    <div class="modal fade" id="addGradeModal" tabindex="-1" aria-labelledby="addGradeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addGradeModalLabel">Add Grades</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addGradeForm">
                        <div class="mb-3">
                            <label for="gradeValue" class="form-label">Grade</label>
                            <input type="text" class="form-control" id="gradeValue" required>
                        </div>
                        <div class="text-end">
                            <button type="button" class="btn btn-success" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#cautionGradeModal">
                                Add Grade
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="cautionGradeModal" tabindex="-1" aria-labelledby="cautionGradeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cautionGradeModalLabel">Add Grade</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Add grade to this subject?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Confirm Grading</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

