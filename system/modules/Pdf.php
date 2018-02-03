<?php
class Pdf{

    public function __construct(){}

    public function getMyPdf($store_id){

        /* Change PDF between stores */
        require_once(BACK_SYSTEM . 'generator/tcpdf/Shoppdf.php');
        $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Order');
        $pdf->SetTitle('Rechnung');
        $pdf->SetSubject(strval($store_id));
        //$pdf->SetKeywords('order, client');
        $pdf->SetLeftMargin(20);
        $pdf->setPrintFooter(true);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
        //$pdf->SetAutoPageBreak(True, PDF_MARGIN_FOOTER);
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM + 10);
        $pdf->setPrintHeader(false);
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        $pdf->setFontSubsetting(true);
        $pdf->SetFont('Helvetica', '', 10);
        return $pdf;
    }

    public function getPdf(){

        /* Change PDF between stores */
        require_once(BACK_SYSTEM . 'generator/tcpdf/tcpdf.php');
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Order');
        $pdf->SetTitle('Ventano');
        $pdf->SetSubject('Order');
        $pdf->SetLeftMargin(20);
        $pdf->setPrintFooter(true);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM + 10);
        $pdf->setPrintHeader(false);
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        $pdf->setFontSubsetting(true);
        $pdf->SetFont('Helvetica', '', 10);
        return $pdf;
    }

    public function getRoute($order_info){

        /* Return the route of the packzettel and of the invoice */

        //Store name
        Load::load_model('store/store');
        $store_model = new storeModel();
        $store_name = $store_model->getStoreInfo($order_info['store_id'])['name'];
        $order_type = $order_info['type'];

        //Date
        $date = new DateTime($order_info['date_added']);
        $date = date_format($date,'m-Y').'/';//format

        //Invoice
        $actual_route = DIR_SITE.'pdf/'.$store_name.'/Rechnung/';
        $actual_file_order =  $store_name.'_'.$order_type.'_'.$order_info['order_id'].'.pdf';
        $actual_file_order = $actual_route.$date.$actual_file_order;

        //Packzettel
        $actual_file_packzettel =  $store_name.'_Packzettel_'.$order_info['order_id'].'.pdf';
        $actual_file_packzettel = $actual_route.$date.$actual_file_packzettel;

        return array('invoice'=>$actual_file_order,'packzettel'=>$actual_file_packzettel);
    }

}