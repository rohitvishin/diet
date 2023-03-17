<?php 
$emiTotal = 0;
if(count($payment_installment) > 0){
    foreach($payment_installment as $singlePayemnt){
        $emiTotal += $singlePayemnt['emi_amt'];
    }
}

$paidamt = $data['final_amt'] - $emiTotal;

?>

<html>

<head>
    <style>
    /** 
                Set the margins of the page to 0, so the footer and the header
                can be of the full height and width !
             **/
    @page {
        margin: 0cm 0cm;
    }

    @page {
        size: A4 landscape;
    }

    /** Define now the real margins of every page in the PDF **/
    body {
        margin-top: 2cm;
        margin-left: 2cm;
        margin-right: 2cm;
        margin-bottom: 2cm;
    }

    /** Define the header rules **/
    header {
        position: fixed;
        top: 0cm;
        left: 0cm;
        right: 0cm;
        height: 2cm;
        color: white;
        text-align: center;
        line-height: 1.5cm;
    }

    /** Define the footer rules **/
    footer {
        position: fixed;
        bottom: 0cm;
        left: 0cm;
        right: 0cm;
        height: 2cm;
        color: black;
        text-align: center;
        line-height: 1.5cm;
    }

    .header-div {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        margin: 0 20px;
    }

    .header-div h2 {
        color: black;
    }

    .textfeilds-div {
        display: flex;
        flex-direction: row;
        align-items: center;
    }

    .textfeilds-div h3 {
        font-weight: 500;
        margin: 0 0 35px 0;
    }

    .col-10 {
        justify-content: space-between;
        column-gap: 10px;
    }
    </style>
</head>

