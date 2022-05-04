(function ($) {
  $(".addPanier").click(function (event) {
    // si j'envoie un produit vers mon panier
    event.preventDefault(); // je ne fais pas l'action par défaut
    $.get(
      $(this).attr('href'),
      {},
      function (data) {
        if (data.error) {
          alert(data.message);
        } else {
          if (
            confirm(data.message + ". voulez vous consulter votre panier ? ")
          ) {
            location.href = "panier.php";
          }
        }
      },
      "json"
    );
    return false;
  });
})(jQuery);
