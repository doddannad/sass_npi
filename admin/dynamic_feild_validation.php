<!DOCTYPE html>

<html>
<head>
  <meta name="viewport" content="width=device-width" />
  <title>DynamicForm</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.js"></script>
  <style>
    .error {
      color: red;
    }
  </style>
  <script>
    $(document).ready(function () {

      var i = 1;
      var template = jQuery.validator.format($.trim($("#addChild").html()));
      $("#btnAdd").click(function (e) {
        $(template(i++)).appendTo("#employeeList");
        $('.netEmp').each(function () {
          $(this).rules("add", {
            required: true
          });
        });
        e.preventDefault();
      });

      $("#myForm").validate({
        rules: {
          Name: "required"
        }
      });
      
    });
  </script>

  <script type="text/html" id="addChild">
    <div class="form-group">
      <label class="col-md-4 control-label" for="textinput">Employee Name </label>
      <div class="col-md-4">
        <input id="FirstName-{0}" name="FirstName-{0}" type="text" placeholder="Enter Employee Name" class="netEmp form-control input-md ">
      </div>
    </div>
  </script>
  <script type="text/javascript">
   $(document).ready(function() {
    var numberIncr = 1;
    // used to increment the name for the inputs
    function addInput() {
      $('#inputs').append($('<input class="comment" name="name'+numberIncr+'" />'));
      numberIncr++;
    }

    $('form.commentForm').on('submit', function(event) {
      // adding rules for inputs with class 'comment'
      $('input.comment').each(function() {
        $(this).rules("add", 
        {
          required: true
        })
      });
      // prevent default submit action 
      event.preventDefault();
      // test if form is valid 
      if($('form.commentForm').validate().form()) {
        console.log("validates");
      } else {
        console.log("does not validate");
      }
    })
    // set handler for addInput button click
    $("#addInput").on('click', addInput);
    // initialize the validator
    $('form.commentForm').validate();
  });
</script>
</head>
<body>
  <div class="container">
    <div class="row">
      <form class="commentForm" method="get" action="">
        <div>
          <p id="inputs">    
            <input class="comment" name="name0" />
          </p>
          <input class="submit" type="submit" value="Submit" />
          <input type="button" value="add" id="addInput" />
        </div>
      </form>
    </div>
    <div class="row">
      <h1>Company Logo</h1>
      <div class="panel panel-primary">
        <div class="panel-heading">
          Create Employee
        </div>
        <div class="panel-body">
          <form class="form-horizontal" id="myForm">
            <div class="form-group">
              <label class="col-md-4 control-label" for="textinput">Employee Name </label>
              <div class="col-md-4">
                <input id="Name" name="Name" type="text" placeholder="Enter Employee Name" class="netEmp form-control input-md">
              </div>
              <div class="col-md-2">
               <button id="btnAdd" class="btn btn-primary"><i class="glyphicon glyphicon-plus glyphicon "></i> Add Employee</button>
             </div>
           </div>
           <br />
           <div id="employeeList"></div>
           <div class="form-group">
            <label class="col-md-4 control-label" for="button1id"></label>
            <div class="col-md-8">
              <button id="btnSubmit" type="submit" name="btnSubmit" class="btn btn-primary">Submit</button>
              <input id="btnReset" type="reset" name="btnReset" class="btn btn-info" value="Reset">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</body>
</html>