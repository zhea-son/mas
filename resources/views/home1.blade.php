<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Test</title>

    <style>
        body{
            margin-left:100px;
            margin-right:100px;
        }
        .receipt-head{
            height:225px;
            /* border-bottom: 2px solid black; */
        }
        .logo{
            width:25%;
            float:left;
            height:100%;
            padding-bottom:7px;
        }
        .logo img{
            height: 90%;
            width:90%;

        }
        .details{
            width:45%;
            float:left;
            height:100%
        }
        
        .details h3{
            margin-left:30px;
            font-size:25px;
            margin-top:0px;
        }
        .details h4{
            margin-left:30px;
            font-size:15px;
            margin-top:-10px;
        }
        .details p{
            margin-top:-10px;
            margin-left:30px;
            font-size:15px;
        }
        .text-gray{
            color:gray;
        }
        .text-dark-yellow{
            color:rgb(193, 193, 32);
        }
        .partners{
            width:30%;
            float:left;
            height:100%
        }

        .partners h4{
            font-size: 20px;
            margin-bottom:5px;
        }

        .partners p{
            margin-top:5px;
        }

        .text-gray-lighter{
            margin-top:-15px;
            color:gainsboro;
        }

        .receipt-body{
            height:300px;
        }

        .client-head{
            height:50%;
        }
        .payment-table{
            height:50%;
            width:100%;
        }
        table{
            width:100%;
        }
        td{
            height:40px;
        }
        th{
            height:40px;
        }

        .client-info{
            width:60%;
            float:left;
        }
        .receipt-info{
            width:40%;
            float:left;
            margin-left: px;

        }
        
        .signature{
            height:150px;
            width:100%;
        }
        .hr_wow {
            background-image: linear-gradient(to right, gold 25%, black 25%);
            background-size: 100% 5px;
            background-repeat: no-repeat;
            background-position: left bottom;
            height: 5px;
            border: none;
        }
        .text-right{
            text-align:right;
        }
        .text-left{
            text-align:left;
        }
        .authority{
            float:left;
            width:25%;
            height:40%;
            font-size: 30px;
            text-align: center;
        }
        .small-italic{
            width:50%;
            float:left;
            height:50%;
            align-content: center;
            text-align:center;
            padding-top:40px;
        }
        .underline{
            border-bottom:2px solid black;
            float:left;
            width:25%;
            margin-bottom:15px;
            height:50%;

        }

        .small-italic small{
            margin-bottom:15px;
        }

    </style>
</head>

