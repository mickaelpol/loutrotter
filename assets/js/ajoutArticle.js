$("#titreArticle").change(function(){
    if($("#titreArticle").val().length <10){
        $("#checkTitre").addClass("has-error");
        $('#error').text("Le titre doit faire 10 caractères minimum");
    }
    else{
        $("#checkTitre").removeClass("has-error");
        $('#error').text('');
    }
});

$('#valider').on("click",function(e){
    if($("#titreArticle").val().length <10 || $("#culture").val().length <10 || $("#lieux").val().length <10 || $("#monuments").val().length <10){
        e.preventDefault();
        $('html, body').animate({ scrollTop: 0 }, 'slow');    
        $('#error').text("Veuillez renseigner une des catégories de l'article");
    }
});