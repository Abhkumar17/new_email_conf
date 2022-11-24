<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajax</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</head>
<body>
   <section >
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Show Student Record
                                <a href="#">
                                    <button type="submit" class="btn btn-info offset-8" data-toggle="modal" data-target="#studentModal">Add Student</button>
                                </a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-stripped" id="stu_tb_id">
                                <thead>
                                  <tr>
                                    {{-- <th>ID</th> --}}
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach($students as $student)
                                    <tr>
                                        {{-- <td>{{$student->id}}</td> --}}
                                        <td>{{$student->firstname}}</td>
                                        <td>{{$student->lastname}}</td>
                                        <td>{{$student->email}}</td>
                                        <td>{{$student->phone}}</td>
                                        <td><a href="" class="btn btn-info" data-toggle="modal" data-target="#studentEditModal">Edit</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </section>
  <!-- Add Student Modal -->
  <div class="modal fade" id="studentModal" tabindex="-1" aria-labelledby="studentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="studentModalLabel">Add Record</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="" id="stform">
            @csrf
            <div class="form-group">
                <label for="first-name">First Name</label>
                <input type="text" value="" name="firstname" id="firstname" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="last-name">Last Name</label>
                <input type="text" value="" name="lastname" id="lastname" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="email">Email </label>
                <input type="email" value="" name="email" id="email" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="phone">Phone </label>
                <input type="text" value="" name="phone" id="phone" class="form-control" required>
              </div>
              <button type="submit" value="" class="btn btn-primary" id="btn-submit" >Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- End Add Student Modal -->
  <!-- End Edit Student Modal -->
  <div class="modal fade" id="studentEditModal" tabindex="-1" aria-labelledby="studentEditModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="studentEditModalLabel">Add Record</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="" id="stEditform">
            @csrf
            <div class="form-group">
                <label for="first-name">First Name</label>
                <input type="text" value="" name="firstname" id="firstname_edit" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="last-name">Last Name</label>
                <input type="text" value="" name="lastname" id="lastname_edit" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="email">Email </label>
                <input type="email" value="" name="email" id="email_edit" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="phone">Phone </label>
                <input type="text" value="" name="phone" id="phone_edit" class="form-control" required>
              </div>
              <button type="submit" value="" class="btn btn-primary" id="btn-submit" >Upadate</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script>
    $("#stform").submit(function(e){
        e.preventDefault();
        let firstname = $("#firstname").val();
        let lastname = $("#lastname").val();
        let email = $("#email").val();
        let phone = $("#phone").val();
        let _token = $("input[name=_token]").val();

        $.ajax({
          url:"{{route('student')}}",
          type:"POST",
          data:{
            firstname:firstname,
            lastname:lastname,
            email:email,
            phone:phone,
            _token:_token
          },
          success:function(response){
            if (response) {
                $('tbody').prepend(
                    '<tr>'+
                    '<td>'+response.firstname+'</td>'+
                    '<td>'+response.lastname+'</td>'+
                    '<td>'+response.email+'</td>'+
                    '<td>'+response.phone+'</td>'+
                    '</tr>');                
                $("#stform")[0].reset();
                $("#studentModal").modal('hide');
            }
          }
        });
    });

    <script>
    $("#stEditform").submit(function(e){
        e.preventDefault();
        let firstname = $("#firstname_edit").val();
        let lastname = $("#lastname_edit").val();
        let email = $("#email_edit").val();
        let phone = $("#phone_edit").val();
        let _token = $("input[name=_token]").val();

        $.ajax({
          url:"{{route('student')}}",
          type:"POST",
          data:{
            firstname:firstname,
            lastname:lastname,
            email:email,
            phone:phone,
            _token:_token
          },
          success:function(response){
            // if (response) {
            //     $('tbody').prepend(
            //         '<tr>'+
            //         '<td>'+response.firstname+'</td>'+
            //         '<td>'+response.lastname+'</td>'+
            //         '<td>'+response.email+'</td>'+
            //         '<td>'+response.phone+'</td>'+
            //         '</tr>');                
            //     $("#stform")[0].reset();
            //     $("#studentModal").modal('hide');
            // }
          }
        });
    });
  </script>
</body>
</html>