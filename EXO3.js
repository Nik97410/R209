do {
    var age = prompt("Entre ton age ?", "<Entrez ici votre age>");
    if (age >= 18) {
        alert("Vous avez " + age);
    } else {
        alert("age invalide");
    }
}
while (age < 18);