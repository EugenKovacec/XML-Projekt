<?php
// Učitavanje podataka iz POST zahtjeva
$naziv = $_POST['naziv'];
$sastojci = $_POST['sastojci'];
$upute = $_POST['upute'];
$kategorija = $_POST['kategorija'];

// Provjera jesu li svi podaci uneseni
if ($naziv && $sastojci && $upute && $kategorija) {
    // Učitavanje postojeće XML datoteke ili stvaranje nove
    $xml = new DOMDocument();
    if (file_exists('recepti.xml')) {
        $xml->load('recepti.xml');
    } else {
        $xml->appendChild($xml->createElement('recepti'));
    }

    // Kreiranje XML elementa za novi recept
    $recept = $xml->createElement('recept');

    // Dodavanje podataka o receptu
    $nazivElement = $xml->createElement('naziv', $naziv);
    $recept->appendChild($nazivElement);

    $sastojciElement = $xml->createElement('sastojci', $sastojci);
    $recept->appendChild($sastojciElement);

    $uputeElement = $xml->createElement('upute', $upute);
    $recept->appendChild($uputeElement);

    $kategorijaElement = $xml->createElement('kategorija', $kategorija);
    $recept->appendChild($kategorijaElement);

    // Dodavanje novog recepta u XML datoteku
    $recepti = $xml->getElementsByTagName('recepti')->item(0);
    $recepti->appendChild($recept);

    // Spremanje promjena u XML datoteku
    $xml->save('recepti.xml');

    // Preusmjeravanje na početnu stranicu
    header('Location: index.php');
    exit;
} else {
    echo "Molimo unesite sve potrebne podatke.";
}
?>