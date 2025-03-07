<script>
function validateForm() {
    let name = document.forms["absenceForm"]["Name"].value;
    let datumVom = document.forms["absenceForm"]["Datumvom"].value;
    let datumBis = document.forms["absenceForm"]["Datumbis"].value;
    let begruendung = document.forms["absenceForm"]["Begründung"].value;

    // Prüfen, ob alle Felder ausgefüllt sind
    if (name == "" || datumVom == "" || datumBis == "" || begruendung == "") {
        alert("Bitte füllen Sie alle Felder aus!");
        return false;
    }

    // Prüfen, ob das Enddatum nach dem Startdatum liegt
    if (new Date(datumVom) > new Date(datumBis)) {
        alert("Das 'Datum bis' muss nach dem 'Datum vom' liegen!");
        return false;
    }

    return true; // Formular wird gesendet, wenn alles korrekt ist
}
</script>