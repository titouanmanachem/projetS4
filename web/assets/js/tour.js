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