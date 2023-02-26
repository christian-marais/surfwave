let boutonEdit=document.querySelector('.edit_produit');

boutonEdit.addEventListener('click',changer,false);

function changer(){

    document.querySelectorAll('.input').forEach(b=>b.removeAttribute('readonly'));
 
}