<body>
    <!-- Define header and footer blocks before your content -->
    <header>
        <div class="header-div">
            <table style="width:100%;border:0px">
                <tbody>
                    <tr>
                        <td style="width:90%"><img
                                src="https://cdn.shopify.com/s/files/1/0912/0596/files/The_Spa_Dr_Logo_Circle_R_darker_grey_thumbnail_800x.png?v=1635798573"
                                width="auto" height="50px" /></td>
                        <td style="width:10%">
                            <h2>RECEIPT</h2>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </header>

    <footer>
        <p>Address :- 217/2nd floor, Bombay Market building, 64 Tardeo road, Mumbai : 400034 Email :-
            padechiamansi@gmail.com ,www.mansipadechia.com</p>
    </footer>

    <!-- Wrap the content of your PDF inside a main tag -->
    <main>
        <div class="header-div">
            <table style="width:100%;border:0px">
                <tbody>
                    <tr>
                        <td style="width:50%">
                            <h2 style="font-weight: 500">RD no. RD 011/2012</h2>
                        </td>
                        <td style="width:50%">
                            <h2 style="font-weight: 500;float:right">Date:
                                {{ date('d.m.Y',strtotime($data['payment_date'])) }}</h2>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="textfeilds-div">
            <table style="width:100%;border:0px">
                <tbody>
                    <tr>
                        <td style="width:30%">
                            <h3 style="font-weight: 500">Received with thanks from Mr/Mrs</h3>
                        </td>
                        <td style="width:70%">
                            <h3 style="border-bottom: 1px solid;width: 100%;">{{ $data['name'] }}</h3>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="textfeilds-div">
            <table style="width:100%;border:0px">
                <tbody>
                    <tr>
                        <td style="width:30%">
                            <h3 style="font-weight: 500">For Diet Consultation</h3>
                        </td>
                        <td style="width:70%">
                            <h3 style="border-bottom: 1px solid;width: 100%;">{{ $data['plan_name'] }}</h3>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="textfeilds-div">
            <table style="width:100%;border:0px">
                <tbody>
                    <tr>
                        <td style="width:30%">
                            <h3 style="font-weight: 500">The Sum of Rupees</h3>
                        </td>
                        <td style="width:70%">
                            <h3 style="border-bottom: 1px solid;width: 100%;">{{ $data['final_amt'] }}</h3>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="textfeilds-div">
            <table style="width:100%;border:0px">
                <tbody>
                    <tr>
                        <td style="width:30%">
                            <h3 style="font-weight: 500">Paid Amount</h3>
                        </td>
                        <td style="width:70%">
                            <h3 style="border-bottom: 1px solid;width: 100%;">{{ $paidamt }}</h3>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="textfeilds-div">
            <table style="width:100%;border:0px">
                <tbody>
                    <tr>
                        <td style="width:30%">
                            <h3 style="font-weight: 500">Balance Amount</h3>
                        </td>
                        <td style="width:70%">
                            <h3 style="border-bottom: 1px solid;width: 100%;">{{ $emiTotal }}</h3>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="textfeilds-div col-10" style="page-break-after: always;">
            <table style="width:100%;border:0px">
                <tbody>
                    <tr>
                        <td style="width:20%">
                            <h3 style="font-weight: 500">Valid From</h3>
                        </td>
                        <td style="width:20%">
                            <h3 style="border-bottom: 1px solid;width: 100%;">{{ $data['start_date'] }}</h3>
                        </td>
                        <td style="width:20%">
                            <h3 style="font-weight: 500;text-align:center">TO</h3>
                        </td>
                        <td style="width:20%">
                            <h3 style="border-bottom: 1px solid;width: 100%;">{{ $data['end_date'] }}</h3>
                        </td>
                        <td style="width:60%;text-align: right;">
                            <h3 style="font-weight: 500">
                                <p style="margin: 0;">Mansi d. Padechia</p>
                                <p style="margin: 0;">Registered Dietician</p>
                                <p style="margin: 0;">RD-011.2012, Mumbai</p>
                                <p style="margin: 0;border-bottom:1px solid">
                                    <img src="https://www.signwell.com/assets/vip-signatures/barack-obama-signature-b8614607575251b55f9386853536ef918f439600ccbda927b11aca9bf1d1842e.png"
                                        alt="" height="70px" width="200">
                                </p>
                                <p style="margin: 0;">Signature</p>
                            </h3>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>

        <div style="margin-top: 1cm;font-size: 18px;">
            TERMS AND CONDITION :-<br>
            1. The client understood that the weight loss programme/nutritional package which the client has enrolled
            and opted for will expire
            within given weeks from the date of enrollment or on the target date specified and communicated to the
            client or, the client has
            two option which include either to enroll for a maintenance programme or for a further weight loss
            programme, if so advised.
            <br>
            <br>
            2. The fat loss/weight gain or nutrition package does not guarantee results. Results are subject to regular
            intense training,
            compliance with recommended diet and regular follow up.
            <br>
            <br>
            3. It is recommended that the client continues the programme without a break until his/her target fat loss/
            weight gain is achieved.
            Discontinuing mid way may hamper further results.
            <br>
            <br>
            4. It is recommended that the client continues the programme without a break until his/her target fat loss/
            weight gain is achieved.
            Discontinuing mid way may hamper further results.
            <br>
            <br>
            5. Client accepts that the any charges paid by the client shall not be refunded to client under any
            circumstance including
            discontinuance of treatment by me, for whatsoever reason
            <br>
            <br>
            6. Weight loss/weight gain programmes are developed by respected health professionals. Not following the
            programme, as
            designed may pose risk of developing health complications associated with rapid weight loss/weight gain and
            therefore any
            deviation from the programme designed from client , is at the client's risk and I am not responsible for any
            adverse
            complications.
            <br>
            <br>
            7. The client accept the if for whatsoever reason, the client fail and neglects to visit and consult for a
            period of four weeks, during
            the validity of the enrolled programmes, through medium of email or sms or personal call, follow up once a
            week for a period of
            four week thereafter and if the client fails to respond for consultation, the programme enrolled into will
            thereafter expire on such
            negligence on the part of the client and the enrollment will automatically come to an end.
            Here I clarify and the client understands that in spite of follow -ups, if client fails and neglects to
            attend for three consecutive
            consultations without any prior intimation, the programme enrolled by client will automatically come to an
            end without any further
            intimation to the client.<br>
        </div>
    </main>
</body>

</html>