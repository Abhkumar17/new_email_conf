<!DOCTYPE html>
<html>
<head>
    <title>Laravel JQuery UI Autocomplete Search Example - ItSolutionStuff.com</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <style>
      span.email-ids {
      float: left;
      /* padding: 4px; */
      border: 1px solid #ccc;
      margin-right: 5px;
      padding-left: 10px;
      padding-right: 10px;
      margin-bottom: 5px;
      background: #f5f5f5;
      padding-top: 3px;
      padding-bottom: 3px;
      border-radius: 5px;
  }
  span.cancel-email {
      border: 1px solid #ccc;
      width: 18px;
      display: block;
      float: right;
      text-align: center;
      margin-left: 20px;
      border-radius: 49%;
      height: 18px;
      line-height: 15px;
      margin-top: 1px;    cursor: pointer;
  }
  .col-sm-12.email-id-row {
      border: 1px solid #ccc;
  }
  .col-sm-12.email-id-row input {
      border: 0px; outline:0px;
  }
  span.to-input {
      display: block;
      float: left;
      padding-right: 11px;
  }
  .col-sm-12.email-id-row {
      padding-top: 6px;
      padding-bottom: 7px;
      margin-top: 23px;
  }

  .col-sm-12 {
    margin-left: 130px;
    width: 80%;
}
  </style>
</head>
<body>
     
<div class="col-sm-12 email-id-row">
  <span class="to-input">To</span>
     <div class="all-mail">
         
     </div>
      <input type="text" name="email" class="enter-mail-id typeahead form-control" id="search" placeholder="Email" />
</div><br><br><br><br>
<div class="col-sm-12 email-id-row">
  <span class="to-input">CC</span>
     <div class="all-mail_1">
         
     </div>
      <input type="text" name="email" class="enter-mail-id typeahead form-control" id="search_1" placeholder="Email" />
</div>

<div class="col-sm-12 email-id-row">
  <span class="to-input">BCC</span>
     <div class="all-mail_2">
         
     </div>
      <input type="text" name="email" class="enter-mail-id typeahead form-control search_2" id="email" placeholder="Email" />
</div>
<script type="text/javascript">
    let selectedEmails = [];
    var path = "{{ route('autocomplete') }}";
  
    $( "#search" ).autocomplete({
        source: function( request, response ) {
          $.ajax({
            url: path,
            type: 'GET',
            dataType: "json",
            data: {
               search: request.term
            },
            success: function( data ) {
               response( data );
            }
          });
        },
        select: function (event, ui) {
          // $('#search').val(ui.item.label);
          console.log(ui.item); 
          $(".all-mail").append(
              '<span class="email-ids">' +
                ui.item.value + 
                ' <span class="cancel-email">x</span></span>'
            );
            $(this).val("");
            selectedEmails.push(ui.item.value)
            console.log(selectedEmails)
           return false;
        }
      });
      $(document).on("click", ".cancel-email", function () {
        console.log($(this).parent().text().split(' ')[0])
        var index = selectedEmails.indexOf($(this).parent().text().split(' ')[0]);
        if (index !== -1) {
          selectedEmails.splice(index, 1);
        }
        console.log(selectedEmails)
  $(this).parent().remove();
});
</script>

<script type="text/javascript">
    let selectedEmails_2 = [];
    var path = "{{ route('autocomplete') }}";
  
    $( ".search_2" ).autocomplete({
        source: function( request, response ) {
          $.ajax({
            url: path,
            type: 'GET',
            dataType: "json",
            data: {
               search: request.term
            },
            success: function( data ) {
               response( data );
            }
          });
        },
        select: function (event, ui) {
          // $('#search_2').val(ui.item.label);
          console.log(ui.item); 
          $(".all-mail_2").append(
              '<span class="email-ids">' +
                ui.item.value + 
                ' <span class="cancel-email">x</span></span>'
            );
            $(this).val("");
            selectedEmails_2.push(ui.item.value)
            console.log(selectedEmails_2)
           return false;
        }
      });
      $(document).on("click", ".cancel-email", function () {
        console.log($(this).parent().text().split(' ')[0])
        var index = selectedEmails_2.indexOf($(this).parent().text().split(' ')[0]);
        if (index !== -1) {
          selectedEmails_2.splice(index, 1);
        }
        console.log(selectedEmails_2)
  $(this).parent().remove();
});
</script>

<script type="text/javascript">
    let selectedEmails_1 = [];
    var path = "{{ route('autocomplete') }}";
  
    $( "#search_1" ).autocomplete({
        source: function( request, response ) {
          $.ajax({
            url: path,
            type: 'GET',
            dataType: "json",
            data: {
               search: request.term
            },
            success: function( data ) {
               response( data );
            }
          });
        },
        select: function (event, ui) {
          // $('#search').val(ui.item.label);
          console.log(ui.item); 
          $(".all-mail_1").append(
              '<span class="email-ids">' +
                ui.item.value + 
                ' <span class="cancel-email">x</span></span>'
            );
            $(this).val("");
            selectedEmails_1.push(ui.item.value)
            console.log(selectedEmails_1)
           return false;
        }
      });
      $(document).on("click", ".cancel-email", function () {
        console.log($(this).parent().text().split(' ')[0])
        var index = selectedEmails_1.indexOf($(this).parent().text().split(' ')[0]);
        if (index !== -1) {
          selectedEmails_1.splice(index, 1);
        }
        console.log(selectedEmails_1)
  $(this).parent().remove();
});
</script>
<!-- <div class="col-sm-12 email-id-row">
                <span class="to-input">To</span>
                <div class="all-mail">
         
                </div>
                <input type="text" name="email_to" class="enter-mail-id typeahead form-control comp_mail search" id="email_to" placeholder="Email" />
</div> -->
</body>
</html>