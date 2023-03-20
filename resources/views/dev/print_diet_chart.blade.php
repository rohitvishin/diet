<html>

<head>
    <style>
    /** 
                Set the margins of the page to 0, so the footer and the header
                can be of the full height and width !
             **/
    @page {
        size: A4;
        margin-top: 50px;
        margin-bottom: 50px;
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
        top: .50cm;
        left: 0cm;
        right: 0cm;
        height: 2cm;
        color: white;
        text-align: center;
        line-height: 1.5cm;
        display: table-header-group;
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
        display: table-footer-group;
        padding: 0px 25px;
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

    table {
        page-break-inside: auto;
        page-break-before: auto;
        page-break-after: auto;
    }

    tr {
        page-break-inside: avoid;
        page-break-after: auto;
    }

    .no-border {
        border: none !important;
    }

    .dynamicTable {
        position: relative;
        top: 80px;
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
        <div style="margin-top: 8px !important">

        </div>
    </footer>

    <!-- Wrap the content of your PDF inside a main tag -->
    <main>
        <div class="dynamicTable">
            {!! $data['diet_chart_template'] !!}
        </div>

        <div style="page-break-before: always;margin-top:5cm">
            <h4>DIETARY GUIDELINES:</h4>
            <p>1. You must consume minimum 3 tspn of oil in a day.</p>
            <p>2. Do not ever miss your milk products and pulses.</p>
            <p>3. You must take your vitamins after the breakfast everyday</p>
            <p>4. You must consume 500 ml of skimmed milk daily it can be taken in form of curd, raita or buttermilk
            </p>
            <p>5. Options of milk available in majority Indian markets are: -</p>

            <p> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp* Nestle Slim Milk (0.5 % fat)</p>
            <p> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp* Amul Lite Milk (0.3 % fat)</p>
            <p>6. It is preferable to boil the tetra packed milk and then use it.</p>
            <p>7. You have been given 2 tspn. Sugar in a day.</p>
            <p>8. WE PREPARE YOUR DIETS IN SUCH A WAY THAT THERE SHOULD NOT BE ANY WEAKNESS OR DIZZINESS. HOWEVER IF YOU
                EVER FEEL SO, CONTACT US IMMEDIATELY</p>
        </div>
    </main>
</body>

</html>