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
        			
        			x.onreadystatechange = function(){
 						if(x.readyState==4 && x.status==200){
 							document.getElementById('result').innerHTML = x.responseText;
 						};}

 					x.send(document.getElementById('body').value);
 			}
        		
        	</script>
        </head>
        <body>
        <input id='url' type='text' placeholder='url'>
        <input id='body' type='text' placeholder='body'/>
        <button value='POST' onclick='send();'>haha</button>
        <div id='result' style="border:1px solid; width:500px; height:500px;">
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

