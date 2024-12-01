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
            ['name' => 'maria', 'name_of_organization' => 'TPG', 'email' => 'test12344@example.com', 'branch' => 'PUP-MAIN', 'colleges' => 'CCIS'], 
            ['name' => 'mang juan', 'name_of_organization' => 'IBits', 'email' => 'test@example.com', 'branch' => 'PUP-MAIN', 'colleges' => 'CAF'],
            ['name' => 'JP', 'name_of_organization' => 'CCIS Student Council', 'email' => 'CCISSC@example.com', 'branch' => 'PUP-MAIN', 'colleges' => 'CAL'],
            ['name' => 'Cornell', 'name_of_organization' => 'PUP Association for the Advancement of Tourism and Hospitality (PAATH)', 'email' => 'PAATH@example.com', 'branch' => 'PUP-MAIN', 'colleges' => 'CADBE'],
            ['name' => 'Rivas', 'name_of_organization' => 'PUP The Symposium (PUP TS)', 'email' => 'PUPTS@example.com', 'branch' => 'PUP-MAIN', 'colleges' => 'CAL'],
            ['name' => 'Pada', 'name_of_organization' => 'PUP League of Advocates for Climate Action and Environmental Sustainability (PUP League of ACES)', 'email' => 'PUPLeagueofACES@example.com', 'branch' => 'PUP-MAIN', 'colleges' => 'CAF'],
            ['name' => 'Rural', 'name_of_organization' => 'Mathematics: Road to Excellence (MATH)', 'email' => 'MATHRIIX@example.com', 'branch' => 'PUP-MAIN', 'colleges' => 'CCIS'],
            ['name' => 'Dumrique', 'name_of_organization' => 'Society of Information Technology Educators (SITE)', 'email' => 'SITE@example.com', 'branch' => 'PUP-MAIN', 'colleges' => 'CAL'],
            ['name' => 'San Jose', 'name_of_organization' => 'Polytechnic University of the Philippines Social Studies Guild (PUP SSG)', 'email' => 'PUPSSG@example.com', 'branch' => 'PUP-MAIN', 'colleges' => 'CADBE'],
            ['name' => 'Gepila', 'name_of_organization' => 'Every Nation Campus Polytechnic University of the Philippines (ENC PUP)', 'email' => 'ENCPUP@example.com', 'branch' => 'PUP-MAIN', 'colleges' => 'CAF'],
            ['name' => 'Intoy', 'name_of_organization' => 'Tulos Baybay (TB)', 'email' => 'TB@example.com', 'branch' => 'PUP-MAIN', 'colleges' => 'CCIS'],
            ['name' => 'Valila', 'name_of_organization' => 'PUP Library and Information Science Student Organization (PUP LISSO)', 'email' => 'PUPLISSO@example.com', 'branch' => 'PUP-MAIN', 'colleges' => 'CAL'],
            ['name' => 'Valila', 'name_of_organization' => 'DZMC – Young Communicators’ Guild (DZMC-YCG)', 'email' => 'DZMCYCG@example.com', 'branch' => 'PUP-MAIN', 'colleges' => 'CADBE'],
            ['name' => 'Montemar', 'name_of_organization' => 'PUP Sociology Society (PUP – Soc-Soc)', 'email' => 'PUPSocSoc@example.com', 'branch' => 'PUP-MAIN', 'colleges' => 'CAF'],
            ['name' => 'Intoy', 'name_of_organization' => 'PUP − Bukluran sa Sikolohiyang Pilipino (PUP-BSP)', 'email' => 'PUPBSP@example.com', 'branch' => 'PUP-MAIN', 'colleges' => 'CAL'],
            ['name' => 'San Jose', 'name_of_organization' => 'PUP Hygears (PUP HG)', 'email' => 'PUPHG@example.com', 'branch' => 'PUP-MAIN', 'colleges' => 'CCIS'],
            ['name' => 'Danting', 'name_of_organization' => 'PUP-International Studies Students’ Assembly (PUP-ISSA)', 'email' => 'PUPISSA@example.com', 'branch' => 'PUP-MAIN', 'colleges' => 'CAF'],
            ['name' => 'Mahaguay', 'name_of_organization' => 'PUP for Jesus Movement (PUPJM)', 'email' => 'PUPJM@example.com', 'branch' => 'PUP-MAIN', 'colleges' => 'CADBE'],
            ['name' => 'Corpus', 'name_of_organization' => 'Band of Young and Outstanding Bartenders (BYOB)', 'email' => 'BYOB@example.com', 'branch' => 'PUP-MAIN', 'colleges' => 'CCIS'],
            ['name' => 'Andres', 'name_of_organization' => 'Science Instructors of Education, Nature, Technology, and Innovation Alliance (SCIENTIA)', 'email' => 'SCIENTIA@example.com', 'branch' => 'PUP-MAIN', 'colleges' => 'CAL'],
            ['name' => 'Mantillas', 'name_of_organization' => 'PUP BES Honors Society (PUP BES HS)', 'email' => 'PUPBESHS@example.com', 'branch' => 'PUP-MAIN', 'colleges' => 'CAF'],
            ['name' => 'Lobigas', 'name_of_organization' => 'Junior Financial Executives – Polytechnic University of the Philippines (JFINEX-PUP)', 'email' => 'JFINEXPUP@example.com', 'branch' => 'PUP-MAIN', 'colleges' => 'CADBE'],
            ['name' => 'Peralta', 'name_of_organization' => 'Future Business Teachers’ Organization (FBTO)', 'email' => 'FBTO@example.com', 'branch' => 'PUP-MAIN', 'colleges' => 'CCIS'],
            ['name' => 'Lirio', 'name_of_organization' => 'PUP Samahang Nagtataguyod ng Iisang Diwa’t Adhika (PUP-SANDIWA)', 'email' => 'PUPSANDIWA@example.com', 'branch' => 'PUP-MAIN', 'colleges' => 'CAL'],
            ['name' => 'Perlas', 'name_of_organization' => 'AWS Cloud Club - PUP Manila (AWSCC-PUP MANILA)', 'email' => 'AWSCCPUPMANILA@example.com', 'branch' => 'PUP-MAIN', 'colleges' => 'CADBE'],
            ['name' => 'Panibio', 'name_of_organization' => 'Junior Marketing Executives (JME)', 'email' => 'JME@example.com', 'branch' => 'PUP-MAIN', 'colleges' => 'CAF'],
            ['name' => 'Rebusquillo', 'name_of_organization' => 'The Polytechnic University of the Philippines Manila Pre-Law Society (PUP PLS)', 'email' => 'PUPPLS@example.com', 'branch' => 'PUP-MAIN', 'colleges' => 'CAL'],
            ['name' => 'Danting', 'name_of_organization' => 'Institution of Mechanical Engineers – Polytechnic University of the Philippines Student Chapter (IMechE – PUPSC)', 'email' => 'IMechEPUPSC@example.com', 'branch' => 'PUP-MAIN', 'colleges' => 'CCIS'],
            ['name' => 'Mahaguay', 'name_of_organization' => 'PUP Radio Engineering Circle – Manila Section (PUP-REC Manila Section)', 'email' => 'PUPRECManilaSection@example.com', 'branch' => 'PUP-MAIN', 'colleges' => 'CAF'],
            ['name' => 'Mercado', 'name_of_organization' => 'Bayanihan Youth for Peace–Polytechnic University of the Philippines Main Chapter (BYP-PUP)', 'email' => 'BYPPUP@example.com', 'branch' => 'PUP-MAIN', 'colleges' => 'CADBE'],
            ['name' => 'Villa', 'name_of_organization' => 'Alyansa ng mga Panulat na Sumusuong (ALPAS)', 'email' => 'ALPAS@example.com', 'branch' => 'PUP-MAIN', 'colleges' => 'CCIS'],
            ['name' => 'Corpus', 'name_of_organization' => 'Guild of English Majors (GEMs)', 'email' => 'GEMs@example.com', 'branch' => 'PUP-MAIN', 'colleges' => 'CAF'],
            ['name' => 'Muhi', 'name_of_organization' => 'PUP COC Ensemble', 'email' => 'PUCOCEnsemble@example.com', 'branch' => 'PUP-MAIN', 'colleges' => 'CAL'],
            ['name' => 'Isaac', 'name_of_organization' => 'PUP Dulaang Suhay-Fil (DSF)', 'email' => 'DSF@example.com', 'branch' => 'PUP-MAIN', 'colleges' => 'CCIS'],
            ['name' => 'Adaya', 'name_of_organization' => 'United Architects of the Philippines Student Auxiliary - PUP (UAPSA-PUP)', 'email' => 'UAPSAPUP@example.com', 'branch' => 'PUP-MAIN', 'colleges' => 'CAF'],
            ['name' => 'Paz', 'name_of_organization' => 'PUP Epistemic League of Interactive future Teachers of English (PUP-ELITE)', 'email' => 'PUPELITE@example.com', 'branch' => 'PUP-MAIN', 'colleges' => 'CAL'],
            ['name' => 'Mora', 'name_of_organization' => 'Peacemakers Movement (PM)', 'email' => 'PM@example.com', 'branch' => 'PUP-MAIN', 'colleges' => 'CADBE'],
            ['name' => 'Albason', 'name_of_organization' => 'Damdamin at Malay PUP Sta. Mesa (DAMLAY PUP Sta. Mesa)', 'email' => 'DAMLAYPUPStaMesa@example.com', 'branch' => 'PUP-MAIN', 'colleges' => 'CCIS'],
            ['name' => 'Novero', 'name_of_organization' => 'Society of Early Childhood Education (SECEd)', 'email' => 'SECEd@example.com', 'branch' => 'PUP-MAIN', 'colleges' => 'CAF'],
            ['name' => 'Medrano-Bacolod', 'name_of_organization' => 'Polytechnic University of the Philippines Mathematics Club (PUP Math Club)', 'email' => 'PUPMathClub@example.com', 'branch' => 'PUP-MAIN', 'colleges' => 'CAL'],
            ['name' => 'Lobigas', 'name_of_organization' => 'Societas Philosophiae (SP)', 'email' => 'SP@example.com', 'branch' => 'PUP-MAIN', 'colleges' => 'CADBE'],
            ['name' => 'Junio', 'name_of_organization' => 'The Jesus Impact - PUP (TJI-PUP)', 'email' => 'TJIPUP@example.com', 'branch' => 'PUP-MAIN', 'colleges' => 'CCIS'],
            ['name' => 'Silin', 'name_of_organization' => 'Teatro Komunikado (TK)', 'email' => 'TK@example.com', 'branch' => 'PUP-MAIN', 'colleges' => 'CAF'],
            ['name' => 'Duarte', 'name_of_organization' => 'PUP BroadCircle', 'email' => 'PUPBroadCircle@example.com', 'branch' => 'PUP-MAIN', 'colleges' => 'CADBE'],
            ['name' => 'Henon', 'name_of_organization' => 'Entrepreneurial Students Society (ESS)', 'email' => 'ESS@example.com', 'branch' => 'PUP-MAIN', 'colleges' => 'CAL'],
            ['name' => 'Paz', 'name_of_organization' => 'PUP Kabataang Tanggol Wika (PUP KTW)', 'email' => 'PUPKTW@example.com', 'branch' => 'PUP-MAIN', 'colleges' => 'CAF'],
            ['name' => 'Mora', 'name_of_organization' => 'Philippine Institute of Civil Engineers- Polytechnic University of the Philippines Student Chapter Charter No. 30 (PICE-PUPSC)', 'email' => 'PICEPUPSC@example.com', 'branch' => 'PUP-MAIN', 'colleges' => 'CAL'],
            ['name' => 'Serrano', 'name_of_organization' => 'Trailblazers Movement (TBM)', 'email' => 'TBM@example.com', 'branch' => 'PUP-MAIN', 'colleges' => 'CCIS'],
            ['name' => 'Timoteo', 'name_of_organization' => 'Hataw PUP (HPUP)', 'email' => 'HPUP@example.com', 'branch' => 'PUP-MAIN', 'colleges' => 'CAF'],
            ['name' => 'Corpus', 'name_of_organization' => 'PUP Tourism Management Society (PUP TMS)', 'email' => 'PUPTMS@example.com', 'branch' => 'PUP-MAIN', 'colleges' => 'CAL'],
            ['name' => 'Alvarez', 'name_of_organization' => 'Students’ Integrated League of Interior Design (SILID)', 'email' => 'SILID@example.com', 'branch' => 'PUP-MAIN', 'colleges' => 'CADBE'],
            ['name' => 'Mutuc', 'name_of_organization' => 'Organization of Junior Physical Educators (OJPE)', 'email' => 'OJPE@example.com', 'branch' => 'PUP-MAIN', 'colleges' => 'CCIS'],
            ['name' => 'Pechardo', 'name_of_organization' => 'League of Innovators in the Public Administration Discipline (LIPAD)', 'email' => 'LIPAD@example.com', 'branch' => 'PUP-MAIN', 'colleges' => 'CAL'],
            ['name' => 'Oriondo', 'name_of_organization' => 'Pambansang Samahan ng Inhenyero Mekanikal – Polytechnic University of the Philippines Student Unit (PSIM-PUPSU)', 'email' => 'PSIMPUPSU@example.com', 'branch' => 'PUP-MAIN', 'colleges' => 'CAF'],
            ['name' => 'Lopiga', 'name_of_organization' => 'PUP Society of Biology Students (SBS)', 'email' => 'PUPSBS@example.com', 'branch' => 'PUP-MAIN', 'colleges' => 'CCIS'],
            ['name' => 'Rivera', 'name_of_organization' => 'Polytechnic University of the Philippines–Association of DOST Scholars (PUP-ADS)', 'email' => 'PUPADS@example.com', 'branch' => 'PUP-MAIN', 'colleges' => 'CADBE'],
            ['name' => 'Mora', 'name_of_organization' => 'Junior Cooperators Association (JCA)', 'email' => 'JCA@example.com', 'branch' => 'PUP-MAIN', 'colleges' => 'CCIS'],
            ['name' => 'Henon', 'name_of_organization' => 'Association of Concerned Transportation Students (ACTS)', 'email' => 'ACTS@example.com', 'branch' => 'PUP-MAIN', 'colleges' => 'CAL'],
            ['name' => 'Tugade', 'name_of_organization' => 'PUP Peer Facilitators Association (PUPPFA)', 'email' => 'PUPPFA@example.com', 'branch' => 'PUP-MAIN', 'colleges' => 'CAF'],
            ['name' => 'Dela Cruz', 'name_of_organization' => 'Ugnayan ng Talino at Kagalingan (UTAK)', 'email' => 'UTAK@example.com', 'branch' => 'PUP-MAIN', 'colleges' => 'CCIS'],
            ['name' => 'Serrano', 'name_of_organization' => 'Polytechnic University of the Philippines Federation of Junior Philippine Institute of Accountants (PUPFJPIA)', 'email' => 'PUPFJPIA@example.com', 'branch' => 'PUP-MAIN', 'colleges' => 'CADBE'],
            ['name' => 'Mutuc', 'name_of_organization' => 'PUP School of Debaters (SOD)', 'email' => 'PUPSOD@example.com', 'branch' => 'PUP-MAIN', 'colleges' => 'CCIS'],
            ['name' => 'Rivera', 'name_of_organization' => 'PUP Philippine Studies Students Association (PUP PhilSSA)', 'email' => 'PUPPhilSSA@example.com', 'branch' => 'PUP-MAIN', 'colleges' => 'CAF'],
            ['name' => 'Arrojado', 'name_of_organization' => 'Circle of Public Administration and Governance Students (CPAGS)', 'email' => 'CPAGS@example.com', 'branch' => 'PUP-MAIN', 'colleges' => 'CAL'],
            ['name' => 'Lobigas', 'name_of_organization' => 'Guild of Livelihood and Technology Education Students (GLiTES)', 'email' => 'GLiTES@example.com', 'branch' => 'PUP-MAIN', 'colleges' => 'CADBE'],
            ['name' => 'Henon', 'name_of_organization' => 'PUP – Junior Philippine Association of Secretaries and Administrative Professionals (PUP – JPASAP)', 'email' => 'PUPJPASAP@example.com', 'branch' => 'PUP-MAIN', 'colleges' => 'CCIS'],
            ['name' => 'Timoteo', 'name_of_organization' => 'PUP Sukarela Association of Young Extensionists (PUP SAYE)', 'email' => 'PUPSAYE@example.com', 'branch' => 'PUP-MAIN', 'colleges' => 'CAL'],
            ['name' => 'Corpus', 'name_of_organization' => 'Polytechnic University of the Philippines Aggregates (PUP Aggregates)', 'email' => 'PUPAggregates@example.com', 'branch' => 'PUP-MAIN', 'colleges' => 'CCIS'],
            ['name' => 'Laceda', 'name_of_organization' => 'Literature, Arts, and Culture Society (LACS)', 'email' => 'LACS@example.com', 'branch' => 'PUP-MAIN', 'colleges' => 'CAF'],
            ['name' => 'Henon', 'name_of_organization' => 'Move to the Groove (M2TG)', 'email' => 'M2TG@example.com', 'branch' => 'PUP-MAIN', 'colleges' => 'CAL'],
            ['name' => 'Tugade', 'name_of_organization' => 'IIEE-PUP Electrical Engineering Network (EEN)', 'email' => 'EEN@example.com', 'branch' => 'PUP-MAIN', 'colleges' => 'CADBE'],
            ['name' => 'Dela Cruz', 'name_of_organization' => 'Polytechnic University of the Philippines Railway Engineering Students’ Society (PUP RailSS)', 'email' => 'PUPRailSS@example.com', 'branch' => 'PUP-MAIN', 'colleges' => 'CCIS'],
            ['name' => 'Franco', 'name_of_organization' => 'Polytechnic University of the Philippines - Physics Society (PUP PhySoc)', 'email' => 'PUPPhySoc@example.com', 'branch' => 'PUP-MAIN', 'colleges' => 'CAF'],
            ['name' => 'Baybay', 'name_of_organization' => 'PUP House of Parliamentarians (PUP HOP)', 'email' => 'PUPHOP@example.com', 'branch' => 'PUP-MAIN', 'colleges' => 'CAL'],
            ['name' => 'Javier', 'name_of_organization' => 'PUP Kasarianlan', 'email' => 'PUPKasarianlan@example.com', 'branch' => 'PUP-MAIN', 'colleges' => 'CADBE'],
            ['name' => 'Quiñones', 'name_of_organization' => 'Institute of Bachelors in Information Technology Studies (IBITS)', 'email' => 'IBITS@example.com', 'branch' => 'PUP-MAIN', 'colleges' => 'CCIS'],
            ['name' => 'Cruz', 'name_of_organization' => 'Youth For Animals PUP (YFA PUP)', 'email' => 'YFAPUP@example.com', 'branch' => 'PUP-MAIN', 'colleges' => 'CAF'],
            ['name' => 'Clutario', 'name_of_organization' => 'PUP Statistics Students’ Clique (PUP StatSClique)', 'email' => 'PUPStatSClique@example.com', 'branch' => 'PUP-MAIN', 'colleges' => 'CAL'],
            ['name' => 'Henon', 'name_of_organization' => 'PUP Association of Students for Computer Intelligence Integration (PUP ASCII)', 'email' => 'PUPASCII@example.com', 'branch' => 'PUP-MAIN', 'colleges' => 'CADBE'],
            ['name' => 'Rebulanan', 'name_of_organization' => 'PUP Red Cross Youth Council (PUP RCYC)', 'email' => 'PUPRCYC@example.com', 'branch' => 'PUP-MAIN', 'colleges' => 'CCIS'],
            ['name' => 'Roque', 'name_of_organization' => 'Polytechnic University of the Philippines Lawôd (PUP LAWÔD)', 'email' => 'PUPLAWOD@example.com', 'branch' => 'PUP-MAIN', 'colleges' => 'CAF'],
            ['name' => 'Valdez', 'name_of_organization' => 'PUP Economics Research Society (PUP ECONRES)', 'email' => 'PUPECONRES@example.com', 'branch' => 'PUP-MAIN', 'colleges' => 'CAL'],
            ['name' => 'Silin', 'name_of_organization' => 'Polytechnic University of the Philippines – Electronics Engineering Students’ Society (PUP-ECESS)', 'email' => 'PUPECESS@example.com', 'branch' => 'PUP-MAIN', 'colleges' => 'CADBE'],
            ['name' => 'Henon', 'name_of_organization' => 'Tau Gamma Phi/Tau Gamma Sigma (PUP TRISKELION)', 'email' => 'PUPTRISKELION@example.com', 'branch' => 'PUP-MAIN', 'colleges' => 'CCIS'],
            ['name' => 'Montemar', 'name_of_organization' => 'PUP Circle of Research Enthusiasts (PUP CORE)', 'email' => 'PUCORE@example.com', 'branch' => 'PUP-MAIN', 'colleges' => 'CAF'],
            ['name' => 'Serrano', 'name_of_organization' => 'OU Marketing Executives (OUME)', 'email' => 'OUME@example.com', 'branch' => 'PUP-MAIN', 'colleges' => 'CAL'],
            ['name' => 'Mutuc', 'name_of_organization' => 'Philippine Institute of Industrial Engineers – Polytechnic University of the Philippines Student Chapter (PIIE-PUPSC)', 'email' => 'PIIEPUPSC@example.com', 'branch' => 'PUP-MAIN', 'colleges' => 'CADBE'],
            ['name' => 'Rivera', 'name_of_organization' => 'Bachelor of Elementary and Secondary Teaching Society (BEST Society)', 'email' => 'BESTSociety@example.com', 'branch' => 'PUP-MAIN', 'colleges' => 'CCIS'],
            ['name' => 'Alcabao', 'name_of_organization' => 'Bachelor of Elementary Education Association (BEEDA)', 'email' => 'BEEDA@example.com', 'branch' => 'PUP-MAIN', 'colleges' => 'CAF'],
        ];
        

        // Create users for each organization
        foreach ($organizations as $org) {
            User::factory()->create([
                'name' => $org['name'],
                'name_of_organization' => $org['name_of_organization'],
                'email' => $org['email'],
                'is_admin' => 0 ,
                'branch' => $org['branch'],
                'colleges' => $org['colleges']
            ]);
        }

        /*$deans = [
            ['name' => 'PUP-MAIN', 'email' => 'PUP-Taguig@example.com', 'is_admin' => '2', 'branch' => 'PUP-MAIN'],
            ['name' => 'PUP-MAIN', 'email' => 'PUP-Quezon@example.com', 'is_admin' => '2', 'branch' => 'PUP-MAIN'],
        ];
        
        foreach ($deans as $dean) {
            User::factory()->create([
                'name' => $dean['name'],
                'email' => $dean['email'],
                'password' => bcrypt('password2'),
                'is_admin' => 2,
                'branch' => $dean['branch']
            ]);
        }*/

        $faculty = [
            ['name' => 'Sir Jim', 'email' => 'sirjim@example.com', 'branch' => 'PUP-MAIN'],
            ['name' => 'Sir Sean', 'email' => 'sirsean@example.com', 'branch' => 'PUP-MAIN'],
            ['name' => 'Sir Bon', 'email' => 'sirbon@example.com', 'branch' => 'PUP-MAIN'],
            ['name' => 'Sir Patrick', 'email' => 'sirpatrick@example.com', 'branch' => 'PUP-MAIN'],
            ['name' => 'Sir Angelo', 'email' => 'sirangelo@example.com', 'branch' => 'PUP-MAIN'],
        ];
        
        foreach ($faculty as $faculty) {
            User::factory()->create([
                'name' => $faculty['name'],
                'email' => $faculty['email'],
                'password' => bcrypt('password1'),
                'is_admin' => 1,
                'branch' => $faculty['branch']
            ]);

        }


        //$this->call(EventSeeder::class);
    }
}