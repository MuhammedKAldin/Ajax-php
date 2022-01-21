<html>
    <head>
        <title>Ajax using Php </title>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    </head>
    <body style='background-color:black;color:lightblue;font-family:monospace;'>
       <H1 id='result' >AJAX</H1>
        <form  id="register_form" action='submit.php' method='post' >
            <?php session_start(); ?>
            <?php  if(isset($_SESSION['name_error'])): ?>
                <strong style='color:pink;' > <?= '"'.$_SESSION['name_error'] ?>"  not correct name</strong> </br>    
            <?php endif; ?>
            <?php if(isset($_SESSION['name_success'])):   ?> 
                <strong style='color:lightgreen;' > <?= $_SESSION['name_success'] ?> </strong> </br>    
            <?php endif; ?>
            <?php 
            // reset session validation messeges
            session_destroy();
            ?>
            <label style='font-size:21'>Name :</label></br>
            <input name='name' type='text' /></br></br>
            <button onclick="myFunction(); return false;" type='submit' style='width:100px;height:30px;'>Send</button>
        </form>            
        <script>
            // Function that do the request , u can do it via button
            $(document).ready(function() {
                $("button").click(function() {
                    
                });
            })
                

               

            
        </script> 
    </body>
</html>