<?php

require_once '../vendor/autoload.php';

if ($_GET['party'] || $_GET['id']) {
    $name = uniqid();


    $catQuery = $db->prepare("SELECT * FROM qr_codes where qr_party=?");
    $catQuery->execute(array($_GET['party']));
    $result = $catQuery->fetchAll(PDO::FETCH_ASSOC);

    $html = "";
    foreach ($result as $item) {
        $html .= '<img style="width:100px;height:100px;" src="' . $item['qr_url'] . '">';
    }

    $mpdf = new \Mpdf\Mpdf();
    $mpdf->WriteHTML($html);
    $mpdf->Output('save/' . $name . '.pdf', 'F');

    $query = $db->prepare('INSERT into qr_pdf set pdf_product=?,pdf_path=?,pdf_party=?,pdf_createdAt=?');
    $insert = $query->execute([$_GET['id'], $name . '.pdf',$_GET['party'],date('Y-m-d H:i:s')]);

    if ($insert) {
        header('location: ' . ADMIN_URL . 'index.php?sayfa=urun_pdf?id=' . $catRow['urun_id']);
    } else {
        header('location: ' . ADMIN_URL . 'index.php?sayfa=urun_pdf?id=' . $catRow['urun_id']);
    }
}
