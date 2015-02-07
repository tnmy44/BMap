<?php 
/*

Controller for / requets

*/

namespace Controllers;

class HomeController {
    
    
    
    public function get()
    {
        
        ?>
        <html>
        <head>
        	<script>
        		function send(){
        			document.getElementById('result').innerHTML = 'start';
        			var x = new XMLHttpRequest();
        			x.open("POST",document.getElementById('url').value,true);
                    x.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        			
        			x.onreadystatechange = function(){
 						if(x.readyState==4 && x.status==200){
 							document.getElementById('result').innerHTML = x.responseText;
 						};}

 					x.send(document.getElementById('body').value);
 			}
        		
        	</script>
        </head>
        <body>
        <input id='url' type='text' placeholder='url' value='login/'>
        <input id='body' type='text' placeholder='body' value='username=tnmy44&password=daddy'>
        <button value='POST' onclick='send();'>haha</button>
        <div id='result' style="border:1px solid; width:500px; height:200px;">
        </div>
        <div id='result' style="border:1px solid; width:500px; height:200px;">
        <?php
        
        var_dump($_SESSION);
        ?>
        </div>
        </body>
        </html>
        <?php
    }


	public function post()
	{
		echo(file_get_contents('php://input'));
	}

}
?>

