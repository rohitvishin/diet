<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.2/css/bootstrap.css">
<style>
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
    padding: 15px 2cm
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
</style>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

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

    <main>
        <table class="table table-bordered">
            <thead>
                <th>Sr No.</th>
                <th>Product Name</th>
                <th>Qty</th>
                <th>Product Price</th>
                <th>Discount</th>
                <th>Final Amount</th>
            </thead>
            <tbody>

                @php( $total = 0)
                @if(count($data) > 0)
                @foreach($data as $key => $singleData)
                <tr>

                    <td>{{ $key+1 }}</td>
                    <td>{{ $singleData['product_name'] }}</td>
                    <td>{{ $singleData['qty'] }}</td>
                    <td>{{ $singleData['amount'] }}</td>
                    <td>{{ $singleData['discount'] }}</td>
                    <td>{{ $singleData['final_amt'] }}</td>
                </tr>

                @php( $total += $singleData['final_amt'] )
                @endforeach
                @endif

                <tr>
                    <td colspan="5">Grand Total</td>
                    <td colspan="5">{{ $total }}</td>
                </tr>
                <tr>
                    <td colspan="5" rowspan="2">Authorized Signature</td>
                    <td colspan="5" rowspan="2"></td>
                </tr>
            </tbody>
        </table>
    </main>

</body>

</html>