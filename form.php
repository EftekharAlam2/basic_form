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
</head>
<body>

  <form id="myForm" action="process.php" method="post">
    <div id="step-1" class="step m-5">
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" class="form-control" required>
      <button type="button" class="btn btn-primary float-right next">Next</button>
    </div>
    <div id="step-2" class="step" style="display: none;">
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" class="form-control" required>
      <button type="button" class="btn btn-primary float-right next">Next</button>
      <button type="button" class="btn btn-secondary float-left prev">Previous</button>
    </div>
    <div id="step-3" class="step" style="display: none;">
      <label for="message">Message:</label>
      <textarea id="message" name="message" class="form-control" required></textarea>
      <button type="button" class="btn btn-secondary float-left prev">Previous</button>
      <input type="submit" class="btn btn-success float-right" value="Submit">
    </div>
  </form>

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

      $("#myForm").submit(function() {
        // You can perform actions before submitting the form
        // ...

        // Uncomment the line below to submit the form
        // $(this).submit();
      });
    });
  </script>
</body>
</html>
