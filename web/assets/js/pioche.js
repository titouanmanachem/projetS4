if (  "{{ tour }}" != "{{ app.user.username }}" ) {
    setInterval(function () {

        $.ajax({

            url: '{{ path('verif_partie', {'partie': idpartie ,'tour':tour }) }}',
            type: 'POST',

            success: function (code_html, statut) { // code_html contient le HTML renvoyé

                console.log("ajax");
                if ( code_html == "CHANGEMENT DE TOUR"){

                    window.location.href = "{{ path('play_partie', {'id': idpartie }  ) }}";
                }
            },
            error: function (resultat, statut, erreur) {

                console.log("error");

            }
        });

    }, 3000);
}

$( "#pioche" ).click(function() {

    if (  "{{ tour }}" == "{{ app.user.username }}" ) {

        var tour = $("tour").val();

        $.ajax({

            url : '{{ path('pioche_partie', {'partie': idpartie ,'tour':tour })  }}',
            type : 'POST',
            data : {
                'tour':tour

            },
            success : function(code_html, statut){ // code_html contient le HTML renvoyé

                console.log("ajax");
                if ( code_html == "FIN DE PARTIE"){

                    alert('FIN DU JEU');
                }
                else {
                    window.location.href = "{{ path('play_partie', {'id': idpartie }  ) }}";
                }

            },
            error : function(resultat, statut, erreur){

                console.log("error");

            }
        });
    }

    else {

        alert('Ce n\'est pas votre tour !');
    }

});