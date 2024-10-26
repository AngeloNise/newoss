@extends('layout.orglayout')
@section('content')

<script>
    function confirmDownload(event) {
        // Prevent the default anchor click behavior
        event.preventDefault();
        
        // Show a confirmation dialog
        const userConfirmed = confirm("Are you sure you want to download this file?");
        
        // If the user confirms, redirect to the download link
        if (userConfirmed) {
            window.location.href = event.currentTarget.href;
        }
    }

        function confirmzipDownload(event) {
        // Prevent the default anchor click behavior
        event.preventDefault();
        
        // Show a confirmation dialog
        const userzipConfirmed = confirm("Are you sure you want to download this zip file?");
        
        // If the user confirms, redirect to the download link
        if (userzipConfirmed) {
            window.location.href = event.currentTarget.href;
        }
    }
</script>

<div class="download-section">
    <div class="downloads">
        <h2>Fund Raising Download</h2>
        <div class="file-list">
            <a href="https://drive.google.com/uc?id=1LPKA21IykzFoxzWTOCYCcBfLyR1gT3SA" download onclick="confirmzipDownload(event)">
                <div class="file">
                    <div class="group">
                        <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 64 64" fill="none">
                            <path d="M32 46L18 32h10V20h8v12h10L32 46z" fill="#000"/>
                            <path d="M4 54h56v6H4v-6z" fill="#000"/>
                        </svg>
                    </div>
                    <div class="group">
                        <h3>Download All</h3>
                        <p>Fund Raising Activity</p>
                    </div>
                </div>
            </a>
            
            <a href="https://drive.google.com/uc?id=1_54dZPDXZdXgTjhgwdSGdkcAkLsdYDKO" download onclick="confirmDownload(event)">
                <div class="file">
                    <div class="group">
                        <img src="/thumbnail/guidelinestn.jpg" alt="Thumbnail 1">
                    </div>
                    <div class="group">
                        <h3>Executive Order No. 12, Series of 2024</h3>
                        <p>Revised Guidelines on Fund-Raising Activities of Students</p>
                    </div>
                </div>
            </a>
            <a href="https://docs.google.com/document/d/1fcMu3ljD4fr83TyHoJyQfaHEuET6d4JU/export?format=doc" download onclick="confirmDownload(event)">
                <div class="file">
                    <div class="group">
                            <img src="/thumbnail/annexAtn.jpg" alt="Thumbnail 2">
                    </div>
                    <div class="group">
                        <h3>Executive Order No. 12</h3>
                        <p>Annex A - Fund Raising Activity Application Form</p>
                    </div>
                </div>
            </a>
            
            <a href="https://docs.google.com/document/d/1XOc590HjDtWOXrErxKb6IUmgF8h8yu9E/export?format=doc" download onclick="confirmDownload(event)">
                <div class="file">
                    <div class="group">
                        <img src="/thumbnail/annexBtn.jpg" alt="Thumbnail 3">
                    </div>
                    <div class="group">
                        <h3>Executive Order No. 12</h3>
                        <p>Annex B - Financial Report</p>
                    </div>
                </div>
            </a>

            <a href="https://docs.google.com/spreadsheets/d/1zUi4s-5N-Ey3yQkaByAghKvLO1wssV-V/export?format=xlsx" download onclick="confirmDownload(event)">
                <div class="file">
                    <div class="group">
                        <img src="/thumbnail/annexCtn.jpg" alt="Thumbnail 4">
                    </div>
                    <div class="group">
                        <h3>Executive Order No. 12-Annex C</h3>
                        <p>Acknowledgment Receipt for Equipment Form</p>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <div class="downloads">
        <h2>Off-Campus Download</h2>
        <a href="https://drive.google.com/uc?id=1UEFETqg-OxrBSBGrCzIRih_qajLA8kUI" download onclick="confirmzipDownload(event)">
            <div class="file">
                <div class="group">
                    <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 64 64" fill="none">
                        <path d="M32 46L18 32h10V20h8v12h10L32 46z" fill="#000"/>
                        <path d="M4 54h56v6H4v-6z" fill="#000"/>
                    </svg>
                </div>
                <div class="group">
                    <h3>Download All</h3>
                    <p>Off Campus Activity</p>
                </div>
            </div>
        </a>        
        <div class="file-list">
            <a href="https://docs.google.com/document/d/1mpAJMI_NxV_hhA-xrcg7--orozX2Kt_Y/export?format=doc" download onclick="confirmDownload(event)">
                <div class="file">
                    <div class="group">
                        <img src="/thumbnail/annexA-Htn.jpg" alt="Thumbnail 5">
                    </div>
                    <div class="group">
                        <h3>Executive Order No. 11</h3>
                        <p>Annexes-A to H</p>
                    </div>
                </div>
            </a>

            <a href="https://docs.google.com/document/d/15_PFTJdO6FXHO_8miZqUBF4QnSBIIvBv/export?format=doc" download onclick="confirmDownload(event)">
                <div class="file">
                    <div class="group">
                        <img src="/thumbnail/OCannexI-Ltn.jpg" alt="Thumbnail 6">
                    </div>
                    <div class="group">
                        <h3>Executive Order No. 11</h3>
                        <p>Annexes-I-L</p>
                    </div>
                </div>
            </a>

            <a href="https://docs.google.com/spreadsheets/d/1e6M2pyCY3KZw0EvVPZlKnAMl-VlrpW3_/export?format=xlsx" download onclick="confirmDownload(event)">
                <div class="file">
                    <div class="group">
                        <img src="/thumbnail/budreq.jpg" alt="Thumbnail 7">
                    </div>
                    <div class="group">
                        <h3>Executive Order No. 11</h3>
                        <p>BUDGETARY REQUIREMENTS</p>
                    </div>
                </div>
            </a>

            <a href="https://docs.google.com/document/d/1oM7pNyVeggz0DmxjN38n82in3ZczzEQw/export?format=doc" download onclick="confirmDownload(event)">
                <div class="file">
                    <div class="group">
                        <img src="/thumbnail/OCguidelinestn.jpg" alt="Thumbnail 8">
                    </div>
                    <div class="group">
                        <h3>Executive Order No. 11</h3>
                        <p>PROCESS MANUAL FOR OFF-CAMPUS STUDENT ACTIVITY</p>
                    </div>
                </div>
            </a>

            <a href="https://drive.google.com/uc?id=1LD0igCma73Hb9mRQhX1Oe1YcJB1paEbN" download onclick="confirmDownload(event)">
                <div class="file">
                    <div class="group">
                        <img src="/thumbnail/OCguidelinestn.jpg" alt="Thumbnail 9">
                    </div>
                    <div class="group">
                        <h3>Executive Order No. 11</h3>
                        <p>Revised Guidelines for the Conduct of Off-Campus Student Activities</p>
                    </div>
                </div>
            </a>

            <a href="https://docs.google.com/document/d/1MtxfUDvfzYXLNIME_lMRoUWqfdrhtjwc/export?format=doc" download onclick="confirmDownload(event)">
                <div class="file">
                    <div class="group">
                        <img src="/thumbnail/parentconsent.jpg" alt="Thumbnail 10">
                    </div>
                    <div class="group">
                        <h3>Executive Order No. 11</h3>
                        <p>TEMPLATE NOTARIZED PARENTAL CONSENT</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection
