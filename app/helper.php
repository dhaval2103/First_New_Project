<?php
function generateInvoiceNumber($id)
{
    // dd($id);
    $invoice_no = 'TZ' . sprintf("%'.09d", time() . rand(0, 10));
    if (strlen($id) <= 5)
        $invoice_no = 'TZ' . sprintf("%'.05d", $id);
    else if (strlen($id) > 5)
        $invoice_no = 'TZ' . sprintf("%'.08d", $id);
    return $invoice_no;
}
