<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name='csrf-token' content='{{ csrf_token() }}'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>SAMPLE</title>
</head>
<body class='main-content'>
    <div class='container-fluid'>    
        <div class='row mt-5'>
            <div class='col col-lg-12'>
                <form class='d-flex justify-content-center'  id='submit_mo' method='POST' action='/insert_bossing'>
                    @csrf
                    <input class='form-control'type='text' id='email' placeholder='Input text email...'> 
                    <input class='form-control'type='password' id='password' placeholder='Input text password...'> 
                    <input class='btn btn-success' type='submit' value='submit'> 
                </form>

                <ol class='container-fluid text-center display-mo mt-4' > 
                        <table class='table table-striped'>
                            <thead style='list-style:none' class='table-dark' >
                              <tr>
                                <th>Email</th>
                                <th>Password</th>
                              </tr>  
                            </thead>

                        @if(count($model))    
                        
                            <tbody>                               
                                        <tr>
                                            @foreach($model as $item)
                                                <td> {{$item->email}}</td>
                                                <td> {{$item->password}}</td>
                                            @endforeach
                                        </tr>  
                            </tbody>

                        @else

                            <tbody>
                                <tr>
                                    <td colspan='2'>No data found!</td>
                                </tr>
                            </tbody> 
                        @endif
                        </table>    
                        
                  
                </ol>
            </div>    

           
          
        </div>   
       
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    
    <script>
         $(document).ready(function(){

            $('#submit_mo').on('submit', function(e){
                e.preventDefault();

                var token = $('meta[name="csrf-token"]').attr('content');
                var email = $('#email').val();
                var password = $('#password').val();
                              
                  $.ajax({
                    url:'/insert_bossing',
                    type: 'POST',   
                    data: { email: email , password: password , _token: token },
                    success: function(res){
                        alert(res.message);
                    },
                    error: function(err){
                        if(err.readyState === 4){   
                            alert(JSON.parse(err.responseText)?.email || JSON.parse(err.responseText)?.password );
                        }
                        
                    },
                })	
            })
            
        })
    </script>
   
      
</body>
</html>