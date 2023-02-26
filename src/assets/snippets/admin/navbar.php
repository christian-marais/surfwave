
<nav class="navbar navbar-expand-lg navbar-dark">
   <div class="container">
      <a class="navbar-brand" href="<?=HTTPS?>://<?=$_SERVER['HTTP_HOST']?>"><img src="/images/banque/img/logo.png" alt="logo"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
     </button>

      <div class="collapse navbar-collapse" id="navbarsExample07">
         <ul class="navbar-nav mr-auto">

            <li class="nav-item">
               <a class="nav-link" href="<?=HTTPS?>://<?=$_SERVER['HTTP_HOST']?>/admin">Menu</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="<?=HTTPS?>://<?=$_SERVER['HTTP_HOST']?>/admin/equipiers">Equipiers</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="<?=HTTPS?>://<?=$_SERVER['HTTP_HOST']?>/admin/produits">Produits</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="<?=HTTPS?>://<?=$_SERVER['HTTP_HOST']?>/admin/categories">Catégories</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="<?=HTTPS?>://<?=$_SERVER['HTTP_HOST']?>/admin/galerie">Galerie</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="<?=HTTPS?>://<?=$_SERVER['HTTP_HOST']?>/admin/slider">Slider</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="<?=HTTPS?>://<?=$_SERVER['HTTP_HOST']?>/admin/locations">Locations</a>
            </li>

         </ul>
         <form class="form-inline my-2 my-md-0">
            <input class="form-control" type="text" placeholder="Recherche" aria-label="Search">
         </form>
         <a href="<?=HTTPS?>://<?=$_SERVER['HTTP_HOST']?>/utilisateurs/logout" type="button" class="btn">Deconnexion</a>
      </div>
   </div>
</nav>
