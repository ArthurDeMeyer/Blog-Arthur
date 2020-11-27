

<!-- <form class="form-article" method="post" action="addarticle">
  <div class="form-group">
    <label for="">Title</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Title">
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Description</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Description"></textarea>
  </div>
  <div class="form-group">
  <div class="form-group">
    <label for="exampleFormControlFile1">Image</label>
    <input type="file" class="form-control-file" id="exampleFormControlFile1">
  </div>
   
  </div>
  <button type="submit" class="btn btn-warning button-add">Partagez</button>
  </form>


<img src="https://www.brassart.fr/data/trainings/53/picture.1570007820.jpg" class="img1" alt="img1">
<img src="https://www.brassart.fr/data/trainings/53/picture.1570007820.jpg" alt="img2">-->
<img src="https://www.brassart.fr/data/trainings/53/picture.1570007820.jpg" class="img1" alt="img1">
<img src="https://www.brassart.fr/data/trainings/53/picture.1570007820.jpg" alt="img2">
<div class ="form-add">
   <form class="form-article" action="" method="POST" enctype="multipart/form-data"> 
      <p>Titre de l'article: <input type="text" name="titre" /></p> 
      <p>Commentaire: <br /><textarea class="form-control" name="commentaire" rows="4" cols="15"></textarea></p> 
      <input class="form-control" type="hidden" name="MAX_FILE_SIZE" value="2097152"> 
      <p>Choisissez une photo.</p> 
      <input class="form-control-file" type="file" name="photo"> 
      <br /><br /> 
      <button class ="btn btn-warning" type="submit" name="" value="Envoyer">valider</button>
      
   </form> 
   <br /> 
   <a href="<?= $router->generate('main-home'); ?>" class="return-home">RETOUR A L'ACCUEIL</a> 

   </div>