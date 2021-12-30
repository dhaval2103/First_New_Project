<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,800&display=swap"
        rel="stylesheet">
    <title>PDF Invoice</title>
    <style>
        @media print {
            .noprint {
                display: none;
            }

            body,
            html {
                margin: 0;
                padding: 0;
                width: 100%;
                height: 100%;
            }
        }

        @page {
            margin: 0;
        }

    </style>
</head>

<body style="margin: 0px; background-color: #ebeef3;">
    <table width="100%" cellpadding="0" cellspacing="0" align="center"
        style="font-family: 'Open Sans', sans-serif; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-font-smoothing: antialiased;">
        <tr>
            <td style="vertical-align: top;" align="center">
                <table cellpadding="0" cellspacing="0" align="center"
                    style="width: 760px; margin: 24px auto; background-color: #fff; box-shadow: 0px 2px 4px rgba(0,0,0,0.16);">

                    <tr>
                        <td>
                            <table width="100%" height="100%" cellpadding="0" cellspacing="0" align="left">
                                <tr>
                                    <td>
                                        <table width="100%" cellpadding="0" cellspacing="0" align="left">
                                            <tr style="vertical-align: middle; background-color: #eaf1f2;">
                                                <td align="left" style="padding: 40px">
                                                    <a href="javacript:void(0);" target="_blank"
                                                        style="text-decoration: none; display: inline-block;">
                                                        <img src="{{ asset('web/images/logo.png') }}"
                                                            style="width: 120px; height: auto;display: block;">
                                                    </a>
                                                </td>
                                                <td align="right" style="padding: 40px;">
                                                    <h1
                                                        style="font-size: 30px;font-weight: 600; color: #181712; text-decoration: none; margin: 0px;">
                                                        Invoice</h1>
                                                </td>
                                            </tr>
                                            <tr
                                                style="vertical-align: middle; background-color: #eaf1f2; padding-bottom: 20px;">
                                                <td style="width: 50%; padding: 0px 15px 40px 40px;">
                                                    <table cellpadding="0" cellspacing="0" width="100%">
                                                        <tr>
                                                            <td align="left" style="padding-bottom: 15px;">
                                                                <h4
                                                                    style="margin-top: 0px; margin-bottom: 0px; font-size: 18px; text-transform: uppercase;">
                                                                    John Smith</h4>
                                                            </td>
                                                        </tr>
                                                        <tr style="text-align: left;">
                                                            <td align="left" style="padding-bottom: 10px;">
                                                                <p
                                                                    style="font-size: 14px; color: #6f7177; line-height: 22px; margin: 0; letter-spacing: 0.6px;">
                                                                    4304 Liberty Avenue <br>92680 Tustin, CA</p>
                                                            </td>
                                                        </tr>
                                                        <tr style="text-align: left;">
                                                            <td align="left" style="padding-bottom: 5px;">
                                                                <p
                                                                    style="font-size: 14px; color: #6f7177; line-height: 22px; margin: 0; letter-spacing: 0.6px;">
                                                                    Email : <span>johnsmith1564@gmail.com</span></p>
                                                            </td>

                                                        </tr>
                                                        <tr style="text-align: left;">
                                                            <td align="left">
                                                                <p
                                                                    style="font-size: 14px; color: #6f7177; line-height: 22px; margin: 0; letter-spacing: 0.6px;">
                                                                    Mo. : <span>+386 714 505 8385</span></p>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td style="width: 50%; padding: 0px 40px 40px 15px;">
                                                    <table cellpadding="0" cellspacing="0" width="100%">
                                                        <tr>
                                                            <td align="right"
                                                                style="display: inline-block; width: 100%; padding-bottom: 6px;">
                                                                <h4
                                                                    style="margin: 0px; font-size: 15px; font-weight: 600; text-transform: uppercase; ">
                                                                    Order ID.</h4>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right"
                                                                style="display: inline-block; width: 100%; padding-bottom: 15px;">
                                                                <p
                                                                    style="font-size: 14px; color: #6f7177; line-height: 22px; margin: 0; letter-spacing: 0.6px;">
                                                                    #52458745</p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right"
                                                                style="display: inline-block; width: 100%; padding-bottom: 6px;">
                                                                <h4
                                                                    style="margin: 0px; font-size: 15px; font-weight: 600; text-transform: uppercase; ">
                                                                    Order Date.</h4>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right"
                                                                style="display: inline-block; width: 100%; padding-bottom: 15px;">
                                                                <p
                                                                    style="font-size: 14px; color: #6f7177; line-height: 22px; margin: 0; letter-spacing: 0.6px;">
                                                                    1 January, 2020</p>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 20px 40px;">
                                        <table width="100%" height="100%" cellpadding="0" cellspacing="0">
                                            <tr style="vertical-align: middle;">
                                                <th align="left"
                                                    style="border-bottom: 3px solid #e8e8e8; padding:15px 13px; width: 40px; ">
                                                    <p
                                                        style="font-size: 15px;margin: 0; color: #6f7177; letter-spacing: 0.2px; text-transform: uppercase;">
                                                        No.</p>
                                                </th>
                                                <th align="left"
                                                    style="border-bottom: 3px solid #e8e8e8; padding:15px 13px; width: 50%; ">
                                                    <p
                                                        style="font-size: 15px;margin: 0; color: #6f7177; letter-spacing: 0.2px; text-transform: uppercase;">
                                                        Product Name</p>
                                                </th>
                                                <th align="left"
                                                    style="border-bottom: 3px solid #e8e8e8; padding:15px 13px; ">
                                                    <p
                                                        style="font-size: 15px;margin: 0; color: #6f7177; letter-spacing: 0.2px; text-transform: uppercase;">
                                                        Qty.</p>
                                                </th>
                                                <th align="left"
                                                    style="border-bottom: 3px solid #e8e8e8; padding:15px 13px;">
                                                    <p
                                                        style="font-size: 15px;margin: 0; color: #6f7177; letter-spacing: 0.2px; text-transform: uppercase;">
                                                        Price</p>
                                                </th>
                                                <th align="right"
                                                    style="border-bottom: 3px solid #e8e8e8; padding:15px 13px;">
                                                    <p
                                                        style="font-size: 15px;margin: 0; color: #6f7177; letter-spacing: 0.2px; text-transform: uppercase;">
                                                        Amount</p>
                                                </th>
                                            </tr>
                                            <tr style="vertical-align: top;">
                                                <td align="left"
                                                    style="border-bottom: 1px solid #e7e8ec; padding: 13px;">
                                                    <p
                                                        style="font-size: 15px; color: #000; margin: 0; letter-spacing: 0.6px;">
                                                        1</p>
                                                </td>
                                                <td align="left"
                                                    style="border-bottom: 1px solid #e7e8ec; padding: 13px;">
                                                    <p
                                                        style="font-size: 15px; color: #000; margin: 0; letter-spacing: 0.6px;">
                                                        Coles Medium Lemons Prepacked</p>
                                                </td>
                                                <td align="left"
                                                    style="border-bottom: 1px solid #e7e8ec; padding: 13px;">
                                                    <p
                                                        style="font-size: 15px; color: #000; margin: 0; letter-spacing: 0.6px;">
                                                        3</p>
                                                </td>
                                                <td align="left"
                                                    style="border-bottom: 1px solid #e7e8ec; padding: 13px;">
                                                    <p
                                                        style="font-size: 15px; color: #000; margin: 0; letter-spacing: 0.6px;">
                                                        $150</p>
                                                </td>
                                                <td align="right"
                                                    style="border-bottom: 1px solid #e7e8ec; padding: 13px;">
                                                    <p
                                                        style="font-size: 15px; color: #000; margin: 0; letter-spacing: 0.6px;">
                                                        $450</p>
                                                </td>
                                            </tr>
                                            <tr style="vertical-align: top;">
                                                <td align="left"
                                                    style="border-bottom: 1px solid #e7e8ec; padding: 13px;">
                                                    <p
                                                        style="font-size: 15px; color: #000; margin: 0; letter-spacing: 0.6px;">
                                                        2</p>
                                                </td>
                                                <td align="left"
                                                    style="border-bottom: 1px solid #e7e8ec; padding: 13px;">
                                                    <p
                                                        style="font-size: 15px; color: #000; margin: 0; letter-spacing: 0.6px;">
                                                        Honeycrisp Apple</p>
                                                </td>
                                                <td align="left"
                                                    style="border-bottom: 1px solid #e7e8ec; padding: 13px;">
                                                    <p
                                                        style="font-size: 15px; color: #000; margin: 0; letter-spacing: 0.6px;">
                                                        4</p>
                                                </td>
                                                <td align="left"
                                                    style="border-bottom: 1px solid #e7e8ec; padding: 13px;">
                                                    <p
                                                        style="font-size: 15px; color: #000; margin: 0; letter-spacing: 0.6px;">
                                                        $10</p>
                                                </td>
                                                <td align="right"
                                                    style="border-bottom: 1px solid #e7e8ec; padding: 13px;">
                                                    <p
                                                        style="font-size: 15px; color: #000; margin: 0; letter-spacing: 0.6px;">
                                                        $40</p>
                                                </td>
                                            </tr>
                                            <tr style="vertical-align: bottom;">
                                                <td colspan="2"></td>
                                                <td colspan="2" align="left" style=" padding: 13px;  ">
                                                    <p
                                                        style="font-size: 14px; margin: 0; color: #6f7177; letter-spacing: 0.2px; text-transform: uppercase;">
                                                        <strong>Subtotal : </strong>
                                                    </p>
                                                </td>
                                                <td align="right" style=" padding: 13px; ">
                                                    <p
                                                        style="font-size: 15px; color: #000; margin: 0; letter-spacing: 0.6px;">
                                                        $490
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr style="vertical-align: bottom;">
                                                <td colspan="2"></td>
                                                <td colspan="2" align="left"
                                                    style=" padding: 13px; border-top: 1px solid #eee; ">
                                                    <p
                                                        style="font-size: 14px; margin: 0; color: #6f7177; letter-spacing: 0.2px; text-transform: uppercase;">
                                                        <strong>Discount <span>5%</span> : </strong>
                                                    </p>
                                                </td>
                                                <td align="right"
                                                    style=" padding: 13px; border-top: 1px solid #e7e8ec;">
                                                    <p
                                                        style="font-size: 15px; color: #000; margin: 0; letter-spacing: 0.6px;">
                                                        $22.5</p>
                                                </td>
                                            </tr>
                                            <tr style="vertical-align: bottom;">
                                                <td colspan="2"></td>
                                                <td colspan="2" align="left"
                                                    style="padding: 13px; border-top: 1px solid #e7e8ec;  color: #f7941d; vertical-align: middle; font-weight: 700;">
                                                    <p
                                                        style="font-size: 16px; margin: 0; color: #000; letter-spacing: 0.2px; text-transform: uppercase; ">
                                                        Total</p>
                                                </td>
                                                <td align="right"
                                                    style="padding: 13px; border-top: 1px solid #e7e8ec;  color: #f7941d; vertical-align: middle; font-weight: 700;">
                                                    <p
                                                        style="font-size: 16px; margin: 0; color: #000; letter-spacing: 0.2px; text-transform: uppercase; ">
                                                        $467.5</p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 10px 40px;">
                                        <table width="100%" height="100%" cellpadding="0" cellspacing="0">
                                            <tr style="vertical-align: middle;">
                                                <td style="background-color: #eaf1f2; padding: 5px;">
                                                    <table width="100%" cellpadding="0" cellspacing="0" align="left">
                                                        <tr>
                                                            <td align="left" style="padding: 10px 20px;">
                                                                <h4
                                                                    style=" font-size: 17px; margin: 0; color: #000;  font-weight: 600;">
                                                                    Delivery Details</h4>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <table width="100%" cellpadding="0" cellspacing="0" align="left">

                                                        <tr>
                                                            <td style="padding: 0px 10px; background-color: #fff;">
                                                                <table width="100%" cellpadding="0" cellspacing="0"
                                                                    align="left">
                                                                    <tr>
                                                                        <td
                                                                            style=" padding: 15px 16px; border-bottom: 2px solid #eaf1f2;">
                                                                            <table width="100%" height="100%"
                                                                                cellpadding="0" cellspacing="0">
                                                                                <tr style="vertical-align: top;">
                                                                                    <td align="left"
                                                                                        style="width: 50%;  padding-right: 20px; border-right: 1px solid #eaf1f2;">
                                                                                        <table cellpadding="2"
                                                                                            cellspacing="0"
                                                                                            width="100%">
                                                                                            <tr>
                                                                                                <td align="left"
                                                                                                    style="padding-bottom: 5px;">
                                                                                                    <h6
                                                                                                        style="margin: 0px; font-size: 15px; font-weight: 600; ">
                                                                                                        Shipping Details
                                                                                                    </h6>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr
                                                                                                style="text-align: left;">
                                                                                                <td align="left">
                                                                                                    <h6
                                                                                                        style="margin: 0px; font-size: 15px; font-weight: 600; ">
                                                                                                        John Smith</h6>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr
                                                                                                style="text-align: left;">
                                                                                                <td align="left">
                                                                                                    <p
                                                                                                        style="font-size: 14px; color: #6f7177; line-height: 22px; margin: 0; letter-spacing: 0.6px;">
                                                                                                        4304 Liberty
                                                                                                        Avenue <br>92680
                                                                                                        Tustin, CA</p>
                                                                                                </td>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </td>
                                                                                    <td
                                                                                        style="width: 50%; padding-left: 20px; border-left: 1px solid #eaf1f2;">
                                                                                        <table cellpadding="2"
                                                                                            cellspacing="0"
                                                                                            width="100%">
                                                                                            <tr>
                                                                                                <td align="left"
                                                                                                    style="padding-bottom: 5px; ">
                                                                                                    <h6
                                                                                                        style="margin: 0px; font-size: 15px; font-weight: 600; ">
                                                                                                        Store Detail
                                                                                                    </h6>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr
                                                                                                style="text-align: left;">
                                                                                                <td align="left">
                                                                                                    <h6
                                                                                                        style="margin: 0px; font-size: 15px; font-weight: 600; ">
                                                                                                        Store Name</h6>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr
                                                                                                style="text-align: left;">
                                                                                                <td align="left">
                                                                                                    <p
                                                                                                        style="font-size: 14px; color: #6f7177; line-height: 22px; margin: 0; letter-spacing: 0.6px;">
                                                                                                        1175 Tallow Rd,
                                                                                                        <br>Walnutport,
                                                                                                        Tustin, CA
                                                                                                    </p>
                                                                                                </td>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 20px 40px;">
                                        <table width="100%" height="100%" cellpadding="0" cellspacing="0">
                                            <tr style="vertical-align: middle;">
                                                <td style="background-color: #eaf1f2; padding: 5px;">
                                                    <table width="100%" cellpadding="0" cellspacing="0" align="left">
                                                        <tr>
                                                            <td align="left" style="padding: 10px 20px;">
                                                                <h4
                                                                    style=" font-size: 17px; margin: 0; color: #000;  font-weight: 600;">
                                                                    Payment Details</h4>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <table width="100%" cellpadding="0" cellspacing="0" align="left">
                                                        <tr>
                                                            <td style="padding: 0px 10px;background-color: #fff; ">
                                                                <table width="100%" cellpadding="0" cellspacing="0"
                                                                    align="left">
                                                                    <tr>
                                                                        <td align="left"
                                                                            style=" padding: 16px; border-bottom: 2px solid #eaf1f2;">
                                                                            <table width="100%" cellpadding="0"
                                                                                cellspacing="0" align="left">
                                                                                <tr>
                                                                                    <td align="left"
                                                                                        style="width: 170px; padding: 7px 0px;">
                                                                                        <h6
                                                                                            style="margin: 0px; font-size: 14px; font-weight: 600; color: #6f7177;">
                                                                                            Payment ID</h6>
                                                                                    </td>
                                                                                    <td align="left"
                                                                                        style="width: 36px;">
                                                                                        <h6
                                                                                            style="margin: 0px; margin-right: 8px; font-size: 14px; ">
                                                                                            :</h6>
                                                                                    </td>
                                                                                    <td align="left">
                                                                                        <p
                                                                                            style="font-size: 14px; color: #6f7177;  margin: 0; letter-spacing: 0.4px; text-align: left;">
                                                                                            <strong
                                                                                                style="color: #000; font-weight: 600;">#65239856</strong>
                                                                                        </p>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="left"
                                                                                        style="width: 170px; padding: 7px 0px;">
                                                                                        <h6
                                                                                            style="margin: 0px; font-size: 14px; font-weight: 600; color: #6f7177; ">
                                                                                            Payment Mode</h6>
                                                                                    </td>
                                                                                    <td align="left"
                                                                                        style="width: 36px;">
                                                                                        <h6
                                                                                            style="margin: 0px; margin-right: 8px; font-size: 14px; ">
                                                                                            :</h6>
                                                                                    </td>
                                                                                    <td align="left">
                                                                                        <p
                                                                                            style="font-size: 14px; color: #6f7177;  margin: 0; letter-spacing: 0.4px; text-align: left;">
                                                                                            <strong
                                                                                                style="color: #000; font-weight: 600;">Online</strong>
                                                                                        </p>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="left"
                                                                                        style="width: 170px; padding: 7px 0px;">
                                                                                        <h6
                                                                                            style="margin: 0px; font-size: 14px; font-weight: 600; color: #6f7177; ">
                                                                                            Paid Amount</h6>
                                                                                    </td>
                                                                                    <td align="left"
                                                                                        style="width: 36px;">
                                                                                        <h6
                                                                                            style="margin: 0px; margin-right: 8px; font-size: 14px; ">
                                                                                            :</h6>
                                                                                    </td>
                                                                                    <td align="left">
                                                                                        <p
                                                                                            style="font-size: 14px; color: #6f7177;  margin: 0; letter-spacing: 0.4px; text-align: left;">
                                                                                            <strong
                                                                                                style="color: #000; font-weight: 600;">$467.5</strong>
                                                                                        </p>
                                                                                    </td>
                                                                                </tr>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 20px;">
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

</body>

</html>
