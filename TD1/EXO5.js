document.write("<center>");
/* Mettre un titre pour la table */


/* Créer la table*/
document.write("<table border=1>");

/* Créer la première ligne */
document.write("<tr><td>","x","</td>");
for(var i=1;i<=9;i++)
document.write("<td>",i,"</td>");
/* créer les autres lignes*/
for(var i=1;i<10;i++)
{
/* Créer la ligne numéro i*/
document.write("<tr>");
document.write("<td>",i,"</td>");
for(var j=1;j<=9;j++)
{
/* Créer la colonne numéro j*/
document.write("<td>",i*j,"</td>");
}
document.write("</tr>");
}
document.write("</table>");