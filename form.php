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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
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
                <label for="dob">Date of Birth:</label>
                <input type="date" id="dob" name="dob" class="form-control" required>
                </div>

                <div class="form-group">
                <label for="coutry">Country:</label>
                <!-- <input type="text" id="nationality" name="nationality" class="form-control" required> -->
                <!-- <select id="countrySelect" name="country" class="form-control mt-2" onchange="fetchCities()">
                            
                </select> -->
                <input type="text" id="countryInput" class="form-control mt-2" placeholder="">
                </div>
                <div id="matchingCountries" class="mt-2"></div>

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
                <label for="city">City:</label>
                <!-- <input type="text" id="location" name="location" class="form-control" required> -->
                <select id="citySelect" name="city" class="form-control mt-2">
                            
                </select>
                </div>

                <div class="form-group">
                    <label for="cgpa">CGPA:</label>
                    <div>
                        <button type="button" class="btn btn-secondary cgpa-btn" data-value="lower">Lower than 3.00</button>
                        <button type="button" class="btn btn-secondary cgpa-btn" data-value="3.00-3.49">3.00-3.49</button>
                        <button type="button" class="btn btn-secondary cgpa-btn" data-value="higher">Higher than 3.5</button>
                    </div>
                    <div class="cgpa-inputs" style="display: none;">
                        <!-- <input type="text" id="cgpa" name="cgpa" class="form-control mt-2 cgpa" placeholder="Enter the reason for the result" required> -->
                        <select id="cgpaSelect" name="cgpaSelect" class="form-control mt-2 cgpaSelect">
                            
                        </select>
                    </div>
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
      $(".cgpa-btn").click(function () {
            var value = $(this).data("value");
            $(".cgpa-inputs").hide();
            
            if (value === "lower" ) {
                $("#cgpa").parent().show();
                $("#cgpaSelect").hide();
            } else if (value === "higher") {
              $("#cgpa").hide();
              $("#cgpaSelect").show();
                $.ajax({
                    type: "GET",
                    url: "getSkills.php", 
                    dataType: "json",
                    success: function (response) {
                        if (response.success) {
                            var select = $("#cgpaSelect");
                            select.empty();
                            $.each(response.skills, function (index, skill) {
                                select.append($("<option>").text(skill).val(skill));
                            });
                            select.parent().show();
                        } else {
                            alert('Failed to retrieve skills data.');
                        }
                    },
                    error: function (error) {
                        console.log(error);
                        alert('Error retrieving skills data.');
                    }
                });
            }
        });
        $.ajax({
            type: "GET",
            url: "getCountry.php", 
            dataType: "json",
            success: function (response) {
                if (response.success) {
                    // var select = $("#countrySelect");
                    var inputField = $("#countryInput"); 
                    select.empty();
                    // var uniqueCountries = {};

                    // $.each(response.country, function (index, country_name) {
                    //     if (!uniqueCountries[country_name]) {
                    //         select.append($("<option>").text(country_name).val(country_name));
                    //         uniqueCountries[country_name] = true;
                    //     }
                    // })
                   
                } else {
                    alert('Failed to retrieve country data.');
                }
            },
            error: function (error) {
                console.log(error);
                alert('Error retrieving country data.');
            }
        });

        var inputField = $("#countryInput");
    var matchingCountriesDiv = $("#matchingCountries");

    inputField.on("input", function() {
        var inputText = $(this).val();

        if (inputText.length >= 3) {
            $.ajax({
                type: "GET",
                url: "getMatchingCountries.php",
                dataType: "json",
                data: { inputText: inputText },
                success: function(response) {
                    if (response.success) {
                        displayMatchingCountries(response.matchingCountries);
                    } else {
                        alert('Failed to retrieve matching countries data.');
                        clearInputField();
                    }
                },
                error: function(error) {
                    console.log(error);
                    alert('Error retrieving matching countries data.');
                    clearInputField();
                }
            });
        } else {
            matchingCountriesDiv.empty(); // Clear matching countries if input length is less than 3
        }
    });

    function displayMatchingCountries(matchingCountries) {
        matchingCountriesDiv.empty();

        if (matchingCountries.length > 0) {
            var ul = $("<ul>").addClass("list-group");
            $.each(matchingCountries, function(index, country) {
                ul.append($("<li>").addClass("list-group-item").text(country));
            });
            matchingCountriesDiv.append(ul);
        } else {
            matchingCountriesDiv.text("No matching countries found.");
            clearInputField();
        }
    }

    function clearInputField() {
        inputField.val("");
    }

    //     $("#countryInput").on("input", function() {
    //     var inputText = $(this).val();

    //     $.ajax({
    //         type: "GET",
    //         url: "getMatchingCountries.php", 
    //         dataType: "json",
    //         data: { inputText: inputText },
    //         success: function(response) {
    //             if (response.success) {
    //                 displayMatchingCountries(response.matchingCountries);
    //             } else {
    //                 alert('Failed to retrieve matching countries data.');
    //             }
    //         },
    //         error: function(error) {
    //             console.log(error);
    //             alert('Error retrieving matching countries data.');
    //         }
    //     });
    // });

    // function displayMatchingCountries(matchingCountries) {
    //     var matchingCountriesDiv = $("#matchingCountries");
    //     matchingCountriesDiv.empty();

    //     if (matchingCountries.length > 0) {
    //         var ul = $("<ul>").addClass("list-group");
    //         $.each(matchingCountries, function(index, country) {
    //             ul.append($("<li>").addClass("list-group-item").text(country));
    //         });
    //         matchingCountriesDiv.append(ul);
    //     } else {
    //         matchingCountriesDiv.text("No matching countries found.");
    //     }
    // }

        function fetchCities() {
            var selectedCountry = $("#countrySelect").val();

            $.ajax({
                type: "GET",
                url: "getCity.php",
                dataType: "json",
                data: { country: selectedCountry }, // Pass the selected country to the server
                success: function (response) {
                    if (response.success) {
                        var select = $("#citySelect");
                        select.empty();
                        $.each(response.city, function (index, city_name) {
                            select.append($("<option>").text(city_name).val(city_name));
                        });
                    } else {
                        alert('Failed to retrieve city data.');
                    }
                },
                error: function (error) {
                    console.log(error);
                    alert('Error retrieving city data.');
                }
            });
        }

        $("#countrySelect").change(function () {
        var selectedCountry = $(this).val();
        fetchCities(selectedCountry);
        });


      $(".next").click(function() {
        var currentStep = $(this).closest('.step');
        if (validateStep(currentStep)) {
          currentStep.hide().next().show();
        }
      });

      $(".prev").click(function() {
        var currentStep = $(this).closest('.step');
        currentStep.hide().prev().show();
      });

      $("#myForm").submit(function(e) {
        e.preventDefault();

        if (validateForm()) {
          var formData = new FormData($(this)[0]);

        //   var cgpaValue = $(".cgpa-btn.active").data("value");

        // if (cgpaValue === "lower" || cgpaValue === "3.00-3.49") {
        //     // For "lower" or "3.00-3.49", send data from the input field
        //     formData.append('cgpa', $("#cgpa").val());
        // } else if (cgpaValue === "higher") {
        //     // For "higher", send data from the select field
        //     formData.append('cgpa', $("#cgpaSelect").val());
        // }

        formData.append('cgpa', $("#cgpaSelect").val());
        formData.append('country', $("#countrySelect").val());
        formData.append('city', $("#citySelect").val());

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
        }
      });

    function validateStep(step) {
   var valid = true;

  step.find(".form-control").each(function() {
    var input = $(this);
    var value = input.val().trim();

    if (input.prop('required') && value === '') {
      alert('Please fill in all required fields.');
      valid = false;
      return false;
    }

    if (input.attr('name') === 'fullName') {
      if (!/^[a-zA-Z ]+$/.test(value)) {
        alert('Invalid name format: ' + value);
        valid = false;
        return false;
      }
    }

    if (input.attr('name') === 'phoneNumber') {
      if (!/^\d+$/.test(value)) {
        alert('Invalid phone number format. Please enter only numeric characters.');
        valid = false;
        return false;
      }

      if (value.length > 12) {
        alert('Phone number cannot be more than 12 digits.');
        valid = false;
        return false;
      }
    }

    if (input.attr('name') === 'email') {
      if (!/^[^0-9]*[a-zA-Z0-9._-]*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/.test(value)) {
        alert('Invalid email format: ' + value);
        valid = false;
        return false;
      }
      // Add existing email check if needed
    }

    if (input.attr('name') === 'dob') {
      var dateRegex = /^\d{4}-\d{2}-\d{2}$/;
      if (!dateRegex.test(value)) {
        alert('Invalid Date of Birth format: ' + value);
        valid = false;
        return false;
      }

      var dateTime = new Date(value);
      if (isNaN(dateTime.getTime())) {
        alert('Invalid Date of Birth format: ' + value);
        valid = false;
        return false;
      }
    }

  });

  return valid;
}


      function validateForm() {
        var valid = true;

        $(".step").each(function() {
          if (!validateStep($(this))) {
            valid = false;
            return false;
          }
        });

        return valid;
      }
    });
  </script>
</body>
</html>