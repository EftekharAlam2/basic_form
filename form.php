<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <style>
    .step {
      max-width: 600px;
      margin: auto;

    }

    .form-group {
      margin-bottom: 20px;
    }

    label {
      font-weight: bold;
    }

    .custom-file-label::after {
      content: "Browse";
    }
  </style>
</head>
<body>
<div class="container mx-auto mt-1">
  <form id="myForm" action="process.php" method="post">
  <div class="card">
        <div class="card-body">
            <div id="step-1" class="step">
            <h4 class="card-title mb-4">Step 1: Personal Information</h4>

                <div class="form-group">
                <label for="fullName">Full Name:</label>
                <input type="text" id="fullName" name="fullName" class="form-control" required>
                </div>

                <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" class="form-control" required>
                </div>

                <div class="form-group">
                <label for="phoneNumber">Phone Number:</label>
                <input type="tel" id="phoneNumber" name="phoneNumber" class="form-control" required>
                </div>

                <div class="form-group">
                <label for="address">Address:</label>
                <textarea id="address" name="address" class="form-control" required></textarea>
                </div>

                <div class="form-group">
                <label for="profilePicture">Profile Picture:</label>
                <div class="custom-file">
                    <input type="file" id="profilePicture" name="profilePicture" class="custom-file-input" accept="image/*">
                    <label class="custom-file-label" for="profilePicture">Choose file</label>
                </div>
                </div>

                <div class="form-group">
                <label for="dob">Date of Birth:</label>
                <input type="date" id="dob" name="dob" class="form-control" required>
                </div>

                <div class="form-group">
                <label for="nationality">Nationality:</label>
                <input type="text" id="nationality" name="nationality" class="form-control" required>
                </div>

                <button type="button" class="btn btn-primary float-right next">Next</button>
            </div>
            <div id="step-2" class="step" style="display: none;">
                <h4 class="card-title mb-4">Step 2: Educational Information</h4>

                <div class="form-group">
                <label for="degreeEarned">Degree Earned:</label>
                <input type="text" id="degreeEarned" name="degreeEarned" class="form-control" required>
                </div>

                <div class="form-group">
                <label for="fieldOfStudy">Field of Study:</label>
                <input type="text" id="fieldOfStudy" name="fieldOfStudy" class="form-control" required>
                </div>

                <div class="form-group">
                <label for="instituteName">Institute Name:</label>
                <input type="text" id="instituteName" name="instituteName" class="form-control" required>
                </div>

                <div class="form-group">
                <label for="location">Location:</label>
                <input type="text" id="location" name="location" class="form-control" required>
                </div>

                <div class="form-group">
                <label for="cgpa">CGPA:</label>
                <input type="text" id="cgpa" name="cgpa" class="form-control" required>
                </div>

                <button type="button" class="btn btn-secondary float-left prev">Previous</button>
                <button type="button" class="btn btn-primary float-right next">Next</button>
            </div>
            <div id="step-3" class="step" style="display: none;">
                <h4 class="card-title mb-4">Step 3: Work Experience</h4>

                <div class="form-group">
                <label for="jobTitle">Job Title:</label>
                <input type="text" id="jobTitle" name="jobTitle" class="form-control" required>
                </div>

                <div class="form-group">
                <label for="companyName">Company Name:</label>
                <input type="text" id="companyName" name="companyName" class="form-control" required>
                </div>

                <div class="form-group">
                <label for="location">Location:</label>
                <input type="text" id="location" name="location" class="form-control" required>
                </div>

                <div class="form-group">
                <label for="employmentDates">Dates of Employment:</label>
                <input type="text" id="employmentDates" name="employmentDates" class="form-control" placeholder="e.g., MM/YYYY - MM/YYYY" required>
                </div>

                <div class="form-group">
                <label for="responsibilitiesAchievements">Responsibilities and Achievements:</label>
                <textarea id="responsibilitiesAchievements" name="responsibilitiesAchievements" class="form-control" required></textarea>
                </div>

                <div class="form-group">
                <label for="relevantSkills">Relevant Skills:</label>
                <input type="text" id="relevantSkills" name="relevantSkills" class="form-control" required>
                </div>

                <button type="button" class="btn btn-secondary float-left prev">Previous</button>
                <input type="submit" class="btn btn-success float-right" value="Submit">
            </div>
    </div>
    </div>
  </form>
</div>

  <script>
    $(document).ready(function() {
  $(".next").click(function() {
    var currentStep = $(this).closest('.step');
    currentStep.hide().next().show();
  });

  $(".prev").click(function() {
    var currentStep = $(this).closest('.step');
    currentStep.hide().prev().show();
  });

  $("#myForm").submit(function(e) {
    e.preventDefault(); 

    var formData = new FormData($(this)[0]);

    $.ajax({
      type: $(this).attr('method'),
      url: $(this).attr('action'),
      data: formData,
      contentType: false,
      processData: false,
      success: function(response) {
        $('#myForm')[0].reset();

        alert('CV submitted successfully!');

        $('.step').hide();
        $('#step-1').show();
      },
      error: function(error) {
        console.log(error);
        alert('Error submitting CV. Please try again.');
      }
    });
  });
});

  </script>
</body>
</html>
