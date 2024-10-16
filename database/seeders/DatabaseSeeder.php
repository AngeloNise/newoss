<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // List of organizations and users
        $organizations = [
            ['name' => 'JP', 'name_of_organization' => 'CCIS Student Council', 'email' => 'CCISSC@example.com'],
            ['name' => 'Cornell', 'name_of_organization' => 'PUP Association for the Advancement of Tourism and Hospitality (PAATH)', 'email' => 'PAATH@example.com'],
            ['name' => 'Rivas', 'name_of_organization' => 'PUP The Symposium (PUP TS)', 'email' => 'PUPTS@example.com'],
            ['name' => 'Pada', 'name_of_organization' => 'PUP League of Advocates for Climate Action and Environmental Sustainability (PUP League of ACES)', 'email' => 'PUPLeagueofACES@example.com'],
            ['name' => 'Rural & Manamtam', 'name_of_organization' => 'Mathematics: Road to Excellence (MATH)', 'email' => 'MATHRIIX@example.com'],
            ['name' => 'Dumrique', 'name_of_organization' => 'Society of Information Technology Educators (SITE)', 'email' => 'SITE@example.com'],
            ['name' => 'San Jose', 'name_of_organization' => 'Polytechnic University of the Philippines Social Studies Guild (PUP SSG)', 'email' => 'PUPSSG@example.com'],
            ['name' => 'Gepila', 'name_of_organization' => 'Every Nation Campus Polytechnic University of the Philippines (ENC PUP)', 'email' => 'ENCPUP@example.com'],
            ['name' => 'Intoy & Requejo', 'name_of_organization' => 'Tulos Baybay (TB)', 'email' => 'TB@example.com'],
            ['name' => 'Valila & Dimasaca', 'name_of_organization' => 'PUP Library and Information Science Student Organization (PUP LISSO)', 'email' => 'PUPLISSO@example.com'],
            ['name' => 'Valila', 'name_of_organization' => 'DZMC – Young Communicators’ Guild (DZMC-YCG)', 'email' => 'DZMCYCG@example.com'],
            ['name' => 'Montemar', 'name_of_organization' => 'PUP Sociology Society (PUP – Soc-Soc)', 'email' => 'PUPSocSoc@example.com'],
            ['name' => 'Intoy', 'name_of_organization' => 'PUP − Bukluran sa Sikolohiyang Pilipino (PUP-BSP)', 'email' => 'PUPBSP@example.com'],
            ['name' => 'San Jose', 'name_of_organization' => 'PUP Hygears (PUP HG)', 'email' => 'PUPHG@example.com'],
            ['name' => 'Danting & Pada', 'name_of_organization' => 'PUP-International Studies Students’ Assembly (PUP-ISSA)', 'email' => 'PUPISSA@example.com'],
            ['name' => 'Mahaguay', 'name_of_organization' => 'PUP for Jesus Movement (PUPJM)', 'email' => 'PUPJM@example.com'],
            ['name' => 'Corpus', 'name_of_organization' => 'Band of Young and Outstanding Bartenders (BYOB)', 'email' => 'BYOB@example.com'],
            ['name' => 'Andres', 'name_of_organization' => 'Science Instructors of Education, Nature, Technology, and Innovation Alliance (SCIENTIA)', 'email' => 'SCIENTIA@example.com'],
            ['name' => 'Mantillas & Espeña', 'name_of_organization' => 'PUP BES Honors Society (PUP BES HS)', 'email' => 'PUPBESHS@example.com'],
            ['name' => 'Lobigas', 'name_of_organization' => 'Junior Financial Executives – Polytechnic University of the Philippines (JFINEX-PUP)', 'email' => 'JFINEXPUP@example.com'],
            ['name' => 'Peralta & Sending', 'name_of_organization' => 'Future Business Teachers’ Organization (FBTO)', 'email' => 'FBTO@example.com'],
            ['name' => 'Lirio & Samala', 'name_of_organization' => 'PUP Samahang Nagtataguyod ng Iisang Diwa’t Adhika (PUP-SANDIWA)', 'email' => 'PUPSANDIWA@example.com'],
            ['name' => 'Perlas & San Jose', 'name_of_organization' => 'AWS Cloud Club - PUP Manila (AWSCC-PUP MANILA)', 'email' => 'AWSCCPUPMANILA@example.com'],
            ['name' => 'Panibio', 'name_of_organization' => 'Junior Marketing Executives (JME)', 'email' => 'JME@example.com'],
            ['name' => 'Rebusquillo', 'name_of_organization' => 'The Polytechnic University of the Philippines Manila Pre-Law Society (PUP PLS)', 'email' => 'PUPPLS@example.com'],
            ['name' => 'Danting & Pada', 'name_of_organization' => 'Institution of Mechanical Engineers – Polytechnic University of the Philippines Student Chapter (IMechE – PUPSC)', 'email' => 'IMechEPUPSC@example.com'],
            ['name' => 'Mahaguay', 'name_of_organization' => 'PUP Radio Engineering Circle – Manila Section (PUP-REC Manila Section)', 'email' => 'PUPRECManilaSection@example.com'],
            ['name' => 'Mercado & Janeo', 'name_of_organization' => 'Bayanihan Youth for Peace–Polytechnic University of the Philippines Main Chapter (BYP-PUP)', 'email' => 'BYPPUP@example.com'],
            ['name' => 'Villa', 'name_of_organization' => 'Alyansa ng mga Panulat na Sumusuong (ALPAS)', 'email' => 'ALPAS@example.com'],
            ['name' => 'Corpus', 'name_of_organization' => 'Guild of English Majors (GEMs)', 'email' => 'GEMs@example.com'],
            ['name' => 'Muhi', 'name_of_organization' => 'PUP COC Ensemble', 'email' => 'PUCOCEnsemble@example.com'],
            ['name' => 'Isaac', 'name_of_organization' => 'PUP Dulaang Suhay-Fil (DSF)', 'email' => 'DSF@example.com'],
            ['name' => 'Adaya', 'name_of_organization' => 'United Architects of the Philippines Student Auxiliary - PUP (UAPSA-PUP)', 'email' => 'UAPSAPUP@example.com'],
            ['name' => 'Paz', 'name_of_organization' => 'PUP Epistemic League of Interactive future Teachers of English (PUP-ELITE)', 'email' => 'PUPELITE@example.com'],
            ['name' => 'Mora', 'name_of_organization' => 'Peacemakers Movement (PM)', 'email' => 'PM@example.com'],
            ['name' => 'Albason', 'name_of_organization' => 'Damdamin at Malay PUP Sta. Mesa (DAMLAY PUP Sta. Mesa)', 'email' => 'DAMLAYPUPStaMesa@example.com'],
            ['name' => 'Novero', 'name_of_organization' => 'Society of Early Childhood Education (SECEd)', 'email' => 'SECEd@example.com'],
            ['name' => 'Medrano-Bacolod & Gepila', 'name_of_organization' => 'Polytechnic University of the Philippines Mathematics Club (PUP Math Club)', 'email' => 'PUPMathClub@example.com'],
            ['name' => 'Lobigas', 'name_of_organization' => 'Societas Philosophiae (SP)', 'email' => 'SP@example.com'],
            ['name' => 'Junio', 'name_of_organization' => 'The Jesus Impact - PUP (TJI-PUP)', 'email' => 'TJIPUP@example.com'],
            ['name' => 'Silin', 'name_of_organization' => 'Teatro Komunikado (TK)', 'email' => 'TK@example.com'],
            ['name' => 'Duarte', 'name_of_organization' => 'PUP BroadCircle', 'email' => 'PUPBroadCircle@example.com'],
            ['name' => 'Henon', 'name_of_organization' => 'Entrepreneurial Students Society (ESS)', 'email' => 'ESS@example.com'],
            ['name' => 'Paz', 'name_of_organization' => 'PUP Kabataang Tanggol Wika (PUP KTW)', 'email' => 'PUPKTW@example.com'],
            ['name' => 'Mora', 'name_of_organization' => 'Philippine Institute of Civil Engineers- Polytechnic University of the Philippines Student Chapter Charter No. 30 (PICE-PUPSC)', 'email' => 'PICEPUPSC@example.com'],
            ['name' => 'Serrano', 'name_of_organization' => 'Trailblazers Movement (TBM)', 'email' => 'TBM@example.com'],
            ['name' => 'Timoteo', 'name_of_organization' => 'Hataw PUP (HPUP)', 'email' => 'HPUP@example.com'],
            ['name' => 'Corpus', 'name_of_organization' => 'PUP Tourism Management Society (PUP TMS)', 'email' => 'PUPTMS@example.com'],
            ['name' => 'Alvarez', 'name_of_organization' => 'Students’ Integrated League of Interior Design (SILID)', 'email' => 'SILID@example.com'],
            ['name' => 'Mutuc', 'name_of_organization' => 'Organization of Junior Physical Educators (OJPE)', 'email' => 'OJPE@example.com'],
            ['name' => 'Pechardo', 'name_of_organization' => 'League of Innovators in the Public Administration Discipline (LIPAD)', 'email' => 'LIPAD@example.com'],
            ['name' => 'Oriondo', 'name_of_organization' => 'Pambansang Samahan ng Inhenyero Mekanikal – Polytechnic University of the Philippines Student Unit (PSIM-PUPSU)', 'email' => 'PSIMPUPSU@example.com'],
            ['name' => 'Lopiga', 'name_of_organization' => 'PUP Society of Biology Students (SBS)', 'email' => 'PUPSBS@example.com'],
            ['name' => 'Rivera', 'name_of_organization' => 'Polytechnic University of the Philippines–Association of DOST Scholars (PUP-ADS)', 'email' => 'PUPADS@example.com'],
            ['name' => 'Mora', 'name_of_organization' => 'Junior Cooperators Association (JCA)', 'email' => 'JCA@example.com'],
            ['name' => 'Henon', 'name_of_organization' => 'Association of Concerned Transportation Students (ACTS)', 'email' => 'ACTS@example.com'],
            ['name' => 'Tugade', 'name_of_organization' => 'PUP Peer Facilitators Association (PUPPFA)', 'email' => 'PUPPFA@example.com'],
            ['name' => 'Dela Cruz', 'name_of_organization' => 'Ugnayan ng Talino at Kagalingan (UTAK)', 'email' => 'UTAK@example.com'],
            ['name' => 'Serrano', 'name_of_organization' => 'Polytechnic University of the Philippines Federation of Junior Philippine Institute of Accountants (PUPFJPIA)', 'email' => 'PUPFJPIA@example.com'],
            ['name' => 'Mutuc', 'name_of_organization' => 'PUP School of Debaters (SOD)', 'email' => 'PUPSOD@example.com'],
            ['name' => 'Rivera', 'name_of_organization' => 'PUP Philippine Studies Students Association (PUP PhilSSA)', 'email' => 'PUPPhilSSA@example.com'],
            ['name' => 'Arrojado', 'name_of_organization' => 'Circle of Public Administration and Governance Students (CPAGS)', 'email' => 'CPAGS@example.com'],
            ['name' => 'Lobigas', 'name_of_organization' => 'Guild of Livelihood and Technology Education Students (GLiTES)', 'email' => 'GLiTES@example.com'],
            ['name' => 'Henon', 'name_of_organization' => 'PUP – Junior Philippine Association of Secretaries and Administrative Professionals (PUP – JPASAP)', 'email' => 'PUPJPASAP@example.com'],
            ['name' => 'Timoteo', 'name_of_organization' => 'PUP Sukarela Association of Young Extensionists (PUP SAYE)', 'email' => 'PUPSAYE@example.com'],
            ['name' => 'Corpus', 'name_of_organization' => 'Polytechnic University of the Philippines Aggregates (PUP Aggregates)', 'email' => 'PUPAggregates@example.com'],
            ['name' => 'Laceda', 'name_of_organization' => 'Literature, Arts, and Culture Society (LACS)', 'email' => 'LACS@example.com'],
            ['name' => 'Henon', 'name_of_organization' => 'Move to the Groove (M2TG)', 'email' => 'M2TG@example.com'],
            ['name' => 'Tugade', 'name_of_organization' => 'IIEE-PUP Electrical Engineering Network (EEN)', 'email' => 'EEN@example.com'],
            ['name' => 'Dela Cruz', 'name_of_organization' => 'Polytechnic University of the Philippines Railway Engineering Students’ Society (PUP RailSS)', 'email' => 'PUPRailSS@example.com'],
            ['name' => 'Franco', 'name_of_organization' => 'Polytechnic University of the Philippines - Physics Society (PUP PhySoc)', 'email' => 'PUPPhySoc@example.com'],
            ['name' => 'Baybay', 'name_of_organization' => 'PUP House of Parliamentarians (PUP HOP)', 'email' => 'PUPHOP@example.com'],
            ['name' => 'Javier & Vinuya', 'name_of_organization' => 'PUP Kasarianlan', 'email' => 'PUPKasarianlan@example.com'],
            ['name' => 'Quiñones & Pernia', 'name_of_organization' => 'Institute of Bachelors in Information Technology Studies (IBITS)', 'email' => 'IBITS@example.com'],
            ['name' => 'Cruz', 'name_of_organization' => 'Youth For Animals PUP (YFA PUP)', 'email' => 'YFAPUP@example.com'],
            ['name' => 'Clutario', 'name_of_organization' => 'PUP Statistics Students’ Clique (PUP StatSClique)', 'email' => 'PUPStatSClique@example.com'],
            ['name' => 'Henon', 'name_of_organization' => 'PUP Association of Students for Computer Intelligence Integration (PUP ASCII)', 'email' => 'PUPASCII@example.com'],
            ['name' => 'Rebulanan', 'name_of_organization' => 'PUP Red Cross Youth Council (PUP RCYC)', 'email' => 'PUPRCYC@example.com'],
            ['name' => 'Roque', 'name_of_organization' => 'Polytechnic University of the Philippines Lawôd (PUP LAWÔD)', 'email' => 'PUPLAWOD@example.com'],
            ['name' => 'Valdez', 'name_of_organization' => 'PUP Economics Research Society (PUP ECONRES)', 'email' => 'PUPECONRES@example.com'],
            ['name' => 'Silin', 'name_of_organization' => 'Polytechnic University of the Philippines – Electronics Engineering Students’ Society (PUP-ECESS)', 'email' => 'PUPECESS@example.com'],
            ['name' => 'Henon', 'name_of_organization' => 'Tau Gamma Phi/Tau Gamma Sigma (PUP TRISKELION)', 'email' => 'PUPTRISKELION@example.com'],
            ['name' => 'Montemar', 'name_of_organization' => 'PUP Circle of Research Enthusiasts (PUP CORE)', 'email' => 'PUCORE@example.com'],
            ['name' => 'Serrano', 'name_of_organization' => 'OU Marketing Executives (OUME)', 'email' => 'OUME@example.com'],
            ['name' => 'Mutuc', 'name_of_organization' => 'Philippine Institute of Industrial Engineers – Polytechnic University of the Philippines Student Chapter (PIIE-PUPSC)', 'email' => 'PIIEPUPSC@example.com'],
            ['name' => 'Rivera', 'name_of_organization' => 'Bachelor of Elementary and Secondary Teaching Society (BEST Society)', 'email' => 'BESTSociety@example.com'],
            ['name' => 'Alcabao', 'name_of_organization' => 'Bachelor of Elementary Education Association (BEEDA)', 'email' => 'BEEDA@example.com']
        ];

        // Create users for each organization
        foreach ($organizations as $org) {
            User::factory()->create([
                'name' => $org['name'],
                'name_of_organization' => $org['name_of_organization'],
                'email' => $org['email'],
                'is_admin' => 0 // non-admin accounts
            ]);
        }

        // Optionally, you can still keep the admin user if needed
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password1'),
            'is_admin' => 1
        ]);
    }
}