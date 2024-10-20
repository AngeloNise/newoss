<!DOCTYPE html>
<html>
    <head>
        <title>Evaluation Details</title>
        <style>
            body {
                margin: 0;
                padding: 0;
                font-family: 'Calibri', sans-serif;
                font-size: 11px;
            }
        
            header {
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                height: 80px;
            }
        
            footer {
                position: fixed;
                left: 0;
                bottom: 0;
                width: 100%;
                height: 45px;
            }
        
            .fra-container {
                padding: 60px 20px; /* Space for header and footer */
                margin-top: 80px;
                padding-bottom: 60px;
                padding-top: 60px;
            }
            .fra-container:nth-of-type(2) {
                margin-top: 100px; /* Add top margin to second page */
            }

            /* Force page break before an element to start on new page */
            .page-break {
                page-break-before: always;
            }
        </style>
    </head>
<body>
    <header>
        <table style="width: 100%; border-collapse: collapse; margin-top: -5px">
            <tr>
                <td style="width: 80px; vertical-align: middle;">
                    @if($logo && $logo->pup_logo && file_exists(public_path('images/' . $logo->pup_logo)))
                        <img src="{{ public_path('images/' . $logo->pup_logo) }}" width="80px" alt="University Logo">
                    @else
                        <p>Image not found</p>
                    @endif
                </td>
                <td style="text-align: left; vertical-align: middle;">
                    <h4 style="font-family: 'Calibri', sans-serif; font-size: 10pt; font-weight: normal; margin: 0;">
                        &nbsp;&nbsp;&nbsp;Republic of the Philippines
                    </h4>
                    <h4 style="font-family: 'Californian FB', serif; font-size: 12pt; font-weight: bold; margin: 0;">
                        &nbsp;&nbsp;&nbsp;POLYTECHNIC UNIVERSITY OF THE PHILIPPINES
                    </h4>
                    <h4 style="font-family: 'Californian FB', serif; font-size: 12pt; font-weight: normal; margin: 0;">
                        &nbsp;&nbsp;&nbsp;OFFICE OF THE VICE PRESIDENT FOR FINANCE
                    </h4>
                </td>
                <td style="text-align: center; vertical-align: middle; font-family: 'Calibri', sans-serif; font-size: 24pt; font-weight: bold; border: 0.5px solid black; padding: 1px;">
                    Annex A
                </td>
            </tr>
        </table>
        <h4 style="text-align: center; font-family: 'Californian FB', serif; font-size: 12pt; font-weight: bold; margin: 0; margin-top: 40px">
            FUND RAISING ACTIVITY APPLICATION FORM
        </h4>
    </header>

    <footer style="text-align: center;">
        <p style="font-family: 'Calibri', sans-serif; font-size: 8pt; font-weight: normal; margin: 0;">
            Room 208 Charlie Del Rosario Building PUP A. Mabini Campus, Anonas Street, Sta. Mesa, Manila
        </p>
        <p style="font-family: 'Calibri', sans-serif; font-size: 8pt; font-weight: normal; margin: 0;">
            Trunk Line: 5335-1777 local 352; Website: www.pup.edu.ph; e-mail: studentservices@pup.edu.ph
        </p>
        <br>
        <p style="font-family: 'Californian FB', serif; font-size: 12pt; font-weight: normal; margin: 0; font-style: italic;">
            "THE COUNTRY’S 1<sup>st</sup> POLYTECHNIC U"
        </p>
        
    </footer>
    
    @yield('content')
</body>
</html>
