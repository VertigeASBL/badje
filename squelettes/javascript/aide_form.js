/*
*    Ce fichier gère les bulles d'aide des formulaires. Il va détecter la class explication de SPIP pour en faire une bulle d'aide.
*
*    Didier - Vertige ASBL
*    http://www.vertige.org/
*    http://p.henix.be/
*/


jQuery(document).ready(function($) {
    
    // On séléctionne toute les explications
    var explication = $('.explication');

    // On va placer le CSS de position avec javascript, histoire que ceux qui n'ont pas Javascript ai quand même droit à l'aide.
    explication.css({
        'position': 'absolute',
        'right': '20px',
        'width': '12px',
        'height': '12px'
    });

    // On va boucler sur les explications
    explication.each(function () {
        // Première chose, on récupère le contenu de l'aide.
        var aide = $(this).html();
        
        // Ensuite on vide la balise, on ne veux pas que le texte s'affiche.
        $(this).empty();

        // On place la class des tooltip de foundation.
        $(this).addClass('has-tip tip-bottom');

        // Maintenant on ajoute les attributs.
        $(this).attr({
            'data-tooltip': '',
            'title': aide
        });
    });
});