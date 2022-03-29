document.write("les nombres premiers compris entre 0 et 100 sont :<br>");
/* 0 et 1 ne sont pas des nombres premiers*/
for (var i = 2; i <= 100; i++) {
    var trouve = false;
    for (j = 2; j < i / 2; j++) {
        if (i % j == 0)
            trouve = true;
    }
    if (trouve == false) /* S'il n'existe aucun diviseur de i*/
        document.write(i, ",");
}