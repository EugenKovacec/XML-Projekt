<?php

$naziv = $_POST['naziv'];
$sastojci = $_POST['sastojci'];
$upute = $_POST['upute'];
$kategorija = $_POST['kategorija'];

if ($naziv && $sastojci && $upute && $kategorija) {
    $xml = new DOMDocument();
    if (file_exists('recepti.xml')) {
        $xml->load('recepti.xml');
    } else {
        $xml->appendChild($xml->createElement('recepti'));
    }

    $recept = $xml->createElement('recept');

    $nazivElement = $xml->createElement('naziv', $naziv);
    $recept->appendChild($nazivElement);

    $sastojciElement = $xml->createElement('sastojci', $sastojci);
    $recept->appendChild($sastojciElement);

    $uputeElement = $xml->createElement('upute', $upute);
    $recept->appendChild($uputeElement);

    $kategorijaElement = $xml->createElement('kategorija', $kategorija);
    $recept->appendChild($kategorijaElement);

    $recepti = $xml->getElementsByTagName('recepti')->item(0);
    $recepti->appendChild($recept);

    $xml->save('recepti.xml');

    header('Location: index.php');
    exit;
} else {
    echo "Molimo unesite sve potrebne podatke.";
}
?>