<body>
    <div class="receipt-head">
        <div class="logo">
            <img src="assets/images/logo.png.jpg" alt="Nadia Sharidan & CO.">
        </div>
        <div class="details">
            <h3>NADIA SHARIDAN &AMP; CO.</h3>
            <h4>JHOHOR BAHRU BRANCH (HQ)</h4>
            <p>No.57-01, Jalan Molek 3/1, Taman Molek, 81100 Johor Bahru, Johor, Malaysia</p>
            <h4 style="margin-top:0px;">ISKANDAR PUTERI BRANCH</h4>
            <p>
                A-05-24 Blok A, Eco Galleria, Jalan Eko Botani 3 <br>
                Taman Eko Botani, 79100 Iskandar Puteri, Johor.
            </p>
            <p class="text-gray">
                <span class="text-dark-yellow">T</span>
                +607-213 3600 &nbsp;&nbsp;&nbsp;
                <span class="text-dark-yellow">F</span>
                +607-358 3790 &nbsp;&nbsp;&nbsp;
                <span class="text-dark-yellow">E</span>
                general@nscolaw.com
            </p>
        </div>
        <div class="partners">
            <h4><u>Partners</u></h4>
            <p>Nurul Nadia Binti Sharidan</p>
            <div class="text-gray-lighter">LLB(Hons) IIUM</div>
            <p>Siti Norhafifie Binti Mohd Samri</p>
            <div class="text-gray-lighter">LLB(Hons) IIUM</div>
            <p>Nurul Huda Binti Abdullah</p>
            <div class="text-gray-lighter">LLB(Hons) IIUM</div>
        </div>
    </div>
    <hr class="hr_wow">
    <div class="receipt-body">
        <div class="client-head">
            <div class="client-info">
                <h3>Receipt (Clients' Account) - MHIT</h3>
                <p>
                    <span class="fixed">Received From</span>: KEE CHEE HOW
                </p>
                <p>
                    <span class="fixed">Bank/Cash</span>: PBB ISLAMIC BANK (CLIENT'S ACCOUNT)
                </p>
                <p>
                    <span class="fixed">Cheque No.</span>: IBFT (RPP20230711090752)
                </p>
            </div>
            <div class="receipt-info">
                <p>(Client's Copy)</p>
                <h3>RCM/C/2307/027</h3>
                <p>
                    <span class="fixed">Receipt Date</span> : 11-Jul-2023
                </p>
                <p>
                    <span class="fixed">Department</span> :
                </p>
            </div>
        </div>

        <div class="payment-table">
            <table style="border-top:2px solid black;border-bottom:2px solid black;">
                <thead>
                    <th>#.</th>
                    <th class="text-left">Description</th>
                    <th class="text-left">File No.</th>
                    <th class="text-right">
                        Total Amount<br>
                        (RM)
                    </th>
                    
                </thead>
                <tbody>
                    <tr>
                        <td style="border-top: 1px solid black;border-bottom: 1px solid black;"></td>
                        <td style="border-top: 1px solid black;border-bottom: 1px solid black;">Deposit</td>
                        <td style="border-top: 1px solid black;border-bottom: 1px solid black;">NS/C/SPA/0286/0523/ZA</td>
                        <td style="border-top: 1px solid black;border-bottom: 1px solid black;"  class="text-right">20,000.00</td>
                    </tr>
                </tbody>
                <tfoot>
                    <th colspan="2" class="text-left">Ringgit Malaysia Twenty Thousand Only</th>
                    <th class="text-right">
                        Grand Total: 
                    <th class="text-right">20,000.00
                    </th>
                </tfoot>
            </table>
        </div>

    </div>
    <div class="signature">
        <p class="authority">
            Authorised by: 
        </p>
        <div class="underline"></div>
        <p class="small-italic">
            <small><i>**Validity of this Receipt is subject to the clearance of Cheque</i></small>
        </p>
    </div>

    <hr style="border-style:dotted !important;">

    <div class="receipt-head">
        <div class="logo">
            <img src="assets/images/logo.png.jpg" alt="Nadia Sharidan & CO.">
        </div>
        <div class="details">
            <h3>NADIA SHARIDAN &AMP; CO.</h3>
            <h4>JHOHOR BAHRU BRANCH (HQ)</h4>
            <p>No.57-01, Jalan Molek 3/1, Taman Molek, 81100 Johor Bahru, Johor, Malaysia</p>
            <h4 style="margin-top:0px;">ISKANDAR PUTERI BRANCH</h4>
            <p>
                A-05-24 Blok A, Eco Galleria, Jalan Eko Botani 3 <br>
                Taman Eko Botani, 79100 Iskandar Puteri, Johor.
            </p>
            <p class="text-gray">
                <span class="text-dark-yellow">T</span>
                +607-213 3600 &nbsp;&nbsp;&nbsp;
                <span class="text-dark-yellow">F</span>
                +607-358 3790 &nbsp;&nbsp;&nbsp;
                <span class="text-dark-yellow">E</span>
                general@nscolaw.com
            </p>
        </div>
        <div class="partners">
            <h4><u>Partners</u></h4>
            <p>Nurul Nadia Binti Sharidan</p>
            <div class="text-gray-lighter">LLB(Hons) IIUM</div>
            <p>Siti Norhafifie Binti Mohd Samri</p>
            <div class="text-gray-lighter">LLB(Hons) IIUM</div>
            <p>Nurul Huda Binti Abdullah</p>
            <div class="text-gray-lighter">LLB(Hons) IIUM</div>
        </div>
    </div>
    <hr class="hr_wow">
    <div class="receipt-body">
        <div class="client-head">
            <div class="client-info">
                <h3>Receipt (Clients' Account) - MHIT</h3>
                <p>
                    <span class="fixed">Received From</span>: KEE CHEE HOW
                </p>
                <p>
                    <span class="fixed">Bank/Cash</span>: PBB ISLAMIC BANK (CLIENT'S ACCOUNT)
                </p>
                <p>
                    <span class="fixed">Cheque No.</span>: IBFT (RPP20230711090752)
                </p>
            </div>
            <div class="receipt-info">
                <p>(A/C or File Copy)</p>
                <h3>RCM/C/2307/027</h3>
                <p>
                    <span class="fixed">Receipt Date</span> : 11-Jul-2023
                </p>
                <p>
                    <span class="fixed">Department</span> :
                </p>
            </div>
        </div>

        <div class="payment-table">
            <table style="border-top:2px solid black;border-bottom:2px solid black;">
                <thead>
                    <th>#.</th>
                    <th class="text-left">Description</th>
                    <th class="text-left">File No.</th>
                    <th class="text-right">
                        Total Amount<br>
                        (RM)
                    </th>
                    
                </thead>
                <tbody>
                    <tr>
                        <td style="border-top: 1px solid black;border-bottom: 1px solid black;"></td>
                        <td style="border-top: 1px solid black;border-bottom: 1px solid black;">Deposit</td>
                        <td style="border-top: 1px solid black;border-bottom: 1px solid black;">NS/C/SPA/0286/0523/ZA</td>
                        <td style="border-top: 1px solid black;border-bottom: 1px solid black;"  class="text-right">20,000.00</td>
                    </tr>
                </tbody>
                <tfoot>
                    <th colspan="2" class="text-left">Ringgit Malaysia Twenty Thousand Only</th>
                    <th class="text-right">
                        Grand Total: 
                    <th class="text-right">20,000.00
                    </th>
                </tfoot>
            </table>
        </div>

    </div>
    <div class="signature">
        <p class="authority">
            Authorised by: 
        </p>
        <div class="underline"></div>
        <p class="small-italic">
            <small><i>**Validity of this Receipt is subject to the clearance of Cheque</i></small>
        </p>
    </div>

</body>

</html>
