<?php
require_once('./backend/conexion.php');

$sql = "SELECT news.* FROM noticias news ORDER BY news.fecha DESC LIMIT 5";
$res = mysqli_query($link, $sql);

$xml = new XMLWriter();

$xml->openURI("php://output");
$xml->startDocument();
$xml->setIndent(true);

$xml->startElement('NOTICIAS');

while ($row = mysqli_fetch_assoc($res)) {
    $xml->startElement("TITULAR");
    $xml->writeRaw($row['titulo']);
    $xml->endElement();

    $xml->startElement("FECHA");
    $xml->writeRaw($row['fecha']);
    $xml->endElement();

    $xml->startElement("CATEGORIA");
    $xml->writeRaw($row['categoria']);
    $xml->endElement();

    $xml->startElement("POR");
    $xml->writeRaw($row['autor']);
    $xml->endElement();

    $xml->startElement("N");
    $xml->writeRaw($row['noticia']);
    $xml->endElement();
}

$xml->endElement();

header('Content-type: text/xml');
$xml->flush();