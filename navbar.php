    <!--*****************NAVBAR*****************-->
     <nav class="navbar navbar-expand-lg navbar-light bg-light"> 
    	<a class="navbar-brand" href="#haut">
    		<img src="img/logodax.png"></a> <div class="navbarh1"><h1>Test -Salles de Travail - Salle <?php echo $salle?></h1></div>
    	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      		<span class="navbar-toggler-icon"></span>
    	</button>
    
   		<div class="collapse navbar-collapse" id="navbarSupportedContent">
       <ul class="navbar-nav ml-auto">
            
            <a href="tableaux.php?salle=<?php echo $salle?>" style="margin-left:15px">
                <img src="img/liste.png" width="40px" height="40px"></a>
            </li>
            <a href="graphs.php?salle=<?php echo $salle?>" style="margin-left:15px">
                <img src="img/graph.png" width="40px" height="40px"></a>
            </li>     
          </ul> 		  
  		</div>
    </nav>
